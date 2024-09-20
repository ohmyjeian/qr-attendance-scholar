<?php
require('header.php'); 
require('conn.php');   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Leader Dashboard - GRC-MLALAF</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        .sidebar {
            position: fixed;
            left: -220px; /* Hidden offscreen */
            top: 0;
            height: 100%;
            width: 220px;
            background: #343a40;
            color: white;
            padding: 20px;
            z-index: 1000;
            transition: left 0.3s ease; /* Animate sidebar appearance */
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px; /* Rounded corners */
            transition: background 0.3s ease, transform 0.2s ease; /* Add animation */
        }
        .sidebar a:hover {
            background: skyblue;
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
        .burger {
            position: absolute;
            left: 10px;
            top: 10px;
            cursor: pointer;
            color: blue;
            font-size: 24px;
            z-index: 1001;
            transition: color 0.3s ease;
        }
        .burger:hover {
            color: skyblue;
        }
        .content {
            margin-left: 20px; /* Space for burger icon */
            padding: 20px;
        }
        .welcome-message {
            text-align: center;
            margin-top: 50px;
            font-size: 24px;
            animation: fadeIn 1s ease; /* Fade-in effect */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .sidebar.open {
            left: 0; /* Show sidebar */
        }
    </style>
</head>
<body>

    <!-- Burger Icon -->
    <div class="burger" onclick="toggleSidebar()">☰</div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h2>Leader Dashboard</h2>
        <a href="take_attendance.php">Take Attendance 📝</a>
        <a href="view_attendance.php">View Attendance 📊</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="welcome-message">
            <h1>Welcome To GRC-MLALAF Scholars Attendance System</h1>
        </div>
    </div>

    <!-- Script to toggle sidebar -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
