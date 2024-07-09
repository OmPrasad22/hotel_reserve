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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/service.css">
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
                WE OFFER SERVICES
            </div>
        </div>
        <div class="services">
            <div class="services-wrap">
                <div class="content">
                    <label for="location"><img src="Components/svg/location-dot-solid.svg" alt="">Accessible Location</label>
                    <p class="con">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium itaque non earum, asperiores libero molestiae dicta quos tenetur sunt.</p>
                </div>
                <div class="content">
                    <label for="open"><img src="Components/svg/clock-regular.svg" alt="">Open 24/7</label>
                        <p class="con">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium itaque non earum, asperiores libero molestiae dicta quos tenetur sunt.</p>
                </div>
                <div class="content">
                    <label for="reservation"><img src="Components/svg/calendar-regular.svg" alt="">Easy Reservation</label>
                    <p class="con">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium itaque non earum, asperiores libero molestiae dicta quos tenetur sunt.</p>
                </div>
                <div class="content">
                    <label for="staff"><img src="Components/svg/user-tie-solid.svg" alt="">Friendly Staff</label>
                    <p class="con">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium itaque non earum, asperiores libero molestiae dicta quos tenetur sunt.</p>
                </div>
                <div class="content">
                    <label for="wifi"><img src="Components/svg/wifi-solid.svg" alt="">Free Wifi</label>
                    <p class="con">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium itaque non earum, asperiores libero molestiae dicta quos tenetur sunt.</p>
                </div>
                <div class="content">
                    <label for="parking"><img src="Components/svg/square-parking-solid.svg" alt="">Large Parking Area</label>
                    <p class="con">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium itaque non earum, asperiores libero molestiae dicta quos tenetur sunt.</p>
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