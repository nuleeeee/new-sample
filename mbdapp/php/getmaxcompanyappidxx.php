<?php

include "../../phpconfig/allfunction.php";

$cashieridz = $_SESSION['login_user'];
$brlogin = $_SESSION['branch'];

$forcompany = $_POST['forcompany'];

$sql = mysqli_query($db, "SELECT MAX(appidxx) as appidxx, DATE(tsz) as tsz FROM vlookup_mcore.vname_shortterm WHERE bridz = '$brlogin' AND cashieridz = '$cashieridz' AND requiredby = '$forcompany' ");

$data = array();

while ($row = mysqli_fetch_assoc($sql)) {
    
    $maxid = $row["appidxx"] . str_replace('-', '', $row["tsz"]);
    $date = $row["tsz"];

    $data[] = array('maxid' => $maxid, 'date' => $date);

}

echo json_encode($data);

?>