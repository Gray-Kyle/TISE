<?php
include('configTrumbullIndustries.php');

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

$sql = "insert into `sample-data` (SKU,TSI,VENDOR,BRAND,`SHIPPING TEMPLATE`,`TEMPLATE CODE`,`INSTOCK LEADTIME`,
                           `NOSTOCK LEADTIME`,QUANTITY,OBSOLETE,`IS UPDATED`) values 
                        ('$sku','$tsi','$vendor','$brand','$shipping_template','$template_code','$instock_leadtime'
                        ,'$nostock_leadtime','$quantity','$obsolete','$is_updated')";

mysqli_query($conn, $sql);

//echo $sql;
header('location:adminPanel.php');

?>

