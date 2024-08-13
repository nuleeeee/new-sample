<?php
include "../../phpconfig/allfunction.php";

$display = optionlst($db, "SELECT joborderidxx, typename FROM vlookup_mcore.joborder_type", "typename", "joborderidxx");

echo $display;
?>