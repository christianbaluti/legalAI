// Include this JavaScript in your HTML file or link to an external file.

const startButton = document.getElementById('startButton');
const endButton = document.getElementById('endButton');
const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');
let localStream, remoteStream;
let peerConnection;

startButton.addEventListener('click', startCall);
endButton.addEventListener('click', endCall);

async function startCall() {
    localStream = await navigator.mediaDevices.getUserMedia({ audio: true, video: false });
    localVideo.srcObject = localStream;

    // Implement code to set up signaling (using PHP for signaling).
    // Exchange SDP offers and answers, and handle ICE candidates.

    // Create a peer connection.
    peerConnection = new RTCPeerConnection();

    // Add the local stream to the peer connection.
    localStream.getTracks().forEach(track => peerConnection.addTrack(track, localStream));

    // Set up event listeners for handling remote stream and ICE candidates.
    peerConnection.ontrack = handleRemoteStream;
    peerConnection.onicecandidate = handleIceCandidate;

    // Implement code to initiate signaling (offer creation and exchange).
}

function handleRemoteStream(event) {
    remoteStream = event.streams[0];
    remoteVideo.srcObject = remoteStream;
}

function handleIceCandidate(event) {
    if (event.candidate) {
        // Implement code to send ICE candidate to the other peer.
    }
}

function endCall() {
    // Implement code to close the peer connection and clean up resources.
    // Also, implement signaling to inform the other peer about ending the call.
    peerConnection.close();
    localVideo.srcObject = null;
    remoteVideo.srcObject = null;
}

// Inside your JavaScript code

// Function to send signaling data to the PHP server.
async function sendSignalingData(data) {
    try {
        await fetch('signal.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });
    } catch (error) {
        console.error('Error sending signaling data:', error);
    }
}

// Modify your existing code to include signaling data exchange.
// For example, after creating an offer:
async function startCall() {
    // ... (previous code)

    // Create an offer and set it as the local description.
    const offer = await peerConnection.createOffer();
    await peerConnection.setLocalDescription(offer);

    // Send the offer to the other peer.
    sendSignalingData({ offer: peerConnection.localDescription });

    // Implement code to handle the other peer's answer.
}

// After receiving an offer:
async function handleOffer(offer) {
    // Set the offer as the remote description.
    await peerConnection.setRemoteDescription(offer);

    // Create an answer and set it as the local description.
    const answer = await peerConnection.createAnswer();
    await peerConnection.setLocalDescription(answer);

    // Send the answer to the other peer.
    sendSignalingData({ answer: peerConnection.localDescription });
}

// After receiving an ICE candidate:
function handleIceCandidate(candidate) {
    // Add the ICE candidate to the peer connection.
    peerConnection.addIceCandidate(candidate);
}

// Modify your existing handleIceCandidate function to send the ICE candidate:
function handleIceCandidate(event) {
    if (event.candidate) {
        // Send the ICE candidate to the other peer.
        sendSignalingData({ iceCandidate: event.candidate });
    }
}
