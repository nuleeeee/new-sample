<?php

include "../../phpconfig/allfunction.php";

$formidz = 43;
$cashieridz = $_SESSION['login_user'];
$brlogin = $_SESSION['branch'];

$maincat = $_POST['maincat'];
$subcat1 = $_POST['subcat1'];
$subcat2 = $_POST['subcat2'];
$subcat3 = $_POST['subcat3'];
$penalty = $_POST['penalty'];
$employee = $_POST['employee'];
$infraction = $_POST['infraction'];
$smalldesc = $_POST['smalldesc'];

$newID = getnewId($db, "hrims_mcore", "infraction", "infractionidxx", $formidz, $brlogin);

$coalesce = $subcat2 ?? $subcat1;

$sql = mysqli_query($db, "INSERT INTO hrims_mcore.infraction (infractionidxx, offnsedate, offensedet, infcod1idz, inf2code, infr4code, penaltycde, infrctype, nameidz, accptstatus, cashieridz, tsz) VALUES ('$newID', '$infraction', '$smalldesc', '$maincat', '$coalesce', '$subcat3', '$penalty', 1, '$employee', 0, '$cashieridz', NOW())");

if ($sql) {
	echo "Successful issuing of memo.";
} else {
	echo "Error: " . mysqli_error($db);
}

?>