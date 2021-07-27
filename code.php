<?php
    session_start();
    include('connectdb.php');
    $date = date("Y-m-d");

    if(isset($_POST['btn-save'])){
        $pro_name = $_POST['pro_name'];
        $type_id = $_POST['type_id'];
        $pro_price = $_POST['pro_price'];
        $pro_date = $_POST['pro_date'];

        $ext = pathinfo(basename($_FILES['pro_image']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'image_'.uniqid().".".$ext;
        $image_path = "image/";
        $upload_path = $image_path.$new_image_name;
        $success = move_uploaded_file($_FILES['pro_image']['tmp_name'], $upload_path);

        if($success == FALSE){
            echo "Not Uploaded";
            exit();
        }

        $pro_image = $new_image_name;

        $sql = "INSERT INTO product(pro_name,type_id,pro_price,pro_date,pro_image) VALUES ('$pro_name','$type_id','$pro_price','$date','$pro_image')";
        $result = mysqli_query($dbcon, $sql);

        if($result){
            $_SESSION['status'] = "Uploaded Successfully";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Not Uploaded.!";
            header("Location: index.php");
        }
    }

    if(isset($_POST['btn-update'])){

        $pro_id = $_POST['pro_id'];
        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_date = $_POST['pro_date'];

        $pro_image = $_POST['pro_image'];

        $sql = "UPDATE product SET pro_name='$pro_name', pro_price='$pro_price', pro_date='$pro_date' WHERE pro_id='$pro_id'";
        $result = mysqli_query($dbcon, $sql);

        if($result){
            $_SESSION['status'] = "Updated Successfully";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Not Updated.!";
            header("Location: index.php");
        }

        if($_FILES["pro_image"]["name"] !=""){
            if(move_uploaded_file($_FILES["pro_image"]["tmp_name"], "image/" .$_FILES["pro_image"]["name"])){
                // delete image
                @unlink("image/". $_POST['old_file']);

                //set new image
                $strSQL = "UPDATE product SET pro_image = '".$_FILES['pro_image']['name']."' WHERE pro_id='".$pro_id."'";
                $result = mysqli_query($dbcon, $strSQL);

                if($result){
                    $_SESSION['status'] = "Updated Successfully";
                    header("Location: index.php");
                }else{
                    $_SESSION['status'] = "Not Uploaded.!";
                    header("Location: index.php");
                }
            }
        }
    }
    if(isset($_POST['btn_delete'])){

        $pro_id = $_POST['pro_id'];

        $sql = "DELETE FROM product WHERE pro_id='$pro_id'";
        $result = mysqli_query($dbcon, $sql);

        if($result){
            $_SESSION['status'] = "Deleted data Successfully";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Not Deleted";
            header("Location: index.php");
        }
    }

