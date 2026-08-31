document.addEventListener('DOMContentLoaded', function() {
    const userId = 12; // Example current user ID

    function loadContacts() {
        fetch(`config/fetch_conversations.php?user_id=${userId}`)
            .then(response => response.json())
            .then(data => {
                const chatList = document.querySelector('.chat-list');
                chatList.innerHTML = '';

                data.forEach(contact => {
                    const contactDiv = document.createElement('div');
                    contactDiv.className = 'contact';
                    contactDiv.dataset.contactId = contact.id;
                    contactDiv.innerHTML = `
                        <img src="${contact.fromm_profile}" alt="${contact.fromm}">
                        <div>
                            <div>${contact.fromm}</div>
                            <div>${contact.message}</div>
                        </div>
                        ${contact.is_read === 0 ? `<span class="badge">New</span>` : ''}
                        <div>${formatTimeAgo(contact.created_at)}</div>
                    `;

                    contactDiv.addEventListener('click', () => loadMessages(contact.id));
                    chatList.appendChild(contactDiv);
                });
            });
    }

    function loadMessages(contactId) {
        fetch(`config/fetch_messages.php?user_id=${userId}&contact_id=${contactId}`)
            .then(response => response.json())
            .then(data => {
                const messagesDiv = document.querySelector('.messages');
                messagesDiv.innerHTML = '';

                data.forEach(message => {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = `message ${message.sender_id == userId ? 'sent' : 'received'}`;
                    messageDiv.textContent = message.message;
                    messagesDiv.appendChild(messageDiv);
                });
            });
    }

    function sendMessage(receiverId) {
        const messageInput = document.getElementById('message-input');
        const message = messageInput.value;

        if (message.trim() !== '') {
            fetch('config/send_message.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    sender_id: userId,
                    receiver_id: receiverId,
                    message: message
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    loadMessages(receiverId);
                    messageInput.value = '';
                }
            });
        }
    }

    function formatTimeAgo(timestamp) {
        const date = new Date(timestamp);
        const now = new Date();
        const secondsAgo = Math.floor((now - date) / 1000);
        const minutesAgo = Math.floor(secondsAgo / 60);
        const hoursAgo = Math.floor(minutesAgo / 60);
        const daysAgo = Math.floor(hoursAgo / 24);

        if (daysAgo > 0) {
            return `${daysAgo} day(s) ago`;
        } else if (hoursAgo > 0) {
            return `${hoursAgo} hour(s) ago`;
        } else if (minutesAgo > 0) {
            return `${minutesAgo} minute(s) ago`;
        } else {
            return `${secondsAgo} second(s) ago`;
        }
    }

    document.getElementById('send-button').addEventListener('click', function() {
        const receiverId = document.querySelector('.contact.active').dataset.contactId;
        sendMessage(receiverId);
    });

    loadContacts();
});
