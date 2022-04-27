<?php
include('config2.php');
if(isset($_GET["term"]))
{
    $result = $conn->query("SELECT * FROM player WHERE email LIKE '%".$_GET["term"]."%' ORDER BY email ASC");
    $total_row = mysqli_num_rows($result); 
    $output = array();
    if($total_row > 0){
      foreach($result as $row)
      {
       $temp_array = array();
       $temp_array['value'] = $row['email'];
       $output[] = $temp_array;
      }
    }else{
      $output['value'] = '';
      $output['label'] = 'No Record Found';
    }
 echo json_encode($output);
}
?>
