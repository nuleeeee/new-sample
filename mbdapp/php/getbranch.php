<?php
include "../../phpconfig/allfunction.php";

$nameid = $_POST['nameid'];

$display = mysqli_query($db, "SELECT nameidxx, branchidxx, brname FROM vlookup_mcore.vnamenew vn
LEFT OUTER JOIN vlookup_mcore.vbranch vb ON vb.branchidxx = vn.bridz
WHERE nameidxx = '$nameid' ");

while ($row = mysqli_fetch_assoc($display)) {
	$brname = $row['brname'];
}

echo $brname;
?>