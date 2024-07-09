<?php
session_start();
$login="";
if(isset($_SESSION["temp"])){
    if($_SESSION["temp"]== "1"){
        $login="0";
    }
}
$mysqli=new mysqli("localhost","root","","hotel_reserve");
$sql="SELECT * FROM hotel";
$result=mysqli_query($mysqli,$sql);
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>* Hotel Booking *</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/hotel.css">
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
                CHOOSE OUR HOTEL
            </div>
        </div>
        <div class="hotel">
            <div class="hotel-wrap">';
                if($result->num_rows > 0){
                    while($data=mysqli_fetch_array($result)){
                        echo '<div class="content">
                            <div class="con-img"><img src="Components/';echo $data['img'];echo '" alt=""></div>
                            <div class="con-data">
                                <form action="payment.php?uphname=';echo $data['hname'];echo ' " method="post">
                                    <label for="hotel-name">';echo $data['hname'];echo '</label>';
                                    if($data['rent'] <= '1000'){
                                    echo '<div class="rating">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-regular.svg" alt="">
                                            <img src="Components/svg/star-regular.svg" alt="">
                                        </div>';
                                    }
                                    else if($data['rent'] > '1000' && $data['rent'] < '2000'){
                                        echo '<div class="rating">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-regular.svg" alt="">
                                        </div>';
                                    }
                                    else if($data['rent'] >= '2000'){
                                        echo '<div class="rating">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-solid.svg" alt="">
                                            <img src="Components/svg/star-half-stroke-solid.svg" alt="">
                                        </div>';
                                    }
                                    echo '<label for="description">';echo $data['hdes'];echo '</label>
                                    <label for="htype">&#9737; ';echo $data['htype'];echo '</label>
                                    <label for="hloc">&#9872; ';echo $data['haddr'];echo ', ';echo $data['hloc'];echo '</label>';
                                    if($data['avail']<=2 && $data['avail']>0){
                                        echo'<label for="left">Only ';echo $data['avail'];echo ' rooms left</label>';
                                        echo '<label for="price">₹';echo $data['rent'];echo '/day</label>
                                        <button type="submit">Book Now</button>';
                                    }
                                    else if($data['avail']==0){
                                        echo'<label for="left">No room left</label>';
                                        echo '<label for="price">₹';echo $data['rent'];echo '/day</label>
                                        <button type="button">Book Now</button>';
                                    }
                                    else{
                                        echo '<label for="price">₹';echo $data['rent'];echo '/day</label>
                                        <button type="submit">Book Now</button>';
                                    }
                                echo '</form>
                            </div>
                        </div>';
                    }
                }
                else{
                    echo '
                        <div class="content">
                            <div class="con-img"><img src="Components/hotel1.jpg" alt=""></div>
                            <div class="con-data">
                                <label for="hotel-name">Hotel Name</label>
                                <div class="rating">
                                    <img src="Components/svg/star-solid.svg" alt="">
                                    <img src="Components/svg/star-solid.svg" alt="">
                                    <img src="Components/svg/star-solid.svg" alt="">
                                    <img src="Components/svg/star-solid.svg" alt="">
                                    <img src="Components/svg/star-regular.svg" alt="">
                                </div>
                                <label for="description">No Record Found</label>
                                <label for="price">₹0/day</label>
                                <a href="#">Book Now</a>
                            </div>
                        </div>
                    ';
                }
            echo '</div>
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