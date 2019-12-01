<!DOCTYPE html>
<html>
<head>
  <title>Contact</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>SN</th>
              <th>Name</th>
              <th>Email</th>
              <th>Comment</th>
              <th>Delete</th>
            </tr>
          </thead>
          <?php 
          include('db.php');

          $query = "Select * from contact";
          $result = $conn->query($query);
          $count = 0;
          while($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <th><?php echo $count+1; ?> </th>
              <th><?php echo $row['name']; ?> </th>
              <th><?php echo $row['email']; ?> </th>
              <th><?php echo $row['comment']; ?> </th>
              <td><a  href='contact.php?delete=<?php echo $row['id']; ?>'>Delete</a></td>


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
    $tour_query = "DELETE FROM contact WHERE id = {$the_id} ";
    $delete_tour_query = mysqli_query($conn, $slider_query);
    $query = "DELETE FROM contact WHERE id = {$the_id} ";
    $delete_query = mysqli_query($conn, $query);
    header("Location: contact.php");
  }

  if (isset($_GET['reset'])) {
    $the_id = $_GET['reset'];

    $query = "UPDATE contact SET count = 0 WHERE id =" . mysqli_real_escape_string($conn, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection, $query);
    header("Location: contact.php");
  }

  ?>  