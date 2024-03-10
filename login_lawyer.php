<?php $pagename = 'Log In';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?php
            session_start(); // Start or resume the session

        
                echo $pagename;
            
            ?> - LAWAPP - Lawyer side</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/w3.css">
</head>

<body>
        <!--start of nav bar-->
        <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home_lawyer.php"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-app-indicator">
                        <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"></path>
                        <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                    </svg></span><span>LAWAPP</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                </ul><p> <?php 

                // Check if the user is logged in
                    if (isset($_SESSION['lawyerid'])) {
                        $user_email = $_SESSION['lawyeremail'];
                        echo $user_email;
                        echo ' - <span> <a style="text-decoration: none!important; color: black;font-weight: bold;" href="logout_lawyer.php"> Log Out</a> </span>';
                    }
                    else {
                        echo '<a class=" " style="text-decoration: none!important;" role="button" href="signup_lawyer.php">Sign Up</a> <span>Or</span> <a class=" " style="text-decoration: none!important;" role="button" href="login_lawyer.php">Log In</a>';
                    }
                    


                 ?> </p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </nav><!--end of nav bar-->

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Handle the login form submission
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // Validate user input here (e.g., check if email and password match)

            // Assuming you have a database connection (db_connection.php), query the database to validate the user
            require 'include/config.php';

            // Sanitize user input
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = $_POST['password']; // Note: Password should be hashed in your database

            // Query your database to find the user based on their email
            $sql = "SELECT lawyerid, email, lawyerpassword, verified FROM lawyeruser WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    // User found, verify the password
                    $row = mysqli_fetch_assoc($result);
                    if ($password == $row['lawyerpassword']) {
                        if ($row['verified']  == 1) {
                            // Password is correct; create a session
                            $_SESSION['lawyerid'] = $row['lawyerid'];
                            $_SESSION['lawyeremail'] = $row['email'];

                            // Redirect to a welcome or dashboard page
                            header("Location: home_lawyer.php"); // Replace 'welcome.php' with the page you want to redirect to after login
                            exit();
                        } else {
                            $error = "You are not yet verified by our adminstrator, check in after 24 hours";
                        }
                    } else {
                        $error = "Incorrect password. Please try again.";
                    }
                } else {
                    $error = "User not found. Please register or check your email.";
                }
            } else {
                $error = "Database error. Please try again later.";
            }

            // Close the database connection
            mysqli_close($conn);
        }
    }


    ?>

    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Login</p>
                    <h2 class="fw-bold">Welcome back</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <form method="post" action="">
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Your Email"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary shadow d-block w-100" type="submit">Log in</button></div>
                                <?php
                                if (isset($error)) {
                                    echo '<div class="alert alert-danger">' . $error . '</div>';
                                }
                                ?>
                                <div class="mb-3" style="color: var(--bs-btn-active-border-color);"><a class="btn btn-primary shadow d-block w-100" role="button" href="reset_lawyer.php" style="color: var(--bs-card-bg);background: rgb(244,66,55);">Reset Passsword</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" theVibe", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " theVibe";
}

// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>




    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>