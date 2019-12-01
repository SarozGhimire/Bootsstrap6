        <?php 
include('db.php');

if (isset($_POST['btnsave'])) {
    
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];

  


  echo "<td>{$name}</td>";
  echo "<td>{$email}</td>";
  echo "<td>{$comment}</td>";
}

$query = "INSERT INTO contact (name, email, comment)
VALUES ('$name', '$email', '$comment')";

if ($conn->query($query) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>