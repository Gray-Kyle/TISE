<?php
include('configTrumbullIndustries.php');
$id=$_GET['id'];

$sku=$_POST['SKU'];
$tsi=$_POST['TSI'];
$vendor=$_POST['VENDOR'];
$brand=$_POST['BRAND'];
$shipping_template=$_POST['SHIPPING_TEMPLATE'];
$template_code=$_POST['TEMPLATE_CODE'];
$instock_leadtime=$_POST['INSTOCK_LEADTIME'];
$nostock_leadtime=$_POST['NOSTOCK_LEADTIME'];
$quantity=$_POST['QUANTITY'];
$obsolete=$_POST['OBSOLETE'];
$is_updated=$_POST['IS_UPDATED'];

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
//echo  $sql;

header('location:adminPanel.php');
?>