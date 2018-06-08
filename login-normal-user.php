<?php
session_start();
?>
<link href="bootstrap.min.css" rel="stylesheet">
<link href="main.css" rel="stylesheet">

<?php
include("header.php");
include("library.php");
noAccessIfLoggedIn();
?>

<div class="container">

    <h1>Loomakliink Sodalis</h1>
<!--    <p class="block-quote">Minigi tekst</p>-->
    <?php
    if(isset($_POST['lemail'])){
        $i = login($_POST['lemail'],$_POST['lpassword'],"users");
        if($i==1){
            echo '<script type="text/javascript"> window.location = "index_logged.php" </script>';
        }
    }else if(isset($_POST['remail'])){
        $i = register($_POST['remail'],$_POST['rpassword'],$_POST['rfullname'],"users");
        if($i==1){
            echo '<script type="text/javascript"> window.location = "index_logged.php"</script>';
        }
    }else{
        echo "<div class='alert alert-info'>
              <strong>Info!</strong> Logi sisse või registreeri, et panna aegu kirja</div>";
    }
    unset($_POST);
    ?>
    <div class="row">
        <div class="col col-xl-6 col-sm-6">
            <h2>Logi sisse</h2>
            <form action="login-normal-user.php" method="POST">
                <div class="form-group">
                    <label for="usr">Email:</label>
                    <input type="email" class="form-control" name="lemail" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Salasõna:</label>
                    <input type="password" class="form-control" name="lpassword" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Logi sisse">
<!--                    <input type="reset" class="btn btn-danger" value="Tühjenda">-->
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>


