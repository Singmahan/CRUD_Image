<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">Edit Product</h3>
        <?php 
            include('connectdb.php');

            $pro_id = $_GET['pro_id'];
            $sql = "SELECT * FROM product WHERE pro_id='$pro_id'";
            $result = mysqli_query($dbcon, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
        ?>
        <form action="code.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name Product</label>
            <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name'];?>">
          </div>
          <div class="form-group">
            <label for="">Price</label>
            <input type="text" name="pro_price" class="form-control" value="<?php echo $row['pro_price'];?>">
          </div>
          <div class="form-group">
            <label for="">Date</label>
            <input type="date" name="pro_date" class="form-control" value="<?php echo $row['pro_date'];?>">
          </div>
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="pro_image" id="pro_image" class="form-control"><br>
            <img src="image/<?php echo $row['pro_image'];?>" width="20%">
          </div><br>
          <div class="form-group">
            <input type="hidden" name="old_file" value="<?php echo $row['pro_image'];?>">
            <input type="hidden" name="pro_id" value="<?php echo $row['pro_id'];?>">

            <input type="submit" name="btn-update" class="form-control btn btn-success" value="Update">
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