<?php
session_start();
require "conn.php";

if (isset($_GET['type']) && $_GET['type'] == "admin") {
    // Admin login logic
} else if (isset($_GET['type']) && $_GET['type'] == "leader") {
    // Leader login logic
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GRC-MLALAF Scholar Attendance System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #fff;
            color: #333;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .text-primary {
            color: #800000 !important;
        }
        .form-control {
            height: calc(2.5em + 0.75rem + 2px);
            margin-bottom: 1rem;
        }
        .show-password {
            position: relative;
        }
        .show-password input[type="password"] {
            padding-right: 40px;
        }
        .show-password .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .header-title {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo {
            height: 30px; /* Adjust height as needed */
            margin-left: 10px; /* Space between title and logo */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-card">
            <h3 class="header-title text-primary text-center">
                GRC-MLALAF Scholar Attendance System
                <img src="path/to/grc_logo.png" class="logo" alt="GRC Logo">
                <img src="path/to/mlalaf_logo.png" class="logo" alt="MLALAF Logo">
            </h3>
            <h4 class="text-center">Sign In</h4>
            <div class="my-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onchange="myFunction()" type="radio" checked name="inlineRadioOptions" id="inlineRadio1" value="admin">
                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onchange="myFunction()" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="leader">
                    <label class="form-check-label" for="inlineRadio2">Leader</label>
                </div>
            </div>

            <!-- Admin login Form -->
            <form id="form_admin" action="login.php?type=admin" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name123" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-4 show-password">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('floatingPassword')"></i>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
            </form>

            <!-- Leader login Form -->
            <form id="form_leader" action="login.php?type=leader" method="post" hidden>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInputLeader" name="leaderid" placeholder="name123" required>
                    <label for="floatingInputLeader">Leader ID</label>
                </div>
                <div class="form-floating mb-4 show-password">
                    <input type="password" class="form-control" id="floatingPasswordLeader" name="password" placeholder="Password" required>
                    <label for="floatingPasswordLeader">Password</label>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('floatingPasswordLeader')"></i>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
            </form>

            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>
    </div>

    <script>
        function myFunction() {
            const adminForm = document.getElementById('form_admin');
            const leaderForm = document.getElementById('form_leader');
            const selectedValue = document.querySelector('input[name="inlineRadioOptions"]:checked').value;

            adminForm.hidden = selectedValue !== 'admin';
            leaderForm.hidden = selectedValue !== 'leader';
        }

        function togglePassword(id) {
            const passwordField = document.getElementById(id);
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
        }
    </script>
</body>

</html>
