<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<link href="bootstrap.min.css" rel="stylesheet">
<link href="main.css" rel="stylesheet">
<?php
  include("header_logged_in_user.php");
  include("library.php");
  noAccessForAdmin();
  noAccessIfNotLoggedIn();
//  if($_SESSION["user-type"] != 'normal'){
//    include("nav-bar.php");
//  }
?>
<div class="container">
<!--  <h2>Tere, --><?php //echo $_SESSION["fullname"];?><!--!</h2>-->
<!--      <div class='alert alert-info'>-->
<!--              <strong>Info!</strong> Mingi teade - --><?// echo date("d/m/y"); ?><!--. mingi asi.</div>-->
      <h3>Sisesta info</h3>
    <?php
    if (isset($_POST['uemail'])) {
        $i = register($_POST['uemail'],$_POST['upassword'],$_POST['uphone'],$_POST['uadress'],$_POST['ufullname'],"users");
    }
    ?>
    <div class="row">
        <div class="col col-xl-6 col-sm-6" id="register1">
            <form method="post" action="add_patient.php">
                <h2>Kasutaja lisamine</h2>
                <h4>* Kohustuslik</h4>
                <div class="form-group">
                    <label for="usr">Täisnimi: *</label>
                    <input type="text" class="form-control" name="ufullname" required>
                </div>

                <div class="form-group">
                    <label for="usr">Email: *</label>
                    <input type="email" class="form-control" name="uemail" required>
                </div>

                <div class="form-group">
                    <label for="usr">Telefon:</label>
                    <input type="text" class="form-control" name="uphone">
                </div>

                <div class="form-group">
                    <label for="usr">Aadress:</label>
                    <input type="text" class="form-control" name="uadress">
                </div>

                <div class="form-group">
                    <label for="pwd">Salasõna: *</label>
                    <input type="password" class="form-control" name="upassword" required>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Lisa">
                    <input type="reset" name="" class="btn btn-danger"></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
  include("footer.php");
?>
