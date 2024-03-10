<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the login form submission
    if (isset($_POST['email']) && isset($_POST['password'])) {
        require '../include/config.php';

        // Sanitize user input
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        echo $email;
        echo $password;

        // Query your database to find the user based on their email using prepared statement
        $sql = "SELECT id, email, password FROM admin WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                // User found
                mysqli_stmt_bind_result($stmt, $user_id, $user_email, $stored_password);
                mysqli_stmt_fetch($stmt);

                if ($password === $stored_password) {
                    // Password is correct; create a session
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $user_email;

                    // Redirect to a welcome or dashboard page
                    header("Location: index.php"); // Replace 'index.php' with the page you want to redirect to after login
                    exit();
                } else {
                    $error = "Incorrect password. Please try again.";
                    echo $error;
                }
            } else {
                $error = "User not found. Please register or check your email.";
                echo $error;
            }

            mysqli_stmt_close($stmt);
        } else {
            $error = "Database error. Please try again later.";
            echo $error;
        }

        // Close the database connection
        mysqli_close($conn);
    }
}
?>
