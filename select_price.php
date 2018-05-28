<?php
header('Content-Type: text/html; charset=utf-8');
$connect = mysqli_connect("localhost", "root", "", "loom");
$output = '';
$sql = "SELECT * FROM pricelist ORDER BY id DESC";

$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="30%">Toode</th>  
                     <th width="55%">Kirjeldus</th>  
                     <th width="15%">Hind</th>  
                </tr>';
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="item_name" data-id1="'.$row["id"].'" contenteditable>'.$row["item_name"].'</td>  
                     <td class="extra_info" data-id2="'.$row["id"].'" contenteditable>'.$row["extra_info"].'</td>  
                     <td class="item_price" data-id3="'.$row["id"].'" contenteditable>'.$row["item_price"]. ' €</td>  
                     <td><button type="button" name="delete_btn" data-id4="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">Kustuta</button></td>  
                </tr>  
           ';
    }
    $output .= '  
           <tr>  
                <td></td>  
                <td id="item_name" contenteditable></td>  
                <td id="extra_info" contenteditable></td>  
                <td id="item_price" contenteditable></td>  
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