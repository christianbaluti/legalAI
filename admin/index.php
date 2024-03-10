<?php 
    require 'menu.php';
 ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                        <span>Welcome, <?php echo $fullname; ?></span>
                        <!--<a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>-->
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Registered Lawyers</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $lawyers; ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-user-minus fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Verified Lawyers</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $verifiedLawyers; ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-user-plus fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Users Registered</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $clientss; ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-user-friends fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Cases created</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo $cases; ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Messages sent</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $messages; ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span style="color: var(--bs-blue);">AI chats</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>0</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span style="color: var(--bs-indigo);">Calls</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>0</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-phone fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Clients on Cases</h6>
                                </div>

                                <?php
                                    // SQL query to fetch data from the database
                                    $sql = "SELECT clientid, COUNT(clientid) as totalCases FROM cases GROUP BY clientid";
                                    $result = $conn->query($sql);

                                    // Arrays to store data for chart
                                    $labels = [];
                                    $totalCasesData = [];

                                    // Fetch data from the result set
                                    while ($row = $result->fetch_assoc()) {
                                        $clientid = $row['clientid'];

                                        $sql2 = "SELECT * from clientuser where clientid = '$clientid'";
                                        $result2 = $conn->query($sql2);
                                        $row2 = $result2->fetch_assoc();

                                        $totalCasesData[] = $row['totalCases'];
                                        $labels[] = $row2['email'];
                                    }
                                    ?>

                                    <!-- Your HTML and PHP code for the chart -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>

                                    <!-- JavaScript code for the chart -->
                                    <script>
                                        var ctx = document.getElementById('myChart').getContext('2d');

                                        var myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: <?php echo json_encode($labels); ?>,
                                                datasets: [{
                                                    label: 'Total Cases',
                                                    fill: true,
                                                    data: <?php echo json_encode($totalCasesData); ?>,
                                                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                                                    borderColor: 'rgba(78, 115, 223, 1)'
                                                }]
                                            },
                                            options: {
                                                maintainAspectRatio: false,
                                                legend: {
                                                    display: false,
                                                    labels: {
                                                        fontStyle: 'normal'
                                                    }
                                                },
                                                title: {
                                                    fontStyle: 'normal'
                                                },
                                                scales: {
                                                    xAxes: [{
                                                        gridLines: {
                                                            color: 'rgb(234, 236, 244)',
                                                            zeroLineColor: 'rgb(234, 236, 244)',
                                                            drawBorder: false,
                                                            drawTicks: false,
                                                            borderDash: ['2'],
                                                            zeroLineBorderDash: ['2'],
                                                            drawOnChartArea: false
                                                        },
                                                        ticks: {
                                                            fontColor: '#858796',
                                                            fontStyle: 'normal',
                                                            padding: 20
                                                        }
                                                    }],
                                                    yAxes: [{
                                                        gridLines: {
                                                            color: 'rgb(234, 236, 244)',
                                                            zeroLineColor: 'rgb(234, 236, 244)',
                                                            drawBorder: false,
                                                            drawTicks: false,
                                                            borderDash: ['2'],
                                                            zeroLineBorderDash: ['2']
                                                        },
                                                        ticks: {
                                                            fontColor: '#858796',
                                                            fontStyle: 'normal',
                                                            padding: 20
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>



                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Clients, Lawyers and cases</h6>
                                </div>
                                <?php
                            // SQL query to fetch counts from the database
                            $sql = "SELECT
                                        (SELECT COUNT(*) FROM cases) AS totalCases,
                                        (SELECT COUNT(*) FROM clientuser) AS totalClients,
                                        (SELECT COUNT(*) FROM lawyeruser) AS totalLawyers";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $totalCases = $row['totalCases'];
                                $totalClients = $row['totalClients'];
                                $totalLawyers = $row['totalLawyers'];
                            } else {
                                // Set default values if there's an issue with the query
                                $totalCases = 0;
                                $totalClients = 0;
                                $totalLawyers = 0;
                            }

                            
                            ?>

                            <!-- Your HTML and PHP code for the doughnut chart -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myDoughnutChart" data-bss-chart='{
                                        "type": "doughnut",
                                        "data": {
                                            "labels": ["Cases", "Clients", "Lawyers"],
                                            "datasets": [{
                                                "label": "",
                                                "backgroundColor": ["#4e73df", "#1cc88a", "#36b9cc"],
                                                "borderColor": ["#ffffff", "#ffffff", "#ffffff"],
                                                "data": [<?php echo $totalCases; ?>, <?php echo $totalClients; ?>, <?php echo $totalLawyers; ?>]
                                            }]
                                        },
                                        "options": {
                                            "maintainAspectRatio": false,
                                            "legend": {
                                                "display": true,
                                                "labels": {
                                                    "fontStyle": "normal"
                                                }
                                            },
                                            "title": {
                                                "fontStyle": "normal"
                                            }
                                        }
                                    }'></canvas>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Cases</h6>
                                </div>
                                <ul class="list-group list-group-flush">
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
                                                    $lawyeremail = $row2['email'];    
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

                                                echo '<li class="list-group-item">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col me-2">
                                                                <h6 class="mb-0"><strong>';
                                                echo $caseName;
                                                echo '</strong></h6>
                                                <p style="margin-bottom: -2px;">';
                                                echo $caseDescription;
                                                echo '</p><span class="text-xs" style="margin-right: 38px;">';
                                                echo $startdate;
                                                echo '</span><span class="text-xs" style="margin-right: 38px;">By ';
                                                echo $clientemail;
                                                echo '</span><span class="text-xs" style="margin-right: 38px;">';
                                                echo $messages . 'messages sent';
                                                echo '</span><span class="text-xs" style="margin-right: 38px;">';
                                                echo $calls . ' Calls done </span><span class="text-xs"> With ';
                                                echo $lawyeremail . '</span></div></div></li>';
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

                                                echo '<li class="list-group-item">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col me-2">
                                                                <h6 class="mb-0"><strong>';
                                                echo $caseName;
                                                echo '</strong></h6>
                                                <p style="margin-bottom: -2px;">';
                                                echo $caseDescription;
                                                echo '</p><span class="text-xs" style="margin-right: 38px;">';
                                                echo $startdate;
                                                echo '</span><span class="text-xs" style="margin-right: 38px;">By ';
                                                echo $clientemail;
                                                echo '</span><span class="text-xs" style="margin-right: 38px;">';
                                                echo $messages . 'messages sent';
                                                echo '</span><span class="text-xs" style="margin-right: 38px;">';
                                                echo $calls . ' Calls done </span><span class="text-xs"> With ';
                                                echo 'no Lawyer </span></div></div></li>';
                                                }

                                            }
                                        }
                                        // Close the database connection
                                        $conn->close();
                                     ?>

                                    
                                </ul>
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
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>