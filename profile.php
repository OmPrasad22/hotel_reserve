<?php
session_start();
$login="";
if(isset($_SESSION["temp"])){
    if($_SESSION["temp"]== "1"){
        $login="0";
    }
}
if($login=="0"){
    $user=$_SESSION['user'];
    $mysqli=new mysqli("localhost","root","","hotel_reserve");
    $sql= "SELECT * FROM login WHERE username='".$user."'";
    $result=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($result);
    $sql1= "SELECT * FROM user WHERE username='".$user."'";
    $result1=mysqli_query($mysqli,$sql1);
    $row1=mysqli_fetch_array($result1);

    $sl=1;
    $temp=0;
}
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>* Hotel Booking *</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/profile.css">
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
                Account Center
            </div>
        </div>
        <form action="profile1.php" method="post" enctype="multipart/form-data">
            <div class="profile">
                <label for="username">Username</label>
                <input type="text" name="username" value="';echo $user;echo '" readonly><br>
                <label for="name">Name</label>
                <input type="text" name="name" value="';echo $row1['name'];echo '"><br>
                <label for="mobileno">Mobile No</label>
                <input type="text" name="mobileno" value="';echo $row['mobileno'];echo '"><br>
                <label for="email">Email</label>
                <input type="email" name="email" value="';echo $row['email'];echo '"><br>
                <label for="addr">Address</label>
                <input type="text" name="addr" value="';echo $row1['addr'];echo '"><br>
                <label for="img">Upload Image</label>
                <input type="file" name="img"><br>
                <a href="login.php">Logout</a>
                <input type="submit" value="Update"><br>
            </div>
            <div class="pro-img">';
                if($row1['img']==""){
                    echo'<img src="Components/dpimg.png" alt="">';
                }
                else{
                    echo'<img src="Components/';echo $row1['img'];echo '" alt="">';
                }
            echo'</div>
        </form>
        <table>
            <tr>
                <th style="width: 3%;">Sl</th>
                <th style="width: 15%;">Hotel Name</th>
                <th style="width: 12%;">Hotel Type</th>
                <th style="width: 12%;">Room Type</th>
                <th style="width: 5%;">Room</th>
                <th style="width: 15%;">Member</th>
                <th style="width: 13%;">Mobile No</th>
                <th style="width: 9%;">Check in</th>
                <th style="width: 9%;">Check Out</th>
                <th style="width: 7%;">Rent</th>
            </tr>';
            $sql2="SELECT * FROM record WHERE user='".$user."'";
            $result2=mysqli_query($mysqli,$sql2);
            if($result2->num_rows > 0)
            {
                while($row2=mysqli_fetch_assoc($result2))
                {
                    $sql3="SELECT * FROM record_per WHERE pid='".$row2['pid']."'";
                    $result3=mysqli_query($mysqli,$sql3);
                    $temp=$result3->num_rows;
                    while($row3=mysqli_fetch_assoc($result3)){
                    echo '<tr>';
                        if($temp>0){
                            echo '<td rowspan="';echo $temp;echo'"><a href="print.php?id=';echo $row2['pid'];echo'" target="_blank">';echo $sl;echo'</a></td>
                            <td rowspan="';echo $temp;echo'">';echo $row2['hname'];echo'</td>
                            <td rowspan="';echo $temp;echo'">';echo $row2['htype'];echo'</td>
                            <td rowspan="';echo $temp;echo'">';echo $row2['hrtype'];echo'</td>
                            <td rowspan="';echo $temp;echo'">x';echo $row2['noroom'];echo'</td>';
                        }
                        echo'<td>';echo $row3['name'];echo'</td>
                        <td>';echo $row3['mno'];echo'</td>';   
                        if($temp>0){
                            echo'<td rowspan="';echo $temp;echo'">';echo $row2['checkin'];echo'</td>
                            <td rowspan="';echo $temp;echo'">';echo $row2['checkout'];echo'</td>
                            <td rowspan="';echo $temp;echo'">₹ ';echo $row2['payrup'];echo'</td>';
                        }
                        $temp=0;
                        echo '</tr>';
                    }
                    $sl=$sl+1;
                }
            }
            else
            {
                echo '<tr><td colspan="10">No Record Found</td></tr>';
            }
        echo '</table>
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