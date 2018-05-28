<?php
session_start();
?>
<link href="bootstrap.min.css" rel="stylesheet">

<?php
include("header.php");
include("library.php");
noAccessIfLoggedIn();
?>
<div class="container">
    <h1>Loomakliink</h1>
    <p class="block-quote">Minigi tekst</p>
    <?php
    $first_pass = '';
    $second_pass = '';
    if(isset($_POST['ragain'])){$first_pass = $_POST['rpassword'];}
    if(isset($_POST['ragain'])){$second_pass = $_POST['ragain'];}
    if(isset($_POST['ragain'])){
        if($first_pass == $second_pass){
            $i = register($_POST['remail'],$_POST['rpassword'],$_POST['rphone'],$_POST['radress'],$_POST['rfullname'],"users");
            echo '<script type="text/javascript">window.location = "index_logged.php"</script>';
        }else{
            echo "<div class='alert alert-info'>
              <strong>Info!</strong> Sisestasite valed andmed, proovige uuesti</div>";

        }
    }
    unset($_POST);
    ?>
    <div class="row">
        <div class="col col-xl-6 col-sm-6" id="register1">
            <form method="post" action="register.php">
                <h2>Registreeri</h2>
                <h4>* Kohustuslik</h4>
                <div class="form-group">
                    <label for="usr">Täisnimi: *</label>
                    <input type="text" class="form-control" id="rfullname" name="rfullname" required>
                </div>

                <div class="form-group">
                    <label for="usr">Email: *</label>
                    <input type="email" class="form-control" id="remail" name="remail" required>
                </div>

                <div class="form-group">
                    <label for="usr">Telefon:</label>
                    <input type="text" class="form-control" id="rphone" name="rphone">
                </div>

                <div class="form-group">
                    <label for="usr">Aadress:</label>
                    <input type="text" class="form-control" id="radress" name="radress">
                </div>

                <div class="form-group">
                    <label for="pwd">Salasõna: *</label>
                    <input type="password" class="form-control" id="rpassword" name="rpassword" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Salasõna uuesti: *</label>
                    <input type="password" class="form-control" id="ragain" name="ragain" required>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Edasi">
<!--                    <input type="reset" class="btn btn-danger" value="Tühjenda">-->
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>


