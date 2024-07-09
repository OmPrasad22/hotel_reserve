<?php
session_start();
$img=$_SESSION['aimg'];
$aduser=$_SESSION['auser'];
$sl=1;
$mysqli=new mysqli("localhost","root","","hotel_reserve");
$sql="SELECT * FROM hotel WHERE aduser='".$aduser."'";
$result=mysqli_query($mysqli,$sql);
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
            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Existing Hotels</h1>
                </div>
                <div class="items">
                    <table class="actiontable">
                        <tr>
                            <th style="width: 5%;">Sl</th>
                            <th style="width: 17%;">Hotel Name</th>
                            <th style="width: 15%;">Hotel Type</th>
                            <th style="width: 15%;">Hotel Location</th>
                            <th style="width: 28%;">Hotel Address</th>
                            <th style="width: 10%;">Available</th>
                            <th style="width: 10%;">Action</th>
                        </tr>';
                        if($result->num_rows > 0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo '<tr>
                                    <td>';echo $sl;echo'</td>
                                    <td>';echo $row['hname'];echo'</td>
                                    <td>';echo $row['htype'];echo'</td>
                                    <td>';echo $row['hloc'];echo'</td>
                                    <td>';echo $row['haddr'];echo'</td>
                                    <td>';echo $row['avail'];echo' Room</td>
                                    <td>
                                        <a href="admin_edithotel.php?uphname=';echo $row['hname'];echo'">&#9998;</a>
                                        <a href="admin_deletehotel.php?uphname=';echo $row['hname'];echo'">&#10060;</a>                                    </td>
                                    </tr>';
                                $sl=$sl+1;
                            }
                        }
                        else
                        {
                            echo '<tr><td colspan="7">No Record Found</td></tr>';
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