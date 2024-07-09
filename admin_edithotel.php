<?php
session_start();
$img=$_SESSION['aimg'];
$aduser=$_SESSION['auser'];
$name=$_GET['uphname'];
$mysqli=new mysqli("localhost","root","","hotel_reserve");
$sql="SELECT * FROM hotel WHERE aduser='".$aduser."' AND hname='".$name."'";
$result=mysqli_query( $mysqli, $sql );
$data=mysqli_fetch_array($result);
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
                    <h1 class="recent-Articles">Edit Existing Hotel</h1>
                </div>
                <div class="items">
                    <form action="admin_edithotel1.php?honame=';echo $name; echo '" method="post" class="form" enctype="multipart/form-data">
                        <label for="hname">Hotel Name</label>
                        <input type="text" name="hname" value="';echo $data['hname']; echo '" required><br>
                        <label for="htype">Hotel Type</label>
                        <select name="htype" id="">
                                <option value="Luxe Hotel" ';
                                    if($data['htype'] == "Luxe Hotel"){
                                        echo 'selected';
                                    }
                                echo '>Luxe Hotel</option>
                                <option value="Deluxe Hotel" ';
                                    if($data['htype'] == "Deluxe Hotel"){
                                        echo 'selected';
                                    }
                                echo '>Deluxe Hotel</option>
                                <option value="Five Star Hotel" ';
                                    if($data['htype'] == "Five Star Hotel"){
                                        echo 'selected';
                                    }
                                echo '>Five Star Hotel</option>
                        </select><br>
                        <label for="hloc">Hotel Location</label>
                        <select name="hloc" id="" required>
                            <option value="New Delhi" ';
                                    if($data['hloc'] == "New Delhi"){
                                        echo 'selected';
                                    }
                                echo '>New Delhi</option>
                            <option value="Kolkata" ';
                                    if($data['hloc'] == "Kolkata"){
                                        echo 'selected';
                                    }
                                echo '>Kolkata</option>
                            <option value="Mumbai" ';
                                    if($data['hloc'] == "Mumbai"){
                                        echo 'selected';
                                    }
                                echo '>Mumbai</option>
                            <option value="Bengaluru" ';
                                    if($data['hloc'] == "Bengaluru"){
                                        echo 'selected';
                                    }
                                echo '>Bengaluru</option>
                            <option value="Srinagar" ';
                                    if($data['hloc'] == "Srinagar"){
                                        echo 'selected';
                                    }
                                echo '>Srinagar</option>
                        </select><br>
                        <label for="haddr">Hotel Address</label>
                        <input type="text" value="';echo $data['haddr']; echo '" name="haddr" required><br>
                        <div class="des">
                            <label for="hdes">Hotel Description</label>
                            <textarea name="hdes" id="hdes" rows="10" maxlength="500" placeholder="Write something here(max 500)" required>';echo $data['hdes']; echo '</textarea>
                        </div>
                        <label for="rent">Rooms Available</label>
                        <input type="text" value="';echo $data['avail']; echo '" name="avail" required><br>
                        <label for="rent">Rent (₹/day)</label>
                        <input type="text" value="';echo $data['rent']; echo '" name="rent" required><br>
                        <label for="img">Upload image</label>
                        <input type="file" name="img">
                        <label id="temp">*.jpg,*.png,*.jpeg and max 2 MB</label><br>
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

';
?>