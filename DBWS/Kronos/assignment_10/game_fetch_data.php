<?php
include('config2.php');
if(isset($_GET["term"]))
{
    $result = $conn->query("SELECT * FROM game WHERE name LIKE '%".$_GET["term"]."%' ORDER BY name ASC");
    $total_row = mysqli_num_rows($result); 
    $output = array();
    if($total_row > 0){
      foreach($result as $row)
      {
       $temp_array = array();
       $temp_array['value'] = $row['name'];
       $output[] = $temp_array;
      }
    }else{
      $output['value'] = '';
      $output['label'] = 'No Record Found';
    }
 echo json_encode($output);
}
?>


