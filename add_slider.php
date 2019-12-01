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

  <form method="post" action ="add_process.php" enctype="multipart/form-data" class="form-horizontal">

    <h2>ADD SLIDER IMAGE</h2>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
      <label for="image">image</label>
      <input type="file" name="image">
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" id="" class="form-control">
        <option value="">Status</option>
        <option value="1">Publish</option>
        <option value="0">Draft</option>
      </select>
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
