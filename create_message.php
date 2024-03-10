<?php
// Include your database connection file
require 'include/config.php';

// Retrieve data from the AJAX request
$caseid = $_POST['caseid'];
$content = $_POST['message'];
$senttime = $_POST['senttime'];
$receivedtime = $_POST['receivedtime'];
$sender = $_POST['sender'];
$clientid = $_POST['clientid'];
$lawyerid = $_POST['lawyerid'];

// You should perform necessary validation and sanitization of the input data here

// Insert the data into the messages table
$insertQuery = "INSERT INTO messages (caseid, content, senttime, receivedtime, sender, clientid, lawyerid) 
                VALUES ('$caseid', '$content', '$senttime', '$receivedtime', '$sender', '$clientid', '$lawyerid')";

if ($conn->query($insertQuery) === TRUE) {
    // Successful insertion
    echo "Message created successfully";
} else {
    // Error in insertion
    echo "Error creating message: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
