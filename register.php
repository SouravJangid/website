<?php
include 'components/connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
// register user
if (isset($_POST['submit'])) {
    $id = unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = $_POST['pass'];
    $cpass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email=?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $message[] = 'email/already exists';
        echo 'email already exists';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm your password';
            echo 'confirm your password';
        } else {
            $insert_user = $conn->prepare("INSERT INTO `users`(id,name,email,password) VALUES(?,?,?,?)");
            $insert_user->execute([$id, $name, $email, $pass]);
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE email=? AND password =?");
            $select_user->execute([$email, $pass]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if ($select_user->rowCount() > 0) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                header('location:login.php');

            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="style.css">

    <script src="script.js"></script>
    <title>MyWebsite - register</title>
</head>

<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <h1>register now</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam culpa mollitia unde illo dolores, labore modi voluptas debitis officiis earum. Deleniti, debitis ad?</p>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p for="">your name <sup>*</sup></p>
                    <input type="text" name="name" required placeholder="enter your name " maxlength="50">

                </div>
                <div class="input-field">
                    <p for="">your email <sup>*</sup></p>
                    <input type="email" name="email" required placeholder="enter your email " maxlength="50" oninput="this.value=this.value.replace(/\s/g,'')">

                </div>
                <div class="input-field">
                    <p for="">your password <sup>*</sup></p>
                    <input type="password" name="pass" required placeholder="enter your password " maxlength="50" oninput="this.value=this.value.replace(/\s/g,'')">

                </div>
                <div class="input-field">
                    <p for="">confirm password <sup>*</sup></p>
                    <input type="password" name="pass" required placeholder="enter your password " maxlength="50" oninput="this.value=this.value.replace(/\s/g,'')">
                    <!-- /*THIS THING */ -->

                </div>
                <input type="submit" name="submit" value="register now" class="btn">
                <p>already have an account? <a href="login.php">login</a></p>
            </form>
        </section>
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

</body>

</html>