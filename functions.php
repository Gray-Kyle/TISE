<?php
include('configTrumbullIndustries.php');


if (isset($_POST["Import"])) {
    echo $filename = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sql = "insert into `sample-data` (ID,SKU,TSI,VENDOR,BRAND,`SHIPPING TEMPLATE`,`TEMPLATE CODE`,`INSTOCK LEADTIME`,
                           `NOSTOCK LEADTIME`,QUANTITY,OBSOLETE,`IS UPDATED`) values 
                        ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "',
                        '" . $getData[6] . "','" . $getData[7] . "','" . $getData[8] . "','" . $getData[9] . "','" . $getData[10] . "','" . $getData[11] . "')";
            $result = mysqli_query($conn, $sql);
            // var_dump(mysqli_error_list($con));
            // exit();
            if (!isset($result)) {
                echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						  </script>";
            } else {
                echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
            }
        }

        fclose($file);
    }
}

if (isset($_POST["Export"])) {

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array(
        'ID', 'SKU', 'TSI', 'VENDOR', 'BRAND', `SHIPPING TEMPLATE`, `TEMPLATE CODE`, `INSTOCK LEADTIME`,
        `NOSTOCK LEADTIME`, 'QUANTITY', 'OBSOLETE', `IS UPDATED`
    ));
    $query = "SELECT * from 'sample-data' ORDER BY ID DESC";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
    fclose($output);
}

function get_all_records()
{

    $Sql = "SELECT * FROM 'sample-data'";
    $result = mysqli_query($conn, $Sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
     <thead>
     <tr>
     					<th>ID</th>
                        <th>SKU</th>
                        <th>TSI</th>
                        <th>VENDOR</th>
                        <th>BRAND</th>
                        <th>SHIPPING TEMPLATE</th>
                        <th>TEMPLATE CODE</th>
                        <th>INSTOCK LEADTIME</th>
                        <th>NOSTOCK LEADTIME</th>
                        <th>QUANTITY</th>
                        <th>OBSOLETE</th>
                        <th>IS UPDATED</th>
                        </tr></thead><tbody>";

        while ($row = mysqli_fetch_assoc($result)) {


            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['SKU'] . "</td>
                    <td>" . $row['TSI'] . "</td>
                    <td>" . $row['VENDOR'] . "</td>
                    <td>" . $row['BRAND'] . "</td>
                    <td>" . $row['SHIPPING TEMPLATE'] . "</td>
                    <td>" . $row['TEMPLATE CODE'] . "</td>
                    <td>" . $row['INSTOCK LEADTIME'] . "</td>
                    <td>" . $row['NOSTOCK LEADTIME'] . "</td>
                    <td>" . $row['QUANTITY'] . "</td>
                    <td>" . $row['OBSOLETE'] . "</td>
                    <td>" . $row['IS UPDATED'] . "</td>
                   </tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "you have no recent pending orders";
    }
}
