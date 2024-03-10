<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate form data
    $fname = htmlspecialchars($_POST["fname"]);
    $lname = htmlspecialchars($_POST["lname"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $password_repeat = htmlspecialchars($_POST["password_repeat"]);

    // Simple password validation
    if ($password !== $password_repeat) {
        echo "Error: Passwords do not match.";
        exit();
    }

    require '../include/config.php';

    // Check if the email already exists using prepared statement
    $check_email_query = "SELECT id FROM admin WHERE email=?";
    $stmt = $conn->prepare($check_email_query);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Email already exists, print an error
            echo "Error: Email already exists. Please choose a different email.";
            exit();
        }

        $stmt->close();
    } else {
        echo "Error: Database error. Please try again later.";
        exit();
    }

    // SQL query to insert data into the 'admin' table using prepared statement
    $insert_query = "INSERT INTO admin (fname, lname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);

    if ($stmt) {
        // Hash the password using password_hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bind_param("ssss", $fname, $lname, $email, $password);

        if ($stmt->execute()) {
            // Registration successful, create a session
            $_SESSION['user_email'] = $email;

            // Redirect to the index.html page
            header("Location: index.php");
            exit();
        } else {
            echo "Error: Registration failed. Please try again.";
        }

        $stmt->close();
    } else {
        echo "Error: Database error. Please try again later.";
    }

    // Close the database connection
    $conn->close();
}
?>
