<!DOCTYPE html>
<html>
<head>
  <title>THE BAND</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <table class="table table-bordered table-hover">
        <div class="col-xs-4">
          <a class="btn btn-primary" href="add_band.php"style='background: green; padding: 5px;'>ADD TO BAND</a>
        
          <thead>
            <tr>
              <th>SN</th>
              <th>Name</th>
              <th>Image</th>
              <th>Image Description</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <?php 
            include('db.php');
            $query = "Select * from band";
            $result = $conn->query($query);
            $count = 0;
            while($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <th><?php echo $count+1; ?> </th>
                <th><?php echo $row['name']; ?> </th>
                <th><img src="<?php echo $row['image']; ?>" width="100px" height="50px">  </th>
                <th><?php echo $row['image_description']; ?> </th>
                <th><?php echo $row['date']; ?> </th>
                <td><a href='edit_band.php?edit_band&id=<?php echo $row['id']; ?>'>Edit</a></td>
                <td><a  href='band.php?delete=<?php echo $row['id']; ?>'>Delete</a></td>


 
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
    $band_query = "DELETE FROM band WHERE id = {$the_id} ";
    $delete_band_query = mysqli_query($conn, $band_query);
    $query = "DELETE FROM band WHERE id = {$the_id} ";
    $delete_query = mysqli_query($conn, $query);
    header("Location: band.php");
  }

  if (isset($_GET['reset'])) {
    $the_id = $_GET['reset'];

    $query = "UPDATE band SET count = 0 WHERE id =" . mysqli_real_escape_string($conn, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection, $query);
    header("Location: band.php");
  }

  ?>  