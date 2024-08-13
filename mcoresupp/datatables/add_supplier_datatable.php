<?php

include '../../phpconfig/session.php';


$scrpt = "function checktask()
{";

$display = "<table class='table table-hover table-bordered text-nowrap' id='add_supplier_task' style='font-size: 14px;'>
                <thead class='thd'>
                    <tr style='cursor: pointer;'>
                        <th style='text-align:center;'>BRANCH POSITION</th>
                        <th style='text-align:center;'>TASK</th>
                    </tr>
                </thead>
                <tbody>";


$sql = "SELECT nameidxx, vname FROM vlookup_mcore.vname WHERE vname REGEXP '^[A-Z]' ORDER BY vname ASC LIMIT 100";
        
$result = mysqli_query($db,$sql);
$counter = 1;
while($row = $result->fetch_array())
{

    $checkbx = 'checkbx' . $counter;
       
    $display .= "<tr>
                    <td class='table-light'>" . $row["vname"] . "</td>
                    <td class='table-light text-center'>
                    	<input type='checkbox' id=".$checkbx.">
                    </td>
                </tr>";

    $scrpt .= "
    if($('#".$checkbx."').is(':checked'))
    {
        setTask(".$row["nameidxx"].", '".$checkbx."');
    }";

    $counter = $counter + 1;
}



$display .= "    </tbody>
            </table>";


$scrpt .= "}";


$display .= "
<script>
    $(document).ready(function() {
        $('#add_supplier_task').DataTable({
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