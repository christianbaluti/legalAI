<?php
// Retrieve caseid and lawyerid from the POST request
$caseid = isset($_POST['caseid']) ? $_POST['caseid'] : null;
$lawyerid = isset($_POST['lawyerid']) ? $_POST['lawyerid'] : null;

// Check if both caseid and lawyerid are provided
if ($caseid !== null && $lawyerid !== null) {
    // Connect to your database (replace these with your actual database credentials)
    require 'include/config.php';

    // Perform the database query to update the 'lawyerid' for the specified 'caseid'
    $updateQuery = "UPDATE cases SET lawyerid = '$lawyerid' WHERE caseid = '$caseid'";
    $result = $conn->query($updateQuery);

    if ($result) {
        // If the update is successful, you can send a success response
        echo "Lawyer added successfully to the case.";
    } else {
        // If there is an error in the database query, send an error response
        echo "Error updating database: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If caseid or lawyerid is missing, send an error response
    echo "Error: Case ID or Lawyer ID is missing.";
}
?>
