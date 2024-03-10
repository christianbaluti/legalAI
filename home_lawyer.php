

<?php $pagename = 'Home';
    session_start();
    require 'include/config.php';
    if (!isset($_SESSION['lawyerid'])){
            header("Location: index_lawyer.php");
            
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?php
             // Start or resume the session

        
                echo $pagename;
            
            ?> - LAWAPP - Lawyer side</title>
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


    

    <section><!--start of main section of everything-->

    <div class="container" style="margin-top:20px; margin: auto;width: auto"><!--start of main links head-->
        <div class="text-center" style="float: left; ;margin-top: 10px;font-weight:bold;font-size: 15px;">
            <span id="open-cases">
                <button class="tablink" style="background: none;border: none; border-radius: 20px;padding-left: 20px; padding-right: 20px; color: black;" onclick="openLink(event, 'cases');"> 
                    Cases
                </button>
            </span>
        </div>
        <div class="text-center" style="float: left;margin-top: 10px;font-weight:bold;font-size: 15px;">
            <span id="open-cases">
                <button class="tablink" style="background: none; border: none; border-radius: 20px;padding-left: 20px; padding-right: 20px; color: black;" onclick="openLink(event, 'ai');"> 
                    AI Chat
                </button>
            </span>
        </div>
    </div><!--end of main links head-->


    <br><br>
           
    <!--case section-->
    <div id="cases" class=" casesahhdd myLink" style="margin-left: 8%!important;margin-right: 8%!important;margin-top: 20px!important;padding-bottom: 100px; background-color: #f1f1f1; border-radius: 30px;">

        <?php
        $lawyerid = $_SESSION['lawyerid'];
        $sql3 = "SELECT COUNT(*) as count FROM cases WHERE lawyerid = '$lawyerid'";

        $result3 = mysqli_query($conn, $sql3);

        if ($result3) {
            $row3 = mysqli_fetch_assoc($result3);
            $caseCount = $row3['count'];

            // Check if there are cases for the client
            if ($caseCount > 0) {
                // Display Div B because there are cases
                echo " <div class='case-available' id='list-of-cases'>";
                echo '<br>';
                    $lawyerid = $_SESSION['lawyerid'];
                    $sql2 = "SELECT * FROM cases WHERE lawyerid = '$lawyerid'";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_assoc($result2)) {
                
                    
                echo '<div style="background-color: white; border-radius: 10px; width: 90%; margin: auto;box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);">
                            <h4 style="margin-left: 2%;">';
                echo '<button style="border: none; background: none;text-align: left; color: #5a88e5" onclick="openchatlawyer(' . $row['caseid'] . ')">';
                echo $row['name'] . '</h4>
                            <p style="margin-left: 3%; margin-top: -10px!important;">';
                echo $row['description'] . '</p>
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
                        wait for a client to add <br>
                        you to a case
                    </p>
                    </div>';
            }
        } else {
            // Handle any errors in the SQL query
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>         
    </div>

        <!--AI doc section-->
        <div id="ai" class=" casesahhdd myLink" style="padding-bottom: 100px; border-radius: 30px; margin-left: 8% !important; margin-right: 8% !important; margin-top: 20px !important; display: none;">
            <div class="case-available" id="list-of-cases"><br>
                <div style="background-color: white; border-radius: 10px; width: 90%; margin: auto;box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);" id="servicesHere">
                    <p style="margin-left: 3%;margin-right: 3%; margin-top: 10px!important;padding-top: 20px; text-align: justify;">
                        <span style="font-weight: bold;">You can be asking our AI for any legal help in the following Acts of Malawi</span> <br>
                        Pension Act, worker compesation Act, witchcraft Act, Trustees Incorporation Act, Town and Country Planning Act, Tobacco Act, Tourism and Hotels Act, Traditional Courts Act, Taxation Act, Supreme Court of Appeal Act, Supplies Control Act, Statute Law (Miscellaneous Provisions Act, Seed Act, Securities Act, Second-hand and Scrap Metal Dealers Act, Science and Technology Act, Sale of Goods Act, Rural Electrification Act, Roads Fund Administration Act, Roads Authority Act, Road Traffic Act, Revision of the Laws Act, Reserve Bank of Malawi Act, Republic of Malawi (Constitution) Act, Registered Land Act, Registered Designs Act, Referendum Act 2018, Railways Act, Public Stores Act, Public Service Act, Public Roads Act, Public Procurement Act, Public Procurement and Disposal of Public Assets Act, Public Finance Management Act, Protection of Animals Act, Professional Qualifications Act, Promissory Oaths Act, Prisons Act, Printed Publications Act, Police Ac.
                    </p>
                    <div style="display: flex; justify-content: space-between; padding: 0 10px;">
                        <button style="border: none; padding: 5px; width: 100px; color: white; background-color: #5a88e5; border-radius: 100px;" onclick="openService('theAIchat');">AI Chat</button>
                    </div>
                    <br>
                </div>    
            </div><!--Inside the beauty thing-->

            <div id="theAIchat" class="hidden">
                <div id="AIconversation"></div>
                <div id="AIinput-container">
                    <input type="text" id="AIuserInput" placeholder="Type your message...">
                    <button id="AIsendButton" onclick="sendMessage()">Send</button>
                </div>
            </div>         
        </div>
</section>
    
<script src="main_script.js"></script>
<script type="text/javascript" src="toAI.js"></script>
<script>
        function openService(service) {
            // Hide the servicesHere div
            document.getElementById('servicesHere').classList.add('hidden');
            // Show the specified service div
            document.getElementById(service).classList.remove('hidden');
        }

        // Tabs
        function showingFunction(){
            document.getElementById("hidethis").style.display = "block";
        }
        function hidingFunction(){
            document.getElementById("hidethis").style.display = "none";
        }
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