
document.addEventListener('DOMContentLoaded', function() {
    let formUsuario = document.querySelector("#formUsuario");

    formUsuario.onsubmit = function(e) {
       
        e.preventDefault();
        let strIdentificacion = document.querySelector('#txtIdentificacion').value;
        let strNombre = document.querySelector('#txtNombre').value;
        let strApellido = document.querySelector('#txtApellido').value;
        let strEmail = document.querySelector('#txtEmail').value;
        let intTelefono = document.querySelector('#txtTelefono').value;

        let strPassword = document.querySelector('#txtPassword').value;

        if (strPassword == '' ||  strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || strPassword == '') {
            Swal.fire("Atenció", "Tots els camps son obligatoris.", "error");
            return false;
        }

        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) {
            if (elementsValid[i].classList.contains('is-invalid')) {
                Swal.fire("Atenció", "Per favor verifique tots els camps en roig.", "error");
                return false;
            }
        }
      
        let formData = new FormData(formUsuario);
        let ajaxUrl = base_url + '/RegistrarUsuari/setUsuario';

        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            

            return response.json();
        })
        .then(objData => {
            console.log('Response data:', objData);
            if (objData.status) {

                formUsuario.reset();
                
                Swal.fire("Usuari", objData.msg, "success")
               
                
                .then(() => {
                    location.reload(); 

                });

            } else if (objData.status == "exist") {
                Swal.fire("Error", "L'usuari ja existeix.", "error");
            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire("Error", "Hi ha hagut un error en la solicitud.", "error");
        });
    }
}, false);


const form = document.getElementById('formUsuario');
const identificacion = document.getElementById('txtIdentificacion');
const nombre = document.getElementById('txtNombre');
const apellido = document.getElementById('txtApellido');
const telefono = document.getElementById('txtTelefono');
const email = document.getElementById('txtEmail');
const btnActionForm = document.getElementById('btnActionForm');
const strPassword = document.getElementById('txtPassword');
const identificacionError = document.getElementById('identificacionError');
const nombreError = document.getElementById('nombreError');
const apellidoError = document.getElementById('apellidoError');
const telefonoError = document.getElementById('telefonoError');
const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');
//Validació dels camps
let validacioNom = false
let validacioCognom  = false
let validacioTelefon  = false
let validacioEmail  = false
let validacioIdentificacion  = false
let validacioPassword = false
let validacioTotFormulari = false



//Validació identificació

const validarIdentificacion = () => {
    const nifRegex = /^[0-9]{8}[A-Z]$/; // NIF de persona física
    const nieRegex = /^[XYZ][0-9]{7}[A-Z]$/; // NIE
    const cifRegex = /^[ABCDEFGHJKLMNPQRSUVW][0-9]{7}[0-9A-J]$/; // CIF de persona jurídica

    const identificacionValue = identificacion.value.trim().toUpperCase();

    if (nifRegex.test(identificacionValue) || nieRegex.test(identificacionValue) || cifRegex.test(identificacionValue)) {
        identificacionError.innerHTML = "";
        identificacionError.classList.remove('is-invalid');
        identificacionError.classList.add('none');
        validacioIdentificacion = true;
    } else {
        identificacionError.innerHTML = "Identificació no vàlida. Ha de ser un NIF, NIE o CIF.";
        identificacionError.classList.add('is-invalid');
        identificacionError.classList.remove('none');
        validacioIdentificacion = false;
    }
}

// Afegir l'esdeveniment d'entrada per validar a mesura que l'usuari escriu
identificacion.addEventListener('input', validarIdentificacion);


//Validació Nom
function validarNom()  {

    if (nombre.value.trim().length < 3) {
        nombreError.innerHTML = "El nom ha de tenir minim 3 caràcters";
        nombreError.classList.add('is-invalid');
        nombreError.classList.remove('none');
        validacioNom = false;

    } else {
        nombreError.innerHTML = "";
        nombreError.classList.remove('is-invalid');
        nombreError.classList.add('none');
        validacioNom = true;
    }
}

nombre.addEventListener('input', validarNom)


//Validació Cognom

const validarCognom = () => {
    if (apellido.value.trim().length < 3) {
        apellidoError.innerHTML = "El cognom ha de tenir minim 3 caràcters";
        apellidoError.classList.add('is-invalid');
        apellidoError.classList.remove('none');
        validacioCognom = false;

    } else {
        apellidoError.innerHTML = "";
        apellidoError.classList.remove('is-invalid');
        apellidoError.classList.add('none');
        validacioCognom = true;
    }
}
apellido.addEventListener('input', validarCognom)   

// Validació Telèfon

const validarTelefon = () => {
    const telefonRegex = /^[679]\d{8}$/;

        // Limitar a 9 dígits
        if (telefono.value.length > 9) {
            telefono.value = telefono.value.slice(0, 9);
        }

    if (!telefonRegex.test(telefono.value.trim())) {
        telefonoError.innerHTML = "El telèfon ha de tenir 9 dígits i començar per 6, 7 o 9";
        telefonoError.classList.add('is-invalid');
        telefonoError.classList.remove('none');
        validacioTelefon = false;
    } else {
        telefonoError.innerHTML = "";
        telefonoError.classList.remove('is-invalid');
        telefonoError.classList.add('none');
        validacioTelefon = true;
    }
}

telefono.addEventListener('input', validarTelefon)

// Validació Email

const validarEmail = () => {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email.value.trim())) {
        emailError.innerHTML = "El correu ha de tenir un format vàlid, ex: correu@exemple.com";
        emailError.classList.add('is-invalid');
        emailError.classList.remove('none');
        validacioEmail = false; 
    } else {
        emailError.innerHTML = "";
        emailError.classList.remove('is-invalid');
        emailError.classList.add('none');
        validacioEmail = true; 
    }
    
}


email.addEventListener('change', validarEmail)

const validarPassword = () =>{
    if(strPassword.value.trim().length < 1 ){
        passwordError.innerHTML = "El password no pot estar buit";
        passwordError.classList.add('is-invalid');
        passwordError.classList.remove('none');
        validacioPassword = false; 
    } else {
        passwordError.innerHTML = "";
        passwordError.classList.remove('is-invalid');
        passwordError.classList.add('none');
        validacioPassword = true; 
    }
}


strPassword.addEventListener('input', validarPassword)





  const validacioForm = () => {
      if (validacioNom && validacioIdentificacion && validacioCognom && validacioTelefon && validacioEmail && validacioPassword) {
        // Totes les validacions són verdaderes
        btnActionForm.disabled = false;
        btnActionForm.classList.remove('btn-light');
        btnActionForm.classList.add('btn-success');
        validacioTotFormulari = true
    } else {
        // Alguna de les validacions és falsa
        btnActionForm.disabled = true;
        btnActionForm.classList.add('btn-light');
        btnActionForm.classList.remove('btn-success');
        validacioTotFormulari = false
    }

}

form.addEventListener("change", validacioForm);


document.addEventListener('DOMContentLoaded', function() {
    const formUsuario = document.getElementById('formUsuario');
    const btnActionForm = document.getElementById('btnActionForm');
    const camposRequerits = ["txtIdentificacion", "txtNombre", "txtApellido", "txtTelefono", "txtEmail",  "txtPassword"];

        if(validacioTotFormulari){

        
    function validarForm() {
        let totValid = true;
        camposRequerits.forEach(id => {
            const input = document.getElementById(id);
            if (!input.value.trim()) {
                console.log(input)
                totValid = false;
            }
        });
        btnActionForm.disabled = !totValid;
        btnActionForm.classList.toggle('btn-success', totValid);
        btnActionForm.classList.toggle('btn-light', !totValid);
    }

    formUsuario.addEventListener("input", validarForm);
    formUsuario.addEventListener("change", validarForm);
}
});
