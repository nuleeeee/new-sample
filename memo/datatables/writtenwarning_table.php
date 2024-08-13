<?php
include '../../phpconfig/allfunction.php';

$display = "<table class='table table-bordered text-center shadow-sm'>
                <thead>
                    <tr>
                        <td>Running Warnings</td>
                        <td>Running Suspensions</td>
                    </tr>
                </thead>
                <tbody>";


if (isset($_POST['emp_name'])) {
    
    $memo_start = $_POST['memo_start'];
    $emp_name = $_POST['emp_name'];
    $penalty_code = $_POST['penalty_code'];

    $sql = "SELECT  infractionidxx, offnsedate, penaltycde, penaltyidz, action, nameidz,
                    SUM(penal_count) AS penal_count, quarter_range,
                    CASE
                        WHEN penaltycde IN ('C', 'D') AND MONTH(offnsedate) <= 6 THEN '01 - 06'
                        WHEN penaltycde IN ('C', 'D') AND MONTH(offnsedate) > 6 THEN '07 - 12'
                        ELSE NULL
                    END AS evryhalfyear, YEAR(offnsedate) AS year
            FROM
            (
                SELECT  infractionidxx, offnsedate, penaltycde, penaltyidz, action, nameidz,
                        IF(penaltycde IS NOT NULL, 1, 0) AS penal_count, accptstatus,
                        CASE    
                            WHEN MONTH(offnsedate) IN (1, 2, 3) THEN '01 - 03'
                            WHEN MONTH(offnsedate) IN (4, 5, 6) THEN '04 - 06'
                            WHEN MONTH(offnsedate) IN (7, 8, 9) THEN '07 - 09'
                            WHEN MONTH(offnsedate) IN (10, 11, 12) THEN '10 - 12'
                        END AS quarter_range
                FROM hrims_mcore.infraction hr
                LEFT OUTER JOIN 
                (
                    SELECT penaltyidx, penaltydesc AS action FROM mbdhr.penalty
                ) AS tbl_actions ON tbl_actions.penaltyidx = hr.penaltyidz
                WHERE nameidz = '$emp_name'
            ) AS tmp
            WHERE
            (
                (penaltycde IN ('A', 'B') AND quarter_range IS NOT NULL) OR
                (penaltycde IN ('C', 'D') AND MONTH(offnsedate) <= 6) OR
                (penaltycde IN ('C', 'D') AND MONTH(offnsedate) > 6)
            )
            AND accptstatus <= 2 AND penaltycde = '$penalty_code'
            GROUP BY nameidz, quarter_range, evryhalfyear, year
            HAVING
            (
                ('$memo_start' >= CONCAT(year, '-', SUBSTRING_INDEX(quarter_range, ' - ', 1), '-01')
                AND '$memo_start' <= CONCAT(year, '-', SUBSTRING_INDEX(quarter_range, ' - ', -1), '-31'))
                OR
                ('$memo_start' >= CONCAT(year, '-', SUBSTRING_INDEX(evryhalfyear, ' - ', 1), '-01')
                AND '$memo_start' <= CONCAT(year, '-', SUBSTRING_INDEX(evryhalfyear, ' - ', -1), '-31'))
            )";

    $result = mysqli_query($db, $sql);

    if (!isset($no_data_flag)) {
        $no_data_flag = false;
    }

    $warnings = "";
    $suspensions = "";
    $termination = "";
    $effdate = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array())
        {
            
            switch ($row["penaltycde"]) {
                case 'A':
                    switch ($row["penal_count"]) {
                        case 1:
                            $warnings = "WARNING";
                            $suspensions = "None";
                            $termination = "None";
                            break;
                        case 2:
                            $warnings = "(". $row["penal_count"] . ") WARNING";
                            $suspensions = "None";
                            $termination = "None";
                            break;
                        case 3:
                            $warnings = "(". $row["penal_count"] . ") WARNING";
                            $suspensions = "None";
                            $termination = "None";
                            break;
                        case 4:
                            $warnings = "(". $row["penal_count"] . ") WARNING";
                            $suspensions = "1 DAY SUSPENSION";
                            $termination = "None";
                            break;
                        default:
                            $warnings = "(" . $row["penal_count"] . ") WARNING";
                            $suspensions = ($row["penal_count"] - 3) . " DAY SUSPENSION";
                            $termination = "None";
                            break;
                    }
                    break;
                case 'B':
                    switch ($row["penal_count"]) {
                        case 1:
                            $warnings = "WRITTEN WARNING";
                            $suspensions = "None";
                            $termination = "None";
                        case 2:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "None";
                            $termination = "None";
                            break;
                        case 3:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "3 DAY SUSPENSION";
                            $termination = "None";
                            break;
                        case 4:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "6 DAY SUSPENSION";
                            $termination = "None";
                            break;
                        case 5:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "None";
                            $termination = "SUBJECT FOR TERMINATION";
                            break;
                        default:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "None";
                            $termination = "SUBJECT FOR TERMINATION";
                            break;
                    }
                    break;
                case 'C':
                    switch ($row["penal_count"]) {
                        case 1:
                            $warnings = "WRITTEN WARNING";
                            $suspensions = "None";
                            $termination = "None";
                            break;
                        case 2:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "7 DAY SUSPENSION";
                            $termination = "None";
                            break;
                        case 3:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "10 DAY SUSPENSION";
                            $termination = "None";
                            break;
                        case 3:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "None";
                            $termination = "SUBJECT FOR TERMINATION";
                            break;
                        default:
                            $warnings = "(". $row["penal_count"] . ") WRITTEN WARNING";
                            $suspensions = "None";
                            $termination = "SUBJECT FOR TERMINATION";
                            break;
                    }
                    break;
                case 'D':
                    $warnings = "None";
                    $suspensions = "None";
                    $termination = "DISMISSAL / TERMINATION";
                    break;
                default:
                    $no_data_flag = true;
                    $warnings = "None";
                    $suspensions = "None";
                    $termination = "None";
                    break;
            }

            if (($row["penaltycde"] == 'A' && ($warnings == 'WARNING' || $warnings == '(2) WARNING')) || 
                ($row["penaltycde"] == 'B' && ($warnings == 'WRITTEN WARNING' || $warnings == '(1) WRITTEN WARNING')) || 
                ($row["penaltycde"] == 'C' && $warnings == 'None'))
            {
                $effdate = "NO SUSPENSION";
            } else if ($termination != 'None') {
                $effdate = "TERMINATED";
            } else {
                $effdate = "SUSPENDED";
            }

            $display .= "<tr>
                            <td class='fw-bold'>" . $warnings . "</td>
                            <td class='fw-bold'>" . $suspensions . "</td>
                        </tr>";

        }
    } else {
        $warnings = "None";
        $suspensions = "None";
        $termination = "None";
        $no_data_flag = true;

        $display .= "<tr>
                        <td class='fw-bold'>" . $warnings . "</td>
                        <td class='fw-bold'>" . $suspensions . "</td>
                    </tr>";
    }
                


$display .= "    </tbody>
                 <tfoot>
                    <thead class='thd'>
                        <tr>
                            <td colspan='2'>Running Termination</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan='2' class='fw-bold'>" . $termination . "</td>
                        </tr>
                    </tbody>
                 </tfoot>
            </table>

            <script>
                $('#runningwarning').val('$warnings');
                $('#runningsus').val('$suspensions');
                $('#runningterm').val('$termination');
            </script>";
}

$response = array(
    'display' => $display,
    'no_data_flag' => $no_data_flag,
    'havesuspensions' => $effdate,
    'terminations' => $termination
);

echo json_encode($response);
