<?php
session_start();
?>
<link href="bootstrap.min.css" rel="stylesheet">

<?php
include("library.php");
noAccessIfNotLoggedIn();
if (isset($_SESSION['user-type'])) {
    if ($_SESSION["user-type"] != '' && $_SESSION["user-type"] = 'normal') {
        include("header_logged_in_user.php");
    } else {
        include("header.php");
    }
}else{
    include("header.php");
}
?>
<div class="container">
    <h1>Loomakliink</h1>
    <p class="block-quote">Minigi tekst</p>
    <p><?php include('slideshow.php');?></p>
</div>
<?php include("footer.php"); ?>


