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
<!--    <h2>Tere, --><?php //echo $_SESSION["fullname"]; ?><!--!</h2>-->
<!--    <div class='alert alert-info'>-->
<!--        <strong>Info!</strong> Mingi teade - --><?// echo date("d/m/y"); ?><!--. mingi asi.-->
<!--    </div>-->
    <h3>Kasutaja andmed</h3>
    <table class="table table-striped">
        <?php
        if(isset($_POST['upSugg'])){
            $i = update_appointment_info($_POST['appointment_no'], 'doctors_suggestion', $_POST['upSugg']);

            if($i==1){
                echo "<script type='text/javascript'>window.location = 'patient_info.php'</script>";
            }
        }

        if(isset($_GET['id'])){
            $usr_id = $_GET['id'];
            $user_details = getAllPatientDetail($usr_id);
//            $user_pets = getAllMyPets($usr_id);

            while($row = $user_details->fetch_array())
            {
                $link = "<tr><th>";
                $mid = "</th><td>";
                $endingTag = "</td></tr>";
                echo "<tr>";   // appointment_no, full_name, dob, weight, phone_no, address, blood_group, medical_condition
                echo "$link Täisnimi $mid". $row['fullname'] . "$endingTag";
                echo "$link Email $mid" . $row['email'] . "$endingTag";
                echo "$link Phone $mid" . $row['phone'] . "$endingTag";
                echo "$link Adress $mid" . $row['adress'] . "$endingTag";
                echo "</tr>";
            }
        }
        ?>

    </table>
    <h3>Kasutaja Loomad</h3>
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
        if(isset($_GET['id'])){
            $usr_id = $_GET['id'];
            $user_pets = getAllMyPets($usr_id);

            while($row = $user_pets->fetch_array())
            {
                $link = "<td ><a href= 'view_animal_data.php?id_pet=" . $row['id'] . "'>";
                $endingTag = '</a></td>';

                echo "$link" . $row['pet_name'] . "$endingTag";
                echo "<td>". $row['pet_age'] ."</td>";
                echo "<td>". $row['pet_breed'] ."</td>";
                echo '</tr>';
            }
        }
        ?>
        </table>
    </table>
</div>
<?php
include("footer.php");
?>
