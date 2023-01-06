<?php
$id=$_GET['id'];
include('configTrumbullIndustries.php');
$sql = "delete from `sample-data` where ID='$id'";
mysqli_query($conn, $sql);
//echo $sql;
header('location:adminPanel.php');
?>