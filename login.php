<?php
include 'components/connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
// login user
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email=? And password=? ");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        header('location:home.php');
    } else {
        $warning_msg[] = "incorrect username or password";
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
    <title>MyWebsite - login</title>
</head>

<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <h1>login now</h1>
                <p>Please login here then you can get access of your account :</p>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p for="">your email <sup id="star-1">*</sup></p>
                    <input type="email" name="email" required placeholder="enter your email " maxlength="50" oninput="this.value=this.value.replace(/\s/g,'')">

                </div>
                <div class="input-field">
                    <p for="">your password <sup id="star-2">*</sup></p>
                    <input type="password" name="pass" required placeholder="enter your password " maxlength="50" oninput="this.value=this.value.replace(/\s/g,'')">

                </div>
                <input type="submit" name="submit" value="login now" class="btn">
                <p>do not have an account? <a href="register.php">register now</a></p>
            </form>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>

</html>