<!DOCTYPE html>
<html>
<head>
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

<form method="post" action ="add_band_process.php" enctype="multipart/form-data" class="form-horizontal">

<h2>ADD IMAGE FOR BAND</h2>

  <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image">
    </div>

  <div class="form-group">
        <label for="image_description">Image Description</label>
        <textarea class="form-control" name="image_description" id="" cols="30" rows="10"></textarea>
    </div>

      
  
    <br>
    <br>

        <button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
  </form>
</div>

</body>
</html>
