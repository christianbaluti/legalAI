<?php 
    require 'menu.php';
?>

<style type="text/css">
    /* CSS for lawyer table */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* CSS for more button */
    .more-btn {
        padding: 4px 8px;
    }

    /* CSS for detailed information */
    .hidden-row {
        display: none;
    }

    .more-info {
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        max-width: 500px;
        margin: 10px auto;
    }

    .verify-btn {
        padding: 4px 8px;
        background-color: green;
        color: white;
        border: none;
        cursor: pointer;
    }

    .unverify-btn {
        padding: 4px 8px;
        background-color: red;
        color: white;
        border: none;
        cursor: pointer;
    }

</style>

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Lawyers</h3>
        <span>Welcome, <?php echo $fullname; ?></span>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Lawyer Image</th>
                            <th>Lawyer Name</th>
                            <th>Lawyer Email</th>
                            <th>Verification Status</th> <!-- Column for verification button -->
                            <th></th> <!-- Empty column for "more" button -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM lawyeruser";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Get lawyer details
                                    $lawyerid = $row['lawyerid'];
                                    $lawyername = $row['firstname'];
                                    $lawyeremail = $row['email'];
                                    $img = $row['photo'];
                                    $cases = '';

                                    // Determine button text and action based on verification status
                                    if ($row['verified'] == 0) {
                                        $verifyText = 'Verify';
                                        $verifyTextPrint = 'Not Verified yet';
                                        $verifyClass = 'verify-btn';
                                    } else {
                                        $verifyText = 'Unverify';
                                        $verifyTextPrint = 'Verified Already';
                                        $verifyClass = 'unverify-btn';
                                    }

                                    echo '<tr>';
                                    echo '<td><img src="../' . $img . '" class="rounded-circle" width="50" height="50"></td>';
                                    echo '<td>' . $lawyername . '</td>';
                                    echo '<td>' . $lawyeremail . '</td>';
                                    echo '<td><button class="btn ' . $verifyClass . ' btn-sm verify-btn" data-lawyerid="' . $lawyerid . '" onclick="verification('.$lawyerid.', \''.$verifyText.'\')"> ' . $verifyText . ' </button></td>';
                                    echo '<td><button class="btn btn-primary btn-sm more-btn">More</button></td>';
                                    echo '</tr>';
                                    
                                    // Hidden row with detailed lawyer information
                                    echo '<tr class="hidden-row">';
                                    echo '<td colspan="5" class="more-info">';
                                    // Output detailed lawyer information here
                                    echo '<div class="detailed-info">';
                                    echo '<p><strong>Phone Number:</strong> ' . $row['phone'] . '</p>';
                                    echo '<p><strong>Location:</strong> ' . $row['location'] . '</p>';
                                    echo '<p><strong>Date of Birth:</strong> ' . $row['dob'] . '</p>';
                                    echo '<p><strong>Gender:</strong> ' . $row['gender'] . '</p>';
                                    echo '<p><strong>School:</strong> ' . $row['school'] . '</p>';
                                    echo '<p><strong>Specialization:</strong> ' . $row['specialization'] . '</p>';
                                    echo '<p><strong>Degree:</strong> ' . $row['degree'] . '</p>';
                                    echo '<p><strong>Affiliations:</strong> ' . $row['affiliations'] . '</p>';
                                    echo '<p><strong>PDA:</strong> ' . $row['pda'] . '</p>';
                                    echo '<p><strong>Portfolio:</strong> <a href="' . $row['portfolio'] . '" target="_blank">' . $row['portfolio'] . '</a></p>';
                                    echo '<p><strong>License PDF:</strong> <a href="../' . $row['licensepdf'] . '" download>Download PDF</a></p>';
                                    echo '<p><strong>Video:</strong> <video width="320" height="240" controls><source src="../' . $row['video'] . '" type="video/mp4">Your browser does not support the video tag.</video></p>';
                                    echo '<p><strong>Reference:</strong> ' . $row['reference'] . '</p>';
                                    echo '<p><strong>Years of Experience:</strong> ' . $row['yoe'] . '</p>';
                                    echo '<p><strong>License:</strong> ' . $row['license'] . '</p>';
                                    echo '<p><strong>Platform:</strong> ' . $row['platform'] . '</p>';
                                    echo '<p><strong>Verified?:</strong> ' . $verifyTextPrint . '</p>';
                                    echo '<p><strong>Cases:</strong> ' . $cases . '</p>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                            $conn->close();
                        ?>
                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"></div>
    </div>
</footer>

<!-- Bootstrap and custom scripts -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>

<script>
    // JavaScript function to handle verification
    function verification(lawyerid, whattoverify) {
        // Send AJAX request to update verification status
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_verification.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update button text and class based on response
                if (xhr.responseText == 'verified') {
                    document.querySelector('[data-lawyerid="' + lawyerid + '"]').textContent = 'Unverify';
                    document.querySelector('[data-lawyerid="' + lawyerid + '"]').classList.remove('verify-btn');
                    document.querySelector('[data-lawyerid="' + lawyerid + '"]').classList.add('unverify-btn');
                } else if (xhr.responseText == 'unverified') {
                    document.querySelector('[data-lawyerid="' + lawyerid + '"]').textContent = 'Verify';
                    document.querySelector('[data-lawyerid="' + lawyerid + '"]').classList.remove('unverify-btn');
                    document.querySelector('[data-lawyerid="' + lawyerid + '"]').classList.add('verify-btn');
                }
            }
        };
        xhr.send('lawyerid=' + lawyerid + '&action=' + whattoverify);
    }

    // JavaScript to toggle visibility of detailed information
    document.querySelectorAll('.more-btn').forEach(button => {
        button.addEventListener('click', function() {
            let row = this.closest('tr');
            let nextRow = row.nextElementSibling;
            nextRow.classList.toggle('hidden-row');
        });
    });
</script>
</body>
</html>
