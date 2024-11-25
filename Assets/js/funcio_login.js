
const email = document.getElementById('txtEmail');
const password = document.getElementById('txtpassword');
const loginButton = document.getElementById('loginButton');
const loginForm = document.getElementById('loginForm');
const emailError = document.getElementById('emailError');
let emailValidated = false;
let passwordValidated = false;

loginButton.addEventListener('click', function() {
  event.preventDefault();
}
)

function validateForm() {
 //Primer validem si els camps han estat omplerts

 
 
 
    if (email.value.trim() !== "" && password.value.trim() !== "") {
    loginButton.disabled = false;
    loginButton.classList.add('enabled');
    loginButton.classList.add('buttonOK'); // Habilita el botó i li done un format al cursor pointer
    loginButton.classList.remove('buttonNoOK'); // Elimine l'estat inhabilitat

    
  } else {

    loginButton.disabled = true;
    loginButton.classList.remove('enabled');
    loginButton.classList.add('buttonNoOK'); // Indique que no està disponibl el botó
    loginButton.classList.remove('buttonOK'); // Agregue la classe inhabilitat

    

    if(!emailValidated){
        emailError.classList.remove('error-message')
        emailError.classList.add('no-error')
    }else{
        emailError.classList.add('error-message')
        emailError.classList.remove('no-error')
  }

  

  emailValidated = true;
  passwordValidated = true;
}}

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
                                // Si l'inici de sessió és correcte
                                  
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
            });

