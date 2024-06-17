<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Database connection
require_once("setting.php");
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT username, password FROM register WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($dbUsername, $dbPassword);
        $stmt->fetch();

        if ($password == $dbPassword) {
            // Login successful
            $_SESSION['username'] = $username;
            header("Location: index.html");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // User not found
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>