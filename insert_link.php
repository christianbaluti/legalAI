<?php
// Include your database connection file
require 'include/config.php';
session_start();
$user_id = $_SESSION['user_id'];

// Retrieve data from the AJAX request
$caseid = $_POST['caseid'];
$sender = $_POST['sender'];
$content = $_POST['link'];
$selectQuery = "SELECT lawyerid, clientid FROM cases WHERE caseid = '$caseid'";

$result = $conn->query($selectQuery);

if ($result->num_rows > 0) {
    // Fetch the record
    $row = $result->fetch_assoc();

    // Assign values to variables
    $lawyerid = $row['lawyerid'];
    $clientid = $row['clientid'];
    $senttime = date('Y-m-d H:i');
    $receivedtime = date('Y-m-d H:i');
    // Now $lawyerid and $clientid contain the values from the database
    // You can use them as needed
} else {
    // No record found for the given caseid
    echo "No record found for caseid: $caseid";
}


// You should perform necessary validation and sanitization of the input data here

// Insert the data into the database
$insertQuery = "INSERT INTO messages (content, caseid, clientid, lawyerid, type, senttime, receivedtime, sender) 
                VALUES ('$content', '$caseid', '$clientid', '$lawyerid', 'Link', '$senttime', '$receivedtime', '$sender')";

if ($conn->query($insertQuery) === TRUE) {
    // Successful insertion
    echo "Link inserted into the database successfully";
} else {
    // Error in insertion
    echo "Error inserting link into the database: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
