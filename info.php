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
                <div class="info-stuff"><b>Info:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
            <div class="col-md-6 iframe-align">
                <iframe
                        src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1342.7989595827273!2d27.033375517700296!3d57.830814532225396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eafa96bf44e9f9%3A0x224f9a8d2866fd81!2sSodalis+v%C3%A4ikeloomakliinik!5e1!3m2!1sen!2see!4v1521798719216"
                        width="500" height="350" frameborder="1" align="right" style="border:1px solid #d9d9d9 "
                        allowfullscreen>
                </iframe>
            </div>
            <div>töötajad</div>
        </div>
        <div class="row my-row1">
            <div class="col-md-6">
                <div class="info-stuff-name">Sodalis Võru</div>
                <div class="info-stuff"><b>Avatud:</b> wasdwasdwasdwasd</div>
                <div class="info-stuff"><b>Aadress:</b> wasdwasdwasdwasd</div>
                <div class="info-stuff"><b>Linn:</b> wasdwasdwasdwasd</div>
                <div class="info-stuff"><b>Info:</b> wasdwasdwasdwasd</div>
            </div>
            <div class="col-md-6 iframe-align">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1098.6564411577126!2d27.033375517700296!3d57.830814532225396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eafa96bf44e9f9%3A0x224f9a8d2866fd81!2sSodalis+v%C3%A4ikeloomakliinik!5e0!3m2!1sen!2see!4v1521798821461"
                        width="500" height="350" frameborder="1" align="right" style="border:1px solid #d9d9d9 "
                        allowfullscreen>
                </iframe>
            </div>
            <div>töötajad</div>
        </div>
        <div class="row my-row1">
            <div class="col-md-6">
                <div class="info-stuff-name">Sodalis Võru</div>
                <div class="info-stuff"><b>Avatud:</b> wasdwasdwasdwasd</div>
                <div class="info-stuff"><b>Aadress:</b> wasdwasdwasdwasd</div>
                <div class="info-stuff"><b>Linn:</b> wasdwasdwasdwasd</div>
                <div class="info-stuff"><b>Info:</b> wasdwasdwasdwasd</div>
            </div>
            <div class="col-md-6 iframe-align">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d415.4240051
                        762085!2d26.713873905337707!3d58.34945142715643!2m3!1f0!2f0!3f0!3m2!1i1
                        024!2i768!4f13.1!3m3!1m2!1s0x46eb3747db90ed05%3A0x387b666bb555e743!2
                        sKopli+1%2C+50115+Tartu%2C+Eesti!5e0!3m2!1set!2sus!4v1482000556957"
                        width="500" height="350" frameborder="1" align="right" style="border:1px solid #d9d9d9 "
                        allowfullscreen>
                </iframe>
            </div>
            <div>töötajad</div>
        </div>
        <div class="row">
            <div class="col-md-6">test</div>
            <div class="col-md-6">test</div>
        </div>
    </div>


<?php include("footer.php"); ?>