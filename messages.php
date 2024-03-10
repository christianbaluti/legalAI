



    <section><!--start of main section of everything-->

    <div class="container" style="margin-top:20px;"><!--start of main links head-->
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

    <!--case chat section-->
    <div id="cases" class="text-center caseschat myLink" style="margin-left: 8%!important; padding-bottom: 2%; padding-top: 2%;margin-right: 8%!important;margin-top: 20px!important;padding-bottom: px; background-color: #f1f1f1; border-radius: 30px;">





            <div class="sticky-bottom text-center" style="display: ;">
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
    </div>


    <!--lawyer section-->
    <div id="lawyers" class="text-center casesadd myLink" style="margin-left: 50px!important;margin-right: 50px!important;margin-top: 20px!important; background-color: #fafafa; border-radius: 30px;">
        <p class="text-center">
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