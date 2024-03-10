<?php 
    require 'menu.php';
?>

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Cases</h3>
                        <span>Welcome, <?php echo $fullname; ?></span>
                        <!--<a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>-->
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row"><!--
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>-->
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Client Email</th>
                                            <th>Case Name</th>
                                            <th>Lawyer to the Case</th>
                                            <th>Messages sent</th>
                                            <th>calls done</th>
                                            <th>Date made</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * from cases";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Loop through the data and display each case
                                            while ($row = $result->fetch_assoc()) {
                                                if ($row['lawyerid'] !== null) {
                                                    
                                                $caseName = $row['name'];
                                                $caseid = $row['caseid'];
                                                $caseDescription = $row['description'];
                                                $startdate = $row['startdate'];

                                                $clientid = $row['clientid'];
                                                $lawyerid = $row['lawyerid'];

                                                $sql2 = "SELECT * FROM lawyeruser where lawyerid = '$lawyerid'";
                                                $result2 = $conn->query($sql2);
                                                if ($result2 !== false) {
                                                    $row2 = $result2->fetch_assoc();
                                                    $lawyeremail = $row2['firstname'];    
                                                } else {
                                                    $lawyeremail = 'no Lawyer Yet';
                                                }
                                                

                                                $sql3 = "SELECT * FROM clientuser where clientid = '$clientid'";
                                                $result3 = $conn->query($sql3);
                                                $row3 = $result3->fetch_assoc();
                                                $clientemail = $row3['email'];

                                                $sql4 = "SELECT COUNT(*) AS messageCount FROM messages WHERE caseid = '$caseid'";
                                                $result4 = $conn->query($sql4);

                                                if ($result4 !== false) {
                                                    $row4 = $result4->fetch_assoc();
                                                    $messages = $row4['messageCount'] . ' ';
                                                } else {
                                                    $messages = 0 . ' ';
                                                }

                                                $sql5 = "SELECT COUNT(*) AS calls FROM audiocalls WHERE caseid = '$caseid'";
                                                $result5 = $conn->query($sql5);

                                                if ($result5 !== false) {
                                                    $row5 = $result5->fetch_assoc();
                                                    $calls = $row5['calls'] . ' ';
                                                } else {
                                                    $calls = 0 . ' ';
                                                }

                                                //some echo here
                                                echo '<tr><td>' . $clientemail . '</td><td>' . $caseName. '</td><td>';
                                                echo $lawyeremail . '</td><td>' . $messages . '</td><td>';
                                                echo $calls . '</td><td>' . $startdate . '</td></tr>';


                                                } else {
         
                                                $caseName = $row['name'];
                                                $caseid = $row['caseid'];
                                                $caseDescription = $row['description'];
                                                $startdate = $row['startdate'];

                                                $clientid = $row['clientid'];
                                                $lawyerid = $row['lawyerid'];

                                                

                                                

                                                $sql3 = "SELECT * FROM clientuser where clientid = '$clientid'";
                                                $result3 = $conn->query($sql3);
                                                $row3 = $result3->fetch_assoc();
                                                $clientemail = $row3['email'];

                                                $sql4 = "SELECT COUNT(*) AS messageCount FROM messages WHERE caseid = '$caseid'";
                                                $result4 = $conn->query($sql4);

                                                if ($result4 !== false) {
                                                    $row4 = $result4->fetch_assoc();
                                                    $messages = $row4['messageCount'] . ' ';
                                                } else {
                                                    $messages = 0 . ' ';
                                                }

                                                $sql5 = "SELECT COUNT(*) AS calls FROM audiocalls WHERE caseid = '$caseid'";
                                                $result5 = $conn->query($sql5);

                                                if ($result5 !== false) {
                                                    $row5 = $result5->fetch_assoc();
                                                    $calls = $row5['calls'] . ' ';
                                                } else {
                                                    $calls = 0 . ' ';
                                                }

                                                //some echo here too
                                                echo '<tr><td>' . $clientemail . '</td><td>' . $caseName. '</td><td>';
                                                echo 'Lawyer not yet set ' . '</td><td>' . $messages . '</td><td>';
                                                echo $calls . '</td><td>' . $startdate . '</td></tr>';

                                                 }

                                            }
                                        }
                                        // Close the database connection
                                        $conn->close();
                                     ?>

                                        </td></tr>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>