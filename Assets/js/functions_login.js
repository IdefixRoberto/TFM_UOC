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
<<<<<<< HEAD
    // Primer valide si els camps han estat omplerts
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expressió regular per validar el format del correu electrònic

    if (email.value.trim() !== "" && password.value.trim() !== "" && emailPattern.test(email.value.trim())) {
=======
    // Comprova si els camps estan complets i el correu és vàlid
    const emailValid = emailPattern.test(email.value.trim());
    const passwordValid = password.value.trim() !== "";
    
    if (emailValid && passwordValid) {
>>>>>>> 6ba31bd6b6aff5048acb845e0e6f7f0ac953efeb
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
<<<<<<< HEAD
        


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
                            
                              // Processa la resposta rebuda
                              if (data.msg === 'Aquest usuari està inactiu') {
                                // Aquí gestiones el cas d'usuari inactiu
                                Swal.fire({
                                    icon: "warning",
                                    title: "Usuari inactiu",
                                    text: "Si es un error contacte amb l'administrador", // Mostra el missatge del backend
                                }); 
                            }

                            else if (data.msg === 'Aquest usuari està donat de baixa') {
                                // Aquí gestiones el cas d'usuari inactiu
                                Swal.fire({
                                    icon: "info",
                                    title: "Usuari donat de baixa",
                                    text: "Aquest usuari està donat de baixa", // Mostra el missatge del backend
                                });
                            }
                                else if (data.status) {
                                
                                Swal.fire({
                                    icon: "success",
                                    title: "Session iniciada correctament",
                                    text: "Les dades introduïdes no són correctes",
                                });
                                 // Retarde la direcció per a que es pugui veure el missatge de sessió iniciada correctament; 
                                 setTimeout(() => {
                                    window.location = base_url + 'Index'; 
                                }, 2000);
                                  
                              } 

                            
                              
                              
                              else {

                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: "Les dades introduïdes no són correctes",
                                });
                                  // Si hi ha un error en l'inici de sessió
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
=======
        } else if (data.status) {
            Swal.fire({
                icon: "success",
                title: "Sessió iniciada correctament",
                text: "Benvingut!",
>>>>>>> 6ba31bd6b6aff5048acb845e0e6f7f0ac953efeb
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
                        