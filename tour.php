<!DOCTYPE html>
<html>
<head>
  <title>TOUR</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <table class="table table-bordered table-hover">
        <div class="col-xs-4">
          <a class="btn btn-primary" href="add_tour.php"style='background: green; padding: 5px;'>ADD IMAGE FOR TOUR</a>
          <thead>
            <tr>
              <th>SN</th>
              <th>Image</th>
              <th>Name</th>
              <th>Description</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <?php 
          include('db.php');

          $query = "Select * from tour";
          $result = $conn->query($query);
          $count = 0;
          while($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <th><?php echo $count+1; ?> </th>
              <th><img src="<?php echo $row['image']; ?>" width="100px" height="50px">  </th>
              <th><?php echo $row['name']; ?> </th>
              <th><?php echo $row['description']; ?> </th>
              <td><a href='edit_tour.php?edit_tour&id=<?php echo $row['id']; ?>'>Edit</a></td>
              <td><a  href='tour.php?delete=<?php echo $row['id']; ?>'>Delete</a></td>


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
    $tour_query = "DELETE FROM tour WHERE id = {$the_id} ";
    $delete_tour_query = mysqli_query($conn, $slider_query);
    $query = "DELETE FROM tour WHERE id = {$the_id} ";
    $delete_query = mysqli_query($conn, $query);
    header("Location: tour.php");
  }

  if (isset($_GET['reset'])) {
    $the_id = $_GET['reset'];

    $query = "UPDATE tour SET count = 0 WHERE id =" . mysqli_real_escape_string($conn, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection, $query);
    header("Location: tour.php");
  }

  ?>  