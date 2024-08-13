<?php

include "../../phpconfig/allfunction.php";

$subcat1 = $_POST['subcat1'];

$display = optionlst($db, "SELECT CONCAT(inf3codidxx, '/', inf3code, '/', penalty) as sub2value, inf3desc FROM mbdhr.infcode3 WHERE inf2idz = $subcat1", "inf3desc", "sub2value");

echo $display;

?>