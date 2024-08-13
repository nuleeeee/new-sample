<?php
include '../../phpconfig/allfunction.php';

$display = optionlst($db, "SELECT concessposidxx, supplier FROM vlookup_mcore.vemployeeconcess", "supplier", "concessposidxx");
echo $display;

?>  