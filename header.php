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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<div class="container ">
    <div class="row">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Sodalis</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="info.php">Kontaktid</a></li>
                        <li><a href="price-list.php">Hinnakiri</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Registreeri</a></li>
                        <li><a href="login-normal-user.php"><span class="glyphicon glyphicon-log-in"></span> Logi sisse</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<li class="nav-item" style="align-items: right;"> <a class="nav-link" href="logout.php">Logout</a>
                  </li>';
        }
        ?>
    </div>
</div>
