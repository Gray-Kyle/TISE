<?php
include('configTrumbullIndustries.php');

if (isset($_GET["getall"]) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM `sample-data`";
    $result = mysqli_query($conn, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
}

if (isset($_GET["getbydate"]) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $date = $_GET["getbydate"];
    $sql = "SELECT * FROM `sample-data` where `INSTOCK LEADTIME` = '$date' ";
    $result = mysqli_query($conn, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json, true);

    $sku = $data['SKU'];
    $tsi = $data['TSI'];
    $vendor = $data['VENDOR'];
    $brand = $data['BRAND'];
    $shipping_template = $data['SHIPPING_TEMPLATE'];
    $template_code = $data['TEMPLATE_CODE'];
    $instock_leadtime = $data['INSTOCK_LEADTIME'];
    $nostock_leadtime = $data['NOSTOCK_LEADTIME'];
    $quantity = $data['QUANTITY'];
    $obsolete = $data['OBSOLETE'];
    $is_updated = $data['IS_UPDATED'];

    $sql = "insert into `sample-data` (SKU,TSI,VENDOR,BRAND,`SHIPPING TEMPLATE`,`TEMPLATE CODE`,`INSTOCK LEADTIME`,
                           `NOSTOCK LEADTIME`,QUANTITY,OBSOLETE,`IS UPDATED`) values 
                        ('$sku','$tsi','$vendor','$brand','$shipping_template','$template_code','$instock_leadtime'
                        ,'$nostock_leadtime','$quantity','$obsolete','$is_updated')";

    mysqli_query($conn, $sql);

    $id = mysqli_insert_id($conn);

    $data["ID"] = $id;

    echo json_encode($data);
}


if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json, true);

    $id = $data['ID'];
    $sku = $data['SKU'];
    $tsi = $data['TSI'];
    $vendor = $data['VENDOR'];
    $brand = $data['BRAND'];
    $shipping_template = $data['SHIPPING_TEMPLATE'];
    $template_code = $data['TEMPLATE_CODE'];
    $instock_leadtime = $data['INSTOCK_LEADTIME'];
    $nostock_leadtime = $data['NOSTOCK_LEADTIME'];
    $quantity = $data['QUANTITY'];
    $obsolete = $data['OBSOLETE'];
    $is_updated = $data['IS_UPDATED'];

    $sql = "update `sample-data` set 
                         SKU='$sku', 
                         TSI='$tsi', 
                         VENDOR='$vendor', 
                         BRAND='$brand', 
                         `SHIPPING TEMPLATE`='$shipping_template', 
                         `TEMPLATE CODE`='$template_code',
                         `INSTOCK LEADTIME`='$instock_leadtime',
                         `NOSTOCK LEADTIME`='$nostock_leadtime',
                         QUANTITY='$quantity',
                         OBSOLETE='$obsolete',
                         `IS UPDATED`='$is_updated'
                         where ID='$id'";

    mysqli_query($conn, $sql);

    echo json_encode($data);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json, true);

    $id = $data['ID'];

    include('configTrumbullIndustries.php');
    $sql = "delete from `sample-data` where ID='$id'";
    mysqli_query($conn, $sql);

    echo json_encode($data);
}
