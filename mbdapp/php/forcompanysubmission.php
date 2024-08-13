<?php
include "../../phpconfig/allfunction.php";

$brlogin = $_SESSION['branch'];
$cashieridz = $_SESSION['login_user'];

if (isset($_POST['comp_lastname']))
{
	$comp_lastname = mysqli_real_escape_string($db, $_POST['comp_lastname']);
	$comp_firstname = mysqli_real_escape_string($db, $_POST['comp_firstname']);
	$comp_middlename = mysqli_real_escape_string($db, $_POST['comp_middlename']);
	$comp_suffix = mysqli_real_escape_string($db, $_POST['comp_suffix']);
	$comp_address = mysqli_real_escape_string($db, $_POST['comp_address']);
	$comp_zipcode = mysqli_real_escape_string($db, $_POST['comp_zipcode']);
	$comp_birthdate = mysqli_real_escape_string($db, $_POST['comp_birthdate']);
	$comp_status = mysqli_real_escape_string($db, $_POST['comp_status']);
	$comp_telno = mysqli_real_escape_string($db, $_POST['comp_telno']);
	$comp_mobileno = mysqli_real_escape_string($db, $_POST['comp_mobileno']);
	$comp_spousename = mysqli_real_escape_string($db, $_POST['comp_spousename']);
	$comp_spouseoccupation = mysqli_real_escape_string($db, $_POST['comp_spouseoccupation']);
	$comp_spousecompany = mysqli_real_escape_string($db, $_POST['comp_spousecompany']);
	$comp_spousecontactno = mysqli_real_escape_string($db, $_POST['comp_spousecontactno']);
	$comp_bizinfo_compname = mysqli_real_escape_string($db, $_POST['comp_bizinfo_compname']);
	$comp_bizinfo_dti = mysqli_real_escape_string($db, $_POST['comp_bizinfo_dti']);
	$comp_bizinfo_compaddress = mysqli_real_escape_string($db, $_POST['comp_bizinfo_compaddress']);
	$comp_bizinfo_zipcode = mysqli_real_escape_string($db, $_POST['comp_bizinfo_zipcode']);
	$comp_bizinfo_telno = mysqli_real_escape_string($db, $_POST['comp_bizinfo_telno']);
	$comp_bizinfo_cellno = mysqli_real_escape_string($db, $_POST['comp_bizinfo_cellno']);
	$comp_bizinfo_faxno = mysqli_real_escape_string($db, $_POST['comp_bizinfo_faxno']);
	$comp_bizinfo_yearsoperation = mysqli_real_escape_string($db, $_POST['comp_bizinfo_yearsoperation']);
	$comp_bizinfo_branches = mysqli_real_escape_string($db, $_POST['comp_bizinfo_branches']);
	$comp_bizinfo_address = mysqli_real_escape_string($db, $_POST['comp_bizinfo_address']);
	$comp_bizinfo_branchesv2 = mysqli_real_escape_string($db, $_POST['comp_bizinfo_branchesv2']);
	$comp_bizinfo_addressv2 = mysqli_real_escape_string($db, $_POST['comp_bizinfo_addressv2']);
	$cb_agree = mysqli_real_escape_string($db, $_POST['cb_agree']);
	$forcompany = mysqli_real_escape_string($db, $_POST['forcompany']);


	$newID = getAppId($db, "vlookup_mcore", "vname_shortterm", "appidxx");

	$sql = mysqli_query($db, "INSERT INTO vlookup_mcore.vname_shortterm (appidxx, custom_lastname, custom_firstname, custom_middlename, custom_suffix, custom_address, custom_zipcode, custom_birthdate, custom_status, custom_telno, custom_mobileno, custom_spousename, custom_spouseoccupation, custom_spousecompany, custom_spousecontactno, business_companyname, business_dtisecreg, business_companyaddress, business_zipcode, business_telno, business_mobileno, business_faxno, business_operationyears, business_branches, business_branchesv2, business_addresses, business_addressesv2, termsandconditions, requiredby, bridz, hide, cashieridz, tsz) VALUES ('$newID', '$comp_lastname', '$comp_firstname', '$comp_middlename', '$comp_suffix', '$comp_address', '$comp_zipcode', '$comp_birthdate', '$comp_status', '$comp_telno', '$comp_mobileno', '$comp_spousename', '$comp_spouseoccupation', '$comp_spousecompany', '$comp_spousecontactno', '$comp_bizinfo_compname', '$comp_bizinfo_dti', '$comp_bizinfo_compaddress', '$comp_bizinfo_zipcode', '$comp_bizinfo_telno', '$comp_bizinfo_cellno', '$comp_bizinfo_faxno', '$comp_bizinfo_yearsoperation', '$comp_bizinfo_branches', '$comp_bizinfo_branchesv2', '$comp_bizinfo_address', '$comp_bizinfo_addressv2', '$cb_agree', '$forcompany', '$brlogin', 0, '$cashieridz', NOW())");

	if ($sql) {
		echo "Success";
	} else {
		echo "Failed";
	}
}

?>
