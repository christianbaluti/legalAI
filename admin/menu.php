<?php
session_start();
require '../include/config.php';

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php"); // Replace with your login page URL
    exit();
}

$userEmail = $_SESSION['user_email'];

// Fetch first name and last name from the database
$sql = "SELECT fname, lname FROM admin WHERE email = '$userEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Assuming there is only one record (unique email)
    $row = $result->fetch_assoc();
    $firstName = $row['fname'];
    $lastName = $row['lname'];
    $fullname = $firstName . ' ' . $lastName;
} else {
    // Handle the case where no record is found
    $firstName = 'Unknown';
    $lastName = 'Unknown';
}


// Count the number of users in the 'cases' table
$countCasesQuery = "SELECT COUNT(*) AS userCount FROM cases";
$result = $conn->query($countCasesQuery);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Assign the user count to a variable
    $cases = $row['userCount'];
} else {
    // Handle the case where the query fails
    $cases = 0;
    echo "Error: " . $countCasesQuery . "<br>" . $conn->error;
}


// Count the number of users in the 'cases_with_lawyer' table
$countCases_with_lawyerQuery = "SELECT COUNT(*) AS caseCount FROM cases WHERE lawyerid IS NOT NULL";
$result = $conn->query($countCases_with_lawyerQuery);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Assign the user count to a variable
    $cases_with_lawyer = $row['caseCount'];
} else {
    // Handle the case where the query fails
    $cases_with_lawyer = 0;
    echo "Error: " . $countCases_with_lawyerQuery . "<br>" . $conn->error;
}

// Count the number of users in the 'lawyers' table
$countlawyersQuery = "SELECT COUNT(*) AS userCount FROM lawyeruser";
$result = $conn->query($countlawyersQuery);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Assign the user count to a variable
    $lawyers = $row['userCount'];
} else {
    // Handle the case where the query fails
    $lawyers = 0;
    echo "Error: " . $countlawyersQuery . "<br>" . $conn->error;
}

// Count the number of lawyers in the 'lawyers' table where 'verified' column is 1
$countVerifiedLawyersQuery = "SELECT COUNT(*) AS verifiedLawyersCount FROM lawyeruser WHERE verified = 1";
$result = $conn->query($countVerifiedLawyersQuery);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Assign the verified lawyers count to a variable
    $verifiedLawyers = $row['verifiedLawyersCount'];
} else {
    // Handle the case where the query fails
    $verifiedLawyers = 0;
    echo "Error: " . $countVerifiedLawyersQuery . "<br>" . $conn->error;
}



// Count the number of users in the 'clients' table
$countclientsQuery = "SELECT COUNT(*) AS userCount FROM clientuser";
$result = $conn->query($countclientsQuery);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Assign the user count to a variable
    $clientss = $row['userCount'];
} else {
    // Handle the case where the query fails
    $clients = 0;
    echo "Error: " . $countclientsQuery . "<br>" . $conn->error;
}


// Count the number of users in the 'messages' table
$countmessagesQuery = "SELECT COUNT(*) AS userCount FROM messages";
$result = $conn->query($countmessagesQuery);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Assign the user count to a variable
    $messages = $row['userCount'];
} else {
    // Handle the case where the query fails
    $messages = 0;
    echo "Error: " . $countmessagesQuery . "<br>" . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="..assets/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-balance-scale-right"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>LawApp</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-table"></i><span>Cases</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="users.php"><i class="fas fa-table"></i><span>Clients</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="lawyers.php"><i class="fas fa-table"></i><span>Lawyers</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter"><?php echo $cases_with_lawyer; ?></span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts on cases</h6>
                                            <?php
                                            $sql = "SELECT * FROM cases WHERE lawyerid IS NOT NULL ORDER BY caseid DESC";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // Loop through the result set
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '
                                                    <a class="dropdown-item d-flex align-items-center" href="#"><div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">';
                                            echo $row['startdate'];
                                            echo "</span><p>";
                                            $idofcase = $row['caseid'];
                                            $idofuser = $row['clientid'];
                                            $idoflawyer = $row['lawyerid'];
                                            $sql2 = "SELECT * from clientuser where clientid = '$idofuser'";
                                            $result2 = $conn->query($sql2);
                                            $row2 = $result2->fetch_assoc();
                                            echo $row2['firstname'];
                                            echo ' has added ';
                                            $sql3 = "SELECT * FROM lawyeruser where lawyerid = '$idoflawyer'";
                                            $result3 = $conn->query($sql3);
                                            $row3 = $result3->fetch_assoc();
                                            echo $row3['firstname'];
                                            echo 'as a Lawyer to the case"';
                                            echo $row['name'] . '"';
                                            echo '</p>
                                            </div> </a>';
                                        }}
                                            ?>

                                        
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter"><?php echo $cases; ?></span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6>

                                          <?php
                                            $sql = "SELECT * FROM cases ORDER BY caseid DESC";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // Loop through the result set
                                                while ($row = $result->fetch_assoc()) {

                                            echo '<a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/user-png-33842.png">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>';

                                                $idofcase = $row['caseid'];
                                                $idofuser = $row['clientid'];

                                                $sql2 = "SELECT * from clientuser where clientid = '$idofuser'";
                                                $result2 = $conn->query($sql2);
                                                $row2 = $result2->fetch_assoc();

                                                echo $row2['firstname'];
                                                echo '</span></div>
                                                <p class="small text-gray-500 mb-0">has created a case at ';
                                                echo $row['startdate'];
                                                echo "</p></div></a>";
                                                }
                                            } else {
                                                // No data found
                                                echo "No data in the table.";
                                            }
                                        ?>

                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" href="logout.php" onclick="return confirm('Are you sure you want to log out?')">
                                    <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $userEmail; ?></span>
                                    <img class="border rounded-circle img-profile" src="assets/img/avatars/user-png-33842.png">
                                </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>