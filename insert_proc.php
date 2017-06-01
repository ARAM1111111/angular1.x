<?php
$conn = mysqli_connect("localhost","root","","angular") or die("Cant Connect...");
$data = json_decode(file_get_contents("php://input"));

var_dump($data);
if (count($data) > 0 && isset($data->name)) {
	$name = mysqli_real_escape_string($conn,$data->name);
	$lname = mysqli_real_escape_string($conn,$data->lname);
	$btn = $data->btn;

	if ($btn == "ADD") {
			$query = "INSERT INTO insertdata(name,lname) VALUES('$name','$lname')";
		if (mysqli_query($conn,$query)) {
			echo "Data inserted";
		} else {
			echo "Insert problem";
		}
	} else if ($btn == "Update") {
		$id = $data->id;
		$query = "UPDATE insertdata SET name ='$name', lname='$lname' WHERE id=$id";
		if (mysqli_query($conn,$query)) {
			echo "Data Updated";
		} else {
			echo "Update problem";
		}
	}

}

if(isset($data->btn) && $data->btn == "del") {
		$id = $data->id;
		$query = "DELETE  FROM insertdata WHERE id=$id";
		// echo $query;
		if (mysqli_query($conn,$query)) {
			echo "Data Deleted";
		} else {
			echo "Delete problem";
		}
	}



?>