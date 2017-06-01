<?php

$conn = mysqli_connect("localhost", "root", "", "angular") or die("Cant connect ...");
if(!empty($_FILES))
{
	$path = "upload/". $_FILES['file']['name'];
	if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
	{
		$insertQuery = "INSERT INTO insertdata(img) VALUES ('".$_FILES['file']['name']."')";
		if(mysqli_query($conn, $insertQuery))
		{
			echo "File Uploaded";
		}
		else
		{
			echo "File Uploaded but not saved";
		}
	}
}
else
{
	echo "Some Error";
}


?>