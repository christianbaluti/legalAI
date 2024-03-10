

<?php
$pagename = 'Sign Up';
require 'navbar.php';

// Include the database connection file
require 'include/config.php';
// Initialize the email message variable
$emailMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
     // Assuming you want to store the platform in the database

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM clientuser WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);


    if ($result->num_rows > 0) {
        // Email is already taken
        $emailMessage = 'Email already taken by another user';
    } else {
        // Email is available, you can proceed with user registration
            $uploadDirectory = 'files/';
            // Handle profile photo upload
            if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                $photoFileName = $_FILES["photo"]["name"];
                $photoFileExt = pathinfo($photoFileName, PATHINFO_EXTENSION);
                $newPhotoFileName = $email . '-client.' . $photoFileExt;
                $photoFilePath = $uploadDirectory . $newPhotoFileName;
                move_uploaded_file($_FILES["photo"]["tmp_name"], $photoFilePath);

                echo $newPhotoFileName;
            }

        // Hash the user's password
        $hashedPassword = $password;

        // Insert the user's information into the database with the hashed password
        $insertUserQuery = "INSERT INTO clientuser (email, firstname, phone, location, gender, img, clientpassword, platform) VALUES ('$email', '$name', '$phone', '$location', '$gender', '$photoFilePath', '$hashedPassword', '$platform')";

        
        if ($conn->query($insertUserQuery) === true) {
            // User registration successful, you can redirect to a success page
            echo '<script>window.location.href = "login.php";</script>';
            exit();
        } else {
            // Registration failed, handle the error
            $emailMessage = 'Registration failed, please try again.';
        }
    }
}
?>

<section class="py-5">
    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Sign up</p>
                <h2 class="fw-bold">Welcome</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body text-center d-flex flex-column align-items-center">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                            </svg></div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Your email" required>
                                <?php if (!empty($emailMessage)): ?>
                                    <div class="text-danger"><?php echo $emailMessage; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Your full name" required></div>
                            <div class="mb-3"><input class="form-control" type="text" name="phone" placeholder="Your phone number" required></div>
                            <div class="mb-3"><input class="form-control" type="text" name="location" placeholder="Your location" required></div>
                            <br>
                            <label>Your image</label>
                            <div class="mb-3"><input class="form-control form-control-user" type="file" name="photo" accept="image/*" required></div>
                             <div class="mb-3">
                                <select  name="gender"  class="form-control" placeholder="Your gender?" required>
                                    <option value="not set">Choose your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">female</option>
                                    <option value="prefer not to say">Prefer not to say</option>
                                </select>
                            </div>                            <div class="mb-3" style="display:none"><input class="form-control" type="text" name="platform" value=" <?php echo $platform; ?> " required></div>
                            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
                            <div class="mb-3"><button class="btn btn-primary shadow d-block w-100" type="submit">Sign up</button></div>
                            <p class="text-muted">Already have an account?&nbsp;<a href="login.php">Log in</a></p>
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