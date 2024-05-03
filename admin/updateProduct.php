<?php

include '../components/connection.php';
include '../components/alert.php';

session_start();
if (isset($_SESSION['access']) && $_SESSION['admin_name'] != "") {
} else {
    header("Location:index.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:index.php");
}

//get id
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('location:update_product.php');
        exit();
    }
    $id = $_GET['id'];
}

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    // $id =$id;
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_description = $_POST['details'];

    $product_image = $_FILES['image']['name'];

    $product_image_tmp = $_FILES['image']['tmp_name'];
    $product_image_tmp = $_FILES['image']['tmp_name'];


    $folder = '../image/' . $product_image;

    if (move_uploaded_file($product_image_tmp, $folder)) {




        $insert_query = $conn->prepare("UPDATE products SET name = '$product_name',price = '$product_price', product_detail = '$product_description',image = '$product_image' WHERE id = '$id'");
        $insert_result = $insert_query->execute();
        if ($insert_result) {
            echo "<script>alert('product is updated successfully')</script>";
        } else {
            echo "<script>alert('product not added')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>UpdateProducts</title>
</head>

<center>

    <body>

        <h1>
            <form method="post">
                <?php if ($_SESSION) {
                    echo '<button type="submit" name="logout" class="logout-btn">log out</button>';
                } ?>
            </form>
        </h1><br>

        <a style="color:black; text-decoration:none; background-color: greenyellow; cursor:pointer; padding:10px; border-radius:10px; " href="update_product.php">Show all products</a><br><br>

        <div class="p-2 px-5 ">
            <label for="" style="padding-left:5%; font-size:20px; font-weight:bold;">Add Product</label><br><br>

            <form method="POST" enctype="multipart/form-data">
                <div>
                    <label for="">Name: </label>
                    <input type="text" name="name" id="" required>
                </div><br><br>
                <div>
                    <label for="">Price: </label>
                    <input type="text" name="price" required id="">
                </div><br><br>

                <div>
                    <label for="">Current image: </label>
                    <?php
                    $select_products = $conn->prepare("SELECT * FROM `products` WHERE  `id` = '$id'");
                    $result = $select_products->execute();
                    if ($select_products->rowCount() > 0) {
                        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {                   

                    ?>
                            <img src="../image/<?= $fetch_products['image']; ?>"
                             width="200px" height="200px" alt="ImageNotExitInDatabase">
                    <?php
                        }
                    } ?>
                </div><br><br>

                <div>
                    <label for="">Uplode new image</label>
                    <input type="file" name="image" accept="image/*" required id="">
                </div><br><br>
                <div>
                    <label for="">Description: </label>
                    <input required type="text" name="details" id="">
                </div><br><br>
                <div>
                    <input type="submit" name="submit" onclick="confirem('sure for update');" style="color:black; background-color: skyblue; cursor:pointer; padding:10px; border-radius:10px; " value="Confirm Update">
                </div>
            </form>
        </div>
    </body>
</center>

</html>