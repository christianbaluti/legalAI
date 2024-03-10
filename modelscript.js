async function loadModel() {
    const model = await transformers.GPT2LMHeadModel.fromPretrained('gpt2-finetuned');
    const tokenizer = await transformers.GPT2Tokenizer.fromPretrained('gpt2-finetuned');

    return { model, tokenizer };
}

async function generateResponse(model, tokenizer, prompt) {
    const input = tokenizer.encode(prompt);
    const output = await model.generate({ input_ids: input });
    const response = tokenizer.decode(output);

    return response;
}

async function sendMessage() {
    const userInput = document.getElementById('user-input').value;
    const chat = document.getElementById('chat');

    if (userInput.toLowerCase() === 'exit') {
        chat.innerHTML += `<div>You: ${userInput}</div>`;
        return;
    }

    const response = await generateResponse(model, tokenizer, userInput);
    chat.innerHTML += `<div>You: ${userInput}</div>`;
    chat.innerHTML += `<div>Model: ${response}</div>`;

    document.getElementById('user-input').value = '';
}

let model, tokenizer;

window.onload = async () => {
    ({ model, tokenizer } = await loadModel());
};
