<?php 
include('db.php');

 if (isset($_POST['btnsave'])) {

 	$name = $_POST['name'];

 	$image = $_FILES['image']['name']; 
	$image_temp = $_FILES['image']['tmp_name'];

 	$image_description = $_POST['image_description'];
 	$date = date('d-m-y'); 

 	


	move_uploaded_file($image_temp, "$image");


 	echo "<td>{$name}</td>";
 	echo "<td><img width='100' src='$image' alt='image'></td>";
 	echo "<td>{$image_description}</td>";
 	echo "<td>{$date}</td>";
 }

 $query = "INSERT INTO band(name, image, image_description, date)
VALUES ('$name', '$image', '$image_description', now())";

if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>