<?php
include('functions.php');
?>

<?php
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `sample-data`
    WHERE `sample-data`.`SKU` = '" . $valueToSearch . "'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `sample-data`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include "configTrumbullIndustries.php";
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Trumbull Industries 2.4</title>
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <form action="import.php" method="post" enctype="multipart/form-data">
        <input type="file" name="upcsv" accept=".csv" required>
        <input type="submit" name="Import" value="Upload">
    </form>
    <br><br>
    <form action="adminPanel.php" method="POST">

        <!--This section Will allow for a filter if needed

    <select name="valueToSearch" id="skuSelect">
        <?php
        /*        echo "<br>Trumbull Industries";
        require 'configTrumbullIndustries.php';
        $sql = "SELECT DISTINCT `SKU`FROM `sample-data` 
        ORDER BY `sample-data`.`SKU` ASC ";
        $res = mysqli_query($conn,$sql);
        while( $row = mysqli_fetch_array($res)){ */ ?>
            <option value="<?php /*echo $row['SKU'];*/ ?> " >
                <?php /*echo $row['SKU']; */ ?>   </option>
        <?php /*} */ ?>
    </select>
    <input type="submit" name="search" value="Filter">-->
        <button type="button" onclick="window.location.href = 'addNew.php';">Add New Entry</button>
        <br><br>

        <table>
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
                <th>EDIT | DELETE</th>
            </tr>

            <!-- populate table from mysql database -->
            <?php while ($row = mysqli_fetch_array($search_result)) : ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['SKU']; ?></td>
                    <td><?php echo $row['TSI']; ?></td>
                    <td><?php echo $row['VENDOR']; ?></td>
                    <td><?php echo $row['BRAND']; ?></td>
                    <td><?php echo $row['SHIPPING TEMPLATE']; ?></td>
                    <td><?php echo $row['TEMPLATE CODE']; ?></td>
                    <td><?php echo $row['INSTOCK LEADTIME']; ?></td>
                    <td><?php echo $row['NOSTOCK LEADTIME']; ?></td>
                    <td><?php echo $row['QUANTITY']; ?></td>
                    <td><?php echo $row['OBSOLETE']; ?></td>
                    <td><?php echo $row['IS UPDATED']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['ID']; ?>">Edit</a>
                        <a> | </a>
                        <a href="delete.php?id=<?php echo $row['ID']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </form>
    <form action="export.php" method="post">
        <input type="submit" name="Export" value="Export">
    </form>
</body>

</html>