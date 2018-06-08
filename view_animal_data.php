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
<!--    <h3>Kasutaja andmed</h3>-->
    <?php
        if (isset($_POST['ainfo'])) {
                addPetInfo($_POST['aid'], $_POST['atime'], $_POST['ainfo']);
        }
    ?>
    <div class="row">
        <div class="col col-xl-6 col-sm-6" id="register1">
            <form method="post" action="view_animal_data.php">
                <h2>Looma info lisamine</h2>
                <h4>* Kohustuslik</h4>
                <div class="form-group">
                    <label for="usr">Info: *</label>
                    <input type="text" class="form-control" name="ainfo" required>
                </div>

                <div class="form-group">
                    <label for="usr">Aeg: *</label>
                    <input type="date" class="form-control" name="atime" required>
                </div>

                <div class="form-group">
<!--                    <label for="usr">Aeg: *</label>-->
                    <input type="hidden" class="form-control" name="aid" value="<?php echo $_GET['id_pet'];?>">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Lisa">
<!--                    <input type="reset" name="" class="btn btn-danger"></button>-->
                </div>
            </form>
        </div>
    </div>
    <h3>Kasutaja Loomad</h3>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Otsi nime järgi">
    <table id="myTable">
        <tr class="header">
            <th style="width:33%;">Nimi</th>
            <th style="width:33%;">info</th>
            <th style="width:34%;">aeg</th>
            <th style="width:34%;">Tõug</th>
            <th style="width:34%;">vanus</th>
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
        if(isset($_GET['id_pet'])){
            $pet_id_from_view_animal = $_GET['id_pet'];
            $user_pet_data = getSpecificPet($pet_id_from_view_animal);
//            $row = $user_pet_data->fetch_array();
//            debug_to_console($row);
//            $data = $user_details->fetch_array();
//            $user_info = getAllPatientDetail($data['owner_id']);

            while($row = $user_pet_data->fetch_array())
            {
                debug_to_console($row);
                $link = "<td ><a href= '#'>";
                $endingTag = '</a></td>';

                echo "<td>". $row['pet_name'] ."</td>";
                echo "<td>". $row['prescription'] ."</td>";
                echo "<td>". $row['data_date'] ."</td>";
                echo "<td>". $row['pet_breed'] ."</td>";
                echo "<td>". $row['pet_age'] ."</td>";
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
