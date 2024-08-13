<?php 

include "../../phpconfig/allfunction.php";

$display = "<table class='table table-hover text-nowrap' id='mbd_stapp_table' style='font-size: 14px;'>
                <thead class='thd'>
                    <tr>
                        <th colspan='3'></th>
                        <th colspan='14'>I. CUSTOMER INFORMATION</th>
                        <th colspan='10'>II. BUSINESS INFORMATION</th>
                        <th colspan='4'></th>
                    </tr>
                    <tr>
                        <th class='text-center'>APPLICATION ID</th>
                        <th class='text-center'>DATE SUBMITTED</th>
                        <th class='text-center'>ATTACHMENTS</th>

                        <th class='text-center'>LAST NAME</th>
                        <th class='text-center'>FIRST NAME</th>
                        <th class='text-center'>MIDDLE NAME</th>
                        <th class='text-center'>SUFFIX</th>
                        <th class='text-center'>ADDRESS</th>
                        <th class='text-center'>ZIP CODE</th>
                        <th class='text-center'>DATE OF BIRTH</th>
                        <th class='text-center'>STATUS</th>
                        <th class='text-center'>TEL NO.</th>
                        <th class='text-center'>MOBILE NO.</th>
                        <th class='text-center'>NAME OF SPOUSE</th>
                        <th class='text-center'>OCCUPATION</th>
                        <th class='text-center'>COMPANY</th>
                        <th class='text-center'>CONTACT NO. (SPOUSE)</th>

                        <th class='text-center'>COMPANY NAME</th>
                        <th class='text-center'>DTI / SEC REG #</th>
                        <th class='text-center'>COMPANY ADDRESS</th>
                        <th class='text-center'>ZIP CODE</th>
                        <th class='text-center'>TEL NO.</th>
                        <th class='text-center'>CELLPHONE NO.</th>
                        <th class='text-center'>FAX NO.</th>
                        <th class='text-center'>YEARS IN OPERATION</th>
                        <th class='text-center'>BRANCHES</th>
                        <th class='text-center'>ADDRESSES</th>

                        <th class='text-center'>REQUIRED BY</th>
                        <th class='text-center'>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>";

    $sql = "SELECT  appidxx, custom_lastname, custom_firstname, 
                    IF(custom_middlename='' OR custom_middlename IS NULL,'-',custom_middlename) AS custom_middlename, 
                    IF(custom_suffix='' OR custom_suffix IS NULL,'-',custom_suffix) AS custom_suffix, custom_address, 
                    IF(custom_zipcode='' OR custom_zipcode IS NULL,'-',custom_zipcode) AS custom_zipcode, custom_birthdate, 
                    custom_status, IF(custom_telno='' OR custom_telno IS NULL,'-',custom_telno) AS custom_telno, 
                    IF(custom_mobileno='' OR custom_mobileno IS NULL,'-',custom_mobileno) AS custom_mobileno, 
                    IF(custom_spousename='' OR custom_spousename IS NULL,'-',custom_spousename) AS custom_spousename, 
                    IF(custom_spouseoccupation='' OR custom_spouseoccupation IS NULL,'-',custom_spouseoccupation) AS custom_spouseoccupation, 
                    IF(custom_spousecompany='' OR custom_spousecompany IS NULL,'-',custom_spousecompany) AS custom_spousecompany, 
                    IF(custom_spousecontactno='' OR custom_spousecontactno IS NULL,'-',custom_spousecontactno) AS custom_spousecontactno, 
                    IF(business_companyname='' OR business_companyname IS NULL,'-',business_companyname) AS business_companyname, 
                    IF(business_dtisecreg='' OR business_dtisecreg IS NULL,'-',business_dtisecreg) AS business_dtisecreg, 
                    IF(business_companyaddress='' OR business_companyaddress IS NULL,'-',business_companyaddress) AS business_companyaddress, 
                    IF(business_zipcode='' OR business_zipcode IS NULL,'-',business_zipcode) AS business_zipcode, 
                    IF(business_telno='' OR business_telno IS NULL,'-',business_telno) AS business_telno, 
                    IF(business_mobileno='' OR business_mobileno IS NULL,'-',business_mobileno) AS business_mobileno, 
                    IF(business_faxno='' OR business_faxno IS NULL,'-',business_faxno) AS business_faxno, 
                    IF(business_operationyears='' OR business_operationyears IS NULL,'-',business_operationyears) AS business_operationyears, 
                    IF(business_branches='' OR business_branches IS NULL,'-',business_branches) AS business_branches, 
                    IF(business_branchesv2='' OR business_branchesv2 IS NULL,'-',business_branchesv2) AS business_branchesv2, 
                    IF(business_addresses='' OR business_addresses IS NULL,'-',business_addresses) AS business_addresses, 
                    IF(business_addressesv2='' OR business_addressesv2 IS NULL,'-',business_addressesv2) AS business_addressesv2, 

                    IF(requiredby=1,'FOR COMPANY','FOR INDIVIDUAL') as requiredby,
                    hide, DATE(vst.tsz) as date_submitted, brname, loggedinuser
            FROM vlookup_mcore.vname_shortterm vst
            LEFT OUTER JOIN vlookup_mcore.vbranch vb ON vb.branchidxx = vst.bridz
            LEFT OUTER JOIN
            (
                SELECT nameidxx, CONCAT(firstname, ' ', lastname) as loggedinuser FROM vlookup_mcore.vnamenew
            ) as vn on vn.nameidxx = vst.cashieridz
            ORDER BY appidxx DESC";

    $result = mysqli_query($db,$sql);
    while($row = $result->fetch_array())
    {
        $concat_name = $row["custom_lastname"] . ', ' . $row["custom_firstname"] . '_' . $row["appidxx"];
        $folder_path = "../../assets/attachments/" . $concat_name;

        $display .= "<tr>
                        <td class='table-light text-center'>" . $row["appidxx"] . "</td>
                        <td class='table-light text-center'>" . $row["date_submitted"] . "</td>
                        <td class='table-light text-center'>";

                    if (!file_exists($folder_path)) {
                        $display .= "<button type='button' class='btn btn-sm btn-link text-danger' style='font-size:10px;' onclick=\"uploadAttachments('".$row["appidxx"]."', '".$row["custom_lastname"]."', '".$row["custom_firstname"]."')\">
                                        UPLOAD ATTACHMENTS
                                    </button>";
                    } else {
                        $display .= "<button type='button' class='btn btn-sm btn-link' style='font-size:10px;' onclick=\"viewAttachments('".$row["appidxx"]."', '".$row["custom_lastname"]."', '".$row["custom_firstname"]."')\">
                                        ATTACHMENTS
                                    </button>";
                    }


            $display .= "</td>
                        <td class='table-light text-center'>" . $row["custom_lastname"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_firstname"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_middlename"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_suffix"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_address"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_zipcode"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_birthdate"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_status"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_telno"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_mobileno"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_spousename"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_spouseoccupation"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_spousecompany"] . "</td>
                        <td class='table-light text-center'>" . $row["custom_spousecontactno"] . "</td>
                        <td class='table-light text-center'>" . $row["business_companyname"] . "</td>
                        <td class='table-light text-center'>" . $row["business_dtisecreg"] . "</td>
                        <td class='table-light text-center'>" . $row["business_companyaddress"] . "</td>
                        <td class='table-light text-center'>" . $row["business_zipcode"] . "</td>
                        <td class='table-light text-center'>" . $row["business_telno"] . "</td>
                        <td class='table-light text-center'>" . $row["business_mobileno"] . "</td>
                        <td class='table-light text-center'>" . $row["business_faxno"] . "</td>
                        <td class='table-light text-center'>" . $row["business_operationyears"] . "</td>
                        <td class='table-light text-center'>" . $row["business_branches"] . "</td>
                        <td class='table-light text-center'>" . $row["business_addresses"] . "</td>
                        <td class='table-light text-center'>" . $row["requiredby"] . "</td>
                        <td class='table-light text-center'>
                            <button type='button' class='btn btn-outline-secondary btn-sm' onclick=\"viewDetails('".$row["appidxx"]."', '".$row["custom_lastname"]."', '".$row["custom_firstname"]."', '".$row["custom_middlename"]."', '".$row["custom_suffix"]."', '".$row["custom_address"]."', '".$row["custom_zipcode"]."', '".$row["custom_birthdate"]."', '".$row["custom_status"]."', '".$row["custom_telno"]."', '".$row["custom_mobileno"]."', '".$row["custom_spousename"]."', '".$row["custom_spouseoccupation"]."', '".$row["custom_spousecompany"]."', '".$row["custom_spousecontactno"]."', '".$row["business_companyname"]."', '".$row["business_dtisecreg"]."', '".$row["business_companyaddress"]."', '".$row["business_zipcode"]."', '".$row["business_telno"]."', '".$row["business_mobileno"]."', '".$row["business_faxno"]."', '".$row["business_operationyears"]."', '".$row["business_branches"]."', '".$row["business_branchesv2"]."', '".$row["business_addresses"]."', '".$row["business_addressesv2"]."')\">
                                View Details
                            </button>
                            <button type='button' class='btn btn-outline-primary btn-sm' onclick=\"viewForm('".$row["appidxx"]."', '".$row["custom_lastname"]."', '".$row["custom_firstname"]."', '".$row["custom_address"]."', '".$row["custom_mobileno"]."', '".$row["date_submitted"]."', '".$row["brname"]."', '".$row["loggedinuser"]."')\">
                                View Approved Form
                            </button>
                        </td>
                    </tr>";

    }



$display .= "   </tbody>
            </table>

<script>
    $(document).ready(function(){
        $('#mbd_stapp_table').DataTable().destroy();
        
        $('#mbd_stapp_table').DataTable({
            'order': [],
            'scrollX': true,
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'ALL']
            ]
        });
    });
</script>";



echo $display;

?>