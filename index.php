<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <title>Product</title>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Product</h3>
                <hr>
                <?php
                if (isset($_SESSION['status']) && $_SESSION != '') {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey! </strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>
                <a href="add_product.php" class="btn btn-primary btn-sm">+ Add Product</a>
                <br><br>
                <?php
                include('connectdb.php');
                $sql = "SELECT * FROM product";
                $result = mysqli_query($dbcon, $sql);
                ?>
                <table id="example" class="table">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {
                        ?>
                                <tr class="text-center">
                                    <td><?php echo $row['pro_id']; ?></td>
                                    <td><?php echo $row['pro_name']; ?></td>
                                    <td><?php echo $row['pro_price']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($row['pro_date'])); ?></td>
                                    <td>
                                        <img src="image/<?php echo $row['pro_image'] ?>" width="100px">
                                    </td>
                                    <td class="text-center">
                                        <a href="edit_product.php?pro_id=<?php echo $row['pro_id']; ?>" class="btn btn-success btn-sm">EDIT</a>
                                    </td>
                                    <td class="text-center">
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']; ?>">
                                            <button type="submit" name="btn_delete" class="btn btn-danger btn-sm" onclick="return confirm('Deleted ?');">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            ?>
                            <tr>
                                <td>No Record Available</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>

</html>