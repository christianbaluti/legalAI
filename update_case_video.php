<?php
// Include your database connection file
require 'include/config.php';

// Check if the caseid is set in the POST data
if (isset($_POST['caseid'])) {
    // Validate and sanitize the caseid
    $caseid = mysqli_real_escape_string($conn, $_POST['caseid']);

    // Update the database
    $updateQuery = "UPDATE cases SET videocall = 1 WHERE caseid = '$caseid'";

    if ($conn->query($updateQuery) === TRUE) {
        // The update was successful
        echo "making the audio call";
    } else {
        // There was an error with the update
        echo "Error making the call: " . $conn->error;
    }
} else {
    // Caseid not provided in the POST data
    echo "Error: Caseid not provided";
}

// Close the database connection
$conn->close();
?>
