<?php

include "../../phpconfig/allfunction.php";

$subcat2 = $_POST['subcat2'];

$display = optionlst($db, "SELECT CONCAT(inf4codidxx, '/', inf4code, '/', penalty) as sub3value, inf4desc FROM mbdhr.infcode4 WHERE inf3idz = $subcat2", "inf4desc", "sub3value");

echo $display;

?>