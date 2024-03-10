

    <?php
        require 'navbar.php';
        if (!isset($_SESSION['user_id'])){
            header("Location: index.php"); 
        }
     ?>
    

    <iframe src="chat.php" class="iframemobile"  style="border:none; width: 100%; height: 100%!important;">
    </iframe>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>