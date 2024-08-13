<?php

include '../../phpconfig/session.php';

$display = "<table class='table table-hover table-bordered text-nowrap' id='list_of_employee' style='font-size: 14px;'>
                <thead class='thd'>
                    <tr style='cursor: pointer;'>
                        <th>EMPLOYEE NAME</th>
                        <th>SUPPLIER LIST</th>
                        <th>TASK</th>
                    </tr>
                </thead>
                <tbody>";

if (isset($_POST['nameidxx'])) {

    $nameid = $_POST['nameidxx'];


    $sql = "SELECT nameidxx, vname FROM vlookup_mcore.vname WHERE nameidxx = '$nameid' ";
            
    $result = mysqli_query($db,$sql);
    while($row = $result->fetch_array())
    {
           
        $display .= "<tr>
                        <td class='table-light'>" . $row["vname"] . "</td>
                        <td class='table-light'></td>
                        <td class='table-light'>
                        	<button class='btn btn-primary btn-block btn-sm form-control' id='btn_remove_task' onclick=\"removeTask(".$row["nameidxx"].")\">
                        		REMOVE
                        	</button>
                        </td>
                    </tr>";
    }



$display .= "    </tbody>
            </table>


<script>
$(document).ready(function() {
    $('#list_of_employee').DataTable().destroy();

    $('#list_of_employee').DataTable({
        'order': [],
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