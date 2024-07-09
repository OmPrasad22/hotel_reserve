<?php
session_start();
$login="";
if(isset($_SESSION["temp"])){
    if($_SESSION["temp"]== "1"){
        $login="0";
    }
}
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>* Hotel Booking *</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="style.css">
    <script defer src="activepage.js"></script>
</head>
<body>
    <div class="chatbot"><a href="#"><img src="Components/Chatbot.svg" alt=""></a></div>
    <div class="chathov">Hi, How can I help you ?</div>
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
                        <li><a class="contact" href="contact.php">Contact</a></li>';
                        if($login != "0"){
                            echo '<li><a class="login" href="login.php">Login</a></li>';
                        }
                        else{
                            echo '<li><a class="profile" href="profile.php">My Profile</a></li>';
                        }
                    echo '</ul>
                </nav>
            </div>
            <div class="message">
                CONTACT US
            </div>
        </div>
        <div class="contact-contain">
            <div class="contact-wrap">
                <div class="map">
                    <div id="status"><img src="Components/no-internet.png" alt="">No Internet</div>
                    <iframe id="online" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.035614901716!2d88.3529057739917!3d22.764059525928324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f896ccfe555557%3A0x3d78ac3af6a4caa4!2sBarrackpore%20Rastraguru%20Surendranath%20College!5e0!3m2!1sen!2sin!4v1713836336050!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="form">
                    <div class="form-data">
                        <label for="head">Our Address</label>
                        <label for="context">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur voluptas.</label>
                        <label for="address"><img src="Components/svg/address-book-regular.svg" alt="">Address</label>
                        <label for="phone-no"><img src="Components/svg/phone-solid.svg" alt="">+91 9064763715</label>
                        <label for="email"><img src="Components/svg/envelope-regular.svg" alt="">oaa_group12@hofe.com</label>
                        <label for="website"><img src="Components/svg/globe-solid.svg" alt=""><a href="index.php" class="link">www.hotels.com</a></label>
                        <form action="#" method="post">
                            <div class="inp">
                                <input name="name" id="name" type="text" placeholder="Name">
                                <input name="email" id="email" type="email" placeholder="Email">
                            </div>
                            <textarea name="comment" id="comment" cols="54" rows="5" placeholder="Message"></textarea>
                            <button type="reset" class="btn" onclick="pop()">Send</a>
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
                        <li><a>Gym</a></li>
                        <li><a>Bar</a></li>
                        <li><a>Pick-up</a></li>
                        <li><a>Spa</a></li>
                        <li><a>Restaurant</a></li>
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
';
?>