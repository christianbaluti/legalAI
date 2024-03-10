<?php
require 'include/config.php';

// Get the caseid from the AJAX request
$caseid = isset($_GET['caseid']) ? $_GET['caseid'] : 0;

// Fetch data from the database based on the caseid
$sql = "SELECT lawyerid FROM cases WHERE caseid = $caseid"; // Replace "your_table_name" with your actual table name
$result = $conn->query($sql);

if ($result==null) {
    // code...
    echo json_encode($result);
} else {
    echo json_encode(array('data' => 'nothing'));
}

/*if ($result->num_rows > 0) {
    // Output data in JSON format (you can customize this based on your response format)
    $row = $result->fetch_assoc();
    $response = array('data' => $row['column_name']); // Replace "column_name" with the actual column you want to display
    echo json_encode($response);
} else {
    // Handle the case where no data is found
    echo json_encode(array('data' => 'No data found'));
}*/

// Close connection
$conn->close();
?>
