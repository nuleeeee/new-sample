<?php

include "../../phpconfig/allfunction.php";

$display = optionlst($db, "SELECT infcod1idxx, section FROM mbdhr.infcode1", "section", "infcod1idxx");

echo $display;

?>