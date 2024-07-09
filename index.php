<?php
session_start();
$login="";
if(isset($_SESSION["temp"])){
    if($_SESSION["temp"]== "1"){
        $login="0";
    }
}
date_default_timezone_set('Asia/Kolkata');
$da=date("Y-m-d");
$mysqli=new mysqli("localhost","root","","hotel_reserve");
$sql= "SELECT * FROM record WHERE checkout<='".$da."'";
$result=mysqli_query($mysqli,$sql);
if(mysqli_num_rows($result)> 0){
    while($row=mysqli_fetch_array($result)){
        $i=$row['pid'];
        $a=$row['aduser'];
        $h=$row['hname'];
        $n=$row['noroom'];
        $sql1="SELECT avail FROM hotel WHERE aduser='".$a."' AND hname='".$h."'";
        $result1=mysqli_query($mysqli,$sql1);
        $row1=mysqli_fetch_array($result1);
        $temp=$row1['avail']+$n;
        $sql2="UPDATE hotel SET avail='".$temp."' WHERE aduser='".$a."' AND hname='".$h."'";
        mysqli_query($mysqli,$sql2);
        $sql3="DELETE FROM record_per WHERE pid='".$i."'";
        mysqli_query($mysqli,$sql3);
    }
    $sql4="DELETE FROM record WHERE checkout<='".$da."'";
    mysqli_query($mysqli,$sql4);
}
mysqli_close($mysqli);
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>* Hotel Booking *</title>
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
                <div id="slide-mess"></div>
            </div>
            <div class="bn-btn">
                <a href="hotel.php">Book Now</a>
            </div>
            <div class="data">
                <form action="checkav.php" method="post" class="inp-field">
                    <select name="htype" id="" required>
                        <option value="na" selected>Select Hotel</option>
                        <option value="Luxe Hotel">Luxe Hotel</option>
                        <option value="Deluxe Hotel">Deluxe Hotel</option>
                        <option value="Five Star Hotel">Five Star Hotel</option>
                    </select>
                    <label for="checkin">Check in</label>
                    <input type="date" id="ci" min="';echo $da;echo'" name="checkin" onchange="date()" required>
                    <label for="checkout">Check out</label>
                    <input type="date" id="co" min="';echo ++$da;echo'" name="checkout" required>
                    <select name="hloc" id="" required>
                        <option value="na" selected>Select location</option>
                        <option value="New Delhi">New Delhi</option>
                        <option value="Kolkata">Kolkata</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Bengaluru">Bengaluru</option>
                        <option value="Srinagar">Srinagar</option>
                    </select>                
                    <div class="bn-ca">
                        <button type="submit">Check<br>Availability</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="div2">
            <div class="message">
                | Featured Hotels |
            </div>';
            $mysqli=new mysqli("localhost","root","","hotel_reserve");
            $sql="SELECT * FROM hotel LIMIT 3";
            $result2=mysqli_query($mysqli,$sql);
            if($result2->num_rows > 0){
                while($data=mysqli_fetch_array($result2)){
                    echo '<div class="fh">
                        <img src="Components/';echo $data['img'];echo '" alt="">
                        <div class="fh-message">
                            <label for="hdes">';echo $data['hdes'];echo '</label>
                            <label for="hloc">&#9737; ';echo $data['htype'];echo '<br>&#9872; ';echo $data['haddr'];echo ', ';echo $data['hloc'];echo '</label>
                            <div class="bn-btn">
                                <a href="payment.php?uphname=';echo $data['hname'];echo '">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>';
                }
            }
            else{
                echo '<div class="fh">
                    <img src="Components/hotel1.jpg" alt="">
                    <div class="fh-message">
                        <label for="hotel1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur delectus recusandae unde, quis, adipisci sed dolor exercitationem vitae nam corrupti, optio itaque quaerat praesentium. Atque natus quas alias incidunt temporibus!</label>
                        <div class="bn-btn">
                            <a href="index.php">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>';
            }
        echo '</div>
        <div class="div3">
            <div class="hotels-fact">
                | Hotels Facilities |
            </div>
            <div class="svg">
                <div class="svg-in">
                    <button onclick="show(0)"><img src="Components/svg/bicycle14.svg" alt="">GYM</button>
                </div>
                <div class="svg-in">
                    <button onclick="show(1)"><img src="Components/svg/cup74.svg" alt="">BAR</button>
                </div>
                <div class="svg-in">
                    <button onclick="show(2)"><img src="Components/svg/car72.svg" alt="">PICKUP</button>
                </div>
                <div class="svg-in">
                    <button onclick="show(3)"><img src="Components/svg/massage2.svg" alt="">SPA</button>
                </div>
                <div class="svg-in">
                    <button onclick="show(4)"><img src="Components/svg/restaurant23.svg" alt="">RESTAURANT</button>
                </div>
            </div>
            <div class="svg-content">
                <div id="text" class="para"> [ * Text Message * ] </div>
                <img class="svg-m" src="Components/gym.jpg" alt="">
                <img class="svg-m" src="Components/bar.jpg" alt="">
                <img class="svg-m" src="Components/pickup.jpg" alt="">
                <img class="svg-m" src="Components/spa.jpg" alt="">
                <img class="svg-m" src="Components/Restaurant.jpg" alt="">
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