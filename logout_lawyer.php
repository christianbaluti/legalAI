<?php
session_start(); // Start or resume the session

// Destroy the session
session_destroy();

// Optionally, unset specific session variables if needed
unset($_SESSION['user_id']);
unset($_SESSION['user_email']);

// Redirect to a different page (e.g., home page or a 'Logged Out' page)
header("Location: index_lawyer.php"); // Replace "index.php" with the page you want to redirect to
exit;
?>
