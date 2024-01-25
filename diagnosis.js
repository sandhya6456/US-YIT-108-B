async function sendMessage() {
    var messageInput = document.getElementById('message-input');
    var message = messageInput.value.trim();

    if (message !== '') {
        // Show loader while waiting for the response
        showLoader();

        appendMessage('user', message);

        const endpointUrl = "https://87f2-103-89-235-242.ngrok-free.app/chat";
        try {
            const response = await fetch(endpointUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ prompt: message }),
            });

            if (response.ok) {
                const data = await response.json();
                setTimeout(function () {
                    appendMessage('bot', data.answer);
                    // Hide loader after receiving the response
                    hideLoader();
                }, 1000);
            }
        } catch (error) {
            console.error('Error:', error);
            // Handle errors if needed
            // Hide loader in case of an error
            hideLoader();
        }

        messageInput.value = '';
    }
}

function showLoader() {
    var loader = document.getElementById('loader');
    loader.style.display = 'block';
}

function hideLoader() {
    var loader = document.getElementById('loader');
    loader.style.display = 'none';
}

function appendMessage(sender, text) {
    var chatMessages = document.getElementById('chat-messages');
    var messageDiv = document.createElement('div');
    messageDiv.className = 'message ' + sender;

    // Create an image element
    var imgElement = document.createElement('img');
    imgElement.src = sender === 'user' ? 'img/user.png' : 'img/bot.png';
    imgElement.alt = sender.toUpperCase() + ' Image';
    imgElement.width = 30;
    imgElement.height = 30;

    // Create a container div for the image and text using flexbox
    var contentDiv = document.createElement('div');
    contentDiv.style.display = 'flex';
    contentDiv.style.alignItems = 'center';

    // Append the image and text to the content div
    contentDiv.appendChild(imgElement);

    // Create a div for the text to prevent HTML injection issues
    var textDiv = document.createElement('div');
    textDiv.innerHTML = text;

    // Append the text div to the content div
    contentDiv.appendChild(textDiv);

    messageDiv.appendChild(contentDiv);

    // Append the message div to the chat messages container
    chatMessages.appendChild(messageDiv);

    // Scroll to the bottom of the chat messages
    chatMessages.scrollTop = chatMessages.scrollHeight;
}
