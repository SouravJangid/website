<?php
if (isset($_POST['subscribe'])) {
    echo $_POST['subscribe'];
    $id = unique_id();
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `giveinfotoupdaters` WHERE email=?");

    // Prepare the query 
    $query = "SELECT * FROM giveinfotoupdaters WHERE emails = '$email'"; 
 
    $result = $conn->query($query); 
 
    if ($result->rowCount() > 0) { 
        echo '<script>swal("Email", "we have your email already." ,"success");</script>';
    } else { 
        $insert_user = $conn->prepare("INSERT INTO `giveinfotoupdaters`(id,emails) VALUES(?,?)");
        $insert_user->execute([$id, $email]);
        echo '<script>swal("ThanksYou", "We will provide you update infomation." ,"info");</script>';
    } 

}

?>
<div class="top_footer">
    <h2><i class="bx bx-envelope"></i>Sign Up For New Product Updates:</h2>
    <div class="input-field">
        <form action="" method="post">
            <input type="email" name="email" required placeholder="enter your email " maxlength="50" oninput="this.value=this.value.replace(/\s/g,'')">
            <button class="btn" name="subscribe">Subscribe</button>

        </form>
    </div>
</div>
<footer>
    <div class="overlay"></div>
    <div class="footer-content">
        <div class="img-box">
            <img src="img/logo2.png" alt="">
        </div>
        <div class="inner-footer">
            <div class="card">
                <h3>about us</h3>
                <div class="about-us">

                    <ul>
                        <a href="/mywebsite/about.php" target="_blank">
                            <li>about us</li>
                        </a>
                        <a href="https://supravcode.blogspot.com/2024/04/blog-post.html" target="_blank">
                            <li>blog</li>
                        </a>
                    </ul>
                </div>

            </div>
            <div class="card">
                <h3>services</h3>
                <div class="service">
                    <ul>
                        <a href="/mywebsite/order.php">
                            <li>order</li>
                        </a>
                        <a href="https://wa.me/9084694715" target="_blank">
                            <li>help center</li>
                        </a>

                    </ul>
                </div>
            </div>
            <div class="card">
                <h3>local</h3>
                <div class="location">
                <ul>
                    <a href="https://www.google.com/maps/place/Prayagraj,+Uttar+Pradesh/@25.4023959,81.7191832,12z/data=!3m1!4b1!4m6!3m5!1s0x398534c9b20bd49f:0xa2237856ad4041a!8m2!3d25.4358011!4d81.846311!16zL20vMDIwc2tj?entry=ttu" target="_blank"><li>allahabad</li></a>
                    <a href="https://www.google.com/maps/place/Mumbai,+Maharashtra/@19.082502,72.7163749,11z/data=!3m1!4b1!4m6!3m5!1s0x3be7c6306644edc1:0x5da4ed8f8d648c69!8m2!3d19.0759837!4d72.8776559!16zL20vMDR2bXA?entry=ttu" target="_blank"><li>mombai</li></a>
                    <a href="https://www.google.com/maps/place/New+Delhi,+Delhi/@28.5275544,77.0441749,11z/data=!3m1!4b1!4m6!3m5!1s0x390cfd5b347eb62d:0x52c2b7494e204dce!8m2!3d28.6139391!4d77.2090212!16zL20vMGRsdjA?entry=ttu" target="_blank"><li>new delhi</li></a>
                    
                   
                </ul>
                </div>
            </div>
            <div class="card">
                <h3>Check Out Social Media</h3>
                <div class="social-links">
                    <a href="https://www.instagram.com/ugcoolgupta2408/" target="_blank"> <i class="bx bxl-instagram"></i></a>
                    <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FJangidSaty76596" target="_blank"><i class="bx bxl-twitter"></i></a>
                    <a href="https://www.behance.net/souravjangid" target="_blank"> <i class="bx bxl-behance"></i></a>
                    <a href="https://www.youtube.com/@rjgaming.with.freefire" target="_blank"> <i class="bx bxl-youtube"></i></a>
                    <a href="https://wa.me/9084694715" target="_blank"><i class="bx bxl-whatsapp"></i></a>

                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <p>.............all right reserved...........</p>
        </div>
    </div>
</footer>