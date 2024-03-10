<?php
// Include your database connection file
require 'include/config.php';

// Check if the caseid is set in the POST data
if (isset($_POST['caseid'])) {
    $caseid = mysqli_real_escape_string($conn, $_POST['caseid']);

    // Query to check the audiocall column value for the specified caseid
    $checkAudioCallQuery = "SELECT audiocall FROM cases WHERE caseid = '$caseid'";
    $result = $conn->query($checkAudioCallQuery);

    if ($result->num_rows > 0) {
        // Case found, check the audiocall value
        $row = $result->fetch_assoc();
        $audiocallValue = $row['audiocall'];

        echo $audiocallValue;
    }
} else {
    // Caseid not provided in the POST data
    echo "Error: Caseid not provided";
}

// Close the database connection
$conn->close();
?>
