<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Typing Effect</title>
<style>
    .container {
        margin-top: 50px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Image column -->
            <img src="assets/img/graphics-lawyer-937697.gif" alt="Lawyer Graphics" class="img-fluid">
        </div>
        <div class="col-md-9">
            <!-- Text column -->
            <button onclick="startTyping()">Start Typing</button>
            <p id="typing-text"></p>
        </div>
    </div>
</div>

<script>
    function startTyping() {
        // Text to be typed
        const textToType = "Hi!, I'm Lamulo, your Legal Assistant. I will help you craft your will. Before everything, I would like to get to know you first";

        // Delay between typing each character (in milliseconds)
        const typingSpeed = 50;

        // Get the paragraph element
        const paragraph = document.getElementById("typing-text");

        // Start typing
        typeText(textToType, 0, paragraph, typingSpeed);
    }

    // Function to simulate typing effect
    function typeText(text, index, paragraph, typingSpeed) {
        if (index < text.length) {
            paragraph.innerHTML += text.charAt(index);
            index++;
            setTimeout(function() {
                typeText(text, index, paragraph, typingSpeed);
            }, typingSpeed);
        }
    }
</script>
</body>
</html>
