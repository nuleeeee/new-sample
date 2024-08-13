<?php
include "../../phpconfig/allfunction.php";

$display = optionlst($db, "SELECT nameidxx, CONCAT(lastname, ', ', firstname) as vname FROM vlookup_mcore.vnamenew WHERE hide = 0", "vname", "nameidxx");

echo $display;
?>