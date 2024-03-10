const API_TOKEN = "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";

async function sendMessage() {
    const userInput = document.getElementById("AIuserInput").value;
    try {
        const response = await query(userInput);
        const botResponse = response[0].generated_text;
        displayMessage(userInput, 'user');
        displayMessage(botResponse, 'bot');
        
        // Send data to PHP script to write to the database
        const currentTime = new Date().toISOString();
        const postData = {
            content: botResponse,
            starttime: currentTime,
            finishtime: currentTime,
            clientid: "?php echo $_SESSION['clientid']; ?>", // You need to set the client ID accordingly
            lawyerid: 0, // You need to set the lawyer ID accordingly
            table_name: 'aireplys' // You need to set the table name accordingly
        };
        await writeToDB(postData);
    } catch (error) {
        console.error(error);
        displayMessage('Something went wrong, try again later', 'error');
    }
}

async function query(data) {
    const response = await fetch(
        "https://api-inference.huggingface.co/models/christianbaluti/gptmodel",
        {
            headers: { Authorization: `Bearer ${API_TOKEN}` },
            method: "POST",
            body: JSON.stringify({ inputs: data, temperature: 0.9, wait_for_model: true, max_new_tokens: 800, top_k: 90, num_return_sequences: 10, top_p: 0.95, max_length: 250, max_time: 60, token: 1000, min_length: 120 }),
        }
    );
    const result = await response.json();
    return result;
}

async function writeToDB(data) {
    const response = await fetch('write_to_db.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });
    const result = await response.text();
    console.log(result); // Log the result from the PHP script (success or error)
}

function displayMessage(message, sender) {
    const conversationDiv = document.getElementById("AIconversation");
    const messageDiv = document.createElement("div");
    messageDiv.textContent = message;
    messageDiv.style.marginBottom = "10px";
    if (sender === 'user') {
        messageDiv.style.textAlign = 'right';
        messageDiv.style.color = 'blue';
    } else if (sender === 'error') {
        messageDiv.style.textAlign = 'center';
        messageDiv.style.color = 'red';
    } else {
        messageDiv.style.textAlign = 'left';
        messageDiv.style.color = 'green';
    }
    conversationDiv.appendChild(messageDiv);
}
