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
if($_SESSION["user-type"] != 'normal'){
    include("nav-bar.php");
}
?>
<div class="container">
    <h2>Tere, <?php echo $_SESSION["username"];?>!</h2>
    <div class='alert alert-info'>
        <strong>Info!</strong> Mingi teade - <? echo date("d/m/y"); ?>. mingi asi.</div>
    <h3>Sisesta info</h3>
    <?php
    if(isset($_POST['apfullname'])){
        $sql_query = "select id_users from users where fullname = '" . $_SESSION['fullname'] . "';";
        $result = mysqli_query($connection, $sql_query);
        if(mysqli_num_rows($result) > 0 ){
            $row = mysqli_fetch_assoc($result);
            $userid =  $row['id_users'];
        }
//        debug_to_console($userid);
        appointment_booking($userid, $_POST['apfullname'], $_POST['apDate'], $_POST['apTime'], $_POST['apReason']);
        unset($_POST['apfullname']);
        if (isset($_POST['apfullname'])){
            echo '<script type="text/javascript">location.reload();</script>';
        }

    }
    ?>
    <form action="set_appointment_user.php" method="POST">

        <div class="form-group" >
            <label for="usr">Täisnimi:</label>
            <input type="text" value="<?php echo $_SESSION["fullname"];?>" class="form-control" id="usr" name="apfullname" required>
        </div>

        <div class="form-group">
            <label for="pwd">Kuupäev</label>
            <input type="date" class="form-control" id="pwd" name="apDate" required>
        </div>

        <div class="form-group">
            <label for="pwd">Kellaaeg</label>
            <input type="time" min="9" max="17" class="form-control" id="pwd" name="apTime" required>
        </div>

        <div class="form-group">
            <label for="pwd">Põhjus:</label>
            <textarea class="form-control" id="pwd" name="apReason" required></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" >
            <input type="reset" name="" class="btn btn-danger">
        </div>
    </form>
</div>
<?php
include("footer.php");
?>
