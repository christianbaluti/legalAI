const API_TOKEN = "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";

import fetch from "node-fetch";
async function query(data) {
    const response = await fetch(
        "https://api-inference.huggingface.co/models/dbmdz/bert-large-cased-finetuned-conll03-english",
        {
            headers: { Authorization: `Bearer ${API_TOKEN}` },
            method: "POST",
            body: JSON.stringify(data),
        }
    );
    const result = await response.json();
    return result;
}
query({inputs:"My name is Sarah Jessica Parker but you can call me Jessica"}).then((response) => {
    console.log(JSON.stringify(response));
});
// [{"entity_group":"PER","score":0.9991337060928345,"word":"Sarah Jessica Parker","start":11,"end":31},{"entity_group":"PER","score":0.9979912042617798,"word":"Jessica","start":52,"end":59}]
