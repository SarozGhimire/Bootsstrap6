<?php 
include('db.php');

if (isset($_POST['btnsave'])) {

	$title = $_POST['title'];
	$description = $_POST['description'];

	$image = $_FILES['image']['name']; 
	$image_temp = $_FILES['image']['tmp_name'];

	$status = $_POST['status']; 

	move_uploaded_file($image_temp, "$image");


	echo "<td>{$title}</td>";
	echo "<td>{$description}</td>";
	echo "<td><img width='100' src='$image' alt='image'></td>";
	echo "<td>{$status}</td>";
}

$query = "INSERT INTO slider (title, description, image, status)
VALUES ('$title', '$description', '$image', '$status')";

if ($conn->query($query) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>

