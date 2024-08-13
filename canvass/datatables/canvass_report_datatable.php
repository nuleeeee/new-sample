<?php

include '../../phpconfig/session.php';

$display = "<table class='table table-hover text-nowrap' id='canvass_rprt' style='font-size: 14px;'>
                <thead class='thd_item'>
                    <tr style='cursor: pointer;'>
                        <th style='text-align:center;'>STATUS</th>
                        <th style='text-align:center;'>CANVASS ID</th>	
                        <th style='text-align:center;'>TRANSACTION ID</th>
                        <th style='text-align:center;'>CANVASS AMOUNT</th>
                        <th style='text-align:center;'>TRANS AMOUNT</th>
                        <th style='text-align:center;'>PREPAREDY BY</th>
                        <th style='text-align:center;'>APPROVED BY</th>
                        <th style='text-align:center;'>DATE CREATED</th>
                        <th style='text-align:center;'>DATE WIN</th>
                        <th style='text-align:center;'>AGING</th>
                        <th style='text-align:center;'>CUSTOMER NAME</th>
                        <th style='text-align:center;'>BARANGAY</th>
                        <th style='text-align:center;'>MUNICIPALITY</th>
                        <th style='text-align:center;'>1ST</th>
                        <th style='text-align:center;'>2ND</th>
                        <th style='text-align:center;'>3RD</th>
                    </tr>
                </thead>
                <tbody>";


if (isset($_POST['startdate'])) {
    
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    	$sql = "SELECT nameidxx, CONCAT(lastname, ',', firstname) as approver FROM vlookup_mcore.vnamenew LIMIT 20";
                
        $result = mysqli_query($db,$sql);
        while($row = $result->fetch_array())
        {
               
            $display .= "<tr>
                            <td class='table-light'></td>
                            <td class='table-light'></td>	
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'>" . $row["approver"] . "</td>
                            <td class='table-light'></td>	
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                            <td class='table-light'></td>
                        </tr>";
        }



	$display .= "    </tbody>
	            </table>


	<script>
	$(document).ready(function() {
        var empDataTable = $('#canvass_rprt').DataTable({
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                },
                {
                    extend: 'excel',
                } 
            ],
            'order': [],
            'scrollX': true,
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'ALL']
            ]
        });
	});
	</script>";

}

echo $display;

?>