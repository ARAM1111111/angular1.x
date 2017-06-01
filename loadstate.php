<?php  
 
$conn = mysqli_connect("localhost", "root", "", "angular") or die("Cant connect..."); 
 $output = array();  
 $data = json_decode(file_get_contents("php://input"));  
 $query = "SELECT * FROM state WHERE country_id='".$data->country_id."' ORDER BY name ASC";

 $result = mysqli_query($conn, $query);  
 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 }  
 echo json_encode($output);  
 ?>  