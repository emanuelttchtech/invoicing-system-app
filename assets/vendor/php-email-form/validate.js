/**
* PHP Email Form Validation - v3.6
* URL: https://bootstrapmade.com/php-email-form/
* Author: BootstrapMade.com
*/
(function () {
  "use strict";

  function validateEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
  }

  let forms = document.querySelectorAll('.php-email-form');

  forms.forEach(function(e) {
    e.addEventListener('submit', function(event) {
      event.preventDefault();

      let thisForm = this;

      // Check if reCAPTCHA is checked
      let recaptchaResponse = grecaptcha.getResponse();
      if (recaptchaResponse === "") {
        displayError(thisForm, 'Please complete the reCAPTCHA validation.', true);
        return;
      }
      else {
        thisForm.querySelector('.recaptcha-error-message').classList.remove('d-block');
        displayError(thisForm, " ", true);

        // Email validation
        let emailInput = thisForm.querySelector('input[type="email"]');
        if (emailInput && !validateEmail(emailInput.value)) {
          displayError(thisForm, 'Invalid email address.', false);
          return;
        }

        let action = thisForm.getAttribute('action');
        let formData = new FormData(thisForm);
        formData.set('recaptcha-response', recaptchaResponse);

        // Show the loading message
        thisForm.querySelector('.loading').classList.add('d-block');
        thisForm.querySelector('.error-message').classList.remove('d-block');
        // thisForm.querySelector('.sent-message').classList.add('d-block');
        // thisForm.reset();
        // thisForm.querySelector('.recaptcha-error-message').classList.remove('d-block');

        php_email_form_submit(thisForm, action, formData);
      }
    });
  });

  window.recaptchaCallback = function() {
    let form = document.querySelector('.php-email-form');
    form.querySelector('.recaptcha-error-message').classList.remove('d-block');
  };

  window.recaptchaExpired = function() {
    let form = document.querySelector('.php-email-form');
    displayError(form, 'reCaptcha expired. Please complete the reCaptcha again.', true);
  };

  function php_email_form_submit(thisForm, action, formData) {
    fetch(action, {
      method: 'POST',
      body: formData,
      headers: {'X-Requested-With': 'XMLHttpRequest'}
    })
    .then(response => {
      if (response.ok) {
        return response.text();
      } else {
        throw new Error(`${response.status} ${response.statusText} ${response.url}`);
      }
    })
    .then(data => {
      thisForm.querySelector('.loading').classList.remove('d-block');
      if (data.trim() == 'OK') {
        thisForm.querySelector('.sent-message').classList.add('d-block');
        thisForm.reset();
      } else {
        throw new Error(data ? data : 'Form submission failed and no error message returned from: ' + action);
      }
    })
    .catch(error => {
      displayError(thisForm, error);
    });
  }

  function displayError(thisForm, error, isRecaptcha = false) {
    thisForm.querySelector('.loading').classList.remove('d-block');
    if (isRecaptcha) {
      thisForm.querySelector('.recaptcha-error-message').innerHTML = error;
      thisForm.querySelector('.recaptcha-error-message').classList.add('d-block');
    } else {
      // thisForm.querySelector('.error-message').innerHTML = error;
      // thisForm.querySelector('.error-message').classList.add('d-block');
      thisForm.querySelector('.recaptcha-error-message').classList.remove('d-block');
    }
  }
})();
