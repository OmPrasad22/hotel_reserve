<?php
session_start();
$login="";
if(isset($_SESSION["temp"])){
    if($_SESSION["temp"]== "1"){
        $login="0";
    }
}
if(isset($_GET['cd'])){
    $da=$_GET['cd'];
}
else{
    date_default_timezone_set('Asia/Kolkata');
    $da=date("Y-m-d");
}
$hid=$_GET['uphname'];
$mysqli=new mysqli("localhost","root","","hotel_reserve");
$sql="SELECT * FROM hotel WHERE hname='".$hid."'";
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
$price=$row["rent"];
if($row['htype'] == "Luxe Hotel"){
    $price = $price + (($price * 20) / 100);
}
else if($row['htype'] == "Deluxe Hotel"){
    $price = $price + (($price * 40) / 100);
}
else if($row['htype'] == "Five Star Hotel"){
    $price = $price + (($price * 60) / 100);
}
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>* Hotel Booking *</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/payment.css">
    <script defer src="payment.js"></script>
</head>
<body onload="up(this.value,';echo $price;echo ')">
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
                            echo '<script>
                                    alert("Please login or signup first");
                                    window.location.href="login.php";
                                </script>';
                        }
                        else{
                            echo '<li><a class="profile" href="profile.php">My Profile</a></li>';
                        }
                    echo '</ul>
                </nav>
            </div>
        </div>
        <div class="payment">
            <div class="content">';
                    echo'<form action="payment1.php" method="post" class="form" enctype="multipart/form-data">
                    <input type="hidden" name="aduser" value="';echo $row['aduser']; echo '">
                    <label for="hname">Hotel Name </label>
                    <input type="text" name="hname" value="';echo $row['hname'];echo '" required>
                    <label for="htype">Hotel Type </label>
                    <input type="text" name="htype" value="';echo $row['htype'];echo '" readonly required>
                    <label for="hrtype">Room Type </label>';
                    if($row['htype'] == "Luxe Hotel"){
                        echo '<select name="hrtype" id="" onchange="up(this.value,';echo $price;echo ')">
                            <option value="na" selected>None</option>
                            <option value="SingleXA Suite">SingleXA Suite</option>
                            <option value="DoubleXA Suite">DoubleXA Suite</option>
                            <option value="QuadXA Suite">QuadXA Suite</option>
                        </select>';
                    }
                    else if($row['htype'] == "Deluxe Hotel"){
                        echo '<select name="hrtype" id="" onchange="up(this.value,';echo $price;echo ')">
                            <option value="na" selected>None</option>
                            <option value="SingleXA Suite">SingleXA Suite</option>
                            <option value="DoubleXA Suite">DoubleXA Suite</option>
                            <option value="QuadXA Suite">QuadXA Suite</option>
                            <option value="Executive Suite">Executive Suite</option>
                        </select>';
                    }
                    else if($row['htype'] == "Five Star Hotel"){
                        echo '<select name="hrtype" id="" onchange="up(this.value,';echo $price;echo ')">
                            <option value="na" selected>None</option>
                            <option value="SingleXA Suite">SingleXA Suite</option>
                            <option value="DoubleXA Suite">DoubleXA Suite</option>
                            <option value="QuadXA Suite">QuadXA Suite</option>
                            <option value="Executive Suite">Executive Suite</option>
                            <option value="Royal Suite">Royal Suite</option>
                        </select>';
                    }               
                    echo '<label for="noper">No. of person (max 3 person per room)</label>
                    <input type="number" min="1" max="3" id="nop" onkeyup="f(this.value)" required>
                    <label for="noroom">No. of room </label>
                    <input type="number" id="room" max="1" name="noroom" onkeyup="roomup(this.value,';echo $price;echo ')" required>
                    <div id="tab_r">
                        <table>
                            <tr>
                                <th style="width: 40%;">Name</th>
                                <th style="width: 15%;">Age</th>
                                <th style="width: 15%;">Gender</th>
                                <th style="width: 30%;">Mobile No.</th>
                            </tr>
                        </table>
                    </div>
                    <div class="con-id">
                        <label for="uveri">ID proof </label>
                        <select name="uveri" id="idpro">
                            <option value="na" selected>None</option>
                            <option value="Aadhar No">Aadhar No</option>
                            <option value="Voter ID">Voter ID</option>
                            <option value="PAN No">PAN No</option>
                            <option value="Driving License">Driving License</option>
                            <option value="Passport No">Passport No</option>
                        </select>
                        <input type="text" name="uveride" required>
                    </div><br>
                    <label for="checkin">Check In</label>
                    <input type="date" id="ci" min="';echo $da;echo'" name="checkin" onchange="date()" required>';
                    echo '<label for="checkout">Check Out</label>
                    <input type="date" id="co" min="';echo ++$da;echo'"" name="checkout" onchange="dateup()" required>
                    <label for="status">Payment Mode</label>
                    <select name="status" id="" onchange="fsc(this.value)" required>
                        <option value="Cash" selected>Cash</option>
                        <option value="Online">QR</option>
                    </select>
                    <div class="scan" id="qr">
                        <img src="Components/QR.jpg" id="q">
                    </div>
                    <div id="upr" style="display: none;">
                        <label for="rect">Upload Receipt</label>
                        <input type="file" name="rept" id="updoc">
                    </div>
                    <label for="payrup">Total payable (per day)</label>
                    <input type="text" name="payrup" id="pay" value="" readonly>
                    <div class="con-btn">
                        <button type="reset" onclick="re()">Reset</button>
                        <button type="submit" value="Pay Now">Pay Now</button>
                    </div>
                </form>
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