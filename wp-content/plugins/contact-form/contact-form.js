const form = document.getElementById('contact-form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');

form.addEventListener('submit', function(event) {
    let errors = [];
    if (nameInput.value.trim() === '') {
        errors.push('Please enter your name');
    }
    if (emailInput.value.trim() === '') {
        errors.push('Please enter your email');
    } else if (!isValidEmail(emailInput.value)) {
        errors.push('Please enter a valid email');
    }
    if (messageInput.value.trim() === '') {
        errors.push('Please enter a message');
    }
    if (errors.length > 0) {
        event.preventDefault();
        alert(errors.join('\n'));
    }
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
