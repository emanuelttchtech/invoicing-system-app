document.getElementById('form_submit').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    var name = document.getElementById('name').value.trim();
    var surname = document.getElementById('surname').value.trim();
    var email = document.getElementById('email').value.trim();
    var cellphone = document.getElementById('cellphone').value.trim();
    var resume = document.getElementById('resume').value.trim();
    var recaptchaResponse = grecaptcha.getResponse();

    // Reset error messages
    var errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(function(element) {
        element.textContent = '';
    });

    var isValid = true;

    // Name validation
    if (name === '' || !/^[A-Za-z]{2,}$/.test(name)) {
        document.querySelector('#name + .error-message').textContent = 'Name should contain at least 2 letters and no numbers';
        isValid = false;
    }

    // Surname validation
    if (surname === '' || !/^[A-Za-z]{2,}$/.test(surname)) {
        document.querySelector('#surname + .error-message').textContent = 'Surname should contain at least 2 letters and no numbers';
        isValid = false;
    }

    // Email validation
    if (email === '') {
        document.querySelector('#email + .error-message').textContent = 'Email is required';
        isValid = false;
    } else if (!isValidEmail(email)) {
        document.querySelector('#email + .error-message').textContent = 'Invalid email format';
        isValid = false;
    }

    // Phone number validation
    if (cellphone === '' || !/^\d{10,13}$/.test(cellphone)) {
        document.querySelector('#cellphone + .error-message').textContent = 'Phone number should be 10 to 13 digits';
        isValid = false;
    }

    // Resume validation
    if (resume === '') {
        document.querySelector('#resume + .error-message').textContent = 'Resume file is required';
        isValid = false;
    }

    // reCAPTCHA validation
    if (recaptchaResponse === '') {
        alert('Please complete the reCAPTCHA');
        isValid = false;
    }

    if (isValid) {
        // If form is valid, submit it
        document.getElementById('form_submit').submit();
    }
});

// Email format validation function
function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
