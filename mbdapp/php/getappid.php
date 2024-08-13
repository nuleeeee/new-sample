<?php
include "../../phpconfig/allfunction.php";

$cashieridz = $_SESSION['login_user'];

$display = mysqli_query($db, "SELECT MAX(appidxx) as appidxx FROM vlookup_mcore.vname_shortterm WHERE cashieridz = '$cashieridz' ");

while ($row = mysqli_fetch_assoc($display)) {

	$appidxx = $row['appidxx'];
}

echo $appidxx;

?>