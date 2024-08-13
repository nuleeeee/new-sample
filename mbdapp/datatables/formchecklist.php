<?php 

include "../../phpconfig/allfunction.php";

$appid = $_POST['appid'];
$nameid = $_POST['nameid'];

$display = "<table class='table table-bordered text-wrap' id='formCheckList' style='font-size: 14px; table-layout: fixed;'>
                <thead>
                    <tr>
                        <th colspan='2' class='text-center'>Check List</th>
                    </tr>
                </thead>
                <tbody>";

	$sql = "SELECT  appidxx, nameidz, keyboardlight, screen, keyboard, mouse, usbports, hdmiports, laptopbags, externalappearance
            FROM vlookup_mcore.equipmentaccount
            WHERE nameidz = '$nameid' AND appidxx = '$appid' ";

	$result = mysqli_query($db,$sql);
	while($row = $result->fetch_array())
	{

		$display .= "<tr>
                        <td class='table-light text-center'>Keyboard Light</td>
                        <td class='table-light text-center'>" . $row["keyboardlight"] . "</td>
                    </tr>
                    <tr>
                        <td class='table-light text-center'>Screen & Sound</td>
                        <td class='table-light text-center'>" . $row["screen"] . "</td>
                    </tr>
                    <tr>
                        <td class='table-light text-center'>Keyboard</td>
                        <td class='table-light text-center'>" . $row["keyboard"] . "</td>
                    </tr>
                    <tr>
                        <td class='table-light text-center'>Mouse</td>
                        <td class='table-light text-center'>" . $row["mouse"] . "</td>
                    </tr>
                    <tr>
                        <td class='table-light text-center'>USB Ports</td>
                        <td class='table-light text-center'>" . $row["usbports"] . "</td>
                    </tr>
                    <tr>
                        <td class='table-light text-center'>HDMI Ports</td>
                        <td class='table-light text-center'>" . $row["hdmiports"] . "</td>
                    </tr>
                    <tr>
                        <td class='table-light text-center'>Laptop Bag</td>
                        <td class='table-light text-center'>" . $row["laptopbags"] . "</td>
                    </tr>
                    <tr>
                        <td class='table-light text-center'>External Appearance (Front, Back, Sides)</td>
                        <td class='table-light text-center'>" . $row["externalappearance"] . "</td>
                    </tr>";

    }



$display .= "   </tbody>
            </table>";



echo $display;

?>