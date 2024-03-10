<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Interactive Form</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="preload" href="https://next-terraform.formswift.com/_next/static/css/320500583e1cbac4.css" as="style">
<link rel="stylesheet" href="https://next-terraform.formswift.com/_next/static/css/320500583e1cbac4.css" data-n-g="">
<link rel="preload" href="https://next-terraform.formswift.com/_next/static/css/f290f3baa51ed774.css" as="style">
<link rel="stylesheet" href="https://next-terraform.formswift.com/_next/static/css/f290f3baa51ed774.css" data-n-p="">
<style>


    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }
    .form-container, .display-container {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    label {
        margin-bottom: 0;
    }
    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    .pdf-style {
        width: 100%;
        max-width: 21cm;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 0 auto;
        border: 1px #d3d3d3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .section {
        display: none;
        }
        .visible {
            display: block;
        }
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-container">
                <form id="willForm" method="post" action="generate_pdf.php">
                    <div id="progressBarTrack" class="ProgressBar_progress-bar__MqY6V"><span class="dig-Text dig-Text--variant-label dig-Text--size-small dig-Text--color-standard">0% complete </span><div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="dig-ProgressBar-container dig-ProgressBar--static"><div class="dig-ProgressBar-track" style="transform: scaleX(0);"></div></div></div><br>
                    <?php 

                        if (isset($_SESSION['clientid'])) {
                        $user_email = $_SESSION['clientemail'];
                        $sql = "SELECT fullname, location, gender from clientuser WHERE email = '$user_email'";
                        $results = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($results);
                        $fullname = $row['fullname'];
                        $location = $row['location'];
                        $gender = $row['gender'];
                    } else {
                        $fullname = '';
                        $location = '';
                        $gender = '';
                    }
                    ?>
                    

                    <!-- Personal Information Section -->
                    <div id="personalInfo" class="section visible">

                        <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Image column -->
                                <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <!-- Text column -->
                                <p id="typing-text"></p>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col">
                                <label for="fullName" class="col-form-label">What is your full name?</label>
                                <input  type="text" value=" <?php  echo $fullname; ?> " id="fullName" name="fullName" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="address" class="col-form-label">What is your permanent location?</label>
                                <input required type="text" id="address" name="address" value=" <?php  echo $location; ?> " class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="dob" class="col-form-label">Tell me the date you were born</label>
                                <input required type="date" id="dob" name="dob" class="form-control" min="1900-01-01" max="2006-12-31">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="gender" class="col-form-label">Are you a man or a woman?</label>
                                <select id="gender" name="gender" class="form-select">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <button type="button" onclick="showSection('personalInfo')" class="btn btn-primary">you can proceed</button>
                            </div>
                        </div>
                    </div>

                    <!-- ContinnuPersonal Information Section -->
                    <div id="personalInfoCont" class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text2"></p>
                                </div>
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
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <button type="button" onclick="showSection('personalInfoCont')" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>

                    <!-- Executor Section -->
                    <div id="executorSection" class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text3"></p>
                                </div>
                            </div>
                        </div>
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
                        <br>
                        <p>In cases where the Executor is not available please add another executor</p>
                        <div class="row">
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text4"></p>
                                </div>
                            </div>
                        </div>
                        <h2>Beneficiaries</h2>
                        <div>
                            <div class="row addPerson row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                                <div class="col">
                                    <label for="beneficiaryName" class="col-form-label">Full Name(s) of Beneficiary(ies):</label>
                                    <input required type="text" id="beneficiaryName" name="beneficiaryName" class="form-control" style="width: 95%;">
                                </div>
                                <div class="col">
                                    <label for="relationshipToTestator" class="col-form-label">Relationship to the Testator:</label>
                                    <input required type="text" id="relationshipToTestator" name="relationshipToTestator" class="form-control" style="width: 95%;">
                                </div>
                                <div class="col">
                                    <label for="percentageBequests" class="col-form-label">Percentage of Estate or Specific Bequests:</label>
                                    <input required type="text" id="percentageBequests" name="percentageBequests" class="form-control" style="width: 95%;">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <button type="button" onclick="addPerson()" class="btn btn-primary">Add a beneficialy</button>
                            </div>
                            <div class="col">
                                <button type="button" onclick="showSection('beneficiariesSection')" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>

                    <!-- Guardians Section -->
                    <div id="guardiansSection" class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text5"></p>
                                </div>
                            </div>
                        </div>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text6"></p>
                                </div>
                            </div>
                        </div>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text7"></p>
                                </div>
                            </div>
                        </div>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text8"></p>
                                </div>
                            </div>
                        </div>
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
                    <div id="witnessesSection" class="section"><div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text9"></p>
                                </div>
                            </div>
                        </div>
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
                                <input required id="witnessSignature" name="witnessSignature" class="form-control" type="file" accept="image/" placeholder="Enter Witness Signature" style="width: 95%;">
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
                                <input required id="witnessSignature" name="witnessSignature2" class="form-control" type="file" accept="image/" placeholder="Enter Witness Signature" style="width: 95%;">
                            </div>-->
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" onclick="showSection('witnessesSection')" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>


                    <div id="debtsLiabilitiesSection" class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text10"></p>
                                </div>
                            </div>
                        </div>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text11"></p>
                                </div>
                            </div>
                        </div>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text12"></p>
                                </div>
                            </div>
                        </div>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text13"></p>
                                </div>
                            </div>
                        </div>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Image column -->
                                    <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <!-- Text column -->
                                    <p id="typing-text14"></p>
                                </div>
                            </div>
                        </div>
                        <h2>Click to finish up</h2>
                        <!-- Add any final instructions or messages here -->
                        <input required type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="display-container pdf-style">
                <h3>Last Will and Testament of</h3>
                <br>
                <p>I, [YOUR NAME], of [CITY, STATE], being of sound mind and memory, do hereby make, publish and declare this to be my Last Will and Testament, hereby revoking all former wills and codicils.</p>
                <h4>Relatives</h4>
                <p>I am [marital status (married/single/divorced/widowed/engaged/separated)].
                    [If married] I am married to [spouse's name].
                    [If applicable] I have [number] children:
                    [Child 1's name], [age], [gender]
                    [Continue listing children]
                </p>
                <h4>Appointment of Executor and Trustee</h4>
                <p>I appoint [name of first fiduciary], residing at [address of first fiduciary], as Executor of this Will. If [name of first fiduciary] is unable or unwilling to serve, or fails to qualify or ceases to serve for any reason, then I appoint [name of second fiduciary], residing at [address of second fiduciary], as successor Executor.</p>
                <p>I appoint [name of first trustee], residing at [address of first trustee], as Trustee of any trust created under this Will. If [name of first trustee] is unable or unwilling to serve, or fails to qualify or ceases to serve for any reason, then I appoint [name of second trustee], residing at [address of second trustee], as successor Trustee.</p>
                <h4>Powers of Executor and Trustee</h4>
                <p>Any Executor or Trustee serving under this Will shall have all the powers conferred by [your state] laws, as amended.</p>
                <p>
                    In Malawi, executors of a will hold significant powers, including managing and distributing the deceased's assets according to the terms of the will, collecting and safeguarding assets, paying debts and funeral expenses, and distributing assets to beneficiaries. They are also authorized to manage and sell property, maintain accurate records of transactions, represent the estate in legal matters, and resign if they choose not to serve. Executors must pay estate taxes, adhere to spendthrift clauses to protect beneficiaries' assets, address beneficiary incapacity, follow savings clauses, integrate the will with other legal documents, arrange burial or cremation, and terminate trusts once assets are distributed. Executors in Malawi are entrusted with diverse responsibilities, including asset management, debt settlement, and beneficiary representation. They must ensure compliance with legal requirements, maintain financial records, and make informed decisions on behalf of the estate. Executors can renounce their position, and they are entitled to reasonable compensation and are exempt from posting a bond. Additionally, they must oversee tax payments, adhere to spendthrift and savings clauses, address beneficiary incapacity, integrate the will with other legal documents, and manage burial arrangements. Furthermore, they can terminate trusts once all assets are distributed, ensuring the comprehensive administration of the estate.
                </p>
                <h4>Tangible Personal Property</h4>
                <p>I give, devise, and bequeath all of my tangible personal property to [name of beneficiary], residing at [address of beneficiary].</p>
                <h4>Debts and Expenses</h4>
                <p>I direct my Executor to pay out of my estate all of my just debts and funeral expenses as soon as possible after my death</p>
                <h4>Residuary Estate</h4>
                <p>I give, devise, and bequeath all the rest, residue, and remainder of my estate to [name of beneficiary], residing at [address of beneficiary].</p>
                <h4>Trusts</h4>
                <p>[Include any specific instructions regarding trusts created in the will.]</p>
                <h4>Fiduciary Powers</h4>
                <p>Any successor Fiduciary shall have all the powers granted to the predecessor Fiduciary.The Fiduciary shall keep full accounts and provide beneficiaries with statements of receipts and disbursements.</p>
                <h4>Fiduciary Resignation</h4>
                <p>Any Fiduciary may resign by providing written notice to the successor Fiduciary and beneficiaries.</p>
                <h4>Bonds</h4>
                <p>No bond or security shall be required of any Fiduciary.</p>
                <h4>Payment of Taxes</h4>
                <p>All estate, inheritance, and similar taxes shall be paid from the residuary estate without reimbursement from any beneficiary.</p>
                <h4>Spendthrift Clause</h4>
                <p>Any gifts made under this Will shall be held in trust and shall not be assignable or subject to creditors' claims.</p>
                <h4>Incapacity of Beneficiary</h4>
                <p>If the Fiduciary determines that a beneficiary is unable to manage their affairs, the Fiduciary may distribute the beneficiary's share to another person or for another purpose deemed to be in the beneficiary's best interests.</p>
                <h4>Savings Clause</h4>
                <p>If any provision of this Will is found to be invalid, the remaining provisions shall still be enforceable.</p>
                <h4>Integration</h4>
                <p>This Will constitutes my entire Will and supersedes all prior wills and codicils.</p>
                <h4>Burial</h4>
                <p>All costs associated with my burial shall be paid from my life insurance, if any, and/or the proceeds of my estate</p>
                <h4>Termination of Trust</h4>
                <p>The trust shall terminate when all assets have been distributed.</p>
                <h4>Compensation for Services</h4>
                <p>The Fiduciary is entitled to reasonable compensation for services and reimbursement for expenses related to the administration of the estate and trust.</p>
                <h4>Signature</h4>
                <br><br><br><br>
                <h4>Witnesses</h4>
                <p>We, the undersigned, do hereby declare that the Testator has signed this Will in our presence, that we believe the Testator to be of sound mind and memory, and that we have signed this Will as witnesses on the date first written above.</p>
                <h4></h4>
                <p id="NameDisplay"></p>
                <p id="lastNameDisplay"></p>
                <p id="emailDisplay"></p>
            </div>
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('myForm');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const firstName = document.getElementById('Name').value;
        const lastName = document.getElementById('lastName').value;
        const email = document.getElementById('email').value;

        document.getElementById('NameDisplay').innerText = ` Name: $tName}`;
        document.getElementById('lastNameDisplay').innerText = `Last Name: ${lastName}`;
        document.getElementById('emailDisplay').innerText = `Email: ${email}`;
    });

    function showSection(sectionId) {
        var currentSection = document.getElementById(sectionId);
        var nextSection = currentSection.nextElementSibling;
          // Check if all required fields in the current section are filled
         var inputs = currentSection.querySelectorAll('input[required]');
         var allFilled = true;
         for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value === '') {
              allFilled = false;
              break;
            }
         }

         if (allFilled) {

                if (nextSection && nextSection.getAttribute('id') === 'personalInfoCont') {
                    startTyping2();
                } else if (nextSection && nextSection.getAttribute('id') === 'executorSection') {
                    startTyping3();
                } else if (nextSection && nextSection.getAttribute('id') === 'beneficiariesSection'){
                    startTyping4();
                }  else if (nextSection && nextSection.getAttribute('id') === 'guardiansSection') {
                    startTyping5();
                } else if (nextSection && nextSection.getAttribute('id') === 'distributionOfAssetsSection'){
                    startTyping6();
                }  else if (nextSection && nextSection.getAttribute('id') === 'funeralArrangementsSection') {
                    startTyping7();
                } else if (nextSection && nextSection.getAttribute('id') === 'revocationClauseSection'){
                    startTyping8();
                }  else if (nextSection && nextSection.getAttribute('id') === 'witnessesSection') {
                    startTyping9();
                } else if (nextSection && nextSection.getAttribute('id') === 'debtsLiabilitiesSection'){
                    startTyping10();
                }  else if (nextSection && nextSection.getAttribute('id') === 'contingencyPlansSection') {
                    startTyping11();
                } else if (nextSection && nextSection.getAttribute('id') === 'powersOfExecutorSection'){
                    startTyping12();
                }  else if (nextSection && nextSection.getAttribute('id') === 'medicalDirectivesSection') {
                    startTyping13();
                } else if (nextSection && nextSection.getAttribute('id') === 'end') {
                    startTyping14();
                }

                currentSection.classList.remove('visible');
                nextSection.classList.add('visible');

         }//allfill
            else {
            // Display a message prompting the user to fill all fields
            alert('Please fill all fields in the current section.');
         }

    }//function end

function startTyping2() {
    // Text to be typed
    const textToType = "Ah, Nice knowing you ....., now can you tell me about your marital status, where you stay and what you do for a living please?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text2");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping3() {
    // Text to be typed
    const textToType = "That's great! Now can you give me the details of the Executor?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text3");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping4() {
    // Text to be typed
    const textToType = "Who is going to benefit from this Will?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text4");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping5() {
    // Text to be typed
    const textToType = "That's great! Now can you give me the details of the gurdian for your childen, that is if you have them";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text5");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping6() {
    // Text to be typed
    const textToType = "Can you tell me the way your asserts and/or estates should be distibuted?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text6");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping7() {
    // Text to be typed
    const textToType = "Thanks! How do you want your funeral to be like? What are the things that you wish to happen at your funeral arrangement?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text7");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping8() {
    // Text to be typed
    const textToType = "That's great! Now can you give me the details of the Executor?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text8");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping9() {
    // Text to be typed
    const textToType = "That's great! Now can you give me the details of your witnesses? These witnesses should sign after you have mead your will";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text9");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping10() {
    // Text to be typed
    const textToType = "In case you die while you have unsettled debts and liabilities, how would you want them to be handled?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text10");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping11() {
    // Text to be typed
    const textToType = "Can you tell me the contingency plan you have that will be followed in executing this Will?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text11");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping12() {
    // Text to be typed
    const textToType = "What powers should the Executor have?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text12");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping13() {
    // Text to be typed
    const textToType = "Give me directions you would like to be taken in terms of medical directions?";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text13");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

function startTyping14() {
    // Text to be typed
    const textToType = "I think we are done, before you click 'Submit', read the whole Will. If you are not satisfied click 'Edit'.";

    // Delay between typing each character (in milliseconds)
    const typingSpeed = 50;

    // Get the paragraph element
    const paragraph = document.getElementById("typing-text14");

    // Start typing
    typeTexts(textToType, 0, paragraph, typingSpeed);
}

// Function to simulate typing effect
function typeTexts(text, index, paragraph, typingSpeed) {
    if (index < text.length) {
        paragraph.innerHTML += text.charAt(index);
        index++;
        setTimeout(function() {
            typeTexts(text, index, paragraph, typingSpeed);
        }, typingSpeed);
    }
}

</script>

<script type="text/javascript">
    function addPerson() {
        // Find the div with class 'addPerson'
        var addPersonDiv = document.querySelector('.addPerson');

        // Clone the div
        var clonedDiv = addPersonDiv.cloneNode(true);

        // Find all input fields within the cloned div
        var inputs = clonedDiv.querySelectorAll('input');

        // Append a unique number to the IDs and names of the input fields
        var uniqueNumber = document.querySelectorAll('.addPerson').length; // This will give us the total number of 'addPerson' divs
        inputs.forEach(function(input) {
            input.id += uniqueNumber;
            input.name += uniqueNumber;
        });

        // Append the cloned div to the parent container
        addPersonDiv.parentNode.appendChild(clonedDiv);
    }
</script>

<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
        // Text to be typed
        const textToType = "Hi!, I'm Lamulo, your Legal Assistant. I will help you craft your will. Before everything, I would like to get to know you first";

        // Delay between typing each character (in milliseconds)
        const typingSpeed = 50;

        // Get the paragraph element
        const paragraph = document.getElementById("typing-text");

        // Function to simulate typing effect
        function typeText(text, index) {
            if (index < text.length) {
                paragraph.innerHTML += text.charAt(index);
                index++;
                setTimeout(function() {
                    typeText(text, index);
                }, typingSpeed);
            }
        }

        // Start typing when the DOM content is loaded
        typeText(textToType, 0);
    });
</script>

</body>
</html>
