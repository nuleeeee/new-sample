<?php

include "../../phpconfig/allfunction.php";

$display = optionlst($db, "SELECT nameidxx, CONCAT(lastname, ', ', firstname) as vname FROM vlookup_mcore.vnamenew WHERE hide = 0 ORDER BY vname ASC", "vname", "nameidxx");

echo $display;

?>