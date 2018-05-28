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
noAccessForNormal();
noAccessIfNotLoggedIn();
?>
<div class="container">
    <h2>Tere, <?php echo $_SESSION["fullname"]; ?>!</h2>
    <div class='alert alert-info'>
        <strong>Info!</strong> Mingi teade - <? echo date("d/m/y"); ?>. mingi asi.
    </div>
    <h3>Kasutaja andmed</h3>
    <!--    --><?php
    //    if (isset($_POST['pet_name'])) {
    //        $sql_query = "select id_users from users where fullname = '" . $_SESSION['fullname'] . "';";
    //        $result = mysqli_query($connection, $sql_query);
    //        if (mysqli_num_rows($result) > 0) {
    //            $row = mysqli_fetch_assoc($result);
    //            $userid = $row['id_users'];
    //        }
    //        add_pets($userid, $_POST['pet_name'], $_POST['pet_age'], $_POST['pet_breed']);
    //        unset($_POST['pet_name']);
    //        if (isset($_POST['pet_name'])) {
    //            echo '<script type="text/javascript">location.reload();</script>';
    //        }
    //
    //    }
    //    ?>
    <!--    <form action="mypets.php" method="POST">-->
    <!---->
    <!--        <div class="form-group">-->
    <!--            <label for="usr">Nimi:</label>-->
    <!--            <input type="text" class="form-control" id="usr" name="pet_name" required>-->
    <!--        </div>-->
    <!---->
    <!--        <div class="form-group">-->
    <!--            <label for="pwd">Vanus:</label>-->
    <!--            <input type="number" class="form-control" id="pwd" name="pet_age" required>-->
    <!--        </div>-->
    <!---->
    <!--        <div class="form-group">-->
    <!--            <label for="pwd">Tõug:</label>-->
    <!--            <textarea class="form-control" id="pwd" name="pet_breed" required></textarea>-->
    <!--        </div>-->
    <!---->
    <!--        <div class="form-group">-->
    <!--            <input type="submit" class="btn btn-primary">-->
    <!--            <input type="reset" name="" class="btn btn-danger">-->
    <!--        </div>-->
    <!--    </form>-->
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Otsi nime või emaili järgi">
    <table id="myTable">
        <tr class="header">
            <th style="width:5%;">ID</th>
            <th style="width:19%;">Täisnimi</th>
            <th style="width:19%;">Email</th>
            <th style="width:19%;">Telefon</th>
            <th style="width:19%;">Aadress</th>
            <th style="width:19%;">Password</th>
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
                    td = tr[i].getElementsByTagName("td")[1, 2, 3, 4];
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
        if($_SESSION['user-type'] == 'doctor'){

            $all_users = getAllUsers();

            while($row = $all_users->fetch_array())
            {
                $link = "<td ><a href= 'view_users.php?id=".$row['id_users']."'>";
                $endingTag = '</a></td>';
                echo "<td>". $row['id_users'] ."</td>";
                echo "$link" . $row['fullname'] . "$endingTag";
                echo "<td>". $row['email'] ."</td>";
                echo "<td>". $row['phone'] ."</td>";
                echo "<td>". $row['adress'] ."</td>";
                echo "<td>". $row['password'] ."</td>";
                echo '</tr>';
            }
        }
        ?>
    </table>
    <!--        --><?php
    //        $result = getAllMyPets($_SESSION['ses_id_user']);
    //
    //        while ($row = $result->fetch_assoc()) {
    //
    //            $link = "<td ><a href= 'view_animal_data.php?id=" . $row['id'] . "'>";
    //            $endingTag = '</a></td>';
    //
    //            echo "$link" . $row['pet_name'] . "$endingTag";
    //            echo "$link" . $row['pet_age'] . "$endingTag";
    //            echo "$link" . $row['pet_breed'] . "$endingTag";
    //            echo '</tr>';
    //        }
    //        ?>
    </table>
</div>
<?php
include("footer.php");
?>
