<?php

include "../../phpconfig/allfunction.php";

$cashieridz = $_SESSION['login_user'];
$brlogin = $_SESSION['branch'];

$sql = mysqli_query($db, "SELECT CONCAT(firstname, ' ', lastname) as vname, brname FROM vlookup_mcore.vnamenew vn
    LEFT OUTER JOIN vlookup_mcore.vbranch vb ON vb.branchidxx = vn.bridz
    WHERE branchidxx = '$brlogin' AND nameidxx = '$cashieridz' ");

$data = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = array(
        'cashierid' => $cashieridz,
        'branchname' => $row["brname"],
        'vname' => $row["vname"]
    );
}

echo json_encode($data);
exit;

?>