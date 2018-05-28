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
  noAccessIfNotLoggedIn();
  noAccessForNormal();
  noAccessForClerk();
  noAccessForAdmin();

//  include 'nav-bar.php';
?>
<div class="container">
<h2>Ettetulevad ajad</h2>
<p>Vajuta lahtri peal et täiendada</p>

<table class='table table-striped text-center '>
  <thead class="thead-inverse">
				<tr>
				<th><center>Aja number</center></th>
				<th><center>Kliendi täis nimi</center></th>
				<th><center>Põhjus</center></th>
				<th><center>Kuupäev</center></th>
				<th><center>Kellaaeg</center></th>
				</tr>
	</thead>
<?php
    $result = getAllAppointments();

    while ($row = $result->fetch_assoc()) {

        $link = "<td ><a href= 'view_users.php?id=".$row['patient_id']."'>";
        $endingTag = '</a></td>';

        echo "<td>".$row['appointment_no']."</td>";
        echo "$link".$row['fullname_ap']."$endingTag";
        echo "<td>".$row['reason_ap']."</td>";
        echo "<td>".substr($row['date_ap'], 0, 10)."</td>";
        echo "<td>".substr($row['time_ap'], 0, 5)."</td>";
        echo '</tr>';
    }
?>
</table>
</div>
<?php include 'footer.php'; ?>
