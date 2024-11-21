<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password'])); // Use MD5 to hash the password

    // Query to check credentials
    $query = "SELECT * FROM user_account WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id']; // Save user ID in session
        header('Location: itemshow.php'); // Redirect to items page
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
