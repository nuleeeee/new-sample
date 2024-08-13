<?php
include "../../phpconfig/allfunction.php";

$appid = $_POST['appid'];
$status = $_POST['status'];

$sql = mysqli_query($db, "UPDATE vlookup_mcore.vname_shortterm SET hide = '$status' WHERE appidxx = '$appid' ");

if ($sql) {
	echo "Success";
} else {
	echo "Error: " . mysqli_error($db);
}

?>