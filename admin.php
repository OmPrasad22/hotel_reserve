<?php
session_start();
$img=$_SESSION['aimg'];
$aduser=$_SESSION['auser'];
$sl=1;
$mysqli=new mysqli("localhost","root","","hotel_reserve");
date_default_timezone_set('Asia/Kolkata');
$da=date("Y-m-d");
$sql5= "SELECT * FROM record WHERE checkout<='".$da."'";
$result2=mysqli_query($mysqli,$sql5);
if(mysqli_num_rows($result2)> 0){
    while($row=mysqli_fetch_array($result2)){
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
    <link rel="stylesheet" href="css/admin.css">
    <script defer src="admin_activepage.js"></script>
</head>
<body>
    <header>
        <div class="logosec">
            <img src="Components/logo.png" alt="" style="width: 300%; margin-left: 100px;">
        </div>
        <div class="message">
            <div class="dp">
              <img src= "Components/';echo $img; echo '" class="dpicn" alt="dp">
              </div>
        </div>
    </header>
    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="dash" id="nav-option">
                        <a href="admin.php">
                            <img src="Components/data-analysis_12959229.png" class="nav-img" alt="dashboard">
                            <h3>Dashboard</h3>
                        </a>
                    </div>
                    <div class="add" id="nav-option">
                        <a href="admin_addhotel.php">
                            <img src="Components/svg/hotel-solid.svg" class="nav-img" alt="institution">
                            <h3>Add hotel</h3>
                        </a>
                    </div>
                    <div class="edit" id="nav-option">
                        <a href="admin_actionhotel.php">
                            <img src="Components/svg/warehouse-solid.svg" class="nav-img" alt="institution">
                            <h3>Edit hotel</h3>
                        </a>
                    </div>
                    <div id="nav-option">
                        <a href="admin_login.php">
                            <img src="Components/svg/arrow-right-from-bracket-solid.svg" class="nav-img" alt="logout">
                            <h3>Logout</h3>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main">
            <div class="box-container">
                <div class="box">
                    <div class="text">
                        <h2 class="topic-heading">60.5k</h2>
                        <h2 class="topic">Site Views</h2>
                    </div>
                    <img src="Components/svg/eye-regular.svg" alt="Views">
                </div>
                <div class="box">
                    <div class="text">
                        <h2 class="topic-heading">15k</h2>
                        <h2 class="topic">Total User</h2>
                    </div>
                    <img src="Components/svg/users-solid.svg" alt="likes">
                </div>
                <div class="box">
                    <div class="text">
                        <h2 class="topic-heading">32k</h2>
                        <h2 class="topic">Total Income</h2>
                    </div>
                    <img src="Components/svg/indian-rupee-sign-solid.svg" alt="comments">
                </div>
            </div>
            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Bookings</h1>
                </div>
                <!-- <form action="">
                    <input type="search" name="user" placeholder="search by user name" class="sa">
                </form> -->
                <div class="table-body">
                    <table>
                        <tr>
                            <th style="width: 2%;">Sl</th>
                            <th style="width: 8%;">User</th>
                            <th style="width: 12%;">Hotel Name</th>
                            <th style="width: 10%;">Hotel Type</th>
                            <th style="width: 10%;">Room Type</th>
                            <th style="width: 12%;">Name</th>
                            <th style="width: 5%;">Age</th>
                            <th style="width: 10%;">Mobile No</th>
                            <th style="width: 7%;">Check in</th>
                            <th style="width: 7%;">Check out</th>
                            <th style="width: 5%;">Rent</th>
                            <th style="width: 7%;">Pay mode</th>
                            <th style="width: 5%;">Receipt</th>
                        </tr>';
                        $mysqli=new mysqli("localhost","root","","hotel_reserve");
                        $sql="SELECT * FROM record WHERE aduser='".$aduser."' ORDER BY checkin";
                        $result=mysqli_query($mysqli,$sql);
                        if($result->num_rows > 0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $sql1="SELECT * FROM record_per WHERE pid='".$row['pid']."'";
                                $result3=mysqli_query($mysqli,$sql1);
                                $temp=$result3->num_rows;
                                if($result3->num_rows > 0){
                                    while($row1=mysqli_fetch_assoc($result3)){
                                        echo '<tr>';
                                                if($temp>0){
                                                    echo '<td rowspan="';echo $temp;echo'"><a href="print.php?id=';echo $row['pid'];echo'" target="_blank" class="print">';echo $sl;echo'</a></td>
                                                    <td rowspan="';echo $temp;echo'">';echo $row['user'];echo'</td>
                                                    <td rowspan="';echo $temp;echo'">';echo $row['hname'];echo'</td>
                                                    <td rowspan="';echo $temp;echo'">';echo $row['htype'];echo'</td>
                                                    <td rowspan="';echo $temp;echo'">';echo $row['hrtype'];echo'</td>';
                                                }
                                                echo '<td>';echo $row1['name'];echo'</td>
                                                <td>';echo $row1['age'];echo'</td>
                                                <td>';echo $row1['mno'];echo'</td>';
                                                if($temp>0){
                                                    echo '<td rowspan="';echo $temp;echo'">';echo $row['checkin'];echo'</td>
                                                    <td rowspan="';echo $temp;echo'">';echo $row['checkout'];echo'</td>
                                                    <td rowspan="';echo $temp;echo'">₹ ';echo $row['payrup'];echo'</td>
                                                    <td rowspan="';echo $temp;echo'"><input type="text" value="';echo $row['status'];echo'" readonly></td>';
                                                    if($row['status'] == 'Online'){
                                                        echo '<td rowspan="';echo $temp;echo'"><a href="Components/';echo $row['rect'];echo'" target="_blank">&#10515;</a></td>';
                                                    }
                                                    else{
                                                        echo '<td rowspan="';echo $temp;echo'"></td>';
                                                    }
                                                    $temp=0;
                                                }
                                            echo '</tr>';
                                        }
                                    }
                                $sl=$sl+1;
                            }
                        }
                        else
                        {
                            echo '<tr><td colspan="13">No Record Found</td></tr>';
                        }
                    echo '</table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
';
?>