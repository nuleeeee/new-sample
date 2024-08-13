<?php
include "../../phpconfig/allfunction.php";

$brlogin = $_SESSION['branch'];
$cashieridz = $_SESSION['login_user'];

if (isset($_POST['indv_lastname']))
{
	$indv_lastname = mysqli_real_escape_string($db, $_POST['indv_lastname']);
	$indv_firstname = mysqli_real_escape_string($db, $_POST['indv_firstname']);
	$indv_middlename = mysqli_real_escape_string($db, $_POST['indv_middlename']);
	$indv_suffix = mysqli_real_escape_string($db, $_POST['indv_suffix']);
	$indv_address = mysqli_real_escape_string($db, $_POST['indv_address']);
	$indv_zipcode = mysqli_real_escape_string($db, $_POST['indv_zipcode']);
	$indv_birthdate = mysqli_real_escape_string($db, $_POST['indv_birthdate']);
	$indv_status = mysqli_real_escape_string($db, $_POST['indv_status']);
	$indv_telno = mysqli_real_escape_string($db, $_POST['indv_telno']);
	$indv_mobileno = mysqli_real_escape_string($db, $_POST['indv_mobileno']);
	$indv_spousename = mysqli_real_escape_string($db, $_POST['indv_spousename']);
	$indv_spouseoccupation = mysqli_real_escape_string($db, $_POST['indv_spouseoccupation']);
	$indv_spousecompany = mysqli_real_escape_string($db, $_POST['indv_spousecompany']);
	$indv_spousecontactno = mysqli_real_escape_string($db, $_POST['indv_spousecontactno']);
	$cb_agree = mysqli_real_escape_string($db, $_POST['cb_agree']);
	$forindividual = mysqli_real_escape_string($db, $_POST['forindividual']);


	$newID = getAppId($db, "vlookup_mcore", "vname_shortterm", "appidxx");

	$sql = mysqli_query($db, "INSERT INTO vlookup_mcore.vname_shortterm (appidxx, custom_lastname, custom_firstname, custom_middlename, custom_suffix, custom_address, custom_zipcode, custom_birthdate, custom_status, custom_telno, custom_mobileno, custom_spousename, custom_spouseoccupation, custom_spousecompany, custom_spousecontactno, termsandconditions, requiredby, bridz, hide, cashieridz, tsz) VALUES ('$newID', '$indv_lastname', '$indv_firstname', '$indv_middlename', '$indv_suffix', '$indv_address', '$indv_zipcode', '$indv_birthdate', '$indv_status', '$indv_telno', '$indv_mobileno', '$indv_spousename', '$indv_spouseoccupation', '$indv_spousecompany', '$indv_spousecontactno', '$cb_agree', '$forindividual', '$brlogin', 0, '$cashieridz', NOW())");

	if ($sql) {
		echo "Success";
	} else {
		echo "Failed";
	}
}

?>
