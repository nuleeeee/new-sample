<?php

include '../../phpconfig/session.php';

$display = "<table class='table table-hover text-nowrap' id='another_canvass' style='font-size: 14px;'>
                <thead class='thd_item'>
                    <tr style='cursor: pointer;'>
                        <th style='text-align:center;'>STATUS</th>
                        <th style='text-align:center;'>CANVASS ID</th>	
                        <th style='text-align:center;'>TRANSACTION ID</th>
                        <th style='text-align:center;'>CANVASS AMOUNT</th>
                        <th style='text-align:center;'>TRANS AMOUNT</th>
                        <th style='text-align:center;'>PREPARED BY</th>
                        <th style='text-align:center;'>APPROVED BY</th>
                        <th style='text-align:center;'>DATE CREATED</th>
                        <th style='text-align:center;'>DATE WIN</th>
                        <th style='text-align:center;'>AGING</th>
                        <th style='text-align:center;'>ACTION</th>
                    </tr>
                </thead>
                <tbody>";


    	$sql = "SELECT nameidxx, CONCAT(lastname, ',', firstname) as approver,
                       CASE FLOOR(RAND() * 3)
                            WHEN 0 THEN ''
                            WHEN 1 THEN 'PENDING'
                            ELSE 'WIN'
                       END AS random_value
                FROM vlookup_mcore.vnamenew LIMIT 20";
                
        $result = mysqli_query($db,$sql);
        while($row = $result->fetch_array())
        {
               
            $display .= "<tr>
                            <td class='table-light text-center'>" . $row["random_value"] . "</td>
                            <td class='table-light text-center'></td>	
                            <td class='table-light text-center'></td>
                            <td class='table-light text-center'></td>
                            <td class='table-light text-center'></td>
                            <td class='table-light text-center'>" . $row["approver"] . "</td>
                            <td class='table-light text-center'></td>	
                            <td class='table-light text-center'></td>
                            <td class='table-light text-center'></td>
                            <td class='table-light text-center'></td>
                            <td class='table-light text-center'></td>
                        </tr>";
        }



	$display .= "    </tbody>
	            </table>

    <script>
        $(document).ready(function() {
            $('#another_canvass').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        orientation: 'landscape',
                    },
                    {
                        extend: 'excel',
                    },
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