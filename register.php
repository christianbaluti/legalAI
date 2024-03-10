<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contacts - Christian Baluti</title>
    <meta name="description" content="From Pixels to Profits - I Help Your Business Thrive.
Want stunning visuals that convert and data that drives results?
I'm a versatile tech whiz with expertise in:
UI/UX Design: Crafting intuitive interfaces that keep users engaged.
Graphic Design: Building a band identity that resonates with your audience
Full-stack Development: Building custom web applications that streamline your operations.
Big Data Analysis: Uncovering hidden insights to inform your business .
#let's Work together">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <div class="container" style="position: absolute;left: 0;right: 0;top: 50%;transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;">
                <div class="p-5">
                    <div class="text-center">
                        <h4 class="text-dark mb-4">Create an Account!</h4>
                    </div>
                    <form class="user">
                    	<div id="one">
                    		<label>Personal Information</label>
                    		<br>
                    		<div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><label style="color:white">emalil</label><input name="name" class="form-control form-control-user" type="text" placeholder="Full Name" required=""></div>
	                            <div class="col-sm-6"><label>Date of birth</label><input name="dob" class="form-control form-control-user" type="date" placeholder="Date of Birth" required=""></div>
	                        </div>
	                        <div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><input name="email" class="form-control form-control-user" type="text" placeholder="Your Email" required="">
	                            	<?php if (!empty($emailMessage)): ?>
                                        <div class="text-danger"><?php echo $emailMessage; ?></div>
                                    <?php endif; ?>
                                </div>
	                            <div class="col-sm-6"><input name="phone" class="form-control form-control-user" type="number" placeholder="Your Phone number" required=""></div>
	                        </div>
	                        <div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" placeholder="Password" name="password" required=""></div>
	                            <div class="col-sm-6"><input class="form-control form-control-user" type="password" name="password_repeat" placeholder="Repeat Password"></div>
	                        </div>
	                        <div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="state" placeholder="Issuing state of Bar license number"></div>
	                            <div class="col-sm-6"> <input class="form-control form-control-user" type="number" name="yoe" placeholder="Years of experience"></div>
	                        </div>
	                        
	                        <div class="row mb-3">
	                            <p id="emailErrorMsg" class="text-danger" style="display: none;">Paragraph</p>
	                            <p id="passwordErrorMsg" class="text-danger" style="display: none;">Paragraph</p>
                    		</div>
                    		<button class="btn d-block btn-user w-100" style="background-color: teal; color:white;" onclick="showNextSection('two')">Continue</button>
                    	</div>

                    	<div id="two" style="display:none;">
                    		<label>Professional Information</label>                    		<br>
                    		<div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="school" placeholder="Law school attended"></div>
	                            <div class="col-sm-6 mb-3 mb-sm-0">
								<select name="specialization" class="form-control form-control-user" placeholder="Your specific law field?">

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
	                        </div>
	                        <div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="degree" placeholder="Degrees obtained">
                                </div>
	                            <div class="col-sm-6"><input class="form-control form-control-user" type="text" name="afiliations" placeholder="Current Afiliations and Membership"></div>
	                        </div>
	                        <div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="Physical Address" name="location" required=""></div>
	                            <div class="col-sm-6"><input class="form-control form-control-user" type="text" name="license" placeholder="Bar License Number"></div>
	                        </div>
	                        <div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="pda" placeholder="Past disciplinary actions"></div>
	                            <div class="col-sm-6"><input class="form-control" type="text" name="portfolio" placeholder="Portfolio Link (e.g LinkedIn or website)"></div>
	                        </div>
	                        <div class="row mb-3">
	                            <p id="emailErrorMsg" class="text-danger" style="display: none;">Paragraph</p>
	                            <p id="passwordErrorMsg" class="text-danger" style="display: none;">Paragraph</p>
                    		</div>
                    		 <button class="btn d-block btn-user w-100" style="background-color: teal; color:white;" onclick="showNextSection('three')">Continue</button>
    
                    	</div>
                    

                    	<div id="three" style="display:none;">
                            <label>Verification</label><br> <br>
	                        <div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><label>Your Profile Photo</label><input class="form-control form-control-user" type="file" name="photo" placeholder="">
                                </div>
	                            <div class="col-sm-6"><label>Your License (in PDF format)</label><input class="form-control form-control-user" type="file" name="licensepdf" placeholder=""></div>
	                        </div>
	                        <div class="row mb-3">
	                            <div class="col-sm-6 mb-3 mb-sm-0"><label>Your video describing yourself and your career in law and with relevancy</label><input class="form-control form-control-user" type="file" name="video" placeholder=""></div>
	                            <div class="col-sm-6"><label>Two Professional References (Name and contact details)</label><input class="form-control form-control-user" rows="2" type="textarea" name="reference" placeholder=""></input></div>
	                        </div>
							<button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Register Account</button>
                        <hr>
                    	</div>

                        
                    </form>
                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                    <div class="text-center"><a class="small" href="login.html">Already have an account? Login!</a></div>
                </div>
            </div>
        </div>
<script>
    function showNextSection(nextSectionId) {
        // Hide the current active section
        document.getElementById('one').style.display = 'none';
        document.getElementById('two').style.display = 'none';
        document.getElementById('three').style.display = 'none';

        // Show the next section
        document.getElementById(nextSectionId).style.display = 'block';
    }

	let email = document.getElementById("email")
	let password = document.getElementById("password")
	let verifyPassword = document.getElementById("verifyPassword")
	let submitBtn = document.getElementById("submitBtn")
	let emailErrorMsg = document.getElementById('emailErrorMsg')
	let passwordErrorMsg = document.getElementById('passwordErrorMsg')

	function displayErrorMsg(type, msg) {
		if(type == "email") {
			emailErrorMsg.style.display = "block"
			emailErrorMsg.innerHTML = msg
			submitBtn.disabled = true
		}
		else {
			passwordErrorMsg.style.display = "block"
			passwordErrorMsg.innerHTML = msg
			submitBtn.disabled = true
		}
	}

	function hideErrorMsg(type) {
		if(type == "email") {
			emailErrorMsg.style.display = "none"
			emailErrorMsg.innerHTML = ""
			submitBtn.disabled = true
			if(passwordErrorMsg.innerHTML == "")
				submitBtn.disabled = false
		}
		else {
			passwordErrorMsg.style.display = "none"
			passwordErrorMsg.innerHTML = ""
			if(emailErrorMsg.innerHTML == "")
				submitBtn.disabled = false
		}
	}
	
	// Validate password upon change
	password.addEventListener("change", function() {

		// If password has no value, then it won't be changed and no error will be displayed
		if(password.value.length == 0 && verifyPassword.value.length == 0) hideErrorMsg("password")
		
		// If password has a value, then it will be checked. In this case the passwords don't match
		else if(password.value !== verifyPassword.value) displayErrorMsg("password", "Passwords do not match")
		
		// When the passwords match, we check the length
		else {
			// Check if the password has 8 characters or more
			if(password.value.length >= 8)
				hideErrorMsg("password")
			else
				displayErrorMsg("password", "Password must be at least 8 characters long")
		}
	})
	
	verifyPassword.addEventListener("change", function() {
		if(password.value !== verifyPassword.value)
			displayErrorMsg("password", "Passwords do not match")
		else {
			// Check if the password has 8 characters or more
			if(password.value.length >= 8)
				hideErrorMsg("password")
			else
				displayErrorMsg("password", "Password must be at least 8 characters long")
		}
	})

	// Validate email upon change
	email.addEventListener("change", function() {
		// Check if the email is valid using a regular expression (string@string.string)
		if(email.value.match(/^[^@]+@[^@]+\.[^@]+$/))
			hideErrorMsg("email")
		else
			displayErrorMsg("email", "Invalid email")
	});
</script>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-dark.js"></script>
</body>

</html>