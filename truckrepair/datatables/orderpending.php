<?php

include '../../phpconfig/allfunction.php';

$brlogin = $_SESSION["branch"];
$cashieridz = $_SESSION["login_user"];

$display = "<table class='table table-hover text-nowrap' id='orderpending_datatable' style='font-size: 12px;'>
                <thead class='thd_item'>
                    <tr style='cursor: pointer;'>
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
                        <th style='text-align:center;'>REQUEST DATE</th>
                        <th style='text-align:center;'>AGING</th>
                        <th style='text-align:center;'>SUPPLIER 1</th>
                        <th style='text-align:center;'>SUPPLIER 2</th>
                        <th style='text-align:center;'>SUPPLIER 3</th>
                        <th style='text-align:center;'>SET WINNER</th>
                        <th style='text-align:center;'>MODE OF FUNDS</th>
                        <th style='text-align:center;'>ACTION</th>
                        <th class='d-none'>OVERVIEW</th>
                    </tr>
                </thead>
                <tbody>";

        
    $sql = "SELECT  joborderidz, joborderidxx, IFNULL(vdriver, '-') as vdriver, IFNULL(vbrand, '-') as vbrand, IFNULL(vmodel, '-') as vmodel, 
                    IFNULL(vyear, '-') as vyear, IFNULL(vplateno, '-') as vplateno, IFNULL(vodo, '-') as vodo,
                    overview, vname, request_date,
                    SUM(CASE WHEN datacount = 1 THEN qty*price ELSE 0 END) as supplier1, 
                    SUM(CASE WHEN datacount = 2 THEN qty*price ELSE 0 END) as supplier2,
                    SUM(CASE WHEN datacount = 3 THEN qty*price ELSE 0 END) as supplier3,
                    MAX(IF(datacount = 1, 1, NULL)) as datacount1,
                    MAX(IF(datacount = 2, 2, NULL)) as datacount2,
                    MAX(IF(datacount = 3, 3, NULL)) as datacount3,
                    IF(approvalstatus=1, supplier, 'PENDING') as supplier, supplier as suppname,
                    position, brname, tbl_repair.nameidz, aging, bridz, attachments,
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
                        DATE(tsz) as request_date, repairtype, status, 
                        CONCAT(DATEDIFF(CURDATE(), DATE(tsz)), ' DAYS') as aging
                FROM vlookup_mcore.vtruckrepair
                WHERE status = 0
            ) as tbl_repair on tbl_repair.joborderidxx = cv.joborderidz
            LEFT OUTER JOIN
            (
                SELECT nameidxx, CONCAT(lastname, ', ', firstname) as vname, bridz FROM vlookup_mcore.vnamenew
            ) as tbl_vname on tbl_vname.nameidxx = tbl_repair.nameidz
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
            WHERE approvalstatus = 0 AND
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
    $counter = 1;
    while($row = $result->fetch_array())
    {
        $approve = 'approve' . $counter;
        $cancel = 'cancel' . $counter;
        $transfer = 'transfer' . $counter;
        $modeoffunds = 'modeoffunds' . $counter;
        $radio_name = 'radioname' . $counter;

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
                        <td class='table-light'>" . $row["aging"] . "</td>
                        <td class='table-light'>
                            <button id='supplier_one' class='btn btn-sm btn-link btn-supplier text-decoration-none' onclick=\"viewSupplier('".$row["joborderidz"]."', '".$row["nameidz"]."', '".$row["brname"]."', '".$row["vname"]."', '".$row["position"]."', '".$row["overview"]."', '".$row["vdriver"]."', '".$row["vbrand"]."', '".$row["vmodel"]."', '".$row["vyear"]."', '".$row["vplateno"]."', '".$row["vodo"]."', '".$row["joborderidz"]."', '".$row["datacount1"]."', 'SUPPLIER 1', '₱ ".number_format($row["supplier1"], 2, '.', ',')."', 'jo_pending', '', '', '".$row["suppname"]."', '".$row["aid_recipient"]."', '".$row["repairtype"]."')\" data-supplier-value='".$row["supplier1"]."'>
                                ₱ ".number_format($row['supplier1'], 2, '.', ',')."
                            </button>
                        </td>
                        <td class='table-light'>
                            <button id='supplier_two' class='btn btn-sm btn-link btn-supplier text-decoration-none' onclick=\"viewSupplier('".$row["joborderidz"]."', '".$row["nameidz"]."', '".$row["brname"]."', '".$row["vname"]."', '".$row["position"]."', '".$row["overview"]."', '".$row["vdriver"]."', '".$row["vbrand"]."', '".$row["vmodel"]."', '".$row["vyear"]."', '".$row["vplateno"]."', '".$row["vodo"]."', '".$row["joborderidz"]."', '".$row["datacount2"]."', 'SUPPLIER 2', '₱ ".number_format($row["supplier2"], 2, '.', ',')."', 'jo_pending', '', '', '".$row["suppname"]."', '".$row["aid_recipient"]."', '".$row["repairtype"]."')\" data-supplier-value='".$row["supplier2"]."'>
                                ₱ ".number_format($row['supplier2'], 2, '.', ',')."
                            </button>
                        </td>
                        <td class='table-light'>
                            <button id='supplier_three' class='btn btn-sm btn-link btn-supplier text-decoration-none' onclick=\"viewSupplier('".$row["joborderidz"]."', '".$row["nameidz"]."', '".$row["brname"]."', '".$row["vname"]."', '".$row["position"]."', '".$row["overview"]."', '".$row["vdriver"]."', '".$row["vbrand"]."', '".$row["vmodel"]."', '".$row["vyear"]."', '".$row["vplateno"]."', '".$row["vodo"]."', '".$row["joborderidz"]."', '".$row["datacount3"]."', 'SUPPLIER 3', '₱ ".number_format($row["supplier3"], 2, '.', ',')."', 'jo_pending', '', '', '".$row["suppname"]."', '".$row["aid_recipient"]."', '".$row["repairtype"]."')\" data-supplier-value='".$row["supplier3"]."'>
                                ₱ ".number_format($row['supplier3'], 2, '.', ',')."
                            </button>
                        </td>
                        <td class='table-light'>
                            <select id='selected_winner_".$row["joborderidz"]."' class='form-select form-select-sm' style='width: 150px;' disabled>
                                
                            </select>
                        </td>
                        <td class='table-light'>
                            <select id='".$modeoffunds."' class='form-select form-select-sm' style='width: 150px;'>
                                <option value=''></option>
                                <option value='BRANCH AR'>BRANCH AR</option>
                                <option value='PETTY CASH'>PETTY CASH</option>
                                <option value='CHEQUE REQUEST'>CHEQUE REQUEST</option>
                            </select>
                        </td>
                        <td class='table-light'>
                            <div class='d-flex justify-content-between'>
                                <button type='button' class='btn btn-sm btn-primary' id=".$approve." name=".$radio_name." onclick=\"submitApproval(".$row["joborderidz"].", '".$approve."', document.getElementById('".$modeoffunds."').value)\">Approve</button>
                                <span style='margin-left:2px; margin-right: 2px;'></span>
                                <button type='button' class='btn btn-sm btn-danger' id=".$cancel." name=".$radio_name." onclick=\"cancelJO('".$row["joborderidz"]."', '".$row["nameidz"]."', '".$row["brname"]."', '".$row["vname"]."', '".$row["position"]."', '".$row["overview"]."', '".$row["vbrand"]."', '".$row["vmodel"]."', '".$row["vyear"]."', '".$row["vplateno"]."', '".$row["vodo"]."', '".$row["joborderidz"]."', '".$row["datacount3"]."', 'SUPPLIER 3', '₱ ".number_format($row["supplier3"], 2, '.', ',')."', 'cancel_jo', '".$cancel."')\">Cancel</button>
                                <span style='margin-left:2px; margin-right: 2px;'></span>
                                <button type='button' class='btn btn-sm btn-warning' id=".$transfer." onclick=\"transferJO('".$row["joborderidz"]."', '".$row["nameidz"]."', '".$row["repairtype"]."')\">Transfer</button>
                            </div>
                        </td>
                        <td class='d-none'>" . $row["overview"] . "</td>
                    </tr>";

        $counter = $counter + 1;
    }


$display .= "    </tbody>
            </table>

<script>
$(document).ready(function() {
    var empDataTable = $('#orderpending_datatable').DataTable({
        'order': [],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'ALL']
        ]
    });


    function disableButtonsWithZeroSupplier() {
        $('.btn-supplier').each(function() {
            var supplierValue = parseFloat($(this).data('supplier-value'));
            if (supplierValue === 0) {
                $(this).attr('disabled', 'disabled');
            } else {
                $(this).removeAttr('disabled');
            }
        });
    }

    empDataTable.on('page.dt', function() {
        setTimeout(function() {
            disableButtonsWithZeroSupplier();
        }, 100);
    });

    disableButtonsWithZeroSupplier();
});

</script>";

echo $display;

?>