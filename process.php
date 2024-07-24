<?php
include 'database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check if form was submitted
if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Set timezone
    date_default_timezone_set('America/New_York');
    $time = date('H:i:s', time());

    // Validate input
    if (!isset($user) || !isset($message) || $message == '') {
        $error = "Please fill in your name and a message";
        header("Location: index.php?error=" . urlencode($error));
        exit(); // Ensure script stops executing after redirect
    } else {
        $query = "INSERT INTO shouts (user, message, time)
                  VALUES ('$user', '$message', '$time')";

        // If it does NOT insert, then die and read error
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
?>