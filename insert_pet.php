<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
include("library.php");
$connect = mysqli_connect("localhost", "root", "", "loom");
$sql = "INSERT INTO user_pet VALUES('".$_POST["user_id"]."', '".$_POST["pet_name"]."', '".$_POST["pet_name"]."', '".$_POST["pet_breed"]."')";
if(mysqli_query($connect, $sql))
{
    echo 'Data Inserted';
}
?>