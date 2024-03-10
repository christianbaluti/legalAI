<?php
require 'include/config.php';

// Function to insert data into the database
function insertData($content, $starttime, $finishtime, $clientid, $lawyerid, $table_name, $conn) {
    $content = $conn->real_escape_string($content);
    $starttime = $conn->real_escape_string($starttime);
    $finishtime = $conn->real_escape_string($finishtime);
    $clientid = intval($clientid);
    $lawyerid = intval($lawyerid);
    $table_name = $conn->real_escape_string($table_name);
    
    $sql = "INSERT INTO $airequests (content, starttime, finishtime, clientid, lawyerid) VALUES ('$content', '$starttime', '$finishtime', $clientid, $lawyerid)";
    if ($conn->query($sql) === TRUE) {
        return "New record created successfully";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get data from the AJAX request
$data = json_decode(file_get_contents("php://input"), true);

$content = $data['content'];
$starttime = $data['starttime'];
$finishtime = $data['finishtime'];
$clientid = $data['clientid'];
$lawyerid = $data['lawyerid'];
$table_name = $data['table_name'];

// Insert data into the database
echo insertData($content, $starttime, $finishtime, $clientid, $lawyerid, $table_name, $conn);

$conn->close();
?>
