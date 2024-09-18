
document.addEventListener("DOMContentLoaded", function() {
    const showButtons = document.querySelectorAll('.show-answer');
    showButtons.forEach(button => {
        button.addEventListener('click', function() {
            const answer = button.nextElementElement;
            answer.classList.toggle('hidden');
        });
    });

    const likeButtons = document.querySelectorAll('.like-button');
    const dislikeButtons = document.querySelectorAll('.dislike-button');

    likeButtons.forEach(likeButton => {
        likeButton.addEventListener('click', function() {
            likeButton.classList.toggle('green');
            dislikeButtons.forEach(dislikeButton => dislikeButton.classList.remove('red'));
        });
    });

    dislikeButtons.forEach(dislikeButton => {
        dislikeButton.addEventListener('click', function() {
            dislikeButton.classList.toggle('red');
            likeButtons.forEach(likeButton => likeButton.classList.remove('green'));
        });
    });
});

