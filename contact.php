<?php

include 'components/connection.php';

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
if (isset($_POST['layout'])) {
    session_destroy();
    header("location:login.php");
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
    <title>MyWebsite - Contact Us</title>
</head>

<body>
    <?php include './components/header.php'; ?>

    <div class="main">


        <div class="banner">
            <h1>Contact Us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>contact</span>
        </div>


        <section class="services">
            <div class="box-container">
                <div class="box">
                    <img src="img/icon2.png" alt="">
                    <div class="detail">
                        <h3>great savings</h3>
                        <p>Save big every order</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon1.png" alt="">
                    <div class="detail">
                        <h3>24*7 support</h3>
                        <p>one-on-one support</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon0.png" alt="">
                    <div class="detail">
                        <h3>gift vouchers</h3>
                        <p>vouchers on every festivals</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon.png" alt="">
                    <div class="detail">
                        <h3>world wide delivery</h3>
                        <p>dropship world wide</p>
                    </div>
                </div>

            </div>
        </section>

        <div class="form-container">
            <form action="" method="post">
                <div class="title">
                    <img src="img/download.png" class='logo' alt="">
                    <h1>leave a message</h1>
                </div>
                <div class="input-field">
                    <label>your name <sup>*</sup></label>
                    <input type="text" name="name">
                </div>

                <div class="input-field">
                    <label>your email <sup>*</sup></label>
                    <input type="email" name="email">
                </div>

                <div class="input-field">
                    <label>your number <sup>*</sup></label>
                    <input type="text" name="number">
                </div>

                <div class="input-field">
                    <label>your message <sup>*</sup></label>
                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" name="submit-btn" class="btn">send message</button>
            </form>
        </div>

        <div class="address">
            <div class="title">
                <img src="img/download.png" class="logo" alt="">
                <h1>contact detail</h1>
                <p>Any kind of help just contact us.</p>
            </div>
            <div class="box-container">
                <div class="box">
                    <i class="bx bxs-map-pin"></i>
                    <div>
                        <h4>address:</h4>
                        <p>1092 Merigold Lane,Coral Way</p>
                    </div>
                </div>
                <div class="box">
                    <i class="bx bxs-map-call"></i>
                    <div>
                        <h4>phone:</h4>
                        <p><span>+95</span> 9374 9202</p>
                    </div>
                </div>

                <div class="box">
                    <i class="bx bxs-map-email"></i>
                    <div>
                        <h4>email</h4>
                        <p>yashyashithakur885@gmail.com</p>
                    </div>
                </div>

            </div>
        </div>

        <?php include 'components/footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include './components/alert.php'; ?>
</body>

</html>

<!-- 1:10:00 -->