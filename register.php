<?php
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cfpassword = $_POST['cfpassword'];

// Check if password matches with confirm password
if ($password !== $cfpassword) {
    echo "Password does not match with confirm password.";
    exit();
}

// Database connection
require_once("setting.php");
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    // Check if the username already exists in the database
    $checkUsernameStmt = $conn->prepare("SELECT * FROM register WHERE username = ?");
    $checkUsernameStmt->bind_param("s", $username);
    $checkUsernameStmt->execute();
    $checkUsernameResult = $checkUsernameStmt->get_result();

    // Check if the email already exists in the database
    $checkEmailStmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailResult = $checkEmailStmt->get_result();

    $errors = array();

    if ($checkUsernameResult->num_rows > 0) {
        // Username already exists
        $errors[] = "Username already exists.";
    }
    
    if ($checkEmailResult->num_rows > 0) {
        // Email already exists
        $errors[] = "Email already exists.";
    }

    if (!empty($errors)) {
        // Display all error messages
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        exit();
    }

    // Insert the new user into the database
    $insertStmt = $conn->prepare("INSERT INTO register(fullname, username, email, password, cfpassword) VALUES (?, ?, ?, ?, ?)");
    $insertStmt->bind_param("sssss", $fullname, $username, $email, $password, $cfpassword);
    $execval = $insertStmt->execute();

    if ($execval) {
        // Registration successful, redirect to login.html
        header("Location: login.html");
        exit();
    } else {
        echo "Registration failed.";
    }

    $checkUsernameStmt->close();
    $checkEmailStmt->close();
    $insertStmt->close();
    $conn->close();
}
?>