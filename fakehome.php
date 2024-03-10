

    <?php $pagename = 'Home';
        require 'navbar.php';
        require 'include/config.php';
        if (!isset($_SESSION['user_id'])){
            header("Location: index.php"); 
        }
     ?>
    

    <section><!--start of main section of everything-->

    <div class="container" style="margin-top:20px; top:20px; position: sticky!important"><!--start of main links head-->
        <div class="text-center" style="float: left; width: 33%;margin-top: 10px;font-weight:bold;font-size: 15px;">
            <span id="open-cases">
                <button class="tablink" style="background: none; border: none; border-radius: 20px;padding-left: 20px; padding-right: 20px; color: black;" onclick="openLink(event, 'cases');"> 
                    Cases
                </button>
            </span>
        </div>
        <div class="text-center" style="float: left; width: 33%;margin-top: 10px;font-weight:bold;font-size: 15px;">
            <span id="open-cases">
                <button class="tablink" style="border: none; border-radius: 20px;padding-left: 20px; padding-right: 20px; color: black; background: none" onclick="openLink(event, 'lawyers');"> 
                    Lawyers
                </button>
            </span>
        </div>
        <div class="text-center" style="float: left; width: 33%;margin-top: 10px;font-weight:bold;font-size: 15px;">
            <span id="open-cases">
                <button class="tablink" style="background: none; border: none; border-radius: 20px;padding-left: 20px; padding-right: 20px; color: black;" onclick="openLink(event, 'ai');"> 
                    AI Doc
                </button>
            </span>
        </div>

    </div><!--end of main links head-->


    <br><br>


    <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-center theMobilePhone center w3-card-4 w3-animate-top"  style="border-radius: 30px;background-image: url('3.jpg'); background-repeat: no-repeat; background-attachment: fixed; width: 90%!important;margin: auto!important;" class="theMobilePhone">
            <br>
                <div class="row d-flex justify-content-center">
                <div class="">
                    <div>
                        <form class="p-3 p-xl-4" method="post" action="include/case.php">
                            <h2 class="text-center" style="font-weight: bold;"> Add Case</h2> <br>
                            <div class="mb-3"><input class="form-control" type="text" id="name-1" name="caseName" placeholder="Name your Case"></div>
                            <div class="mb-3"><textarea class="form-control" id="message-1" name="caseDescription" rows="6" placeholder="Put in a description for your case please"></textarea></div>
                            <div><button style="border-radius: 50px; color: white; background: #ff0f17; border: none; width: 120px; margin-left: 5px; padding: 5px 15px;" class="w3-left shadow" type="reset" onclick="document.getElementById('id02').style.display='none'">Cancel </button></div>
                            <div><button style="border-radius: 50px; color: white; background: #497fe9; border: none; width: 120px; margin-right: 5px; padding: 5px 15px;" class="shadow w3-right" type="submit">Add</button></div>
                            <p style="margin: 10px!important;color: white!important;">......</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
           
    <!--case section-->
    <div id="cases" class=" casesahhdd myLink" style="margin-left: 8%!important;margin-right: 8%!important;margin-top: 20px!important;padding-bottom: 100px; background-color: #f1f1f1; border-radius: 30px;">


        <div id="hidethis" class="w3-modal">
            <div class="w3-modal-content w3-center theMobilePhone center w3-card-4 w3-animate-top"  style="border-radius: 30px;background-image: url('3.jpg'); background-repeat: no-repeat; background-attachment: fixed; width: 90%!important;margin: auto!important;" class="theMobilePhone">
            <br>
                <div class="row d-flex justify-content-center">
                    <div class="">
                        <div>
                            <form class="p-3 p-xl-4" method="post" action="include/case.php">
                                <h2 class="text-center" style="font-weight: bold;"> Add Case</h2> <br>
                                <div class="mb-3"><input class="form-control" type="text" id="name-1" name="caseName" placeholder="Name your Case"></div>
                                <div class="mb-3"><textarea class="form-control" id="message-1" name="caseDescription" rows="6" placeholder="Put in a description for your case please"></textarea></div>
                                <div><button style="border-radius: 50px; color: white; background: #ff0f17; border: none; width: 120px; margin-left: 5px; padding: 5px 15px;" class="w3-left shadow" type="reset" onclick="document.getElementById('hidethis').style.display='none'">Cancel </button></div>
                                <div><button style="border-radius: 50px; color: white; background: #497fe9; border: none; width: 120px; margin-right: 5px; padding: 5px 15px;" class="shadow w3-right" type="submit">Add</button></div>
                                <p style="margin: 10px!important;color: white!important;">......</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $user_id = $_SESSION['user_id'];
        $sql3 = "SELECT COUNT(*) as count FROM cases WHERE clientid = '$user_id'";

        $result3 = mysqli_query($conn, $sql3);

        if ($result3) {
            $row3 = mysqli_fetch_assoc($result3);
            $caseCount = $row3['count'];

            // Check if there are cases for the client
            if ($caseCount > 0) {
                // Display Div B because there are cases
                echo " <div class='case-available' id='list-of-cases'>";
                echo '<br> <img class="smallbutton" style="cursor: pointer; width: 12%;margin-bottom: 5px; margin-left: 5%;" src="2.png"  onclick="showingFunction()">';
                    $user_id = $_SESSION['user_id'];
                    $sql2 = "SELECT * FROM cases WHERE clientid = '$user_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_assoc($result2)) {
                
                    
                echo '<div style="background-color: white; border-radius: 10px; width: 90%; margin: auto;box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);">
                            <h4 style="margin-left: 2%;">';
                echo '<button style="border: none; background: none;text-align: left; color: #5a88e5" onclick="openchat(' . $row['caseid'] . ')">';
                echo $row['name'] . '</h4>
                            <p style="margin-left: 3%; margin-top: -10px!important;">';
                echo $row['description'] . '</p>
                        </button>
                      </div>';
                
                        }
                echo '</div>';
            } else {
                // Display Div A because there are no cases
                echo '<div class="' . 'case-not-available text-center"' .'>
                    <img src="1.png" style="width: 100%">
                    <p class="theP" style="text-align: center;">
                        you currently have no legal case <br>
                        if you want to add a case <br>
                        click the button bellow
                    </p>
                    <img class="theButton kaButton" style="cursor: pointer;" src="2.png"  onclick="showingFunction()">
                    </div>';
            }
        } else {
            // Handle any errors in the SQL query
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        echo '<div class="sticky-bottom text-center" style="display: none;">
                <div class="message-composition-box" style="position: fixed; bottom: 0; left: 0; right: 0; padding: 10px; background-image: linear-gradient(to right, #36d0dc , #3763f4);">
                    <input style="width: 80%;border-radius: 30px; padding: 5px; border: none; background-color: white" type="text" placeholder="     Say something">
                      <button type="submit" class="" style="border: none; background:transparent;">
                         <i class="fas fa-paper-plane" style="color:black!important;padding: 2px!important;"></i>
                     </button>
                      <button type="button" class="" style="border: none; background:transparent;">
                        <i class="fas fa-paperclip" style="color:black!important;padding: 2px!important;"></i>
                      </button>
                </div>
            </div>';
        ?>
    </div>

    <div id='theChat'>
        
    </div>

    <!--lawyer section-->
    <div id='lawyers' class='text-center casesadd myLink' style='margin-left: 50px!important;margin-right: 50px!important;margin-top: 20px!important; background-color: #fafafa; border-radius: 30px;'>
        <p class='text-center'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

    </div><!-- end of lawyer section-->


    <!--AI doc section-->
    <div id="ai" class="text-center casesadd myLink" style="margin-left: 50px!important;margin-right: 50px!important;margin-top: 20px!important; background-color: #fafafa; border-radius: 30px;">
            <img src="1.png" style="width: 100%">
            <p style="text-align: center;">
                You can be asking our AI for any legal help
            </p>


            <div class="sticky-bottom text-center" style="display: none;">
                <div class="message-composition-box" style="position: fixed; bottom: 0; left: 0; right: 0; padding: 10px; background-image: linear-gradient(to right, #36d0dc , #3763f4);">
                    <input style="width: 80%;border-radius: 30px; padding: 5px; border: none; background-color: white" type="text" placeholder="     Say something">
                      <button type="submit" class="" style="border: none; background:transparent;">
                         <i class="fas fa-paper-plane" style="color:black!important;padding: 2px!important;"></i>
                     </button>
                      <button type="button" class="" style="border: none; background:transparent;">
                        <i class="fas fa-paperclip" style="color:black!important;padding: 2px!important;"></i>
                      </button>
                </div>
            </div>         
    </div><!-- end of AI doc section-->





</section>
    

<div id="thechat" style="display: none;">
    <!-- Content will be dynamically loaded here by JavaScript -->
    <p>hie man</p>
</div>


<script>
function openchat(caseid) {
    // Make the 'thechat' div visible
    document.getElementById('thechat').style.display = 'block';
    document.getElementById("cases").style.display = "none"
    
    // Retrieve information from the database using AJAX
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Assuming your server returns the information in JSON format
            var data = JSON.parse(this.responseText);

            // Now you can use the retrieved data as needed
            // For example, update the content of the 'thechat' div
            document.getElementById('thechat').innerHTML = data;

            /*if (data.lawyerid == null) {
                document.getElementById('thechat').innerHTML = "there is no lawyer";

            } else {
                document.getElementById('thechat').innerHTML = "Case ID: " + data.caseid + "<br>Details: " + data.name + data.clientid;
            }*/
            
        }
    };

    // Adjust the URL and method based on your server setup
    xmlhttp.open("GET", "try1.php?caseid=" + caseid, true);
    xmlhttp.send();
}
</script>

<script>
// Tabs
function showingFunction(){
    document.getElementById("hidethis").style.display = "block";
}
function hidingFunction(){
    document.getElementById("hidethis").style.display = "none";
}

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