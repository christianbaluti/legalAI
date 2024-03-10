<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Home - LAWAPP</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/w3.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
            /* CSS for lawyer table */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* CSS for more button */
    .more-btn {
        padding: 4px 8px;
    }

    /* CSS for detailed information */
    .hidden-row {
        display: none;
    }

    .more-info {
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        max-width: 500px;
        margin: 10px auto;
    }

        .my-message-box {
          border: 1px solid #ddd;
          border-radius: 5px;
          padding: 15px;
          margin: 10px;
          width: 100%;
          background-color: white;
          box-shadow: 1px solid black;
        }
          .hidden {
            display: none;
          }

        #last {
            position: relative;
            bottom: 0;
        }

        #my-message {
          width: 70%;
          font-size: 14px;
          resize: none;
        }

        #my-attachment {
          width: 10%;
        }

        #my-send-button {
          background-color: #007bff;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          }

        #my-send-button:hover {
          background-color: #0067cc;
        }

        .my-hero-image {
              background: url(1.png) no-repeat center; 
              background-size: cover;
              height: 500px;
              position: relative;
            }

            .my-hero-text {
              text-align: center;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              color: black;
            }
        .section {
        display: none;
        }
        .visible {
            display: block;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        #AIconversation {
            flex: 1;
            padding: 10px;
            margin-bottom: 60px; /* Adjusted to accommodate the fixed input required field and button */
        }

        #AIinput-required container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0px -2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #AIuserInput required {
            flex: 1;
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-right: 3px;
        }

        #AIsendButton {
            background-color: #5a88e5;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #AIsendButton:hover {
            background-color: teal;
        }
        table, th, td, tr, thead, tbody, tfoot {
          border: none!important;
          border-collapse: collapse;
        }
        #conversation {
            margin-bottom: 15%;
            padding: 10px;
            overflow-y: auto; /* Change to auto for scrollbar when needed */
        }
        .message {
            margin-bottom: 10px;
        }
        .userMessage {
            text-align: right;
            color: blue;
        }
        .botMessage {
            text-align: left;
            color: green;
        }
        #questionForm {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: #f8f9fa; /* Light gray background color */
            border-top: 1px solid #ccc;
        }
    </style>
    <script type="text/javascript" src="main_script.js"></script>
</head>

<body>
        <!--start of nav bar-->
        <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home.php"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-app-indicator">
                        <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"></path>
                        <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                    </svg></span><span>LAWAPP</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                </ul>
                <p>
                <?php 
                // Check if the user is logged in
                    if (isset($_SESSION['clientid'])) {
                        $user_email = $_SESSION['clientemail'];
                        $islogedin = 1;
                        echo $user_email;
                        echo ' - <span> <a style="text-decoration: none!important; color: black;font-weight: bold;" href="logout.php"> Log Out</a> </span>';
                    }
                    else{
                        echo '<script type="text/javascript">
                                 window.location.href = "logout.php";
                             </script>';
                    } ?>
                 </p>
            </div>
        </div>
    </nav><!--end of nav bar-->

    <?php 
        require 'include/config.php';
        if (!isset($_SESSION['clientid'])){
            header("Location: index.php"); 
        }
     ?>
     
     <script type="text/javascript">
         function openService(theTabName) {
          if (theTabName === 'aichat') {
            document.querySelector('.my-hero-image').style.display = 'none';
            document.getElementById('aichat').style.display = 'block';
            document.getElementById('willwriter').style.display = 'none';
          } else if (theTabName === 'willwriter') {
            document.querySelector('.my-hero-image').style.display = 'none';
            document.getElementById('aichat').style.display = 'none';
            document.getElementById('willwriter').style.display = 'block';
          }
        }

     </script>
    <section style="background-color: white;"><!--start of main section of everything-->

    <div class="container" style="margin-top:20px; top:20px; position: sticky!important; z-index: 1; background-color: white!important;"><!--start of main links head-->
        <div class="text-center" style="float: left; width: 33%;margin-top: 10px;font-weight:bold;font-size: 15px;">
            <span id="open-cases">
                <button class="tablink" style="background: none; border: none; border-radius: 20px;padding-left: 20px; padding-right: 20px; color: black;" onclick="openLink(event, 'cases');"> 
                    Cases
                </button>
            </span>
        </div>
        <div class="text-center" style="float: left; width: 33%;margin-top: 10px;font-weight:bold;font-size: 15px;">
            <span id="open-cases">
                <button class="tablink" style="border: none; border-radius: 20px;padding-left: 20px; padding-right: 20px; color: black; background: none" onclick="openLink(event, 'lawyers');"> 
                    Lawyers
                </button>
            </span>
        </div>
        <div class="text-center" style="float: left; width: 33%;margin-top: 10px;font-weight:bold;font-size: 15px;">
            <span id="open-cases">
                <button class="tablink" style="background: none; border: none; border-radius: 20px;padding-left: 20px; padding-right: 20px; color: black;" onclick="openLink(event, 'ai');"> 
                    More Services
                </button>
            </span>
        </div>

    </div><!--end of main links head-->


    <br><br>


    <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-center theMobilePhone center w3-card-4 w3-animate-top"  style="border-radius: 30px;background-image: url('3.jpg'); background-repeat: no-repeat; background-attachment: fixed; width: 90%!important;margin: auto!important;" class="theMobilePhone">
            <br>
                <div class="row d-flex justify-content-center">
                <div class="">
                    <div>
                        <form class="p-3 p-xl-4" method="post" action="include/case.php">
                            <h2 class="text-center" style="font-weight: bold;"> Add Case</h2> <br>
                            <div class="mb-3"><input required class="form-control" type="text" id="name-1" name="caseName" placeholder="Name your Case"></div>
                            <div class="mb-3"><textarea required class="form-control" id="message-1" name="caseDescription" rows="6" placeholder="Put in a description for your case please"></textarea></div>
                            <div><button style="border-radius: 50px; color: white; background: #ff0f17; border: none; width: 120px; margin-left: 5px; padding: 5px 15px;" class="w3-left shadow" type="reset" onclick="document.getElementById('id02').style.display='none'">Cancel </button></div>
                            <div><button style="border-radius: 50px; color: white; background: #497fe9; border: none; width: 120px; margin-right: 5px; padding: 5px 15px;" class="shadow w3-right" type="submit">Add</button></div>
                            <p style="margin: 10px!important;color: white!important;">......</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
           
    <!--case section-->
    <div id="cases" class=" casesahhdd myLink" style="margin-left: 8%!important;margin-right: 8%!important;margin-top: 20px!important;padding-bottom: 100px; background-color: #f1f1f1; border-radius: 30px;">


        <div id="hidethis" class="w3-modal">
            <div class="w3-modal-content w3-center theMobilePhone center w3-card-4 w3-animate-top"  style="border-radius: 30px;background-image: url('3.jpg'); background-repeat: no-repeat; background-attachment: fixed; width: 90%!important;margin: auto!important;" class="theMobilePhone">
            <br>
                <div class="row d-flex justify-content-center">
                    <div class="">
                        <div>
                            <form class="p-3 p-xl-4" method="post" action="include/case.php">
                                <h2 class="text-center" style="font-weight: bold;"> Add Case</h2> <br>
                                <div class="mb-3"><input required class="form-control" type="text" id="name-1" name="caseName" placeholder="Name your Case"></div>
                                <div class="mb-3"><textarea required class="form-control" id="message-1" name="caseDescription" rows="6" placeholder="Put in a description for your case please"></textarea></div>
                                <div><button style="border-radius: 50px; color: white; background: #ff0f17; border: none; width: 120px; margin-left: 5px; padding: 5px 15px;" class="w3-left shadow" type="reset" onclick="document.getElementById('hidethis').style.display='none'">Cancel </button></div>
                                <div><button style="border-radius: 50px; color: white; background: #497fe9; border: none; width: 120px; margin-right: 5px; padding: 5px 15px;" class="shadow w3-right" type="submit">Add</button></div>
                                <p style="margin: 10px!important;color: white!important;">......</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $user_id = $_SESSION['clientid'];
        $sql3 = "SELECT COUNT(*) as count FROM cases WHERE clientid = '$user_id'";

        $result3 = mysqli_query($conn, $sql3);

        if ($result3) {
            $row3 = mysqli_fetch_assoc($result3);
            $caseCount = $row3['count'];

            // Check if there are cases for the client
            if ($caseCount > 0) {
                // Display Div B because there are cases
                echo " <div class='case-available' id='list-of-cases'>";
                echo '<br> <img class="smallbutton" style="cursor: pointer; width: 12%;margin-bottom: 5px; margin-left: 5%;" src="2.png"  onclick="showingFunction()">';
                    $user_id = $_SESSION['clientid'];
                    $sql2 = "SELECT * FROM cases WHERE clientid = '$user_id' ORDER BY caseid DESC";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_assoc($result2)) {   
                        // Split the description into words
                        $descriptionWords = explode(' ', $row['description']);
                        // Select the first 10 words and join them back into a string
                        $limitedDescription = implode(' ', array_slice($descriptionWords, 0, 10));
                        // Add ellipsis if there are more words
                        if (count($descriptionWords) > 10) {
                            $limitedDescription .= '...';
                        }
                        
                        // Split the name into words
                        $nameWords = explode(' ', $row['name']);
                        // Select the first 10 words and join them back into a string
                        $limitedName = implode(' ', array_slice($nameWords, 0, 10));
                        // Add ellipsis if there are more words
                        if (count($nameWords) > 10) {
                            $limitedName .= '...';
                        }

                        echo '<div style="background-color: white; border-radius: 10px; width: 90%; margin: auto;box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);">
                                    <h4 style="margin-left: 2%;">
                                    <button style="border: none; background: none;text-align: left; color: #5a88e5" onclick="openchat(' . $row['caseid'] . ')">';
                        echo $limitedName . '</h4>
                                    <p style="margin-left: 3%; margin-top: -10px!important;">';
                        echo $limitedDescription . '</p>
                                </button>
                              </div>';
                    }
                    echo '</div>';

            } else {
                // Display Div A because there are no cases
                echo '<div class="' . 'case-not-available text-center"' .'>
                    <img src="1.png" style="width: 100%">
                    <p class="theP" style="text-align: center;">
                        you currently have no legal case <br>
                        if you want to add a case <br>
                        click the button bellow
                    </p>
                    <img class="theButton kaButton" style="cursor: pointer;" src="2.png"  onclick="showingFunction()">
                    </div>';
            }
        } else {
            // Handle any errors in the SQL query
            echo "Error: " . mysqli_error($conn);
        }
        ?>
        <script src="main_script.js"></script>
    </div>
    <!--lawyer section-->
    <div id="lawyers" class="text-centerh casesadd myLink" style="margin-left: 50px!important;margin-right: 50px!important;margin-top: 20px;padding-top: 10px!important; background-color: #fafafa; border-radius: 30px;">

    <div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Lawyer Image</th>
                            <th>Lawyer Name</th>
                            <th>Specialization</th>
                            <th></th> <!-- Empty column for "more" button -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM lawyeruser WHERE verified='1'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Get lawyer details
                                    $lawyerid = $row['lawyerid'];
                                    $lawyername = $row['firstname'];
                                    $specialization = $row['specialization'];
                                    $img = $row['photo'];
                                    echo '<tr>';
                                    echo '<td><img src="' . $img . '" class="rounded-circle" width="50" height="50"></td>';
                                    echo '<td>' . $lawyername . '</td>';
                                    echo '<td>' . $specialization . '</td>';
                                    echo '<td><button class="btn btn-primary btn-sm more-btn">More</button></td>';
                                    echo '</tr>';
                                    
                                    // Hidden row with detailed lawyer information
                                    echo '<tr class="hidden-row">';
                                    echo '<td colspan="5" class="more-info">';
                                    // Output detailed lawyer information here
                                    echo '<div class="detailed-info">';
                                    echo '<p><strong>Phone Number:</strong> ' . $row['phone'] . '</p>';
                                    echo '<p><strong>Gender:</strong> ' . $row['gender'] . '</p>';
                                    echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
                                    echo '<p><strong>Portfolio:</strong> <a href="' . $row['portfolio'] . '" target="_blank">' . $row['portfolio'] . '</a></p>';
                                    echo '<p><strong>Years of Experience:</strong> ' . $row['yoe'] . '</p>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                            $conn->close();
                        ?>
                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

    </div><!-- end of lawyer section-->


    <!--AI doc section-->
    <div id="ai" class=" casesahhdd myLink" style="padding-bottom: 100px; border-radius: 30px; margin-left: 8% !important; margin-right: 8% !important; margin-top: 20px !important; display: none;">
        <div class="case-available" id="list-of-cases"><br>
            <div style="background-color: white; border-radius: 10px; width: 90%; margin: auto;box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);" id="servicesHere">
                <p style="margin-left: 3%;margin-right: 3%; margin-top: 10px!important;padding-top: 20px; text-align: justify;">
                    <span style="font-weight: bold;">You can be asking our AI for any legal help</span> <br>
                <p>
                  In all the Acts of the Republic of Malawi  
                </p>
                </p>
                <div style="display: flex; justify-content: space-between; padding: 0 10px;">
                    <button style="border: none; padding: 5px; width: 100px; color: white; background-color: #5a88e5; border-radius: 100px;" onclick="openService('theAIchat');">AI Chat</button>
                    <button style="border: none; padding: 5px; width: 100px; color: white; background-color: #5a88e5; border-radius: 100px;" onclick="openService('willwriter');">Drafter</button>
                </div>
                <br>
            </div>    
    </div><!--Inside the beauty thing-->

        <div id="theAIchat" class="hidden" style="bottom: 0; left: 0; width: 100%; padding: 10px; align-items: center;">
            <div class="container">
                <div id="conversation" class="mt-3">
                    <!-- Conversation messages will be appended here -->
                </div>
            </div>

            <!-- Loading indicator -->
            <div id="loadingIndicator" class="d-none justify-content-center align-items-center" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>


            <form id="questionForm" class="mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="userQuestion" placeholder="Type your question...">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Ask</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    

    

    <div id="willwriter" class="hidden" style="color: black;">
        <form id="willForm" method="post" action="generate_pdf.php">

            <!-- Personal Information Section -->
            <div id="personalInfo" class="section visible">
                <h2>Personal Information</h2>
                <div class="row">
                    <div class="col">
                        <label for="fullName" class="col-form-label">Full Name:</label>
                        <input required type="text" id="fullName" name="fullName" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="address" class="col-form-label">Address:</label>
                        <input required type="text" id="address" name="address" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="dob" class="col-form-label">Date of Birth:</label>
                        <input required type="date" id="dob" name="dob" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="gender" class="col-form-label">Gender:</label>
                        <select id="gender" name="gender" class="form-select">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="maritalStatus" class="col-form-label">Marital Status:</label>
                        <select id="maritalStatus" name="maritalStatus" class="form-select">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="nationality" class="col-form-label">Country:</label>
                        <input required type="text" id="nationality" name="nationality" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="occupation" class="col-form-label">Occupation:</label>
                        <input required type="text" id="occupation" name="occupation" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('personalInfo')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <!-- Executor Section -->
            <div id="executorSection" class="section">
                <h2>Executor(s)</h2>
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                    <div class="col">
                        <label for="executorName" class="col-form-label">Name of Executor(s):</label>
                        <input required type="text" id="executorName" name="executorName" class="form-control" style="width: 95%;">
                    </div>
                    <div class="col">
                        <label for="relationship" class="col-form-label">Relationship to the Testator:</label>
                        <input required type="text" id="relationship" name="relationship" class="form-control" style="width: 95%;">
                    </div>
                    <div class="col">
                        <label for="executorAddress" class="col-form-label">Address:</label>
                        <input required type="text" id="executorAddress" name="executorAddress" class="form-control" style="width: 95%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('executorSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <!-- Beneficiaries Section -->
            <div id="beneficiariesSection" class="section">
                <h2>Beneficiaries</h2>
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                    <div class="col">
                        <label for="beneficiaryName" class="col-form-label">Full Name(s) of Beneficiary(ies):</label>
                        <input required type="text" id="beneficiaryName" name="beneficiaryName" class="form-control" style="width: 95%;">
                    </div>
                    <div class="col">
                        <label for="relationshipToTestator" class="col-form-label">Relationship to the Testator:</label>
                        <input required type="text" id="relationshipToTestator" name="relationshipToTestator" class="form-control" style="width: 95%;">
                    </div>
                    <div class="col">
                        <label for="beneficiaryAddress" class="col-form-label">Address:</label>
                        <input required type="text" id="beneficiaryAddress" name="beneficiaryAddress" class="form-control" style="width: 95%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="percentageBequests" class="col-form-label">Percentage of Estate or Specific Bequests:</label>
                        <input required type="text" id="percentageBequests" name="percentageBequests" class="form-control" style="width: 95%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('beneficiariesSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <!-- Guardians Section -->
            <div id="guardiansSection" class="section">
                <h2>Guardian(s) for Minor Children</h2>
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                    <div class="col">
                        <label for="guardianName" class="col-form-label">Name of Guardian(s):</label>
                        <input required id="guardianName" name="guardianName" class="form-control" type="text" placeholder="Enter Guardian Name" style="width: 95%;">
                    </div>
                    <div class="col">
                        <label for="relationship" class="col-form-label">Relationship to the Testator:</label>
                        <input required id="guardianRelationship" name="guardianRelationship" class="form-control" type="text" placeholder="Enter Relationship" style="width: 95%;">
                    </div>
                    <div class="col">
                        <label for="guardianAddress" class="col-form-label">Address:</label>
                        <input required id="guardianAddress" name="guardianAddress" class="form-control" type="text" placeholder="Enter Address" style="width: 95%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('guardiansSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <!-- Distribution of Assets Section -->
            <div id="distributionOfAssetsSection" class="section">
                <h2>Distribution of Assets</h2>
                <div id="beneficiariesContainer" class="row">
                    <!-- JavaScript will generate beneficiary input required fields here -->
                </div>
                <div class="row">
                    <div class="col">
                        <label for="specificBequests" class="col-form-label">Specific Bequests:</label>
                        <textarea required id="specificBequests" name="specificBequests" class="form-control" placeholder="Enter specific bequests" style="width: 95%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="remainingAssets" class="col-form-label">Division of Remaining Assets:</label>
                        <textarea required id="remainingAssets" name="remainingAssets" class="form-control" placeholder="Enter instructions for remaining assets" style="width: 95%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('distributionOfAssetsSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <!-- Funeral Arrangements Section -->
            <div id="funeralArrangementsSection" class="section">
                <h2>Funeral Arrangements</h2>
                <div class="row">
                    <div class="col">
                        <label for="funeralInstructions" class="col-form-label">Instructions for funeral arrangements, burial, cremation, etc.:</label>
                        <textarea required id="funeralInstructions" name="funeralInstructions" class="form-control" placeholder="Enter funeral arrangements" style="width: 95%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('funeralArrangementsSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <!-- Revocation Clause Section -->
            <div id="revocationClauseSection" class="section">
                <h2>Revocation Clause</h2>
                <div class="row">
                    <div class="col">
                        <label for="revocationStatement" class="col-form-label">Statement revoking any previous wills or codicils:</label>
                        <textarea required id="revocationStatement" name="revocationStatement" class="form-control" placeholder="Enter revocation statement" style="width: 95%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('revocationClauseSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <!-- Witnesses Section -->
            <div id="witnessesSection" class="section">
                <h2>Witnesses</h2>
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                    <div class="col">
                        <label for="witnessName" class="col-form-label">Name of Witness:</label>
                        <input required id="witnessName" name="witnessName" class="form-control" type="text" placeholder="Enter Witness Name" style="width: 95%;">
                    </div>
                    <div class="col">
                        <label for="witnessAddress" class="col-form-label">Address:</label>
                        <input required id="witnessAddress" name="witnessAddress" class="form-control" type="text" placeholder="Enter Address" style="width: 95%;">
                    </div><!--
                    <div class="col">
                        <label for="witnessSignature" class="col-form-label">Signature of Witness(es):</label>
                        <input required id="witnessSignature" name="witnessSignature" class="form-control" type="file" accept="image/*" placeholder="Enter Witness Signature" style="width: 95%;">
                    </div>-->
                </div><br>
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                    <div class="col">
                        <label for="witnessName" class="col-form-label">Name of Witness:</label>
                        <input required id="witnessName" name="witnessName2" class="form-control" type="text" placeholder="Enter Witness Name" style="width: 95%;">
                    </div>
                    <div class="col">
                        <label for="witnessAddress" class="col-form-label">Address:</label>
                        <input required id="witnessAddress" name="witnessAddress2" class="form-control" type="text" placeholder="Enter Address" style="width: 95%;">
                    </div><!--
                    <div class="col">
                        <label for="witnessSignature" class="col-form-label">Signature of Witness(es):</label>
                        <input required id="witnessSignature" name="witnessSignature2" class="form-control" type="file" accept="image/*" placeholder="Enter Witness Signature" style="width: 95%;">
                    </div>-->
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('witnessesSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>


            <div id="debtsLiabilitiesSection" class="section">
                <h2>Debts and Liabilities</h2>
                <div class="row">
                    <div class="col">
                        <label for="debtInstructions" class="col-form-label">Instructions for Handling Debts:</label>
                        <textarea required id="debtInstructions" name="debtInstructions" class="form-control" placeholder="Enter Instructions" style="width: 95%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('debtsLiabilitiesSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>


            <div id="contingencyPlansSection" class="section">
                <h2>Contingency Plans</h2>
                <div class="row">
                    <div class="col">
                        <label for="contingencyPlansInstructions" class="col-form-label">Instructions for Contingency Plans:</label>
                        <textarea required id="contingencyPlansInstructions" name="contingencyPlansInstructions" class="form-control" placeholder="Enter Instructions" style="width: 95%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('contingencyPlansSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>


            <div id="powersOfExecutorSection" class="section">
                <h2>Powers of the Executor</h2>
                <div class="row">
                    <div class="col">
                        <label for="executorPowers" class="col-form-label">Executor Powers:</label>
                        <textarea required id="executorPowers" name="executorPowers" class="form-control" placeholder="Enter Executor Powers" style="width: 95%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('powersOfExecutorSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <div id="medicalDirectivesSection" class="section">
                <h2>Medical Directives</h2>
                <div class="row">
                    <div class="col">
                        <label for="medicalInstructions" class="col-form-label">Instructions for Medical Directives:</label>
                        <textarea required id="medicalInstructions" name="medicalInstructions" class="form-control" placeholder="Enter Instructions" style="width: 95%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" onclick="showSection('medicalDirectivesSection')" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>

            <!-- End of Form Section -->
            <div id="end" class="section">
                <h2>Click to finish up</h2>
                <!-- Add any final instructions or messages here -->
                <input required type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

</div><!-- end of AI doc section-->




</section>
    <script>
        function showSection(sectionId) {
            var currentSection = document.getElementById(sectionId);
            var nextSection = currentSection.nextElementSibling;

            currentSection.classList.remove('visible');
            nextSection.classList.add('visible');
        }
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script>

            // JavaScript to toggle visibility of detailed information
            document.querySelectorAll('.more-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let row = this.closest('tr');
                    let nextRow = row.nextElementSibling;
                    nextRow.classList.toggle('hidden-row');
                });
            });
        function openService(service) {
            // Hide the servicesHere div
            document.getElementById('servicesHere').classList.add('hidden');
            // Show the specified service div
            document.getElementById(service).classList.remove('hidden');
        }
        function openServices(service) {
            // Hide the servicesHere div
            document.getElementById('theAIchat').classList.add('hidden');
            // Show the specified service div
            document.getElementById(service).classList.remove('hidden');
        }
    </script>
<!-- Bootstrap JS and jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const API_TOKEN = "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";
        const conversationDiv = document.getElementById('conversation');
        const loadingIndicator = document.getElementById('loadingIndicator');

        document.getElementById('questionForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            const userQuestion = document.getElementById('userQuestion').value;

            // Append user question to conversation
            appendMessage(userQuestion, 'userMessage');

            try {
                // Show loading indicator
                loadingIndicator.classList.remove('d-none');

                const response = await query(userQuestion);
                const botResponse = response[0].generated_text;

                // Append bot response from Hugging Face model to conversation
                //appendMessage(botResponse, 'botMessage');

                // Use the botResponse as the context for the QA API
                const qaResponse = await askQuestion(userQuestion, botResponse);

                // Append QA API response to conversation
                appendMessage(qaResponse, 'botMessage');
            } catch (error) {
                console.error(error);
                appendMessage('Something went wrong, try again later.', 'error');
            } finally {
                // Hide loading indicator
                loadingIndicator.classList.add('d-none');
            }
        });

        async function query(data) {
            const response = await fetch(
                "https://api-inference.huggingface.co/models/christianbaluti/gptv2",
                {
                    headers: { Authorization: `Bearer ${API_TOKEN}` },
                    method: "POST",
                    body: JSON.stringify({ inputs: data, temperature: 0.9, wait_for_model: true, max_new_tokens: 800, top_k: 90, num_return_sequences: 10, top_p: 0.95, max_length: 250, max_time: 60, token: 1000, min_length: 120 }),
                }
            );
            const result = await response.json();
            return result;
        }

        async function askQuestion(question, context) {
            const url = 'https://open-ai21.p.rapidapi.com/qa';
            const options = {
                method: 'POST',
                headers: {
                    'content-type': 'application/json',
                    'X-RapidAPI-Key': '35d5c1c850msh9b4cb3f16006285p13235ejsncda57a848554',
                    'X-RapidAPI-Host': 'open-ai21.p.rapidapi.com'
                },
                body: JSON.stringify({
                    question: question,
                    context: context
                })
            };

            try {
                const response = await fetch(url, options);
                const result = await response.json(); // Assuming the response is JSON
                return result.result; // Assuming the response contains a 'result' field with the answer
            } catch (error) {
                console.error(error);
                return 'An error occurred while asking the question.';
            }
        }

        // Function to append message to conversation
        function appendMessage(message, className) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${className}`;
            messageDiv.textContent = message;
            conversationDiv.appendChild(messageDiv);
            // Scroll to bottom of conversation
            conversationDiv.scrollTop = conversationDiv.scrollHeight;
        }
    </script>
</body>

</html>