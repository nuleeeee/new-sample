<?php
include "../../phpconfig/allfunction.php";

$listid = $_POST['listid'];

$display = optionlst($db, "SELECT idxx, listidxx, serialidnum FROM vlookup_mcore.equipmentlists WHERE listidxx = '$listid' ", "serialidnum", "serialidnum");

echo $display;
?>