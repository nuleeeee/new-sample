<?php
include "../../phpconfig/allfunction.php";

$display = optionlst($db, "SELECT idxx, listidxx, equipmentdetails FROM vlookup_mcore.equipmentlists GROUP BY listidxx", "equipmentdetails", "listidxx");

echo $display;
?>