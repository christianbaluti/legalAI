<html>

<head>
    <style>
body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Styling the '<' symbol */
        button::before {
            content: '\2039'; /* Unicode for the '<' symbol */
            margin-right: 5px;
        }
    </style>
</head>


<body>
    
    <div id="root"></div>
    <?php
        session_start();
        if(isset($_GET['caseid'])) {
                // Retrieve and store the caseid
                $caseid = $_GET['caseid'];
                $sender = $_GET['sender'];
            }

     ?>

<script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
<script>
window.onload = function () {
    function getUrlParams(url) {
        let urlStr = url.split('?')[1];
        const urlSearchParams = new URLSearchParams(urlStr);
        const result = Object.fromEntries(urlSearchParams.entries());
        return result;
    }


        // Generate a Token by calling a method.
        // @param 1: appID
        // @param 2: serverSecret
        // @param 3: Room ID
        // @param 4: User ID
        // @param 5: Username
    const roomID = getUrlParams(window.location.href)['roomID'] || (Math.floor(Math.random() * 10000) + "");
    const userID = Math.floor(Math.random() * 10000) + "";
    const userName = "<?php echo $_SESSION['username']?>";
    const appID = 1040855060;
    const serverSecret = "8b1fc8e7215909ecc6c622b197829187";
    const kitToken = ZegoUIKitPrebuilt.generateKitTokenForTest(appID, serverSecret, roomID, userID, userName);
    let theurl = window.location.protocol + '//' + window.location.host  + window.location.pathname + '?roomID=' + roomID;
    
        const zp = ZegoUIKitPrebuilt.create(kitToken);
        zp.joinRoom({
            container: document.querySelector("#root"),
            sharedLinks: [{
                name: 'Personal link',
                url: window.location.protocol + '//' + window.location.host  + window.location.pathname + '?roomID=' + roomID,
            }],
            scenario: {
                mode: ZegoUIKitPrebuilt.VideoConference,
            },
                
           	turnOnMicrophoneWhenJoining: true,
           	turnOnCameraWhenJoining: false,
           	showMyCameraToggleButton: false,
           	showMyMicrophoneToggleButton: true,
           	showAudioVideoSettingsButton: false,
           	showScreenSharingButton: false,
           	showTextChat: false,
           	showUserList: false,
           	maxUsers: 2,
           	layout: "Auto",
           	showLayoutButton: false,
         
            });
        sendLinkToServer(theurl);
}

let caseid = "<?php echo $caseid;?>";
let sender = "<?php echo $sender;?>";
console.log(sender);

function sendLinkToServer(link) {
    // Send an AJAX request to the server to insert the link into the database
    console.log(window.location.href);
    $.ajax({
        type: "POST",
        url: "insert_link.php", // Replace with the actual server-side script
        data: { caseid: caseid, link: link, sender: sender },
        success: function (response) {
            // Handle the response if needed
            console.log(response);
        },
        error: function (error) {
            console.error("Error inserting link into the database: " + error.responseText);
        }
    });
}



</script>

<button onclick="endcall();">
    Go back
</button>
<script type="text/javascript">
    function endcall() {
        // body...
        window.location.href = 'chat_lawyer.php?caseid=' + encodeURIComponent(caseid)+ '#last';

        $.ajax({
        type: "POST",
        url: "endaudio.php", // Replace with the actual server-side script
        data: { caseid: caseid},
        success: function (response) {
            // Handle the response if needed
            console.log(response);
        },
        error: function (error) {
            console.error("Error inserting link into the database: " + error.responseText);
        }
    });
    }
</script>

</html>