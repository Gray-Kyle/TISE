<?php
include('configTrumbullIndustries.php');
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from `sample-data` where ID='$id'");
$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Trumbull Industries</title>
</head>
<body>
<h2>Edit</h2>
<form method="POST" action="update.php?id=<?php echo $id; ?>">
    <label>ID:</label><td><?php echo $row['ID'];?></td><br>
    <label>SKU:</label><input type="text" value="<?php echo $row['SKU']; ?>" name="SKU"><br>
    <label>TSI:</label><input type="text" value="<?php echo $row['TSI']; ?>" name="TSI"><br>
    <label>VENDOR:</label><input type="text" value="<?php echo $row['VENDOR']; ?>" name="VENDOR"><br>
    <label>BRAND:</label><input type="text" value="<?php echo $row['BRAND']; ?>" name="BRAND"><br>
    <label>SHIPPING TEMPLATE:</label><input type="text" value="<?php echo $row['SHIPPING TEMPLATE']; ?>" name="SHIPPING_TEMPLATE"><br>
    <label>TEMPLATE CODE:</label><input type="text" value="<?php echo $row['TEMPLATE CODE']; ?>" name="TEMPLATE_CODE"><br>
    <label>INSTOCK LEADTIME:</label><input type="text" value="<?php echo $row['INSTOCK LEADTIME']; ?>" name="INSTOCK_LEADTIME"><br>
    <label>NOSTOCK LEADTIME:</label><input type="text" value="<?php echo $row['NOSTOCK LEADTIME']; ?>" name="NOSTOCK_LEADTIME"><br>
    <label>QUANTITY:</label><input type="text" value="<?php echo $row['QUANTITY']; ?>" name="QUANTITY"><br>
    <label>OBSOLETE:</label><input type="text" value="<?php echo $row['OBSOLETE']; ?>" name="OBSOLETE"><br>
    <label>IS UPDATED:</label><input type="text" value="<?php echo $row['IS UPDATED']; ?>" name="IS_UPDATED"><br>
    <input type="submit" name="Submit Button">
    <a href="adminPanel.php">Back</a>
</form>
</body>
</html>