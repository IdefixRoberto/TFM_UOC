const email = document.getElementById('txtEmail');
const password = document.getElementById('txtpassword');
const loginButton = document.getElementById('loginButton');
const loginForm = document.getElementById('loginForm');
const emailError = document.getElementById('emailError');

loginButton.addEventListener('click', function(e) {
  e.preventDefault();
  validateForm();
});

// Funció per validar el format del correu electrònic
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expressió regular genèrica
  return emailRegex.test(email);
}

function validateForm() {
  // Primer capturem el valor del correu electrònic
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();

  // Validem si els camps han estat omplerts i si el correu electrònic és vàlid
  if (emailValue !== "" && passwordValue !== "" && isValidEmail(emailValue)) {
    loginButton.disabled = false;
    loginButton.classList.add('enabled');
    loginButton.classList.add('buttonOK'); // Habilita el botó i li dona un format al cursor pointer
    loginButton.classList.remove('buttonNoOK'); // Elimina l'estat inhabilitat
    emailError.classList.add('no-error');
    emailError.classList.remove('error-message');
  } else {
    loginButton.disabled = true;
    loginButton.classList.remove('enabled');
    loginButton.classList.add('buttonNoOK'); // Indica que el botó no està disponible
    loginButton.classList.remove('buttonOK'); // Afegeix la classe inhabilitat

    if (!isValidEmail(emailValue)) {
      emailError.classList.remove('no-error');
      emailError.classList.add('error-message');
    } else {
      emailError.classList.add('no-error');
      emailError.classList.remove('error-message');
    }
  }
}

email.addEventListener('input', validateForm);
password.addEventListener('input', validateForm);

const togglePassword = document.querySelector('#togglePassword');
const passwordField = document.querySelector('#txtpassword');

togglePassword.addEventListener('click', function () {
  const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordField.setAttribute('type', type);
  this.classList.toggle('fa-eye-slash');
});

document.addEventListener('DOMContentLoaded', function() {
  if (loginForm) {
    loginForm.onsubmit = function(e) {
      e.preventDefault();
      let srtemail = email.value.trim();
      let srtpassword = password.value.trim();
      if (srtemail === '' || srtpassword === '') {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Completa correctament tots els camps",
        });
        return false;
      } else {
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + 'Login/loginUser';
        let formData = new FormData(loginForm);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
      }
    }
  }
});

loginButton.addEventListener('click', function(e) {
  e.preventDefault();
  let srtemail = email.value.trim();
  let srtpassword = password.value.trim();
  if (srtemail === '' || srtpassword === '') {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Completa correctament tots els camps",
    });
    return false;
  } else {
    let ajaxUrl = base_url + 'Login/loginUser';
    let formData = new FormData(loginForm);
    fetch(ajaxUrl, {
      method: 'POST',
      body: formData,
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en la sol·licitud');
      }
      return response.json();
    })
    .then(data => {
      if (data.msg === 'Aquest usuari està inactiu') {
        Swal.fire({
          icon: "warning",
          title: "Usuari inactiu",
          text: "Si es un error contacte amb l'administrador",
        });
      } else if (data.msg === 'Aquest usuari està donat de baixa') {
        Swal.fire({
          icon: "info",
          title: "Usuari donat de baixa",
          text: "Aquest usuari està donat de baixa",
        });
      } else if (data.status) {
        Swal.fire({
          icon: "success",
          title: "Sessió iniciada correctament",
          text: "Les dades introduïdes no són correctes",
        });
        setTimeout(() => {
          window.location = base_url + 'Index';
        }, 2000);
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Les dades introduïdes no són correctes",
        });
        console.log("Error en l'inici de sessió");
      }
    })
    .catch(error => {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: error,
      });
      console.error('Error:', error);
    });
  }
});
