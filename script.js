// script.js
document.getElementById('comment-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const title = document.getElementById('title').value;
    const author = document.getElementById('author').value;
    const content = document.getElementById('content').value;
    
    if (title && author && content) {
        const comment = {
            title,
            author,
            content
        };

        console.log('Posting comment:', comment); // Debugging line

        fetch('../add_comment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(comment)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Server response:', data); // Debugging line

            if (data.success) {
                displayComment(data.comment);
                document.getElementById('comment-form').reset();
            } else {
                alert('Error posting comment: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error); // Debugging line
            alert('Error posting comment.');
        });
    }
});

function displayComment(comment) {
    const commentContainer = document.createElement('div');
    commentContainer.classList.add('comment');
    commentContainer.setAttribute('data-id', comment.id);
    
    commentContainer.innerHTML = `
        <h3>${comment.title}</h3>
        <p class="author">by ${comment.author}</p>
        <p class="content">${comment.content}</p>
        <button onclick="deleteComment(${comment.id})">Delete</button>
    `;
    
    document.getElementById('comments-container').appendChild(commentContainer);
}

function deleteComment(id) {
    fetch('../delete_comment.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Server response:', data); // Debugging line

        if (data.success) {
            const comment = document.querySelector(`.comment[data-id="${id}"]`);
            comment.remove();
        } else {
            alert('Error deleting comment.');
        }
    })
    .catch(error => {
        console.error('Error:', error); // Debugging line
        alert('Error deleting comment.');
    });
}
