<?php

include '../../phpconfig/allfunction.php';

$brlogin = $_SESSION["branch"];
$cashieridz = $_SESSION['login_user'];

$display = "<table class='table table-hover text-nowrap' id='cancelledorder_datatable' style='font-size: 12px;'>
                <thead class='thd_item'>
                    <tr>
                        <th style='text-align:center;'>JOB ORDER ID</th>    
                        <th style='text-align:center;'>BRANCH</th>
                        <th style='text-align:center;'>TYPE</th>
                        <th style='text-align:center;'>PLATE NO</th>
                        <th style='text-align:center;'>MODEL</th>
                        <th style='text-align:center;'>YEAR</th>
                        <th style='text-align:center;'>BRAND</th>
                        <th style='text-align:center;'>ODO</th>
                        <th style='text-align:center;'>REQUESTED BY</th>
                        <th style='text-align:center;'>ATTACHMENTS</th>
                        <th style='text-align:center;'>REQUESTED DATE</th>
                        <th style='text-align:center;'>LEAD TIME</th>
                        <th style='text-align:center;'>SUPPLIER</th>
                        <th style='text-align:center;'>DETAILS</th>
                        <th style='text-align:center;'>APPROVER</th>
                        <th style='text-align:center;'>AMOUNT</th>
                        <th class='d-none'>OVERVIEW</th>
                    </tr>
                </thead>
                <tbody>";

    $sql = "SELECT  joborderidz, joborderidxx, IFNULL(vdriver, '-') as vdriver, IFNULL(vbrand, '-') as vbrand, IFNULL(vmodel, '-') as vmodel, 
                    IFNULL(vyear, '-') as vyear, IFNULL(vplateno, '-') as vplateno, IFNULL(vodo, '-') as vodo,
                    overview, vname, request_date, 0 AS  price, status,
                    COALESCE(MAX(IF(datacount = 3, 3, NULL)), MAX(IF(datacount = 2, 2, NULL)), MAX(IF(datacount = 1, 1, NULL))) as datacount,
                    supplier, position, brname, tbl_repair.nameidz, cancelledreason, modeoffunds, 
                    IFNULL(vapprover, '-') as vapprover, CONCAT(DATEDIFF(CURDATE(), approvaldate), ' DAYS') as lead_time, attachments,
                    CASE
                        WHEN repairtype = 1 THEN 'TRUCK REPAIR'
                        WHEN repairtype = 2 THEN 'BUILDING REPAIR'
                        WHEN repairtype = 3 THEN 'WATER'
                        WHEN repairtype = 4 THEN 'ELECTRIC'
                        WHEN repairtype = 5 THEN 'COMMUNICATION'
                        WHEN repairtype = 6 THEN 'STATIONARY'
                        WHEN repairtype = 7 THEN 'MARKETING COLLATERALS'
                        WHEN repairtype = 8 THEN 'EQUIPMENT AND ASSETS'
                        WHEN repairtype = 9 THEN 'MIS BRANCH REPAIR'
                        WHEN repairtype = 10 THEN 'HR REQUEST'
                        WHEN repairtype = 11 THEN 'TRANSPORTATION'
                        WHEN repairtype = 12 THEN 'FUEL'
                        WHEN repairtype = 13 THEN 'FINANCIAL AID'
                        WHEN repairtype = 14 THEN 'OTHER DELIVERY EXPENSES'
                        WHEN repairtype = 15 THEN 'PERMIT RENEWALS'
                        WHEN repairtype = 16 THEN 'GARBAGE HAULER'
                        WHEN repairtype = 17 THEN 'CUSTOMER DELIGHT'
                        WHEN repairtype = 18 THEN 'SOLICITATIONS'
                    END as repairtype, aid_recipient
            FROM vlookup_mcore.vrepaircanvass cv
            LEFT OUTER JOIN
            (
                SELECT  joborderidxx, nameidz, vdriver, vbrand, vmodel, vyear, vplateno, vodo, overview, 
                        DATE(tsz) as request_date, repairtype, status, cancelledreason, IFNULL(modeoffunds, '-') as modeoffunds
                FROM vlookup_mcore.vtruckrepair
                WHERE status = 2
            ) as tbl_repair on tbl_repair.joborderidxx = cv.joborderidz
            LEFT OUTER JOIN
            (
                SELECT nameidxx, CONCAT(lastname, ', ', firstname) as vname, bridz FROM vlookup_mcore.vnamenew
            ) as tbl_vname on tbl_vname.nameidxx = tbl_repair.nameidz
            LEFT OUTER JOIN
            (
                SELECT nameidxx, CONCAT(lastname, ', ', firstname) as vapprover FROM vlookup_mcore.vnamenew
            ) as tbl_vapprover on tbl_vapprover.nameidxx = cv.approver
            LEFT OUTER JOIN
            (
                SELECT branchidxx, brname FROM vlookup_mcore.vbranch
            ) as tbl_branch on tbl_branch.branchidxx = tbl_vname.bridz
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
            ) as showpos ON showpos.nameidz = tbl_vname.nameidxx
            LEFT OUTER JOIN
            (
                SELECT financialidxx, joborderidz as job_aidz, nameidz, aid_recipient FROM vlookup_mcore.vfinancialaid aid
                INNER JOIN
                (
                    SELECT nameidxx, CONCAT(lastname, ', ', firstname) as aid_recipient FROM vlookup_mcore.vnamenew
                ) AS vrecepient ON vrecepient.nameidxx = aid.nameidz
            ) AS vaid ON vaid.job_aidz = tbl_repair.joborderidxx
            WHERE approvalstatus = 2 AND joborderidxx IS NOT NULL AND
            CASE 
                WHEN $cashieridz IN ('1480', '759') THEN repairtype = 1
                WHEN $cashieridz IN ('38275267') THEN repairtype = 2
                WHEN $cashieridz IN ('400') THEN repairtype IN (1,3,4,5)
                WHEN $cashieridz IN ('2128', '2808', '38274135') THEN repairtype = 6
                WHEN $cashieridz IN ('3648') THEN repairtype = 7
                WHEN $cashieridz IN ('3972', '2313') THEN repairtype IN (8,9)
                WHEN $cashieridz IN ('3942', '38273841') THEN repairtype = 10
                WHEN $cashieridz IN ('2585', '38275476', '132', '38275377', '38275444') THEN repairtype IN (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18)
            END
            GROUP BY joborderidz
            ORDER BY COALESCE(approvaldate, tsz) DESC";
            
    $result = mysqli_query($db,$sql);
    while($row = $result->fetch_array())
    {

        $folder_path = "../../assets/attachments/" . $row["joborderidxx"];
        
        $display .= "<tr>
                        <td class='table-light'>" . $row["joborderidxx"] . "</td>
                        <td class='table-light'>" . $row["brname"] . "</td>
                        <td class='table-light'>" . $row["repairtype"] . "</td>
                        <td class='table-light'>" . $row["vplateno"] . "</td>
                        <td class='table-light'>" . $row["vmodel"] . "</td>
                        <td class='table-light'>" . $row["vyear"] . "</td>
                        <td class='table-light'>" . $row["vbrand"] . "</td>
                        <td class='table-light'>" . $row["vodo"] . "</td>
                        <td class='table-light'>" . $row["vname"] . "</td>
                        <td class='table-light text-center'>";

                        if ($row["attachments"] == "" && !file_exists($folder_path)) {
                            $display .= "<button type='button' class='btn btn-sm btn-link text-decoration-none' style='font-size:10px; color:gray;'>
                                            NO ATTACHMENTS
                                        </button>";                            
                        } else {
                            $display .= "<button type='button' class='btn btn-sm btn-link' style='font-size:10px' onclick=\"viewAttachment('".$row["joborderidz"]."', '".$row["nameidz"]."')\">
                                            ATTACHMENTS
                                        </button>";
                        }
                            
            $display .= "</td>
                        <td class='table-light'>" . $row["request_date"] . "</td>
                        <td class='table-light'>" . $row["lead_time"] . "</td>
                        <td class='table-light'>" . $row["supplier"] . "</td>
                        <td class='table-light'>
                            <button class='btn btn-sm btn-outline-secondary' onclick=\"viewReason('".$row["joborderidz"]."', '".$row["nameidz"]."', '".$row["vname"]."', '".$row["brname"]."', '".$row["position"]."', '".$row["cancelledreason"]."')\">
                                View Reason
                            </button>
                        </td>
                        <td class='table-light text-center'>" . $row["vapprover"] . "</td>
                        <td class='table-light'>
                            <button id='supplier_one' class='btn btn-sm btn-link btn-supplier text-decoration-none' onclick=\"viewSupplier('".$row["joborderidz"]."', '".$row["nameidz"]."', '".$row["brname"]."', '".$row["vname"]."', '".$row["position"]."', '".$row["overview"]."', '".$row["vdriver"]."', '".$row["vbrand"]."', '".$row["vmodel"]."', '".$row["vyear"]."', '".$row["vplateno"]."', '".$row["vodo"]."', '".$row["joborderidz"]."', '".$row["datacount"]."', 'CANCELLED', '₱ 0.00', 'cancelled_jo', '".$row["vapprover"]."', '-', '".$row["modeoffunds"]."', '".$row["supplier"]."', '".$row["aid_recipient"]."', '".$row["repairtype"]."')\" data-supplier-value='".$row["price"]."'>
                                ₱ ".number_format($row['price'], 2, '.', ',')."
                            </button>
                        </td>
                        <td class='d-none'>" . $row["overview"] . "</td>
                    </tr>";
    }


$display .= "    </tbody>
            </table>

<script>

$(document).ready(function() {
    var empDataTable = $('#cancelledorder_datatable').DataTable({
        'order': [],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'ALL']
        ]
    });
});

</script>";

echo $display;

?>