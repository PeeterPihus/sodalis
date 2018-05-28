<?php
$connect = mysqli_connect("localhost", "root", "", "loom");
$sql = "INSERT INTO pricelist(item_name, extra_info, item_price) VALUES('".$_POST["item_name"]."', '".$_POST["extra_info"]."', '".$_POST["item_price"]."')";
if(mysqli_query($connect, $sql))
{
    echo 'Data Inserted';
}
?>