<?php
require_once '../include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if lawyerid and action are set
    if (isset($_POST['lawyerid']) && isset($_POST['action'])) {
        $lawyerId = $_POST['lawyerid'];
        $action = $_POST['action'];

        // Update verification status based on action
        if ($action === 'Verify') {
            $verified = 1;
        } elseif ($action === 'Unverify') {
            $verified = 0;
        } else {
            echo 'Invalid action';
            exit;
        }

        // Update verification status in the database
        $sql = "UPDATE lawyeruser SET verified = '$verified' WHERE lawyerid = '$lawyerId'";
        if ($conn->query($sql) === TRUE) {
            // Return the new verification status
            echo $verified === 1 ? 'verified' : 'unverified';
        } else {
            echo 'Error updating verification status: ' . $conn->error;
        }
    } else {
        echo 'Invalid request';
    }
} else {
    echo 'Invalid request method';
}

$conn->close();
?>
