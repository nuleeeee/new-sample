<?php

include '../../phpconfig/session.php';

$display = "<table class='table table-hover text-nowrap' id='item_breakdown' style='font-size: 14px;'>
                <thead class='thd_item'>
                    <tr style='cursor: pointer;'>
                        <th style='text-align:center;'>SUPPLIER</th>
                        <th style='text-align:center;'>ITEM DESCRIPTION</th>	
                        <th style='text-align:center;'>ITEM CODE</th>
                        <th style='text-align:center;'>QTY</th>
                        <th style='text-align:center;'>SRP</th>
                        <th style='text-align:center;'>MLI DCS</th>
                        <th style='text-align:center;'>SUP DSC</th>
                        <th style='text-align:center;'>GROSS</th>
                        <th style='text-align:center;'>NET</th>
                        <th style='text-align:center;'>ACTION</th>
                    </tr>
                </thead>
                <tbody>";


    	$sql = "SELECT nameidxx, CONCAT(lastname, ',', firstname) as approver FROM vlookup_mcore.vnamenew LIMIT 20";
                
        $result = mysqli_query($db,$sql);
        while($row = $result->fetch_array())
        {
            $printer_icon = "<i class='bi bi-printer'></i>";
               
            $display .= "<tr>
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
                        </tr>";
        }



	$display .= "    </tbody>
	            </table>

    <script>
        $(document).ready(function() {
            $('#item_breakdown').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'custom-pdf',
                    }, 
                    {
                        extend: 'excel',
                        text: 'EXCEL',
                        className: 'custom-excel',
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        className: 'custom-csv',
                    }
                ],
                'order': [],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'ALL']
                ]
            });
        });
	</script>";

echo $display;

?>