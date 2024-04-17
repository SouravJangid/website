<header class="header">
    <div class="flex">
        <a href="home.php" class="logo"><img src="./img/logo.jpg"></a>
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="view_products.php">products</a>
            <a href="order.php">orders</a>
            <a href="about.php">about us</a>
            <a href="contact.php">contact us</a>
        </nav>
        <div class="icons">
            <i class='bx bx-user' id="user-btn"></i>

            <?php

            $count_wishlist_items = $conn->prepare('SELECT * FROM `wishlist` WHERE user_id =?');
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_itmes = $count_wishlist_items->rowCount();

            ?>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"><sup><?= $total_wishlist_itmes ?></sup></i></a>

            <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id =?");
            $count_cart_items->execute([$user_id]);
            $total_cart_itmes = $count_cart_items->rowCount();

            ?>
            <a href="cart.php" class="cart-btn"><i class="bx bx-cart-download"><sup><?= $total_cart_itmes ?></sup></i></a>
            <i class="bx bx-list-plus" id="menu-btn" style="font-size: 2rem;"></i>
        </div>
        <div class="user-box">
            <?php if ($_SESSION) {
                echo '<p>username : ';
            } ?> <span><?php
                        if ($_SESSION) {
                            echo $_SESSION['user_name'];
                        }
                        ?></span></p>
            <?php if ($_SESSION) {
                echo ' <p>Email :';
            } ?>
            <span><?php if ($_SESSION) {
                        echo $_SESSION['user_email'];
                    } ?></span></p>

            <?php if (!$_SESSION) {
                echo ' <a href="login.php" class="btn">login</a>';
            } ?>
            <?php if (!$_SESSION) {
                echo ' <a href="register.php" class="btn">register</a>';
            } ?>


            <form method="post">
                <?php if ($_SESSION) {
                    echo ' <a href="edit_profile.php" class="btn">Edit Profile</a>';
                } ?>
                <?php if ($_SESSION) {
                    echo '<button type="submit" name="logout" class="logout-btn">log out</button>';
                } ?>
            </form>
        </div>
    </div>
</header>