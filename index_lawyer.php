
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Index - LAWAPP - Lawyer side</title>
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
                </ul><p>
                    <a class=" " style="text-decoration: none!important;" role="button" href="signup_lawyer.php">Sign Up</a> <span>Or</span> <a class=" " style="text-decoration: none!important;" role="button" href="login_lawyer.php">Log In</a></p>
            </div>
        </div>  
    </nav><!--end of nav bar-->
    

    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto"><img src="4.png">
                    <h2 class="fw-bold" style="font-size: 57.112px;"><span style="font-weight: normal !important;">Welcome</span></h2>
                    <p style="font-size: 13px;line-height: 14.8px;letter-spacing: 2px;">to this web app, here you will<br>find legal clients for their<br>different legal services</p>
                </div>
            </div>
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 23px;">
                    <nav class="navbar navbar-light navbar-expand-md py-3">
                        <div class="container"><a class="navbar-brand d-flex align-items-center" href="signup_lawyer.php"><span><button class="btn btn-primary" type="button">Sign Up</button></span></a><a class="navbar-brand d-flex align-items-center" href="login_lawyer.php"><span><button class="btn btn-primary" type="button" style="background: rgb(165,142,255);">Sign In</button></span></a></div>
                    </nav>
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