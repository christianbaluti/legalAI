<?php
// Include your database connection file
require 'include/config.php';

// Assuming you have started the session in your menu.php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['user_id'];

    // Query to fetch the caseid for the user
    $getUserCaseIDQuery = "SELECT caseid FROM cases WHERE clientid = '$user_id' OR lawyerid = '$user_id' LIMIT 1";
    $result = $conn->query($getUserCaseIDQuery);

    if ($result->num_rows > 0) {
        // Caseid found, retrieve and echo it
        $row = $result->fetch_assoc();
        $caseid = $row['caseid'];
        echo $caseid;
    } else {
        // Caseid not found for the user
        echo "Error: Caseid not found";
    }
} else {
    // User not logged in
    echo "Error: User not logged in";
}

// Close the database connection
$conn->close();
?>
