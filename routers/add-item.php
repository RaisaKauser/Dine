<?php
include '../includes/connect.php';

$name = $_POST['name'];
$price = $_POST['price'];
$menu_type = $_POST['menu_type'];
$photo_name = $_FILES['photo']['name'];
$photo_name = str_replace(" ", "_", $photo_name);
echo $_FILES['photo']['tmp_name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$tmp_name = str_replace(" ", "_", $tmp_name);
if(isset($photo_name) && !empty($photo_name)){
		$location = "../uploads/";
		$loc = "uploads/";
		if(move_uploaded_file($tmp_name, $location.$photo_name)){
			$smsg = "Uploaded Successfully";
			$sql = "INSERT INTO items (name, price,menu_type,location) VALUES ('$name', $price,'$menu_type','$loc$photo_name')";
			$con->query($sql);
		}else{
			$fmsg = "Failed to Upload File";
		}
}else{
	$fmsg = "Please Select a File";
}

header("location: ../admin-page.php");
?>