<?php 

$conn = mysqli_connect("localhost", "root", "", "angular") or die("Cant connect...");
$output = [];

$query = "SELECT * FROM country ORDER BY name ASC";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result)) {
	$output[] = $row;
}

echo json_encode($output);


?>