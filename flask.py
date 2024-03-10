from flask import Flask, render_template, request
from transformers import GPT2LMHeadModel, GPT2Tokenizer

app = Flask(__name__)

# Load the fine-tuned model and tokenizer
model_path = 'C:/xampp/htdocs/1/gpt2-finetuned'
model = GPT2LMHeadModel.from_pretrained(model_path)
tokenizer = GPT2Tokenizer.from_pretrained(model_path)

# Function for generating responses
def generate_response(prompt, max_length=100, temperature=0.7, top_k=50, top_p=0.95, num_return_sequences=1):
    input_ids = tokenizer.encode(prompt, return_tensors='pt')

    # Generate response
    output = model.generate(
        input_ids,
        max_length=max_length,
        temperature=temperature,
        top_k=top_k,
        top_p=top_p,
        num_return_sequences=num_return_sequences,
    )

    # Decode and return the generated response
    generated_response = tokenizer.decode(output[0], skip_special_tokens=True)
    return generated_response

@app.route('/')
def index():
    return render_template('flask.html')

@app.route('/predict', methods=['POST'])
def predict():
    user_input = request.form['user_input']

    # Generate response from the model
    response = generate_response(user_input, max_length=200, temperature=0.8)

    return render_template('index.html', user_input=user_input, response=response)

if __name__ == '__main__':
    app.run(debug=True)
