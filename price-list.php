<?php
session_start();
?>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">

<?php
include("library.php");
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
    <div class="container my-container">
        <div>
            <p class="info-stuff-name">Hinnakiri</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. </p>
        </div>
        <div>
            <?php
            getAllPriceListItems()
            ?>
        </div>
    </div>


<?php include("footer.php"); ?>