<?php
include "../../phpconfig/allfunction.php";

$brlogin = $_SESSION['branch'];

$sql = mysqli_query($db, "SELECT bridz, creditlimit, applicantcounts FROM vlookup_mcore.vname_shortterm_limit WHERE bridz = '$brlogin' ");

while ($row = mysqli_fetch_assoc($sql)) {
	
	if ($row["creditlimit"] == 80000 && $row["applicantcounts"] == 10) {
		echo "Failed";
	} else {
		echo "Success";
	}

}

?>