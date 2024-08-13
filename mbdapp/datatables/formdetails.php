<?php 

include "../../phpconfig/allfunction.php";

$appid = $_POST['appid'];
$nameid = $_POST['nameid'];

$display = "<table class='table table-bordered text-wrap' id='formDetails' style='font-size: 14px; table-layout: fixed;'>
                <thead>
                    <tr>
                        <th class='text-center'>Details</th>
                        <th class='text-center'>Serial / Identifying Number</th>
                        <th class='text-center'>Condition</th>
                    </tr>
                </thead>
                <tbody>";

	$sql = "SELECT  cashieridz, equipmentdetails, serialnumid, equipcondition
            FROM vlookup_mcore.equipmentdata
            WHERE nameidz = '$nameid' AND appidz = '$appid' ";

	$result = mysqli_query($db,$sql);
	while($row = $result->fetch_array())
	{

		$display .= "<tr>
                        <td class='table-light text-center text-wrap'>" . $row["equipmentdetails"] . "</td>
                        <td class='table-light text-center text-break'>" . $row["serialnumid"] . "</td>
                        <td class='table-light text-center'>" . $row["equipcondition"] . "</td>
                    </tr>";

    }



$display .= "   </tbody>
            </table>";



echo $display;

?>