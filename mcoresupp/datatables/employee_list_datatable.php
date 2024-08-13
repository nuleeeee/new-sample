<?php

include '../../phpconfig/session.php';

$display = "<table class='table table-hover text-nowrap' id='list_of_employee' style='font-size: 14px;'>
                <thead class='thd'>
                    <tr style='cursor: pointer;'>
                        <th style='text-align:center;'>EMPLOYEE NAME</th>
                        <th style='text-align:center;'>SET SUPPLIER ID</th>	
                        <th style='text-align:center;'>VIEW TASK</th>
                        <th style='text-align:center;'>TASK</th>
                    </tr>
                </thead>
                <tbody>";


$sql = "SELECT nameidxx, vname FROM vlookup_mcore.vname WHERE vname REGEXP '^[A-Z]' ORDER BY vname ASC LIMIT 100";
        
$result = mysqli_query($db,$sql);
while($row = $result->fetch_array())
{
       
    $display .= "<tr>
                    <td class='table-light'>" . $row["vname"] . "</td>
                    <td class='table-light'>
                    	<button class='btn btn-primary btn-block btn-sm form-control' id='btn_add_suppid' onclick=\"setID(".$row["nameidxx"].")\">
                    		Set Supplier ID
                    	</button>
                    </td>
                    <td class='table-light'>
                    	<button class='btn btn-primary btn-block btn-sm form-control' id='btn_add_view' onclick=\"showsUp(".$row["nameidxx"].")\">
                    		View
                    	</button>
                    </td>
                    <td class='table-light'>
                    	<button class='btn btn-primary btn-block btn-sm form-control' id='btn_add_supplier' onclick=\"addSupplier(".$row["nameidxx"].", '".$row["vname"]."')\">
                    		Add Supplier
                    	</button>
                    </td>
                </tr>";
}



$display .= "    </tbody>
            </table>


<script>
$(document).ready(function() {
    $('#list_of_employee').DataTable({
        'order': [],
        scrollX: true,
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'ALL']
        ]
    });
});
</script>";


echo $display;

?>