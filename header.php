<?php
session_start();
if (isset($_SESSION['username'])) {
    require_once("setting.php");
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT fullname FROM register WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $stmt->bind_result($fullname);
        $stmt->fetch();
        echo "<div class='vu1'>
            <div class='vu2'>
                <a href='index.html'><img src='images/logo.png' class='vu3'></a>
            </div>
            <ul class='vu4'>
                <li><img src='images/home.png' class='nhan6' width='18' height='18'><a href='index.html' class='vu5 active'>Home</a></li>
                <li><img src='images/manual.png' class='nhan6' width='18' height='18'><a href='manual.html' class='vu5'>Manuals</a></li>
                <li><img src='images/announcement.png' class='nhan6' width='18' height='18'><a href='announcement.html' class='vu5'>Announcements</a></li>
                <li><img src='images/map.png' class='nhan6' width='18' height='18'><a href='map.html' class='vu5'>Map</a></li>
            </ul>
            <div class='vu6'>
                <span class='nhan5'>Hello, " . $fullname . "!</span>
                <form action='logout.php' method='post'>
                    <div>
                        <input type='submit' value='Log out' class='vu25'> 
                    </div>
                </form>
            </div>
        </div>";
        $stmt->close();
        $conn->close();
    }
} else {
    echo "<div class='vu1'>
        <div class='vu2'>
            <a href='index.html'><img src='images/logo.png' class='vu3'></a>
        </div>
        <ul class='vu4'>
            <li><img src='images/home.png' class='nhan6' width='18' height='18'><a href='index.html' class='vu5'>Home</a></li>
            <li><img src='images/manual.png' class='nhan6' width='18' height='18'><a href='manual.html' class='vu5'>Manuals</a></li>
            <li><img src='images/announcement.png' class='nhan6' width='18' height='18'><a href='announcement.html' class='vu5'>Announcements</a></li>
            <li><img src='images/map.png' class='nhan6' width='18' height='18'><a href='map.html' class='vu5'>Map</a></li>
        </ul>
        <div class='vu6'>
            <a href='login.html' class='vu5'><i class='fa-solid fa-user'></i></a>
        </div>
    </div>";
}
?>