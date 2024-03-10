<?php
    // Get the prompt from the query parameter
    $prompt = $_GET['prompt'];

    // Execute the Python script to interact with the model
    $command = escapeshellcmd('python C:/xampp/htdocs/1/script.py "' . $prompt . '"');
    $output = shell_exec($command);

    // Return the response
    echo $output;
?>
