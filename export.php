<?php

function array_to_csv_download($array, $filename = "export.csv", $delimiter = ";")
{
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    // open the "output" stream
    // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
    $f = fopen('php://output', 'w');

    foreach ($array as $line) {
        fputcsv($f, $line, $delimiter);
    }
}

if (isset($_POST["Export"]) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    include('configTrumbullIndustries.php');
    $sql = "SELECT * FROM `sample-data`";
    $result = mysqli_query($conn, $sql);

    $data = array();
    $data[] = array('ID', 'SKU', 'TSI', 'VENDOR', 'BRAND', 'SHIPPING TEMPLATE', 'TEMPLATE CODE', 'INSTOCK LEADTIME', 'NOSTOCK LEADTIME', 'QUANTITY', 'OBSOLETE', 'IS UPDATED');
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    array_to_csv_download($data, "export.csv", ",");
}
