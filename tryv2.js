const express = require('express');
const bodyParser = require('body-parser');
const { GPT2Tokenizer, GPT2LMHeadModel } = require('transformers');

const app = express();
const port = 3000;

// Load the fine-tuned tokenizer and model
const tokenizer = GPT2Tokenizer.from_pretrained('C:/xampp/htdocs/1/gpt2-finetuned');
const model = GPT2LMHeadModel.from_pretrained('C:/xampp/htdocs/1/gpt2-finetuned');

// Middleware
app.use(bodyParser.json());

// Route for generating response
app.post('/generate', async (req, res) => {
    const { prompt } = req.body;

    try {
        const inputIds = tokenizer.encode(prompt, { return_tensors: 'pt' });

        // Generate response
        const output = await model.generate(inputIds, { max_length: 500 });

        // Decode and return the generated response
        const response = tokenizer.decode(output[0], { skipSpecialTokens: true });
        res.json({ response });
    } catch (error) {
        console.error('Error generating response:', error);
        res.status(500).json({ error: 'Error generating response' });
    }
});

// Start server
app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
