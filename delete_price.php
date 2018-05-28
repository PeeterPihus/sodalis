<?php
$connect = mysqli_connect("localhost", "root", "", "loom");
$sql = "DELETE FROM pricelist WHERE id = '".$_POST["id"]."'";
if(mysqli_query($connect, $sql))
{
    echo 'Data Deleted';
}
?>