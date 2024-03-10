async function query(data) {
	const response = await fetch(
		"https://api-inference.huggingface.co/models/facebook/blenderbot_small-90M",
		{
			headers: { Authorization: "Bearer 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" },
			method: "POST",
			body: JSON.stringify(data),
		}
	);
	const result = await response.json();
	return result;
}

query({"inputs": "The answer to the universe is"}).then((response) => {
	console.log(JSON.stringify(response));
});