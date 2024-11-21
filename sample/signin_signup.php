<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (isset($_POST['register'])) {
        // Register a new user
        $hashed_password = md5($password);
        $check_query = "SELECT * FROM user_account WHERE username = '$username'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<p style='color: red;'>Username already exists.</p>";
        } else {
            $query = "INSERT INTO user_account (username, password) VALUES ('$username', '$hashed_password')";
            if (mysqli_query($conn, $query)) {
                echo "<p style='color: green;'>Registration successful. Please log in.</p>";
            } else {
                echo "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    } elseif (isset($_POST['login'])) {
        // Login user
        $hashed_password = md5($password);
        $query = "SELECT * FROM user_account WHERE username = '$username' AND password = '$hashed_password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user['id'];
            header('Location: itemshow.php');
            exit();
        } else {
            echo "<p style='color: red;'>Invalid username or password.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px 40px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #555555;
            margin-bottom: 8px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .separator {
            margin: 20px 0;
            text-align: center;
            position: relative;
        }

        .separator::before,
        .separator::after {
            content: '';
            height: 1px;
            width: 45%;
            background: #cccccc;
            position: absolute;
            top: 50%;
        }

        .separator::before {
            left: 0;
        }

        .separator::after {
            right: 0;
        }

        .separator span {
            background: #ffffff;
            padding: 0 10px;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="register">Register</button>
        </form>

        <div class="separator"><span>OR</span></div>

        <h1>Login</h1>
        <form method="POST" action="">
            <label for="login-username">Username</label>
            <input type="text" id="login-username" name="username" required>
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>