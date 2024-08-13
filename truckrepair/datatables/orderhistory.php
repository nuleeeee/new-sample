<?php

include '../../phpconfig/allfunction.php';

$brlogin = $_SESSION['branch'];

$display = "<div id='toolbar' class='select d-none'>
                <select class='form-control'>
                    <option value='all' selected>Export All</option>
                </select>
            </div>

            <table class='table table-hover text-nowrap' id='job_order_datatable' style='font-size: 12px;'
            data-toggle='table'
            data-height='585'
            data-sortable='true'
            data-search='true'
            data-search-highlight='true'
            data-show-export='true'
            data-pagination='true'
            data-page-list='[10, 25, 50, 100, All]'
            data-toolbar='#toolbar'>
                <thead class='thd_item'>
                    <tr>
                        <th class='text-center'>DATE</th>
                        <th class='text-center'>JOB ORDER ID</th>
                        <th class='text-center'>TYPE</th>
                        <th class='text-center'>NO. OF CANVASS</th>
                        <th class='text-center'>AMOUNT</th>
                        <th class='text-center'>ATTACHMENTS</th>
                        <th class='text-center'>ACTION</th>
                        <th class='text-center'>APPROVER</th>
                        <th class='text-center'>AGING</th>
                        <th class='text-center'>LEAD TIME</th>
                        <th class='text-center text-wrap'>REQUEST CANCELLATION</th>
                        <th class='d-none'>OVERVIEW</th>
                    </tr>
                </thead>
                <tbody>";


        $sql = "SELECT  vtr.nameidz, DATE(vtr.tsz) as tsz, canvassidxx, joborderidxx,  IFNULL(modeoffunds, '-') as modeoffunds, 
                        IF(notapproved_approvalstatus=0, 'PENDING', IF(status=2, 'CANCELLED', IF(status=3, 'FOR CANCELLATION', supplier))) as supplier,
                        amount, status, approvalstatus, brname, position, vname, overview, IFNULL(vdriver, '-') as vdriver, 
                        IFNULL(vbrand, '-') as vbrand, IFNULL(vmodel, '-') as vmodel, IFNULL(vplateno, '-') as vplateno, 
                        IFNULL(vyear, '-') as vyear, IFNULL(vodo, '-') as vodo, datacount, numofcanvass, IFNULL(vapprover, '-') as vapprover,
                        IF(approvaldate IS NULL, CONCAT(DATEDIFF(CURDATE(), DATE(vtr.tsz)), ' DAYS'), '-') AS aging, 
                        IFNULL(CONCAT(DATEDIFF(CURDATE(), approvaldate), ' DAYS'), '-') AS lead_time, 
                        COALESCE(attachments, notapproved_attachments) as attachments,
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
                FROM vlookup_mcore.vtruckrepair vtr
                LEFT OUTER JOIN
                (
                    SELECT  canvassidxx, joborderidz, supplier, 
                            SUM(qty*price) as amount, approver, approvaldate, approvalstatus, datacount, attachments
                    FROM vlookup_mcore.vrepaircanvass
                    WHERE approvalstatus  = 1
                    GROUP BY joborderidz
                ) as tbl1 on tbl1.joborderidz = vtr.joborderidxx
                LEFT OUTER JOIN
                (
                    SELECT  canvassidxx as notapproved_canvassidxx, joborderidz, supplier as notapproved_supplier, 
                            SUM(qty*price) as notapproved_amount, approver as notapproved_approver, approvaldate as notapproved_approvaldate,
                            approvalstatus as notapproved_approvalstatus, datacount as notapproved_datacount, 
                            attachments as notapproved_attachments
                    FROM vlookup_mcore.vrepaircanvass
                    WHERE approvalstatus IN (0,2,3)
                    GROUP BY joborderidz
                ) as tbl1v2 on tbl1v2.joborderidz = vtr.joborderidxx
                LEFT OUTER JOIN
                (
                    SELECT joborderidz, MAX(datacount) as numofcanvass FROM vlookup_mcore.vrepaircanvass
                    GROUP BY joborderidz
                ) tbl2 on tbl2.joborderidz = vtr.joborderidxx
                LEFT OUTER JOIN
                (
                    SELECT nameidxx, CONCAT(lastname, ', ', firstname) as vname, bridz FROM vlookup_mcore.vnamenew
                ) as tbl_vname on tbl_vname.nameidxx = vtr.nameidz
                LEFT OUTER JOIN
                (
                    SELECT nameidxx, CONCAT(lastname, ', ', firstname) as vapprover FROM vlookup_mcore.vnamenew
                ) as tbl_approver on tbl_approver.nameidxx = tbl1.approver
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
                ) AS vaid ON vaid.job_aidz = vtr.joborderidxx
                WHERE bridz = '$brlogin'
                ORDER BY COALESCE(approvaldate,tsz) DESC";
                
        $result = mysqli_query($db,$sql);
        $counter = 1;
        while($row = $result->fetch_array())
        {
            $request = 'request' . $counter;
            $radio_name = 'radioname' . $counter;

            if ($row["status"] == 0 && $row["approvalstatus"] != 1) {
                $amount = "<span class='text-danger'>PENDING</span>";
                $temp_amount = "₱ 0.00";
            } else if ($row["status"] == 2) {
                $amount = "<span class='text-secondary'>CANCELLED</span>";
                $temp_amount = "₱ 0.00";
            } else if ($row["status"] == 3) {
                $amount = "<span class='text-secondary'>FOR CANCELLATION</span>";
                $temp_amount = "₱ 0.00";
            } else {
                $amount = "<span class='text-primary'>₱ ".number_format($row["amount"], 2, '.', ',')."</span>";
                $temp_amount = "₱ ".number_format($row["amount"], 2, '.', ',');
            }

            if ($row["vplateno"] == "N/A") {
                $plateno = "-";
            } else {
                $plateno = $row["vplateno"];
            }

            $disabled_attr = '';
            if (strpos($amount, 'CANCELLED') !== false) {
                $disabled_attr = 'disabled';
            } else if (strpos($amount, 'FOR CANCELLATION') !== false) {
                $disabled_attr = 'disabled';
            }


            // this is to check that if approved, will only display the approved cost breakdown
            if ($row["approvalstatus"] == 1) {
                $datacount = $row["datacount"];
            } else {
                $datacount = $row["numofcanvass"];
            }

            $folder_path = "../../assets/attachments/" . $row["joborderidxx"];


               
            $display .= "<tr>
                            <td class='table-light'>" . $row["tsz"] . "</td>
                            <td class='table-light'>" . $row["joborderidxx"] . "</td>
                            <td class='table-light'>" . $row["repairtype"] . "</td>
                            <td class='table-light text-center'>" . $row["numofcanvass"] . "</td>
                            <td class='table-light amount-cell'>" . $amount . "</td>
                            <td class='table-light text-center'>";

                    if ($row["attachments"] == "" && $row["supplier"] == "PENDING" && !file_exists($folder_path)) {
                        $display .= "<button type='button' class='btn btn-sm btn-link text-danger' style='font-size:10px;' onclick=\"uploadAttachments('".$row["canvassidxx"]."','".$row["joborderidxx"]."','".$row["nameidz"]."', 'upload_attachments')\">
                                        UPLOAD ATTACHMENTS
                                    </button>";
                    } else if ($row["attachments"] == "" && !file_exists($folder_path)) {
                        $display .= "<button type='button' class='btn btn-sm btn-link text-decoration-none' style='font-size:10px;  color:gray;' >
                                        NO ATTACHMENTS
                                    </button>";
                    } else {
                        $display .= "<button type='button' class='btn btn-sm btn-link' style='font-size:10px;' onclick=\"viewAttachments('".$row["joborderidxx"]."', '".$row["nameidz"]."')\">
                                        ATTACHMENTS
                                    </button>";
                    }
                                
                            $display .= "</td>
                            <td class='table-light'>
                                <a onclick=\"printSupplier('".$row["joborderidxx"]."','".$row["nameidz"]."', '".$row["brname"]."', '".$row["vname"]."', '".$row["position"]."', '".$row["overview"]."', '".$row["vdriver"]."', '".$row["vbrand"]."', '".$row["vmodel"]."', '".$row["vyear"]."', '".$row["vplateno"]."', '".$row["vodo"]."', '".$row["joborderidxx"]."', '".$datacount."', '".$row["supplier"]."', '".$temp_amount."', '".$row["vapprover"]."', '".$row["modeoffunds"]."', '".$row["aid_recipient"]."', '".$row["repairtype"]."')\" class='text-decoration-none' style='color: #434EA0; cursor: pointer'>
                                    View Details
                                </a>
                            </td>
                            <td class='table-light text-center'>" . $row["vapprover"] . "</td>
                            <td class='table-light text-center'>" . $row["aging"] . "</td>
                            <td class='table-light text-center'>" . $row["lead_time"] . "</td>
                            <td class='table-light text-center'>
                                <button type='button' class='btn btn-sm btn-danger text-wrap request-btn' id=".$request." name=".$radio_name." style='font-size:10px;' onclick=\"requestCancellation('".$row["joborderidxx"]."', '".$row["nameidz"]."', '".$row["brname"]."', '".$row["vname"]."', '".$row["position"]."', '".$row["overview"]."', '".$row["vdriver"]."', '".$row["vbrand"]."', '".$row["vmodel"]."', '".$row["vyear"]."', '".$row["vplateno"]."', '".$row["vodo"]."', '".$row["supplier"]."', '".$temp_amount."', '".$request."')\" ".$disabled_attr.">
                                    REQUEST
                                </button>
                            </td>
                            <td class='d-none'>" . $row["overview"] . "</td>
                        </tr>";

            $counter = $counter + 1;
        
        }



    $display .= "    </tbody>
                </table>

    <script>
        // $(document).ready(function() {
        //     var empDataTable = $('#job_order_datatable').DataTable({
        //         'order': [],
        //         aLengthMenu: [
        //             [10, 25, 50, 100, -1],
        //             [10, 25, 50, 100, 'ALL']
        //         ]
        //     });
        // });



  $(function() {
    $('#toolbar').find('select').change(function () {
      $('#job_order_datatable').bootstrapTable('destroy').bootstrapTable({
        exportDataType: $(this).val(),
        exportTypes: ['excel', 'pdf']
      })
    }).trigger('change')
  })
    </script>";

echo $display;

?>