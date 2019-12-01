<!DOCTYPE html>
<html>
<head>
	<title>EDIT Tour</title>
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

$query = "SELECT * FROM tour WHERE id = $the_id";
$select_tour_by_id = mysqli_query($conn,$query);


while ($row = mysqli_fetch_assoc($select_tour_by_id)) {
	$id = $row['id'];
	$image = $row['image'];
	$name = $row['name'];
	$description = $row['description'];

}

if (isset($_POST['update'])) {

	$image = $_FILES['image']['name']; 
	$image_temp = $_FILES['image']['tmp_name'];

	$name = $_POST['name'];
	$description = $_POST['description'];

	move_uploaded_file($image_temp, "$image");

	if (empty($image)) {
		$query = "SELECT * FROM tour WHERE id = $the_id ";
		$select_image = mysqli_query($conn,$query);

		while($row = mysqli_fetch_assoc($select_image)) {
			$image = $row['image'];
		}

	 }
//echo $image; die();

	$query = "UPDATE tour SET image = '{$image}', name = '{$name}', description = '{$description}' WHERE id={$the_id} ";

	$update = mysqli_query($conn,$query);
	

	

	echo "<p class='bg-success'> Updated. <a href='tour.php?id={$the_id}'>View Post </a>or<a href='tour.php'>  Edit More Post</a> </p>";

}


?>
<form method="post" action=""  enctype="multipart/form-data" class="form-horizontal">

    <h2>EDIT TOUR IMAGE</h2>

     <div class="form-group">
      <label for="image">Image</label>
      <img width="100" src="<?php echo $image; ?>" alt=""> 
      <input type="file" name="image">
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" value="<?php echo $name; ?>" class="form-control" name="name">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
    </div>

   
    <br>
    <br>

    <button type="submit" name="update" class="btn btn-default" value="Update">
      <span class="glyphicon glyphicon-save"></span> &nbsp; Update
    </button>
  </form>

  </body>
</html>