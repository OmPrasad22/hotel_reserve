<?php
session_start();
$img=$_SESSION['aimg'];
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
                    <h1 class="recent-Articles">Add New Hotel</h1>
                </div>
                <div class="items">
                    <form action="addhotel.php" method="post" class="form" enctype="multipart/form-data">
                        <label for="hname">Hotel Name</label>
                        <input type="text" name="hname" required><br>
                        <label for="htype">Hotel Type</label>
                        <select name="htype" id="">
                            <option value="na" selected>None</option>
                            <option value="Luxe Hotel">Luxe Hotel</option>
                            <option value="Deluxe Hotel">Deluxe Hotel</option>
                            <option value="Five Star Hotel">Five Star Hotel</option>
                        </select><br>
                        <label for="hloc">Hotel Location</label>
                        <select name="hloc" id="" required>
                            <option value="na" selected>Select location</option>
                            <option value="New Delhi">New Delhi</option>
                            <option value="Kolkata">Kolkata</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Bengaluru">Bengaluru</option>
                            <option value="Srinagar">Srinagar</option>
                        </select><br>
                        <label for="haddr">Hotel Address</label>
                        <input type="text" name="haddr" required><br>
                        <div class="des">
                            <label for="hdes">Hotel Description</label>
                            <textarea name="hdes" id="hdes" rows="10" maxlength="500" placeholder="Write something here(max 500)" required></textarea>
                        </div>
                        <label for="avail">Rooms Available</label>
                        <input type="text" name="avail" required><br>
                        <label for="rent">Rent (₹/day)</label>
                        <input type="text" name="rent" required><br>
                        <label for="img">Upload image</label>
                        <input type="file" name="img" required>
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