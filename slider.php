<!DOCTYPE html>
<html>
<head>
  <title>Slider</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <table class="table table-bordered table-hover">
        <div class="col-xs-4">
          <a class="btn btn-primary" href="add_slider.php"style='background: green; padding: 5px;'>ADD</a>
          <thead>
            <tr>
              <th>SN</th>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <?php 
          include('db.php');

          $query = "Select * from slider";
          $result = $conn->query($query);
          $count = 0;
          while($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <th><?php echo $count+1; ?> </th>
              <th><?php echo $row['title']; ?> </th>
              <th><?php echo $row['description']; ?> </th>
              <th><img src="<?php echo $row['image']; ?>" width="100px" height="50px">  </th>
              <th><?php if ($row['status'] == 1) {
                echo "<span style='background: red; padding: 5px;'>Published</span>";
              } else {
                echo "<span style='background: green; padding: 5px;'>Draft</span>";
              } ; ?> </th>

              <td><a href='edit_slider.php?edit_slider&id=<?php echo $row['id']; ?>'>Edit</a></td>
              <td><a  href='slider.php?delete=<?php echo $row['id']; ?>'>Delete</a></td>


            </tr>
            <?php $count++; } ?>
          </div>
        </table>
      </div>
    </div>

  </body>
  </html>

  <?php

  if (isset($_GET['delete'])) {
    $the_id = $_GET['delete'];
    $slider_query = "DELETE FROM slider WHERE id = {$the_id} ";
    $delete_slider_query = mysqli_query($conn, $slider_query);
    $query = "DELETE FROM slider WHERE id = {$the_id} ";
    $delete_query = mysqli_query($conn, $query);
    header("Location: slider.php");
  }

  if (isset($_GET['reset'])) {
    $the_id = $_GET['reset'];

    $query = "UPDATE slider SET count = 0 WHERE id =" . mysqli_real_escape_string($conn, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection, $query);
    header("Location: slider.php");
  }

  ?>  