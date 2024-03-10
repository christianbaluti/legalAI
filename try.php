<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Progress Bar Demo</title>
<style>
    .progress-bar {
        width: 100%;
        background-color: #f0f0f0;
        height: 30px;
        position: relative;
    }

    .progress {
        height: 100%;
        background-color: blue;
        width: 0%;
        position: absolute;
        top: 0;
        left: 0;
    }

    .button-container {
        margin-top: 20px;
    }

    .button {
        padding: 10px 20px;
        margin-right: 10px;
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="progress-bar">
    <div class="progress"></div>
</div>
<div class="button-container">
    <button class="button" onclick="updateProgress(25, this)">A</button>
    <button class="button" onclick="updateProgress(25, this)">B</button>
    <button class="button" onclick="updateProgress(25, this)">C</button>
    <button class="button" onclick="updateProgress(25, this)">D</button>
</div>

<script>
    let progress = 0;

    function updateProgress(value, button) {
        const progressBar = document.querySelector('.progress');
        const currentProgress = parseInt(progressBar.style.width || 0);
        
        if (button.classList.contains('active')) {
            progress -= value;
            progressBar.style.width = (currentProgress - value) + '%';
            button.classList.remove('active');
        } else {
            progress += value;
            progressBar.style.width = (currentProgress + value) + '%';
            button.classList.add('active');
        }

        if (progress < 0) progress = 0;
        if (progress > 100) progress = 100;

        // Update progress text
        progressBar.innerText = progress + '% done';
    }
</script>
</body>
</html>
