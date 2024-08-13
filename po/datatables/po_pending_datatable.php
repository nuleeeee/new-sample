<?php

include '../../phpconfig/session.php';

$display = "<table class='table table-hover text-nowrap bg-light' id='pending_Data' style='font-size: 14px;'>
                <thead class='thd'>
                    <tr style='cursor: pointer;'>
                        <th style='text-align:center;'>P.O. ID</th>
                        <th style='text-align:center;'>P.O Type</th>	
                        <th style='text-align:center;'>PREPARED BY:</th>
                        <th style='text-align:center;'>SUPPLIER</th>
                        <th style='text-align:center;'>EMAIL ADDRESS</th>
                        <th style='text-align:center;'>APPROVER</th>
                        <th style='text-align:center;'>P.O. DATE</th>
                        <th style='text-align:center;'>DATE APPROVED</th>
                        <th style='text-align:center;'>DATE DELIVERED</th>
                        <th style='text-align:center;'>LEAD TIME</th>
                        <th style='text-align:center;'>AGING</th>
                        <th style='text-align:center;'>STATUS</th>
                    </tr>
                </thead>
                <tbody>";




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
                    </tr>";
    }



	$display .= "    </tbody>
	            </table>


	<script>
	$(document).ready(function() {
        $('#pending_Data').DataTable().destroy();
	    var empDataTable = $('#pending_Data').DataTable({
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                },
                {
                    extend: 'csv',
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


echo $display;

?>