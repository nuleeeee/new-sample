<?php
include "../../phpconfig/allfunction.php";

$brlogin = $_SESSION['branch'];
$cashieridz = $_SESSION['login_user'];

if (isset($_POST['feas_employeename']))
{
	$feas_employeename = mysqli_real_escape_string($db, $_POST['feas_employeename']);
	$feas_date = mysqli_real_escape_string($db, $_POST['feas_date']);
	$keyboard_light = mysqli_real_escape_string($db, $_POST['keyboard_light']);
	$screen = mysqli_real_escape_string($db, $_POST['screen']);
	$keyboard = mysqli_real_escape_string($db, $_POST['keyboard']);
	$mouse = mysqli_real_escape_string($db, $_POST['mouse']);
	$usbport = mysqli_real_escape_string($db, $_POST['usbport']);
	$hdmiport = mysqli_real_escape_string($db, $_POST['hdmiport']);
	$laptopbag = mysqli_real_escape_string($db, $_POST['laptopbag']);
	$external_appearance = mysqli_real_escape_string($db, $_POST['external_appearance']);

	$newID = getAppId($db, "vlookup_mcore", "equipmentaccount", "appidxx");

	$equipmentaccount = mysqli_query($db, "INSERT INTO vlookup_mcore.equipmentaccount (appidxx, nameidz, applieddate, keyboardlight, screen, keyboard, mouse, usbports, hdmiports, laptopbags, externalappearance, cashieridz, bridz, hide, tsz) VALUES ('$newID', '$feas_employeename', '$feas_date', '$keyboard_light', '$screen', '$keyboard', '$mouse', '$usbport', '$hdmiport', '$laptopbag', '$external_appearance', '$cashieridz', '$brlogin', 0, NOW())");


	$rowData = [
	    ["details" => mysqli_real_escape_string($db, $_POST['first_row_details']), "id" => mysqli_real_escape_string($db, $_POST['first_row_id']), "condition" => mysqli_real_escape_string($db, $_POST['first_row_condition'])],
	    ["details" => mysqli_real_escape_string($db, $_POST['second_row_details']), "id" => mysqli_real_escape_string($db, $_POST['second_row_id']), "condition" => mysqli_real_escape_string($db, $_POST['second_row_condition'])],
	    ["details" => mysqli_real_escape_string($db, $_POST['third_row_details']), "id" => mysqli_real_escape_string($db, $_POST['third_row_id']), "condition" => mysqli_real_escape_string($db, $_POST['third_row_condition'])],
	    ["details" => mysqli_real_escape_string($db, $_POST['fourth_row_details']), "id" => mysqli_real_escape_string($db, $_POST['fourth_row_id']), "condition" => mysqli_real_escape_string($db, $_POST['fourth_row_condition'])],
	    ["details" => mysqli_real_escape_string($db, $_POST['fifth_row_details']), "id" => mysqli_real_escape_string($db, $_POST['fifth_row_id']), "condition" => mysqli_real_escape_string($db, $_POST['fifth_row_condition'])]
	];

	foreach ($rowData as $row) {
		if (!empty($row['details']) && !empty($row['id'])) {
		    $details = $row['details'];
		    $id = $row['id'];
		    $condition = $row['condition'];

		    $BaseID = BaseID($db, "vlookup_mcore", "equipmentdata", "dataidxx");

		    $sql = mysqli_query($db, "INSERT INTO vlookup_mcore.equipmentdata (dataidxx, appidz, nameidz, equipmentdetails, serialnumid, equipcondition, cashieridz, tsz) VALUES ('$BaseID', '$newID', '$feas_employeename', '$details', '$id', '$condition', '$cashieridz', NOW())");
	    }
	}

	if ($sql) {
		echo "Success";
	} else {
		echo "Error: " . mysqli_error($db);
	}
}

?>
