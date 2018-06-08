<?php
if (!isset($_SESSION)) {
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
?>
<div class="container">
<!--    <h2>Tere, --><?php //echo $_SESSION["fullname"]; ?><!--!</h2>-->
<!--    <div class='alert alert-info'>-->
<!--        <strong>Info!</strong> Mingi teade - --><?// echo date("d/m/y"); ?><!--. mingi asi.-->
<!--    </div>-->
    <h3>Sisesta looma andmed, et lisada</h3>
    <?php
    if (isset($_POST['pet_name'])) {
        $sql_query = "select id_users from users where fullname = '" . $_SESSION['fullname'] . "';";
        $result = mysqli_query($connection, $sql_query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userid = $row['id_users'];
        }
        add_pets($userid, $_POST['pet_name'], $_POST['pet_age'], $_POST['pet_breed']);
        unset($_POST['pet_name']);
        if (isset($_POST['pet_name'])) {
            echo '<script type="text/javascript">location.reload();</script>';
        }

    }
    ?>
    <form action="mypets.php" method="POST">

        <div class="form-group">
            <label for="usr">Nimi:</label>
            <input type="text" class="form-control" id="usr" name="pet_name" required>
        </div>

        <div class="form-group">
            <label for="pwd">Vanus:</label>
            <input type="number" class="form-control" id="pwd" name="pet_age" required>
        </div>

        <div class="form-group">
            <label for="pwd">Tõug:</label>
            <input type="text" class="form-control" id="pwd" name="pet_breed" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Edasi" class="btn btn-primary">
<!--            <input type="reset" name="" class="btn btn-danger">-->
        </div>
    </form>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Otsi nime järgi">

    <table id="myTable">
        <tr class="header">
            <th style="width:33%;">Nimi</th>
            <th style="width:33%;">Vanus</th>
            <th style="width:34%;">Tõug</th>
        </tr>
        </thead>
        <script>
            function myFunction() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
        <?php
        $result = getAllMyPets($_SESSION['ses_id_user']);

        while ($row = $result->fetch_assoc()) {

            $link = "<td ><a href= 'mypets_data.php?id=" . $row['id'] . "'>";
            $endingTag = '</a></td>';

            echo "$link" . $row['pet_name'] . "$endingTag";
            echo "<td>". $row['pet_age'] ."</td>";
            echo "<td>". $row['pet_breed'] ."</td>";
            echo '</tr>';
        }
        ?>
    </table>
</div>
<?php
include("footer.php");
?>
