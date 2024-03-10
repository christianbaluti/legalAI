<?php 
    require 'menu.php';
?>

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Clients</h3>
        <span>Welcome, <?php echo $fullname; ?></span>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Client Image</th>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Phone Number</th>
                            <th>Location</th>
                            <th>Platform</th>
                            <th>Gender</th>
                            <th>Cases</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM clientuser";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // Loop through the data and display each case
                                while ($row = $result->fetch_assoc()) {
                                    $clientname = $row['firstname'];
                                    $clientemail = $row['email'];
                                    $phone = $row['phone'];
                                    $location = $row['location'];
                                    $platform = $row['platform'];
                                    $gender = $row['gender'];
                                    $clientid = $row['clientid'];
                                    $img = $row['img'];

                                    $sql2 = "SELECT * from cases WHERE clientid = '$clientid'";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        $sql3 = "SELECT COUNT(*) AS caseCount FROM cases WHERE clientid = '$clientid'";
                                        $result3 = $conn->query($sql3);
                                        $row3 = $result3->fetch_assoc();
                                        $cases = $row3['caseCount'];
                                    } else {
                                        $cases = 0;
                                    }//end of if

                                    // Display the user image in a circle
                                    echo '<tr><td><img src="../' . $img . '" class="rounded-circle" width="50" height="50"></td><td>' . $clientname . '</td><td>' . $clientemail . '</td><td>' . $phone . '</td><td>' . $location . '</td><td>' . $platform . '</td><td>' . $gender . '</td><td>' . $cases . '</td></tr>';
                                }//end of while
                            }//end of if
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
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
</body>
</html>
