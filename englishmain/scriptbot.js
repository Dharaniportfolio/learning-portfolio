const chatbox = document.querySelector('.chatbox');
const textarea = document.querySelector('textarea');
const sendButton = document.getElementById('send-btn');

// Function to handle sending a message
function sendMessage() {
  const message = textarea.value.trim();

  if (message !== '') {
    // Create a new outgoing chat element
    const outgoingChat = document.createElement('li');
    outgoingChat.classList.add('chat', 'outgoing');
    outgoingChat.innerHTML = `<p>${message}</p>`;

    // Append the outgoing chat to the chatbox
    chatbox.appendChild(outgoingChat);

    // Generate a simple chatbot reply
    const reply = generateReply(message);

    // Create a new incoming chat element for the chatbot reply
    const incomingChat = document.createElement('li');
    incomingChat.classList.add('chat', 'incoming');
    incomingChat.innerHTML = `
      <span class="material-symbols-outlined">smart_toy</span>
      <span class="material-symbols-outlined">close</span>
      <p>${reply}</p>
    `;

    // Append the incoming chat to the chatbox
    chatbox.appendChild(incomingChat);

    // Clear the textarea
    textarea.value = '';

    // Scroll to the bottom of the chatbox
    chatbox.scrollTop = chatbox.scrollHeight;
  }
}

// Function to generate a simple chatbot reply
function generateReply(message) {
  // Add your logic here to generate the chatbot's reply based on the user's message
  // For simplicity, let's just return a generic reply
  return "Thank you for your message. Our team will get back to you soon!";
}

// Event listener for send button click
sendButton.addEventListener('click', sendMessage);

// Event listener for pressing Enter key in the textarea
textarea.addEventListener('keydown', function (event) {
  if (event.key === 'Enter' && !event.shiftKey) {
    event.preventDefault();
    sendMessage();
  }
});