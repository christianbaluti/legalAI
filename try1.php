<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lawapp";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data based on the provided caseid
$caseid = 4;//$_GET['caseid']; // Assuming the caseid is passed as a GET parameter

$sql = "SELECT * FROM cases WHERE caseid = " . $caseid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Close the database connection
    $conn->close();

    //if there is no lawyer to the case
    if ($row['lawyerid']==null) {
        $data = '<head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
                <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
                <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
                <link rel="stylesheet" href="assets/css/example1.css">
                <link rel="stylesheet" href="assets/css/untitled.css">
                <link rel="stylesheet" href="assets/css/w3.css">
                <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
            </head>'
        '<div class="w3-container">
                <div class="w3-bar w3-top" style="background: white;">
                  <a href="#" class="w3-bar-item w3-button">No Lawyer added</a>
                  <a href="#" class="w3-bar-item w3-button w3-right" style="margin-right: 10%!important;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone-fill">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                        </path>
                    </svg>
                  </a>
                  <a href="#" class="w3-bar-item w3-button w3-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-camera-video">
                        <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z">
                        </path>
                    </svg>
                  </a>
          
                </div>
            </div>';
            echo json_encode($data);
        // code...
    } else {
            echo json_encode($row);    
    }
    echo '<br>';


    // Return data in JSON format
    //echo json_encode($row);
} else {
    // Case not found
    // You can customize the response based on your requirements
    echo json_encode(['error' => 'Case not found']);
}
?>
