<?php $pagename = 'Chat Page';  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?php
            session_start(); // Start or resume the session

        
                echo $pagename;
            
            ?> - LAWAPP</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/w3.css">
    <style type="text/css">
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
            
            align-items: center;
        }

        #AIuserInput {
            flex: 1;
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-right: 3px;
            width: 80%;
        }

        #AIsendButton {
            background-color: #5a88e5;
            color: white;
            padding: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 15%;
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
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home_lawyer.php"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-app-indicator">
                        <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"></path>
                        <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                    </svg></span><span>LAWAPP</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='Home') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    }
                     ?>" href="home_lawyer.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='Services') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    } ?>" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='About') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    } ?>" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='FAQ') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    } ?>" href="faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='Contacts') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    } ?>" href="contacts.php">Contacts</a></li>
                </ul><p> <?php 

                // Check if the user is logged in
                    if (isset($_SESSION['lawyerid'])) {
                        $user_email = $_SESSION['lawyeremail'];
                        echo $user_email;
                        echo ' - <span> <a style="text-decoration: none!important; color: black;font-weight: bold;" href="logout.php"> Log Out</a> </span>';
                    }
                    else {
                        echo '<a class=" " style="text-decoration: none!important;" role="button" href="signup.php">Sign Up</a> <span>Or</span> <a class=" " style="text-decoration: none!important;" role="button" href="login.php">Log In</a>';
                    }
                    


                 ?> </p>
            </div>
        </div>
    </nav><!--end of nav bar-->
<?php
        require 'include/config.php';
        if (!isset($_SESSION['lawyerid'])){
            header("Location: index_lawyer.php"); 
        }

        // Check if the caseid parameter is set in the URL
            if(isset($_GET['caseid'])) {
                // Retrieve and store the caseid
                $caseid = $_GET['caseid'];

                // Fetch information from the 'cases' table
                $query = "SELECT * FROM cases WHERE caseid = '$caseid'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    // Case found, check if 'lawyerid' has a value
                    $row1 = $result->fetch_assoc();
                    $clientid = $row1['clientid'];
     ?>
         <section><!--start of main section of everything-->
        <script src="main_script.js"></script>
        <script type="text/javascript">
            let caseid = <?php echo $caseid;?>;
        </script>
        <div style="display: nonem;"  id='chat'>
            <div class="w3-container sticky-top" style="top: 70px!important; background-color: white!important;">
                <div class="w3-bar" style=" background-color: white!important;z-index: 1019!important;">
                    <div id="hidethis" class="w3-modal">
                        <div class="w3-modal-content w3-center theMobilePhone center w3-card-4 w3-animate-top"  style="border-radius: 30px;background-image: url('3.jpg'); background-repeat: no-repeat; background-attachment: fixed; width: 90%!important;margin: auto!important;" class="theMobilePhone">
                        <br>
                            <div class="row d-flex justify-content-center">
                                <div class="">
                                    <div>
                                        <?php
                                            $query4 = "SELECT * FROM lawyeruser";
                                            $result4 = $conn->query($query4);

                                            if ($result4->num_rows > 0) {
                                                // Loop through each row in the result set
                                                while ($row = $result4->fetch_assoc()) {
                                                    // Echo information about each lawyer
                                                    $lawyerId = $row['lawyerid'];
                                                    $lawyerName = $row['firstname'];

                                                    echo "Lawyer Name: " . $lawyerName . "<em style='color: transparent'>.........</em>";
                                                    // Pass caseid and lawyerid to addlawyer() when the span is clicked
                                                    echo "<button style='text-decoration: none; border-radius: none; border: none; background: none; font-weight: bold;' onclick='addlawyer(" . $caseid . ", " . $lawyerId . ")'> Add</button>";
                                                    echo '<br>';
                                                }

                                                echo '<br>';
                                            } else {
                                                // If no lawyers found, display an appropriate message
                                                echo "No lawyers found.";
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

        <?php
            

                        // 'lawyerid' has a value, proceed with your logic
                        echo '<a href="#" class="" style="font-size: 15px;">';
                        echo "Case Name: " . $row1['name'];
                        echo "</a>";
                        echo '<h3 >';
                        $query2 = "SELECT * FROM clientuser WHERE clientid = '$clientid'";
                        $result2 = $conn->query($query2);
                        $row2 = $result2->fetch_assoc();
                        $clientname = $row2['firstname'];
                        echo 'Client' .' - '. $clientname;
                        echo '<img src="assets/img/audio.png" onclick="audiocalls(caseid);" style="width: 40px; margin: auto; padding-right:5px;" class="w3-right">';
                        echo '<img src="assets/img/video.png" onclick="videocalls(caseid);" style="width: 40px; margin: auto; padding-right:5px;" class="w3-right"> </h4>';
                        echo '
                                </div>
                            </div>';
                    echo '<div class="container-fluid">
                                <div class="row">
                                    <div class="col  d-lg-block d-xl-block">
                                        <div class="row px-3 py-2 border-start border-muted">
                                            <div class="col" style="overflow-x: none;overflow-y: auto;height: auto;margin-bottom: 50px;margin-top: 50px;">

                                                <ul class="list-unstyled">';
                    $output = "";
                    $sql6 = "SELECT * FROM messages WHERE caseid = '$caseid'";
                    $query6 = mysqli_query($conn, $sql6);
                    if(mysqli_num_rows($query6) > 0){
                        while($row6 = mysqli_fetch_assoc($query6)){
                            if($row6['sender'] == 0){
                                $output .= '<li class="my-2">
                                                        <div class="card border border-muted" style="width: 65%;border-top-left-radius: 0px;border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;background: rgba(52,58,64,0.05);">
                                                            <div class="card-body text-center p-2">
                                                                <p class="text-start card-text" style="font-size: 1rem;">'.
                                                                    $row6['content']. '</p>
                                                                <h6 class="text-muted card-subtitle text-end" style="font-size: .75rem;">'. $row6['senttime'] . '</h6>
                                                            </div>
                                                        </div>
                                                    </li>';
                            }else{
                                $output .= '<li class="d-flex justify-content-end my-2">
                                                        <div class="card border border-muted" style="width: 65%;border-top-left-radius: 20px;border-top-right-radius: 0px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;background: rgba(52,58,64,0.05);">
                                                            <div class="card-body text-center p-2">
                                                                <p class="text-start card-text" style="font-size: 1rem;">'.
                                                                    $row6['content']. '</p>
                                                                <h6 class="text-muted card-subtitle text-end" style="font-size: .75rem;">'. $row6['senttime'] . '</h6>
                                                            </div>
                                                        </div>
                                                    </li>';
                            }
                        }
                    }else{
                        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
                    }
                    echo $output;
                    echo '

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <span style="color: white" id="last"> .....</span> <br> <br>';
                            date_default_timezone_set('Africa/Blantyre');
                            $sql7 = "SELECT * FROM cases WHERE caseid = '$caseid'";
                            $query7 = mysqli_query($conn, $sql7);
                            $row7 = mysqli_fetch_assoc($query7);
                            $senttime = date('Y-m-d H:i:s');
                            $lawyersender = 1;
                             echo '<div class="" id="AIinput-container">
                                <div class="">
                                    <div class="">
                                        <form method="post" action="lawyersend.php">
                                            <div class=" text-center" >
                                              <input type="text" id="AIuserInput" name="content" placeholder="Type your message here..." style="height: 40px;">
                                              <input type="text" style="display: none" placeholder="text" value="text" id="text" name="text">
                                              <input type="text" style="display: none" placeholder="'. $senttime . '" value="'. $senttime . '" id="senttime" name="senttime">
                                              <input type="text" style="display: none" placeholder="'. $lawyersender . '" value="'. $lawyersender . '" id="lawyersender" name="lawyersender">
                                              <input type="text" style="display: none" placeholder="'. $caseid . '" value="'. $caseid . '" id="caseid" name="caseid">
                                              <input type="text" style="display: none" placeholder="'. $row7['clientid'] . '" value="'. $row7['clientid'] . '" id="clientid" name="clientid">
                                              <input type="text" style="display: none" placeholder="'. $row7['lawyerid'] . '" value="'. $row7['lawyerid'] . '" id="lawyerid" name="lawyerid">
                                              <button id="AIsendButton" type="submit">Send</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                        
                        // Add more code as needed
                    
                } else {
                    // Case not found, display an error message
                    echo "Error: Case not found.";
                }

                // Close the database connection
                $conn->close();

            } else {
                // Handle the case where caseid is not set in the URL
                echo "Case ID not provided in the URL.";
            }
        ?>


            
        </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
function audiocalls(caseid) {
    // Send an AJAX request to update the database
    let sender = <?php echo $lawyersender; ?>;
    $.ajax({
        type: "POST",
        url: "update_case.php",  // Replace with the actual server-side script
        data: { caseid: caseid },
        success: function(response) {
            // Handle the response if needed
            console.log(response);
            create_Message(caseid, message, senttime, receivedtime, sender, clientid, lawyerid);
        },
        error: function(error) {
            console.error("Error updating database: " + error.responseText);
        }
    });

    // Redirect to the audio.php page
    window.location.href = 'audio_lawyer.php?caseid=' + encodeURIComponent(caseid) +'&sender=' + encodeURIComponent(sender) ;
   
}//end of video call

function videocalls(caseid) {
    // Send an AJAX request to update the database
    let sender = <?php echo $lawyersender; ?>;
    $.ajax({
        type: "POST",
        url: "update_case_video.php",  // Replace with the actual server-side script
        data: { caseid: caseid },
        success: function(response) {
            // Handle the response if needed
            console.log(response);
            create_Message(caseid, message, senttime, receivedtime, sender, clientid, lawyerid);
        },
        error: function(error) {
            console.error("Error updating database: " + error.responseText);
        }
    });

    // Redirect to the audio.php page
    window.location.href = 'video_lawyer.php?caseid=' + encodeURIComponent(caseid) +'&sender=' + encodeURIComponent(sender) ;
   
}

</script>
<script type="text/javascript">
    function showingFunction(){
    document.getElementById("hidethis").style.display = "block";
}
    function hidingFunction(){
    document.getElementById("hidethis").style.display = "none";
}


</script>

<script>
// JavaScript function to handle the addlawyer functionality
function addlawyer(caseid, lawyerid) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'addlawyer.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    // Handle the response from the server
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText);
        } else {
            console.error('Request failed with status ' + xhr.status);
        }
    };

    // Handle errors
    xhr.onerror = function() {
        console.error('Request failed');
    };

    // Send the request with the data
    var data = 'caseid=' + encodeURIComponent(caseid) + '&lawyerid=' + encodeURIComponent(lawyerid);
    xhr.send(data);

    refreshPage1();
}


function refreshPage1() {
    refreshPage();
}

function refreshPage() {
    location.reload();
}
</script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>