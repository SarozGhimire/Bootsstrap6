<!DOCTYPE html>
<html>
<head>
  <title>EDIT BAND</title>
  <style>
    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

  </style>
</head>
<body>

  <?php 
  include('db.php');

  if(isset($_GET['id'])){
  $the_id = $_GET['id'];
}

$query = "SELECT * FROM band WHERE id = $the_id";
$select_slider_by_id = mysqli_query($conn,$query);


while ($row = mysqli_fetch_assoc($select_slider_by_id)) {
$id = $row['id'];
$name = $row['name'];
$image = $row['image'];
$image_description = $row['image_description'];
$date = $row['date'];
}


if (isset($_POST['update'])) {



$name = $_POST['name'];

$image = $_FILES['image']['name']; 
$image_temp = $_FILES['image']['tmp_name']; 

$image_description = $_POST['image_description'];


move_uploaded_file($image_temp, "$image");

if (empty($image)) {
$query = "SELECT * FROM band WHERE id = $the_id ";
$select_image = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($select_image)) {
$image = $row['image'];
}

}
//echo $image; die();

$query = "UPDATE band SET name = '{$name}', image = '{$image}', image_description = '{$image_description}', date = now() WHERE id={$the_id} ";

$update = mysqli_query($conn,$query);




echo "<p class='bg-success'> Updated. <a href='band.php?id={$the_id}'>View Post </a>or<a href='band.php'>  Edit More Post</a> </p>";

}


?>
<form method="post" action=""  enctype="multipart/form-data" class="form-horizontal">

  <h2>EDIT BAND IMAGE</h2>

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" value="<?php echo $name; ?>" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <img width="100" src="<?php echo $image; ?>" alt=""> 
    <input type="file" name="image">
  </div>
  <div class="form-group">
    <label for="image_description">Image Description</label>
    <textarea class="form-control" name="image_description" id="" cols="30" rows="10"><?php echo $image_description; ?></textarea>
  </div>


<br>
<br>

<button type="submit" name="update" class="btn btn-default" value="Update">
  <span class="glyphicon glyphicon-save"></span> &nbsp; Update
</button>
</form>

</body>
</html>