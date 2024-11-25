const base_url = 'http://localhost/TFM/';
const email = document.getElementById('txtEmail');
const password = document.getElementById('txtpassword');
const loginButton = document.getElementById('loginButton');
const loginForm = document.getElementById('loginForm');
const emailError = document.getElementById('emailError');

// Patró per validar el format d'email extret de la web https://www.coderbox.net/blog/validar-email-usando-javascript-y-expresiones-regulares/
const emailPattern = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

// Funció de validació contínua
function validateForm() {
    // Comprova si els camps estan complets i el correu és vàlid
    const emailValid = emailPattern.test(email.value.trim());
    const passwordValid = password.value.trim() !== "";
    
    if (emailValid && passwordValid) {
        loginButton.disabled = false;
        loginButton.classList.add('enabled', 'buttonOK');
        loginButton.classList.remove('buttonNoOK');
        emailError.classList.remove('error-message');
        emailError.classList.add('no-error');
    } else {
        loginButton.disabled = true;
        loginButton.classList.remove('enabled', 'buttonOK');
        loginButton.classList.add('buttonNoOK');

        // Mostra error si l'email és incorrecte
        if (!emailValid) {
            emailError.classList.add('error-message');
            emailError.classList.remove('no-error');
        } else {
            emailError.classList.remove('error-message');
            emailError.classList.add('no-error');
        }
    }
}

// el navegador esta escoltant si hi ha canvis en els camps de email i password que son inputs
email.addEventListener('input', validateForm);
password.addEventListener('input', validateForm);


loginForm.addEventListener('submit', function (e) {
    e.preventDefault();
    
    // Comprovació final abans d'enviar
    //Validació per si es manipula el HTML
    if (!emailPattern.test(email.value.trim()) || password.value.trim() === '') {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Completa correctament tots els camps",
        });
        return;
    }

    // Enviament de dades amb Fetch
    const ajaxUrl = base_url + 'Login/loginUser';
    const formData = new FormData(loginForm);

    fetch(ajaxUrl, {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.msg === 'Aquest usuari està inactiu') {
            Swal.fire({
                icon: "warning",
                title: "Usuari inactiu",
                text: "Si és un error, contacta amb l'administrador",
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
                text: "Benvingut!",
            });
            setTimeout(() => {
                //Li done un temporizador per a que es visualitze durant un temps
                window.location = base_url + 'index';
            }, 2120);
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Les dades introduïdes no són correctes",
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Error en la sol·licitud",
        });
        console.error('Error:', error);
    });
});









   
            email.addEventListener('input', validateForm);
            password.addEventListener('input', validateForm);
            
                        const togglePassword = document.querySelector('#togglePassword');
                        const passwordField = document.querySelector('#txtpassword');
                        
                        togglePassword.addEventListener('click', function () {
                            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                            passwordField.setAttribute('type', type);
                            
                            this.classList.toggle('fa-eye-slash');
                        });
                        