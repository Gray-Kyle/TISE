<?php
include('configTrumbullIndustries.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Basic MySQLi Commands</title>
</head>
<body>
<div>
    <form method="POST" action="add.php">
        <label>SKU:</label><input type="text" name="SKU"><br>
        <label>TSI:</label><input type="text" name="TSI"><br>
        <label>VENDOR:</label><input type="text" name="VENDOR"><br>
        <label>BRAND:</label><input type="text" name="BRAND"><br>
        <label>SHIPPING TEMPLATE:</label><input type="text" name="SHIPPING_TEMPLATE"><br>
        <label>TEMPLATE CODE:</label><input type="text" name="TEMPLATE_CODE"><br>
        <label>INSTOCK LEADTIME:</label><input type="text" name="INSTOCK_LEADTIME"><br>
        <label>NOSTOCK LEADTIME:</label><input type="text" name="NOSTOCK_LEADTIME"><br>
        <label>QUANTITY:</label><input type="text" name="QUANTITY"><br>
        <label>OBSOLETE:</label><input type="text" name="OBSOLETE"><br>
        <label>IS UPDATED:</label><input type="text" name="IS_UPDATED"><br>
        <button type="submit" name="submit" >Submit</button>
    </form>
</div>
</body>
</html>