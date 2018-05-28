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
    <p><?php include('slideshow.php');?></p>
</div>
<?php include("footer.php"); ?>


