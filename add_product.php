<?php include('connectdb.php'); ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Add Product</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">Add Product</h3>
        <form action="code.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="">Type Product</label>
            <?php
                $sql = "SELECT * FROM product_type";
                $result = mysqli_query($dbcon, $sql);
            ?>
            <select class="form-select" name="type_id">
              <option selected>--Type Product--</option>
              <?php while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                echo "<option value='$row[0]'>$row[1]</option>";
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Name Product</label>
            <input type="text" name="pro_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Price</label>
            <input type="text" name="pro_price" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Date</label>
            <input type="date" name="pro_date" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="pro_image" class="form-control" required>
          </div><br>
          <div class="form-group">
            <input type="submit" name="btn-save" class="form-control btn btn-success" value="Add Product">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>

</html>