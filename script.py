import sys
from transformers import GPT2LMHeadModel, GPT2Tokenizer

def generate_response(prompt, max_length=100, temperature=0.7, top_k=50, top_p=0.95, num_return_sequences=1):
    model_path = 'C:/xampp/htdocs/1/gpt2-finetuned'
    tokenizer = GPT2Tokenizer.from_pretrained(model_path)
    model = GPT2LMHeadModel.from_pretrained(model_path)

    input_ids = tokenizer.encode(prompt, return_tensors='pt')

    output = model.generate(
        input_ids,
        max_length=max_length,
        temperature=temperature,
        top_k=top_k,
        top_p=top_p,
        num_return_sequences=num_return_sequences,
    )

    generated_response = tokenizer.decode(output[0], skip_special_tokens=True)
    return generated_response

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python script.py <prompt>")
        sys.exit(1)
    
    user_input = sys.argv[1]

    response = generate_response(user_input, max_length=200, temperature=0.8)

    print(response)
