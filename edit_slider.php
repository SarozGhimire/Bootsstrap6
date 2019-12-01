<!DOCTYPE html>
<html>
<head>
	<title>EDIT SLIDER</title>
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

$query = "SELECT * FROM slider WHERE id = $the_id";
$select_slider_by_id = mysqli_query($conn,$query);


while ($row = mysqli_fetch_assoc($select_slider_by_id)) {
	$id = $row['id'];
	$title = $row['title'];
	$description = $row['description'];
	$image = $row['image'];
	$status = $row['status'];

}

if (isset($_POST['update'])) {



	$title = $_POST['title'];
	$description = $_POST['description'];

	$image = $_FILES['image']['name']; 
	$image_temp = $_FILES['image']['tmp_name'];
	
	$status = $_POST['status']; 

	move_uploaded_file($image_temp, "$image");

	if (empty($image)) {
		$query = "SELECT * FROM slider WHERE id = $the_id ";
		$select_image = mysqli_query($conn,$query);

		while($row = mysqli_fetch_assoc($select_image)) {
			$image = $row['image'];
		}

	 }
//echo $image; die();

	$query = "UPDATE slider SET title = '{$title}', description = '{$description}', image = '{$image}', status ='{$status}' WHERE id={$the_id} ";

	$update = mysqli_query($conn,$query);
	

	

	echo "<p class='bg-success'> Updated. <a href='slider.php?id={$the_id}'>View Post </a>or<a href='slider.php'>  Edit More Post</a> </p>";

}


?>
<form method="post" action=""  enctype="multipart/form-data" class="form-horizontal">

    <h2>EDIT SLIDER IMAGE</h2>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" value="<?php echo $title; ?>" class="form-control" name="title">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
    </div>

    <div class="form-group">
      <label for="image">Image</label>
      <img width="100" src="<?php echo $image; ?>" alt=""> 
      <input type="file" name="image">
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" id="" class="form-control">
        <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
        <?php 

			if ($status == '1') {

				echo "<option value='0'>Draft</option>";
			}else{

				echo "<option value='1'>Publish</option>";
			}



			?>
      </select>
    </div>


    <br>
    <br>

    <button type="submit" name="update" class="btn btn-default" value="Update">
      <span class="glyphicon glyphicon-save"></span> &nbsp; Update
    </button>
  </form>

  </body>
</html>