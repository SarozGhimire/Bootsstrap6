<?php 
include('db.php');

if (isset($_POST['btnsave'])) {
    
    $image = $_FILES['image']['name']; 
	$image_temp = $_FILES['image']['tmp_name'];
	
	$name = $_POST['name'];
	$description = $_POST['description'];

	
	move_uploaded_file($image_temp, "$image");


	echo "<td><img width='100' src='$image' alt='image'></td>";
	echo "<td>{$name}</td>";
	echo "<td>{$description}</td>";
}

$query = "INSERT INTO tour (image, name, description)
VALUES ('$image', '$name', '$description')";

if ($conn->query($query) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>

