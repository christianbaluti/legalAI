

    <?php $pagename = 'Home';
        require 'navbar.php';
        
     ?>
    

    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto"><img src="4.png">
                    <h2 class="fw-bold" style="font-size: 57.112px;"><span style="font-weight: normal !important;">Welcome</span></h2>
                    <p style="font-size: 13px;line-height: 14.8px;letter-spacing: 2px;">to this web app, here you will<br>experience a number of legal<br>services on the go...</p>
                </div>
            </div>
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 23px;">
                    <h2 class="fw-bold" style="font-size: 28px;"><span style="font-weight: normal !important;">Lawyer</span></h2>
                    <p style="font-size: 13px;line-height: 14.8px;letter-spacing: 2px;">Meet, connect, manage your<br>case, follow up conferences<br>with your lawyer</p>
                </div>
            </div>
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 23px;">
                    <h2 class="fw-bold" style="font-size: 28px;"><span style="font-weight: normal !important;">AI Doc</span></h2>
                    <p style="font-size: 13px;line-height: 14.8px;letter-spacing: 2px;">Draft your legal docs with<br>AI, get help anytime</p>
                </div>
            </div>
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 23px;">
                    <nav class="navbar navbar-light navbar-expand-md py-3">
                        <div class="container"><a class="navbar-brand d-flex align-items-center" href="signup.php"><span><button class="btn btn-primary" type="button">Sign Up</button></span></a><a class="navbar-brand d-flex align-items-center" href="login.php"><span><button class="btn btn-primary" type="button" style="background: rgb(165,142,255);">Sign In</button></span></a></div>
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