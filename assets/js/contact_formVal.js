
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var name = document.getElementById('name').value.trim();
        var compName = document.getElementById('compName').value.trim();
        var email = document.getElementById('email').value.trim();
        var cellphone = document.getElementById('cellphone').value.trim();
        var service = document.getElementById('service').value.trim();
        var message = document.getElementById('message').value.trim();
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

        // Company name validation
        if (compName === '' || !/^[A-Za-z]{2,}$/.test(compName)) {
            document.querySelector('#compName + .error-message').textContent = 'Company name should contain at least 2 letters and no numbers';
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
        if (cellphone === '' || !/^\d{10}$/.test(cellphone)) {
            document.querySelector('#cellphone + .error-message').textContent = 'Phone number should be 10 digits';
            isValid = false;
        }

        // Service validation
        if (service === '') {
            document.querySelector('#service + .error-message').textContent = 'Service is required';
            isValid = false;
        }

        // Message validation
        if (message === '') {
            document.querySelector('#message + .error-message').textContent = 'Message is required';
            isValid = false;
        }

        // reCAPTCHA validation
        if (recaptchaResponse === '') {
           // alert('Please complete the reCAPTCHA');
            isValid = false;
        }

        if (isValid) {
            // If form is valid, submit it
            event.target.submit();
        }
    });

    // Email format validation function
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
