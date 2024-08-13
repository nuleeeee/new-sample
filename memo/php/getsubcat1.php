<?php

include "../../phpconfig/allfunction.php";

$maincat = $_POST['maincat'];

$display = optionlst($db, "SELECT CONCAT(infcod2idxx, '/', inf2code, '/', penalty) as sub1value, inf2desc FROM mbdhr.infcode2 WHERE inf1idz = $maincat", "inf2desc", "sub1value");

echo $display;

?>