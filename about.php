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
    <title>MyWebsite -abot us </title>
</head>

<body>
    <?php include './components/header.php'; ?>
    <div class="main">

        <div class="banner">
            <h1>about us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>about</span>
        </div>
        <div class="about-category">
            <div class="box">
                <img src="img/3.webp" alt="">
                <div class="detail">
                    <span>coffee</span>
                    <h1>lemon green</h1>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="img/about.png" alt="">
                <div class="detail">
                    <span>coffee</span>
                    <h1>lemon Teaname</h1>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>

            <div class="box">
                <img src="img/2.webp" alt="">
                <div class="detail">
                    <span>coffee</span>
                    <h1>lemon Teaname</h1>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="img/1.webp" alt="">
                <div class="detail">
                    <span>coffee</span>
                    <h1>lemon green</h1>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>


            <section class="services">
                <div class="title">
                    <img src="img/download.png" class="logo" alt="">
                    <h1>why choose us</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus suscipit ab, natus sit ullam amet dolorum voluptates, hic ipsa harum nihil vel dicta.</p>

                </div>
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

            <div class="about">
                <div class="row">
                    <div class="img-box">
                        <img src="img/3.png" alt="">

                    </div>
                    <div class="detail">
                        <h1>visit our beautiful showroom!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur libero minus error eligendi perferendis sunt reiciendis fuga harum dolores, accusantium ipsam blanditiis id.</p>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                </div>
            </div>
            <div class="testimonial-container">
                <div class="title">
                    <img src="img/download.png" alt="">
                    <h1>what people say about us</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem nostrum corrupti ipsum eveniet facere velit quo, error tempora laborum, vitae recusandae dolore molestias!
                    </p>
                </div>
                <div class="container">
                    <div class="testimonial-item active">
                        <img src="img/01.jpg" alt="">
                        <h1>sara smit</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, dolor. Maxime aut rerum quod aspernatur officiis soluta placeat quo recusandae alias similique cumque, laborum consectetur temporibus eius, voluptate explicabo, vel iure dignissimos odio.</p>

                    </div>

                    <div class="testimonial-item ">
                        <img src="img/02.jpg" alt="">
                        <h1>hary porter</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, dolor. Maxime aut rerum quod aspernatur officiis soluta placeat quo recusandae alias similique cumque, laborum consectetur temporibus eius, voluptate explicabo, vel iure dignissimos odio.</p>

                    </div>
                    <div class="testimonial-item ">
                        <img src="img/03.jpg" alt="">
                        <h1>selena ansari</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, dolor. Maxime aut rerum quod aspernatur officiis soluta placeat quo recusandae alias similique cumque, laborum consectetur temporibus eius, voluptate explicabo, vel iure dignissimos odio.</p>

                    </div>

                    <div class="left-arrow" onclick="nextSlide()"><i class="bx bx-left-arrow-alt"></i>
                    </div>

                    <div class="right-arrow" onclick="preSlide()"><i class="bx bx-right-arrow-alt"></i>

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

<!-- 2:00:00 -->