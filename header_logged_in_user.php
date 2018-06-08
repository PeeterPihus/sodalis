<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Võru loomakliinik</title>
    <link href="main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
<!--    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
<!--    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>-->
<!--    <link rel="stylesheet"-->
<!--          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>-->
</head>
<body>
<div class="container ">
    <div class="row">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
                    </button>
<!--                    <a class="navbar-brand" href="index_logged.php">Sodalis</a>-->
<!--                </div>-->
<!--                <div class="collapse navbar-collapse" id="myNavbar">-->

                        <?php
                        if (isset($_SESSION['user-type'])) {

                            switch ($_SESSION['user-type']) {
                                case 'normal':

                                    echo "<a class='navbar-brand' href='index_logged.php'>Sodalis</a>";
                                    echo "</div>";
                                    echo "<div class='collapse navbar-collapse' id='myNavbar'>";

                                    echo "<ul class='nav navbar-nav'>";
                                    echo "<li><a href='info.php'>Kontaktid</a></li>";
                                    echo "<li><a href='price-list.php'>Hinnakiri</a></li>";
                                    echo "<li><a href='set_appointment_user.php'>Broneeri aeg</a></li>";
                                    echo "<li><a href='mypets.php'>Minu loomad</a></li>";
                                    echo "</ul>";
                                    break;
                                case 'doctor':
                                    echo "<a class='navbar-brand' href='logout.php'>Sodalis</a>";
                                    echo "</div>";
                                    echo "<div class='collapse navbar-collapse' id='myNavbar'>";

                                    echo "<ul class='nav navbar-nav'>";
                                    echo "<li><a href='add_patient.php'>Lisa kasutaja</a></li>";
                                    echo "<li><a href='patient_info.php'>Broneeritud ajad</a></li>";
                                    echo "<li><a href='user_list.php'>Kasutajad</a></li>";
                                    echo "</ul>";
                                    break;
                                case 'admin':
                                    echo "<li><a href='#'></a></li>";
                                    break;
                                default:
                                    // code...
                                    break;
                            }
                        }
                        ?>
                    <ul class="nav navbar-nav navbar-right">
                        <!--                        <li><a href="register.php"><span></span> Registreeri</a></li>-->
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logi välja</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
