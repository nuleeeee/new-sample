<?php

include '../../phpconfig/session.php';


$display = "<table class='table table-hover text-nowrap' id='dtr_report' style='font-size: 14px;'>
                <thead class='thd'>
                    <tr>
                        <th class='text-center'>Date</th>
                        <th class='text-center'>Employee ID</th>
                        <th class='text-center'>First Name</th>
                        <th class='text-center'>Last Name</th>
                        <th class='text-center' style='max-width: 200px;'>Position</th>
                        <th class='text-center'>Level</th>
                        <th class='text-center'>Branch</th>
                        <th class='text-center'>Time In</th>
                        <th class='text-center'>Lunch In</th>
                        <th class='text-center'>Lunch Out</th>
                        <th class='text-center'>Time Out</th>
                    </tr>
                </thead>
                <tbody>";



if (isset($_POST['startdate'])) {

    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $sql = "SELECT  nameid, firstname, lastname, position, positionlevel as level, brname, datequery, 
                    IF(restday=1,'-',dtrtimein) as dtrtimein, IF(restday=1,'-',lunchin) as lunchin, 
                    IF(restday=1,'-',lunchout) as lunchout, IF(restday=1,'-',dtrtimeout) as dtrtimeout
            FROM
            (   
                SELECT  nameid, firstname, lastname, position, positionlevel, bridz, brname, tbl_dtrin.nameidz,
                        tbl_query.datequery, IFNULL(IF(obstatus=1,obin,timein),'-') as dtrtimein, IF(lunchout IS NULL AND timeout IS NULL, '-', IFNULL(lunchin, '-')) AS lunchin, IF(lunchin IS NULL AND timeout IS NULL, '-', IFNULL(lunchout, '-')) AS lunchout, COALESCE(IF(obstatus=1,obout,timeout), CASE WHEN lunchout IS NOT NULL THEN lunchout WHEN lunchin IS NOT NULL THEN lunchin ELSE timein END, '-') AS dtrtimeout, IF(statuspasok = 1,0,IF(statuskapalit = 1,1,IF(IF(WEEKDAY(datequery) + 1 = 1,mon_schd,IF(WEEKDAY(datequery) + 1 = 2,tue_schd,IF(WEEKDAY(datequery) + 1 = 3,wed_schd,IF(WEEKDAY(datequery) + 1 = 4,thu_schd,IF(WEEKDAY(datequery) + 1 = 5,fri_schd,IF(WEEKDAY(datequery) + 1 = 6,sat_schd,sun_schd)))))) = 0,1,0))) as restday
                FROM
                (
                    SELECT nameidz as nameid, '$startdate' + INTERVAL a + b DAY datequery FROM
                    (SELECT 0 a UNION SELECT 1 a UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7
                    UNION SELECT 8 UNION SELECT 9 ) d,
                    (SELECT 0 b UNION SELECT 10 UNION SELECT 20 UNION SELECT 30 UNION SELECT 40) m
                    CROSS JOIN (
                        SELECT DISTINCT nameidz FROM dtr_mbd.dtr WHERE dtrdate >= '$startdate' 
                        AND dtrdate <= '$enddate'
                    ) n
                    WHERE '$startdate' + INTERVAL a + b DAY  <=  '$enddate'
                    ORDER BY a + b
                ) as tbl_query
                LEFT OUTER JOIN
                (
                    SELECT  nameidz, dtrdate, MIN(IF(dtrtype = 0, dtrtime, null)) as timein, 
                            MIN(IF(dtrtype = 1, dtrtime, null)) as lunchin, 
                            MAX(IF(dtrtype = 2, dtrtime, null)) as lunchout, 
                            MAX(IF(dtrtype = 3, dtrtime, null)) as timeout
                    FROM dtr_mbd.dtr
                    WHERE dtrdate >= '$startdate' AND dtrdate <= '$enddate'
                    GROUP BY nameidz,dtrdate
                ) as tbl_dtrin ON tbl_dtrin.dtrdate = tbl_query.datequery AND tbl_dtrin.nameidz = tbl_query.nameid
                LEFT OUTER JOIN
                (
                    SELECT bridz, nameidxx, lastname, firstname FROM vlookup_mcore.vnamenew
                ) AS tbl_vname ON tbl_vname.nameidxx = tbl_query.nameid
                LEFT OUTER JOIN vlookup_mcore.vbranch ON vlookup_mcore.vbranch.branchidxx = tbl_vname.bridz
                LEFT OUTER JOIN
                (
                    SELECT COALESCE(vlookup_mcore.vemployeeposition.position, IF(vproduct_mcore.category.catz IS NOT NULL, vproduct_mcore.category.catz, oldpos.position)) as position, nameidxx as nameidz, lvlidz
                    FROM vlookup_mcore.vnamenew
                    LEFT OUTER JOIN
                    (
                        SELECT GROUP_CONCAT(catz SEPARATOR ', ') as position,nameidz FROM
                        (
                            SELECT dtr_mcore.brpos.*,catz FROM dtr_mcore.brpos
                            INNER JOIN
                            (
                                SELECT MAX(posidxx) as posidxx FROM dtr_mcore.brpos GROUP BY nameidz,catidz
                            )as tbl ON tbl.posidxx = dtr_mcore.brpos.posidxx
                            INNER JOIN vproduct_mcore.category ON vproduct_mcore.category.catidxx = dtr_mcore.brpos.catidz
                            WHERE status = 0 AND trstatus = 0
                        )as tbsub1
                        GROUP BY nameidz
                    )as oldpos ON oldpos.nameidz = vlookup_mcore.vnamenew.nameidxx
                    LEFT OUTER JOIN vlookup_mcore.vemployeeposition ON vlookup_mcore.vemployeeposition.positionidxx = vlookup_mcore.vnamenew.positionidz
                    LEFT OUTER JOIN vproduct_mcore.category ON vproduct_mcore.category.catidxx = vlookup_mcore.vnamenew.positionidz
                ) as showpos ON showpos.nameidz = tbl_query.nameid
                LEFT OUTER JOIN vlookup_mcore.vemployeepositonlevel ON vlookup_mcore.vemployeepositonlevel.levelidxx = showpos.lvlidz
                LEFT OUTER JOIN
                (
                    SELECT dateleaveapp, nameidz, starttime as obin, endtime as obout, obstatus 
                    FROM
                    (
                        SELECT  tmp_aschd.dateleaveapp, nameidz, leaveappidxx, leavetypeidz, starttime, endtime,
                                approvestatus AS obstatus 
                        FROM hrims_mcore.leaveappnew t
                        INNER JOIN 
                        (
                            SELECT '$startdate' + INTERVAL a + b DAY dateleaveapp FROM 
                            (SELECT 0 a UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4  
                            UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) d,
                            (SELECT 0 b UNION SELECT 10 UNION SELECT 20 UNION SELECT 30 UNION SELECT 40) m
                            WHERE '$startdate' + INTERVAL a + b DAY <= '$enddate'
                            ORDER BY a + b
                        ) tmp_aschd ON tmp_aschd.dateleaveapp BETWEEN t.startdate AND t.enddate
                        WHERE leavetypeidz = 9 AND approvestatus = 1
                        GROUP BY nameidz,dateleaveapp
                    )as tbl_leavenewob
                )as tbl_ob ON tbl_ob.nameidz = tbl_vname.nameidxx AND tbl_ob.dateleaveapp = tbl_query.datequery
                LEFT OUTER JOIN
                (
                    SELECT  nameidz, startdate, approvestatus as statuspasok
                    FROM hrims_mcore.leaveappnew WHERE approvestatus = 1 AND leavetypeidz = 1 AND startdate >= '$startdate' AND startdate <= '$enddate'
                )as tbl_changeschd ON tbl_changeschd.nameidz = tbl_vname.nameidxx AND tbl_changeschd.startdate = tbl_query.datequery
                LEFT OUTER JOIN
                (
                    SELECT nameidz, enddate, approvestatus as statuskapalit FROM hrims_mcore.leaveappnew 
                    WHERE approvestatus = 1 AND leavetypeidz = 1 AND enddate >= '$startdate' AND enddate <= '$enddate'
                )as tbl_changeschdkapalit ON tbl_changeschdkapalit.nameidz = tbl_vname.nameidxx AND tbl_changeschdkapalit.enddate = tbl_query.datequery
                LEFT OUTER JOIN 
                (
                    SELECT dateschd, hrims_mcore.empschedule.* FROM
                    (
                        SELECT dateschd, nameidz, MAX(scheduleidxx) as scheduleidxx FROM hrims_mcore.empschedule
                        INNER JOIN
                        (
                            SELECT '$startdate' + INTERVAL a + b DAY dateschd FROM
                            (SELECT 0 a UNION SELECT 1 a UNION SELECT 2 UNION SELECT 3
                            UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 ) d,
                            (SELECT 0 b UNION SELECT 10 UNION SELECT 20 
                            UNION SELECT 30 UNION SELECT 40) m
                            WHERE '$startdate' + INTERVAL a + b DAY  <=  '$enddate'
                            ORDER BY a + b
                        )as tmp_aschd ON tmp_aschd.dateschd >= hrims_mcore.empschedule.effectivity_start
                        GROUP BY nameidz,dateschd
                    )as tbl_fschd
                    INNER JOIN hrims_mcore.empschedule ON hrims_mcore.empschedule.scheduleidxx = tbl_fschd.scheduleidxx
                    INNER JOIN vlookup_mcore.vnamenew ON vlookup_mcore.vnamenew.nameidxx = tbl_fschd.nameidz
                    WHERE hide = 0 AND NOT ISNULL(bankacct)
                ) as tbl_sus_empschd ON tbl_sus_empschd.nameidz = tbl_vname.nameidxx AND tbl_sus_empschd.dateschd = tbl_query.datequery
                GROUP BY nameid,datequery
            ) as final
            ORDER BY lastname ASC";

    $result = mysqli_query($db,$sql);
    while($row = $result->fetch_array())
    {


        $display .= "<tr>
                        <td class='table-light text-center'>" . $row["datequery"] . "</td>
                        <td class='table-light text-center'>" . $row["nameid"] . "</td>
                        <td class='table-light text-center'>" . $row["firstname"] . "</td>
                        <td class='table-light text-center'>" . $row["lastname"] . "</td>
                        <td class='table-light text-center text-wrap'>" . $row["position"] . "</td>
                        <td class='table-light text-center'>" . $row["level"] . "</td>
                        <td class='table-light text-center'>" . $row["brname"] . "</td>
                        <td class='table-light text-center'>" . $row["dtrtimein"] . "</td>
                        <td class='table-light text-center'>" . $row["lunchin"] . "</td>
                        <td class='table-light text-center'>" . $row["lunchout"] . "</td>
                        <td class='table-light text-center'>" . $row["dtrtimeout"] . "</td>
                    </tr>";
        }

    $display .= "   </tbody>
            </table>

    <script>
        $(document).ready(function(){
            var empDataTable = $('#dtr_report').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        orientation: 'landscape',
                    },
                    {
                        extend: 'csv',
                    },
                    {
                        extend: 'excel',
                    } 
                ],
                'order': [],
                'scrollX': true,
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'ALL']
                ]
            });
        });
    </script>";

}

echo $display;

?>