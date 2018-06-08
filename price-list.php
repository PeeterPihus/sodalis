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
            <p>Teenindamisel väljaspool kliiniku lahtiolekuaega on menetluste tasu kahekordne. Kui patsient ohustab kliiniku personali tervist, võib loomaarst keelduda patsiendi teenindamisest. Abi andmisest on õigus keelduda, kui loomaomanik on arsti solvanud või jätnud teenuse eest tasumata</p>
        </div>
        <div>
            <?php
            getAllPriceListItems()
            ?>
        </div>
    </div>


<?php include("footer.php"); ?>