<?php

include('configTrumbullIndustries.php');

if (isset($_POST["Import"])) {
    $filename = $_FILES["upcsv"]["tmp_name"];


    if ($_FILES["upcsv"]["size"] > 0) {
        mysqli_query($conn, "TRUNCATE TABLE `sample-data`");
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            if ($getData[0] == "ID")
                continue;

            $sql = "insert into `sample-data` (ID,SKU,TSI,VENDOR,BRAND,`SHIPPING TEMPLATE`,`TEMPLATE CODE`,`INSTOCK LEADTIME`,
                           `NOSTOCK LEADTIME`,QUANTITY,OBSOLETE,`IS UPDATED`) values 
                        ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "',
                        '" . $getData[6] . "','" . $getData[7] . "','" . $getData[8] . "','"  . $getData[9]  . "','" . $getData[10] . "','" .  $getData[11] . "')";

            echo $sql;


            $result = mysqli_query($conn, $sql);
        }

        fclose($file);
        //throws a message if data successfully imported to mysql database from excel file
        echo "<script type=\"text/javascript\">
        				alert(\"CSV File has been successfully Imported.\");
        				window.location = \"adminPanel.php\"
        			</script>";
    }
}
