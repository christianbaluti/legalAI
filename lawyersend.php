<?php
// Ensure that the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $content = $_POST['content'];
    $text = $_POST['text'];
    $senttime = $_POST['senttime'];
    $sender = $_POST['lawyersender'];
    $caseid = $_POST['caseid'];
    $clientid = $_POST['clientid'];
    $lawyerid = $_POST['lawyerid'];

    // Perform necessary processing or database operations here
    // For example, you can insert the data into a database table

    require 'include/config.php';

    // Example: Insert data into a messages table
    $sql = "INSERT INTO messages (content, type, receivedtime, senttime, clientid, lawyerid, sender, caseid)
            VALUES ('$content', '$text', '$senttime', '$senttime', '$clientid', '$lawyerid', '$sender', '$caseid')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            window.location.href = 'chat_lawyer.php?caseid={$caseid}#last';
          </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the form is not submitted
    echo "Form not submitted.";
}
?>
