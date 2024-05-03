<?php
include '../components/connection.php';
include '../components/alert.php';

session_start();
// login admin
if (isset($_POST['submit'])) {
    // $warning_msg[] = "incorrect username or password";


    $admin = $_POST['admin'];
    $admin = filter_var($admin, FILTER_SANITIZE_STRING);

    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    
    $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_name = '$admin' AND password = '$pass'");
    $stmt->execute();       
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 

    
    if ($stmt->rowCount()>0 ) {
        $_SESSION['access']='yes';
        $_SESSION['admin_name'] = $admin;
        header('location:update_product.php');
        die();
    } else {
        $alert = "Incorrect username or password Try again";
        echo "<script>alert('$alert');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="../style.css">

    <script src="script.js"></script>
    <title>Admin Panal </title>
</head>

<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <h1>login </h1>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p for="">admin Name</p>
                    <input type="text" name="admin" required placeholder="enter the user name " maxlength="50" oninput="this.value=this.value.replace(/\s/g,'')">

                </div>
                <div class="input-field">
                    <p for="">your password</p>
                    <input type="password" name="pass" required placeholder="enter your password " maxlength="50" oninput="this.value=this.value.replace(/\s/g,'')">

                </div>
                <input type="submit" name="submit" value="login now" class="btn">
            </form>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>

</html>;