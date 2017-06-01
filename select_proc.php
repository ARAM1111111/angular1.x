<?php 
$conn = mysqli_connect("localhost",'root','','angular') or die("Cant connect...");
// $res = array();
$query = "SELECT * FROM insertdata"; 
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0) {
	$res = mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($res);
}
// if(mysqli_num_rows($result) > 0) {
// 	while($row = mysqli_fetch_array($result)) {
// 		$res[] = $row;
// 	}

// 	echo json_encode($res);
// }








?>