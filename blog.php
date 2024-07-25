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
    <link rel="stylesheet" href="css/blog.css">
    <script defer src="activepage.js"></script>
</head>
<body>
    <div class="chatbot" onclick="chat()"><img src="Components/Chatbot.svg" alt=""></div>
    <div class="chathov">Hi, How can I help you ?</div>
    <div id="chatdiv" style="display: none;">
        <div class="chat-mess" id="messdiv">';
            if($login != "0"){
                echo '<label id="dp" hidden>dpimg.png</label>';
            }
            else{
                echo '<label id="dp" hidden>';echo $_SESSION['dp'];echo'</label>';
            }
            echo '<label for="bot" id="bot"><img src="Components/svg/chat.png" alt="">Hello! I am aao, the personal assistant of HöFE who will help you!</label>
            <label for="bot" id="bot"><img src="Components/svg/chat.png" alt="">I can help you find the best hotels on this page.</label>
            <label for="bot" id="bot" name="bot"><img src="Components/svg/chat.png" alt="">Please send a message below.</label>
        </div>
        <input type="text" id="chatinp">
        <button id="chatbtn" onclick="chatappen()"><img src="Components/svg/send.png" alt=""></button>
    </div>
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
                READ OUR BLOG
            </div>
        </div>
        <div class="blog">
            <div class="blog-wrap">
                <div class="content">
                    <div class="b-img">
                        <img src="Components/review1.jpeg" alt="">
                        <div class="date">28th Aug</div>
                    </div>
                    <label class="b-con">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, in laboriosam porro quidem dolore.
                    </label>
                </div>
                <div class="content">
                    <div class="b-img">
                        <img src="Components/review2.jpeg" alt="">
                        <div class="date">28th Aug</div>
                    </div>
                    <label class="b-con">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, in laboriosam porro quidem dolore.
                    </label>
                </div>
                <div class="content">
                    <div class="b-img">
                        <img src="Components/review3.jpeg" alt="">
                        <div class="date">28th Aug</div>
                    </div>
                    <label class="b-con">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, in laboriosam porro quidem dolore.
                    </label>
                </div>
                <div class="content">
                    <div class="b-img">
                        <img src="Components/review4.jpg" alt="">
                        <div class="date">28th Aug</div>
                    </div>
                    <label class="b-con">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, in laboriosam porro quidem dolore.
                    </label>
                </div>
                <div class="content">
                    <div class="b-img">
                        <img src="Components/review5.jpeg" alt="">
                        <div class="date">28th Aug</div>
                    </div>
                    <label class="b-con">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, in laboriosam porro quidem dolore.
                    </label>
                </div>
                <div class="content">
                    <div class="b-img">
                        <img src="Components/review6.jpeg" alt="">
                        <div class="date">28th Aug</div>
                    </div>
                    <label class="b-con">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, in laboriosam porro quidem dolore.
                    </label>
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