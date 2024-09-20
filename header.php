<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
} else {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>QR Code Attendance System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #222; 
            padding: 1rem;
            color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
        }

        .user-info {
            position: relative;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            color: #000;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .user-info:hover {
            color: skyblue;
        }

        .dropdown-arrow {
            margin-left: 5px;
            font-size: 12px;
        }

        .log-out-button {
            display: none;
            background-color: black;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
            margin-left: 5px;
        }

        .log-out-button:hover {
            background-color: darkgrey;
        }

        .show-button {
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="img/grc_logo.png" class="logo" alt="GRC Logo">
        <div class="user-info" onclick="toggleDropdown()">
            <?php echo strtolower($_SESSION['usertype']); ?>
            <span class="dropdown-arrow">▼</span>
            <button class="log-out-button" id="logOutButton" onclick="location.href='logout.php';">Log Out</button>
            <div class="dropdown-menu" id="userDropdown"></div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            const logOutButton = document.getElementById('logOutButton');
            dropdown.classList.toggle('show');
            logOutButton.classList.toggle('show-button');
        }

        window.onclick = function(event) {
            if (!event.target.matches('.user-info') && !event.target.matches('.log-out-button')) {
                const dropdown = document.getElementById('userDropdown');
                dropdown.classList.remove('show');
                document.getElementById('logOutButton').classList.remove('show-button');
            }
        }
    </script>
</body>
</html>
