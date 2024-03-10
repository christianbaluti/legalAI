<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include FPDF library
    require 'files/fpdf/fpdf.php';

    // Create a new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12); // Set font and size

    // Add title
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'Last Will and Testament Of', 0, 1, 'C');
    $pdf->Ln(10); // Add some space after title

    // Set margins
    $pdf->SetLeftMargin(20);
    $pdf->SetRightMargin(20);

    // Process form data and add it to the PDF
    $fullName = $_POST['fullName'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $maritalStatus = $_POST['maritalStatus'];
    $nationality = $_POST['nationality'];
    $occupation = $_POST['occupation'];

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'I, ' . $fullName . ', residing at '. $address . 'being of sound mind and disposing memory, do hereby make, publish, and declare this to be my Last Will and Testament, hereby revoking any and all former wills and codicils made by me at any time heretofore.', 0, 1);
    $pdf->Ln(); // Add some space after section


    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Personal Information', 0, 1);
    $pdf->Cell(0,10,'I was born on ' . $dob . ', in '. $nationality . ' , and I am of '. $gender . ' gender and '. $maritalStatus . 'marital status. I identify as a ' . $nationality . '  by nationality and currently work as a  ' $occupation., 0, 1);
    $pdf->Ln(); // Add some space after section

    // Add Executor(s) Section
    $executorName = $_POST['executorName'];
    $executorRelationship = $_POST['relationship'];
    $executorAddress = $_POST['executorAddress'];

    // Add Executor(s) Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Executors', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'I appoint, ' . $executorName . ', as the executor of this Will. I am of sound mind and capable of managing the affairs of this estate. ' . $executorName. ' is a ' . $executorRelationship . ' residing at ' . $executorAddress .'.'. , 0, 1);
    $pdf->Ln(); // Add some space after section

    // Add Beneficiaries Section
    $beneficiaryName = $_POST['beneficiaryName'];
    $beneficiaryRelationship = $_POST['relationshipToTestator'];
    $beneficiaryAddress = $_POST['beneficiaryAddress'];
    $percentageBequests = $_POST['percentageBequests'];

    // Add Beneficiaries Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Beneficiaries', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'I designate ' . $beneficiaryName .', as the sole beneficiary of this Will. The relationship between myself and the Beneficiaries is a ' .$beneficiaryRelationship.'and reside at '.$beneficiaryAddress .'.'. 'The entire property I have shall be bequeathed this(ese) Beneficiary(ies) with a ' . $percentageBequests, 0, 1);
    $pdf->Ln(); // Add some space after section

    // Add Guardians Section
    $guardianName = $_POST['guardianName'];
    $guardianRelationship = $_POST['guardianRelationship'];
    $guardianAddress = $_POST['guardianAddress'];

    // Add Guardians Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Guardian(s) for Minor Children', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'I appoint ' . $guardianName .", as the guardian for any minor children. As the Testator's ". $guardianRelationship .', residing at '. $guardianAddress . ',  shall assume responsibility for their care and upbringing.', 0, 1);
    $pdf->Ln(); // Add some space after section

    // Add Distribution of Assets Section
    $specificBequests = $_POST['specificBequests'];
    $remainingAssets = $_POST['remainingAssets'];

    // Add Distribution of Assets Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Distribution of Assets', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Specific bequests and the division of remaining assets are outlined as follows:  ' . $specificBequests . '. The remaining assets shall be divided according to the instructions provided.' . $remainingAssets, 0, 1);
    $pdf->Ln(); // Add some space after section

    // Add Funeral Arrangements Section
    $funeralInstructions = $_POST['funeralInstructions'];

    // Add Funeral Arrangements Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Funeral Arrangements', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Funeral arrangements shall be made as follows. ' . $funeralInstructions, 0, 1);
    $pdf->Ln(); // Add some space after section

    // Add Revocation Clause Section
    $revocationStatement = $_POST['revocationStatement'];

    // Add Revocation Clause Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Revocation Clause', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'My statement in revocking or not previous made wills and codicil ' . $revocationStatement, 0, 1);
    $pdf->Ln(); // Add some space after section

    // Add Witnesses Section
    $witnessName = $_POST['witnessName'];
    $witnessAddress = $_POST['witnessAddress'];
    $witnessSignature = $_POST['witnessSignature'];

    // Add Witnesses Section 2
    $witnessName2 = $_POST['witnessName2'];
    $witnessAddress2 = $_POST['witnessAddress2'];
    $witnessSignature2 = $_POST['witnessSignature2'];

    // Add Witnesses Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Witnesses', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Witness 1: ' . $witnessName . ' residing at '. $witnessAddress . ' has witnessed and signed this will............. Who resides at ' .$witnessAddress, 0, 1);
    $pdf->Ln();
    $pdf->Cell(0,10,'Witness 2: ' . $witnessName2 . ' residing at '. $witnessAddress2 . ' has witnessed and signed this will............. Who resides at ' .$witnessAddress2, 0, 1); 
    $pdf->Ln(); // Add some space after section



    // Add Date and Signature Section
    $willDate = $_POST['willDate']; 
    $testatorSignature = $_POST['testatorSignature'];

    // Add Date and Signature Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Date and Signature', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'This Will is signed on  ' . $willDate. '...................', 0, 1);
    $pdf->Cell(0,10,'Signature: ' . $testatorSignature, 0, 1);
    $pdf->Ln(); // Add some space after section

    // executorPowers Section
    $executorPowers = $_POST['executorPowers'];
    
    // Add Powers of the Executor Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Powers of the Executor', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'The executor shall have the powers necessary to carry out the provisions of this Will, including but not limited to: ' . $executorPowers, 0, 1);
    $pdf->Ln(); // Add some space after section

    // Debts and Liabilities Section
    $debtInstructions = $_POST['debtInstructions'];

    // Add Debts and Liabilities Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Debts and Liabilities', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Instructions for handling debts and liabilities are as follows: ' . $debtInstructions, 0, 1);
    $pdf->Ln(); // Add some space after section

    // Contingency Plans Section
    $contingencyPlansInstructions = $_POST['contingencyPlansInstructions'];

    // Add Contingency Plans Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Contingency Plans', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Contingency plans are outlined as follows: ' . $contingencyPlansInstructions, 0, 1);
    $pdf->Ln(); // Add some space after section

    // medicalInstructions Section
    $medicalInstructions = $_POST['medicalInstructions'];

    // Add Medical Instructions Section
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'Medical Instructions', 0, 1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'Medical instructions are as follows: ' . $medicalInstructions, 0, 1);
    $pdf->Ln(); // Add some space after section


    // Output the PDF
    $pdf->Output();
}
?>
