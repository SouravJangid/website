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

if (isset($_POST['delete'])) {

    $delete_id = $_POST['id'];
    $delete_query = $conn->prepare("DELETE FROM products WHERE id = '$delete_id'");
    $delete_result = $delete_query->execute();
    if ($delete_result) {
        echo "<script>alert('product deleted successfully')</script>";
    } else {
        echo "<script>alert('product not deleted')</script>";
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
    <title>ViewProducts</title>
</head>

<body>

    <h1>
        <form method="post">
            <?php if ($_SESSION) {
                echo '<button type="submit" name="logout" class="logout-btn">log out</button>';
            } ?>
        </form>
    </h1><br>

    <a style="color:black; text-decoration:none; background-color: greenyellow; cursor:pointer; padding:10px; border-radius:10px; " href="addItem.php">Add new Item</a><br><br>

    <div class=" p-1">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">image</th>
                    <th scope="col">details</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>


                    <?php
                    $select_products = $conn->prepare("SELECT * FROM `products`");
                    $select_products->execute();
                    if ($select_products->rowCount() > 0) {
                        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                            <form action="" method="POST" class="box">


                                <td style="display: none;">
                                    <input type="hidden" name="id" value="<?= $fetch_products['id'] ?>">
                                </td>
                                <td name="name"><?php echo $fetch_products['name']; ?></td>
                                <td><?php echo $fetch_products['price']; ?></td>

                                <td><img width="50px" height="50px" src="../image/<?= $fetch_products['image']; ?>" alt="">
                                </td>
                                <td rowspan="auto"><?php echo $fetch_products['product_detail']; ?></td>
                                <th><button><a href="updateProduct.php?id=<?= $fetch_products['id'] ?>" style="color: white; text-decoration:none;" >update</a></button></th>
                                <th><button name="delete">delete</button></th>
                </tr>

                </form>
        <?php
                        }
                    } else {
                        echo '
                    <p class="empty">no products added yet!</p>';
                    }
        ?>



            </tbody>
        </table>
    </div>
</body>

</html>