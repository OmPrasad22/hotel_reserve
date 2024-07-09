<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>* Hotel Booking *</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header>
        <div class="logosec">
            <img src="Components/logo.png" alt="" style="width: 300%; margin-left: 100px;">
        </div>
        <div class="message">
            <div class="dp">
              <img src="Components/dpimg.png" class="dpicn" alt="dp">
            </div>
        </div>
    </header>
    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div id="nav-option">
                        <a href="login.php">
                            <img src="Components/svg/arrow-right-from-bracket-solid.svg" class="nav-img" alt="logout">
                            <h3>For User Login</h3>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main">
            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Admin Sign Up</h1>
                </div>
                <div class="items">
                    <form action="admin_signup1.php" method="post" class="form" enctype="multipart/form-data">
                        <label for="username">Username</label>
                        <input type="text" name="aduser" required><br>
                        <label for="email">Email</label>
                        <input type="email" name="email" required><br>
                        <label for="email">Mobile No.</label>
                        <input type="text" name="mobileno" maxlength="10" required><br>
                        <label for="password">Password</label>
                        <input type="password" name="password" required><br>
                        <label for="img">Upload Image</label>
                        <input type="file" name="img" required>
                        <label id="temp">*.jpg,*.png,*.jpeg and max 1 MB</label><br>
                        <input type="submit"><br>
                        <a href="admin_login.php">Login if you are a existing admin</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
';
?>