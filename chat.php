<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel_reserve";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_input = $_POST['user'];
        $response = "Sorry, I don't understand that.";
    
        $stmt = $conn->prepare("SELECT bot FROM chatbot WHERE user = ?");
        $stmt->bind_param("s", $user_input);
        $stmt->execute();
        $stmt->bind_result($bot);
        
        if ($stmt->fetch()) {
            $response = $bot;
        }
    
        $stmt->close();
        $conn->close();
    
        echo $response;
    }
?>