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
        <div class="row my-row1">
            <div class="col-md-6">
                <div class="info-stuff-name">Sodalis Võru</div>
                <div class="info-stuff"><b>Avatud:</b> E-R 9.00 - 17.00, L 10.00 - 13.00</div>
                <div class="info-stuff"><b>Aadress:</b> Pikk 21</div>
                <div class="info-stuff"><b>Linn:</b> Võru</div>
                <div class="info-stuff"><b>Info:</b> Asume Pikk tänav 21, AS Võru KEK peahoone I korrusel, hoone väravapoolses osas. Hea parkimise võimalus otse ukse ees!</div>
            </div>
            <div class="col-md-6 iframe-align">
                <iframe
                        src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1342.7989595827273!2d27.033375517700296!3d57.830814532225396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eafa96bf44e9f9%3A0x224f9a8d2866fd81!2sSodalis+v%C3%A4ikeloomakliinik!5e1!3m2!1sen!2see!4v1521798719216"
                        width="500" height="350" frameborder="1" align="right" style="border:1px solid #d9d9d9 "
                        allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>


<?php include("footer.php"); ?>