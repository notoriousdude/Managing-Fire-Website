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
                    echo "<span class='vu5'>Hello, " . $fullname . "</span>";
                    $stmt->close();
                    $conn->close();
                }
                echo "<a href='logout.php' class='vu5'>Logout</a>";
            } else {
                echo "<a href='login.html' class='vu5 active'><i class='fa-solid fa-user'></i></a>";
            }
            ?>