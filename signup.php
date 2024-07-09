<?php
session_start();
$error="";
if(isset($_SESSION["sup"])){
    if($_SESSION["sup"]== "0"){
        $error="0";
        session_destroy();
    }
}
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>* Hotel Booking *</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/login.css">
    <script defer src="activepage.js"></script>
</head>
<body>
    <div class="container">
        <div class="div1">
            <div class="header">
                <nav>
                    <div class="logo">
                        <a href="index.php">
                            <img src="Components/logo.png" alt="">
                        </a>
                    </div>
                    <ul>
                        <li><a class="home" href="index.php">Home</a></li>
                        <li><a class="hotel" href="hotel.php">Hotel</a></li>
                        <li><a class="services" href="services.php">Services</a></li>
                        <li><a class="blog" href="blog.php">Blog</a></li>
                        <li><a class="contact" href="contact.php">Contact</a></li>
                        <li><a class="login" href="login.php">Signup</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="login-div">
            <div class="login-wrap">
                <div class="login">
                    <img src="Components/hotel2.jpg" alt="">
                </div>
                <div class="login">
                    <div class="login-data">
                        <form action="signup1.php" method="post" class="form">';
                            if($error=="0"){
                                echo '<label style="color: red;">! Username or Email already exist</label>';
                            }
                            echo '<label for="username">Username</label>
                            <input type="text" name="username" required>
                            <label for="email">Email</label>
                            <input type="email" name="email" required>
                            <label for="password">Password</label>
                            <input type="text" name="password" required>
                            <label for="mobileno">Mobile No</label>
                            <input type="text" name="mobileno" maxlength="10" required>
                            <input type="submit" value="Sign up">
                            <a href="login.php">Login if you are a existing user</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="div4">
            <div class="footer">
                <div class="data">
                    <p class="copyr">
                        &#169; 2024 All Rights Reserved by Group-12.<br><br>
                        Designed by Group-12<br>
                        Demo Images: Google<br>
                    </p>
                </div>
                <div class="data">
                    <label for="tab">Company</label>
                    <ul>
                        <li><a href="hotel.php">Hotel</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="aboutus.php">About us</a></li>
                    </ul>
                </div>
                <div class="data">
                    <label for="hotel-fact">Our Facilities</label>
                    <ul>
                        <li><a href="#">Gym</a></li>
                        <li><a href="#">Bar</a></li>
                        <li><a href="#">Pick-up</a></li>
                        <li><a href="#">Spa</a></li>
                        <li><a href="#">Restaurant</a></li>
                    </ul>
                </div>
                <div class="data">
                    <label for="subs">Subscribe</label>
                    <p class="subs-m">
                        Subscribe for exclusive offers, original stories, upcoming events and more.
                    </p>
                    <div class="send-mail">
                        <form action="#">
                            <input type="email" placeholder="Email Address">
                            <button type="reset" onclick="pop()">SEND</button>
                        </form>
                    </div>
                    <div id="popup">Thank you for your concern</div>
                </div>
                <div class="data">
                    <div class="icons">
                        <a href="https://www.facebook.com/om.prasad.56884761" target="_blank"><img src="Components/svg/facebook.svg" alt=""></a>
                        <a href="https://www.instagram.com/om.prasad.56884761/" target="_blank"><img src="Components/svg/instagram.svg" alt=""></a>
                        <a href="#" target="_blank"><img src="Components/svg/x-twitter.svg" alt=""></a>
                        <a href="https://www.youtube.com/channel/UCvXHQDZSec0dbBs1kSRwp_w" target="_blank"><img src="Components/svg/youtube.svg" alt=""></a>
                    </div><br><br>
                    <p class="admin">For Admin Login <a href="admin_login.php">Click here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
'
?>