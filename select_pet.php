<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
include "library.php";
header('Content-Type: text/html; charset=utf-8');
$connect = mysqli_connect("localhost", "root", "", "loom");
$output = '';
//$usr_id = $_SESSION['user_id_ses'];
debug_to_console($_SESSION['ses_id_user']);
$sql = "SELECT * FROM user_pet WHERE user_id == '".$_SESSION['ses_id_user']."'";
$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="30%">Nimi</th>  
                     <th width="30%">Vanus</th>  
                     <th width="30%">Tõug</th>    
                </tr>';
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .= '  
                <tr>
                     <td class="pet_name" data-id1="'.$row["id"].'" contenteditable>'.$row["pet_name"].'</td>  
                     <td class="pet_age" data-id2="'.$row["id"].'" contenteditable>'.$row["pet_age"].'</td>  
                     <td class="pet_breed" data-id3="'.$row["id"].'" contenteditable>'.$row["pet_breed"].'</td>  
                     <td><button type="button" name="delete_btn" data-id4="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">Kustuta</button></td>  
                </tr>  
           ';
    }
    $output .= '  
           <tr>  
                <td id="pet_name" contenteditable></td>  
                <td id="pet_age" contenteditable></td>  
                <td id="pet_breed" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Lisa</button></td>  
           </tr>  
      ';
}
else
{
    $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';
}
$output .= '</table>  
      </div>';
echo $output;
?>