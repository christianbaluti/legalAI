<?php
$pagename = 'Sign Up';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign Up - LAWAPP - Lawyer side</title>
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
                </ul>
                <p>
                    <a class=" " style="text-decoration: none!important; font-weight: bold;" role="button" href="login_lawyer.php">Log In</a>
                </p>
            </div>
        </div>
    </nav><!--end of nav bar-->


<?php
require 'include/config.php';





// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST["name"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $lawyerpassword = $_POST["password"];
    $yoe = $_POST["yoe"];
    $school = $_POST["school"];
    $specialization = $_POST["specialization"];
    $degree = $_POST["degree"];
    $affiliations = $_POST["affiliations"];
    $location = $_POST["location"];
    $license = $_POST["license"];
    $pda = $_POST["pda"];
    $portfolio = $_POST["portfolio"];
    $photo =  $_FILES["photo"]; // Assuming this is the file input for the profile photo
    $licensepdf =  $_FILES["licensepdf"]; // Assuming this is the file input for the license in PDF format
    $video =  $_FILES["video"]; // Assuming this is the file input for the video
    $reference = $_POST["reference"];
    $gender = $_POST["gender"];
    // Add other form fields accordingly
    // Function to detect the user's operating system
    function detectOS() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown OS";

        // Get the user agent string and match it with known operating systems
        if (preg_match('/windows|win32/i', $user_agent)) {
            $os_platform = "Windows";
        } elseif (preg_match('/android/i', $user_agent)) {
            $os_platform = "Android";
        } elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
            $os_platform = "Mac OS";
        } elseif (preg_match('/linux/i', $user_agent)) {
            $os_platform = "Linux";
        }

        return $os_platform;
    }

    // Function to detect the user's device type
    function detectDeviceType() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $device_type = "Unknown Device";

        // Get the user agent string and match it with known device types
        if (preg_match('/mobile|android|iphone|ipad|ipod/i', $user_agent)) {
            $device_type = "Mobile";
        } elseif (preg_match('/tablet|ipad/i', $user_agent)) {
            $device_type = "Tablet";
        } elseif (preg_match('/pc|macintosh|windows|linux/i', $user_agent)) {
            $device_type = "PC";
        } elseif (preg_match('/projector/i', $user_agent)) {
            $device_type = "Projector";
        }

        return $device_type;
    }

    // Detect operating system and device type
    $platform['os'] = detectOS();
    $platform['device'] = detectDeviceType();

    // Output the result
    $platform = $platform['os'] . " " . $platform['device'];


    $uploadDirectory = 'filesLawyer/';
    // Handle profile photo upload
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        $photoFileName = $_FILES["photo"]["name"];
        $photoFileExt = pathinfo($photoFileName, PATHINFO_EXTENSION);
        $newPhotoFileName = $email . '-lawyer.' . $photoFileExt;
        $photoFilePath = $uploadDirectory . $newPhotoFileName;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photoFilePath);
    }

    // Handle license PDF upload
    if (isset($_FILES["licensepdf"]) && $_FILES["licensepdf"]["error"] == UPLOAD_ERR_OK) {
        $licensePdfFileName = $_FILES["licensepdf"]["name"];
        $licensePdfFileExt = pathinfo($licensePdfFileName, PATHINFO_EXTENSION);
        $newLicensePdfFileName = $email . '-lawyer.' . $licensePdfFileExt;
        $licensePdfFilePath = $uploadDirectory . $newLicensePdfFileName;
        move_uploaded_file($_FILES["licensepdf"]["tmp_name"], $licensePdfFilePath);
    }

    // Handle video upload
    if (isset($_FILES["video"]) && $_FILES["video"]["error"] == UPLOAD_ERR_OK) {
        $videoFileName = $_FILES["video"]["name"];
        $videoFileExt = pathinfo($videoFileName, PATHINFO_EXTENSION);
        $newVideoFileName = $email . '-lawyer.' . $videoFileExt;
        $videoFilePath = $uploadDirectory . $newVideoFileName;
        move_uploaded_file($_FILES["video"]["tmp_name"], $videoFilePath);
    }





    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM lawyeruser WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Email is already taken
        $emailMessage = 'Email already taken by another user';
    } else {
        // Email is available, you can proceed with user registration

        // Hash the user's password
        $hashedPassword = $lawyerpassword;
        // Perform SQL query to insert data into 'lawyeruser' table
        $sql = "INSERT INTO lawyeruser (firstname, dob, email, phone, lawyerpassword, yoe, school, specialization, degree, affiliations, location, license, pda, portfolio, photo, licensepdf, video, reference, gender, platform)
        VALUES ('$firstname', '$dob', '$email', '$phone', '$hashedPassword', '$yoe', '$school', '$specialization', '$degree', '$affiliations', '$location', '$license', '$pda', '$portfolio', '$photoFilePath', '$licensePdfFilePath', '$videoFilePath', '$reference', '$gender', '$platform')";


        if ($conn->query($sql) === TRUE) {
            // Retrieve the lawyerid of the newly inserted record
            echo "<script> alert('success')</script>";

            // Redirect to index_lawyer.php
            header("Location: waiting_lawyer.php");
            exit(); // Ensure that no other code is executed after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>



<section class="py-5">
    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Sign up</p>
                <h2 class="fw-bold">Welcome</h2>
            </div>
        </div>

        <div class="text-center">
            <h4 class="text-dark mb-4">Create an Account!</h4>
        </div>
        <form class="user" method="post" enctype="multipart/form-data">
                <br><?php if (!empty($emailMessage)): ?>
                            <div class="text-danger"><?php echo $emailMessage; ?></div>
                <?php endif; ?>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0"><label style="color:white">emalil</label><input name="name" class="form-control form-control-user" type="text" placeholder="Full Name" ></div>
                    <div class="col-sm-6"><label>Date of birth</label><input name="dob" class="form-control form-control-user" type="date" placeholder="Date of Birth" ></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0"><input name="email" class="form-control form-control-user" type="text" placeholder="Your Email" >
                        
                    </div>
                    <div class="col-sm-6"><input name="phone" class="form-control form-control-user" type="number" placeholder="Your Phone number" ></div>
                </div>
                <div class="row mb-3"><input class="form-control form-control-user" type="password" placeholder="Password" name="password" >
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="state" placeholder="Issuing state of Bar license number" required></div>
                    <div class="col-sm-6"> <input class="form-control form-control-user" type="number" name="yoe" placeholder="Years of experience" required></div>
                </div><br>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="school" placeholder="Law school attended" required></div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="specialization" class="form-control form-control-user" placeholder="Your specific law field?" required>

                        <option value="General">Your specific law field</option>

                        <option value="Real Estate Attorney">Real Estate Attorney</option>

                        <option value="Criminal Attorney">Criminal Attorney</option>

                        <option value="Family Lawyer">Family Lawyer</option>

                        <option value="Personal Injury Lawyer">Personal Injury Lawyer</option>

                        <option value="Employment Lawyer">Employment Lawyer</option>

                        <!-- Additional Options for Malawi -->
                        <option value="Constitutional Law Specialist">Constitutional Law Specialist</option>

                        <option value="Commercial Lawyer">Commercial Lawyer</option>

                        <option value="Tax Law Practitioner">Tax Law Practitioner</option>

                        <option value="Environmental Law Expert">Environmental Law Expert</option>

                        <option value="Human Rights Advocate">Human Rights Advocate</option>

                        <option value="Corporate Governance Consultant">Corporate Governance Consultant</option>

                        <option value="Intellectual Property Attorney">Intellectual Property Attorney</option>

                        <option value="Healthcare Law Specialist">Healthcare Law Specialist</option>

                        <option value="Immigration Law Expert">Immigration Law Expert</option>

                        <!-- Additional Specializations -->
                        <option value="Bankruptcy Attorney">Bankruptcy Attorney</option>

                        <option value="Intellectual Property Lawyer">Intellectual Property Lawyer</option>

                        <option value="Entertainment Law Practitioner">Entertainment Law Practitioner</option>

                        <option value="International Trade Lawyer">International Trade Lawyer</option>

                        <option value="Labor Law Specialist">Labor Law Specialist</option>

                        <option value="Cybersecurity and Privacy Lawyer">Cybersecurity and Privacy Lawyer</option>

                        <option value="Sports Law Practitioner">Sports Law Practitioner</option>

                        <option value="Education Law Attorney">Education Law Attorney</option>

                        <!-- Add more options as needed -->

                    </select>
                    </div>
                <!-- // reae model -->
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="degree" placeholder="Degrees obtained" required>
                    </div>
                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" name="affiliations" placeholder="Current Affiliations and Membership" required></div>
                    <div class="col-sm-6">
                        <label for="gender">Gender:</label><br>
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female" required>
                        <label for="female">Female</label><br>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="Physical Address" name="location" required></div>
                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" name="license" placeholder="Bar License Number" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="pda" placeholder="Past disciplinary actions" required></div>
                    <div class="col-sm-6"><input class="form-control" type="text" name="portfolio" placeholder="Portfolio Link (e.g LinkedIn or website)" required></div>
                </div>
                <br> <br>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Your Profile Photo</label>
                        <input class="form-control form-control-user" type="file" name="photo" accept="image/*" required>
                    </div>

                    <div class="col-sm-6">
                        <label>Your License (in PDF format)</label>
                        <input class="form-control form-control-user" type="file" name="licensepdf" accept="application/pdf" placeholder="" required>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Your video describing yourself and your career in law and with relevancy</label>
                        <input class="form-control form-control-user" type="file" name="video" placeholder="" accept="video/*" required>
                    </div>

                    <div class="col-sm-6"><label>Two Professional References (Name and contact details)</label><input class="form-control form-control-user" rows="2" type="textarea" name="reference" placeholder="" required></input></div>
                </div>
                
                <button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Register Account</button>                        <hr>
            <div class="text-center"><a class="small" href="resetpassword.php">Forgot Password?</a></div>
            <div class="text-center"><a class="small" href="login_lawyer.php">Already have an account? Login!</a></div>
        </form>
    </div>
</section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>