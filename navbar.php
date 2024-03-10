<?php session_start();
ob_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?php
                echo $pagename;
            ?> - LAWAPP</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/w3.css">
    <style type="text/css">
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
            margin-bottom: 60px; /* Adjusted to accommodate the fixed input field and button */
        }

        #AIinput-container {
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

        #AIuserInput {
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
                    else {
                        $islogedin = 0;
                        echo '<a class=" " style="text-decoration: none!important;" role="button" href="signup.php">Sign Up</a> <span>Or</span> <a class=" " style="text-decoration: none!important;" role="button" href="login.php">Log In</a>';}
                 ?>
                 </p>
            </div>
        </div>
    </nav><!--end of nav bar-->
    <?php 

    ob_end_flush(); ?>