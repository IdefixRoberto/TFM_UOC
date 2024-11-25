let tableClients;


//Cree l'event per  a que quan es carregue la web s'incorporen les dades de la taula.

document.addEventListener('DOMContentLoaded', function() {

    tableClients = new DataTable('#tableClients', {
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "code": "ca"
        },
        "ajax": {
            "url": base_url + "/Clients/getClients",
            "dataSrc": "",

        },

       

        "columns": [
            { "data": "id" },
            { "data": "nom" },
            { "data": "cognoms" },
            { "data": "email" },
            { "data": "telefono" },
            { "data": "nombre_rol" },
            { "data": "status" },
            { "data": "options" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});


window.addEventListener('load', function() {
    ftnViewUsuario();
    fntEditUsuario();
    fntDelUsuario();
    tipoRolsUsuaris();

}, false);

function tipoRolsUsuaris() {
    return fetch(base_url + 'Roles/getSelectRoles')
        .then(response => response.text())
        .then(data => {
            document.querySelector('#listRolid').innerHTML = data;
            $('#listRolid'); 
            return data;
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
        });
}

document.addEventListener('input', function(){

    if(identificacion.value ==""){
        validacioIdentificacion = false;
    }
    else{
        validacioIdentificacion = true;
    }

    if(nombre.value ==""){
        validacioNom = false;
    }
    else{
        validacioNom = true;
    }

    if(apellido.value ==""){
        validacioCognom = false;
    }
    else{
        validacioCognom = true;
    }

    if(telefono.value ==""){
        validacioTelefon = false;
    }
    else{
        validacioTelefon = true;
    }

    if(email.value ==""){
        validacioEmail = false;
    }
    else{
        validacioEmail = true;
    }

    if(estat.value ==""){
        validacioStatus = false;
    }
    else{
        validacioStatus = true;
    }


    
})




function fntEditUsuario() {
    let btnEditUsuario = document.querySelectorAll(".btnEditUsuario");

    btnEditUsuario.forEach(function(btnEditUsuario) {
        btnEditUsuario.addEventListener('click', function() {
            document.querySelector('#titleModal').innerHTML = "Actualitzar Usuari";
            document.querySelector('.modal-header').classList.replace('headerRegister', 'headerUpdate');
            document.querySelector('#btnActionForm').classList.replace('btn-primary', 'btn-info');
            document.querySelector('#btnText').innerHTML = "Actualitzar";

            let idusuari = parseInt(this.getAttribute("us"));
            let ajaxUrl = base_url + '/Clients/getClient/' + idusuari;
            
            // Utilitze fetch() per obtenir la informació de l'usuari
            fetch(ajaxUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la sol·licitud');
                    }
                    return response.json();
                })
                .then(objData => {
                    if (objData.status) {
                        let usuari = objData.data;
                        let listStatus = document.querySelector('#listStatus');
                        
                        // Netege les opcions existents
                        listStatus.innerHTML = '';

                        // Agrege les opcions Actiu/Inactiu
                        let optionActiu = document.createElement('option');
                        optionActiu.value = 1;
                        optionActiu.text = 'Actiu';
                        listStatus.appendChild(optionActiu);

                        let optionInactiu = document.createElement('option');
                        optionInactiu.value = 2;
                        optionInactiu.text = 'Inactiu';
                        listStatus.appendChild(optionInactiu);

                        // Seleccione l'opció correcta segons l'estat de l'usuari
                        listStatus.value = (usuari.status == 1) ? '1' : '2';

                        // Force una actualització visual del camp de selecció
                        listStatus.dispatchEvent(new Event('change'));

                        // Actualitze altres camps del formulari
                        document.querySelector('#idUsuario').value = parseInt(usuari.id);
                        document.querySelector('#txtIdentificacion').value = usuari.identificacio;
                        document.querySelector('#txtNombre').value = usuari.nom;
                        document.querySelector('#txtApellido').value = usuari.cognoms;
                        document.querySelector('#txtEmail').value = usuari.email;
                        document.querySelector('#txtTelefono').value = usuari.telefono;
                        document.querySelector('#listRolid').value = usuari.rolid;
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                })
                .catch(error => {
                    console.error("Error en la petició: ", error);
                });

            $('#modalClients').modal('show');
        });
    });
}


function fntDelUsuario() {
    let btnDelUsuario = document.querySelectorAll(".btnDelUsuario");

    // Cree un bucle for per recórrer tots els botons
    btnDelUsuario.forEach(function(btnDelUsuario) {
        // Cree un esdeveniment per a que estigui a l'escolta dels clics
        btnDelUsuario.addEventListener("click", function() {
            let idUsuari = this.getAttribute("us");

            // SweetAlert2 per a generar un avís d'alerta
            Swal.fire({
                title: "Estàs segur d'eliminar aquest registre?",
                text: "Si confirmes no serà reversible l'eliminació",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!",
                cancelButtonText: "Cancel·lar"
            }).then((result) => {

                if (result.isConfirmed) {
                    // Utilitzem promeses per gestionar l'operació AJAX
                    eliminarUsuari(idUsuari)
                        .then(response => {
                            // Si la resposta és correcta, mostra un missatge d'èxit
                            Swal.fire({
                                title: "Eliminat",
                                text: "Aquest usuari ha estat eliminat!",
                                icon: "success"
                            });

                            // Recàrrega de la taula i noves funcionalitats
                            tableClients.ajax.reload(function() {
                                fntDelUsuario();
                                ftnViewUsuario();
                                fntEditUsuario();
                                tipoRolsUsuaris();
                            });
                        })
                        .catch(error => {
                            // Si hi ha algun error, mostrar-lo per consola o en una alerta
                            Swal.fire({
                                title: "Error",
                                text: "Hi ha hagut un problema durant l'eliminació",
                                icon: "error"
                            });
                            console.error("Error durant l'eliminació:", error);
                        });
                }
            });
        });
    });
}

// Funció que retorna una promesa per gestionar l'operació d'eliminació d'usuari
function eliminarUsuari(idUsuari) {
    return new Promise((resolve, reject) => {
        let formData = new FormData();
        formData.append('idUsuario', idUsuari);

        let ajaxURL = base_url + "/Clients/delClient/";

        fetch(ajaxURL, {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la sol·licitud d’eliminació.');
            }
            return response.text();
        })
        .then(data => {
            resolve(data); // Resol la promesa amb la resposta si és correcta
        })
        .catch(error => {
            reject(error); // Rebutja la promesa si hi ha un error
        });
    });
}




function ftnViewUsuario() {
    let btnViewUsuario = document.querySelectorAll(".btnViewUsuario");

    btnViewUsuario.forEach(function(btnViewUsuario) {
        btnViewUsuario.addEventListener('click', function() {
            let idUsuario = this.getAttribute("us");
            let ajaxUrl = base_url + '/Clients/getClient/' + idUsuario;

            // Utilitze fetch() per obtenir la informació de l'usuari
            fetch(ajaxUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la sol·licitud');
                    }
                    return response.json();
                })
                .then(objData => {
                    if (objData.status) {
                        let usuari = objData.data;
                        
                        // Verificació de l'estat de l'usuari
                        let estatUsuari = (objData.data.status == 1) 
                            ? '<span class="badge badge-success">Actiu</span>' 
                            : '<span class="badge badge-danger">Inactiu</span>';
                        
                        document.querySelector("#celIdentificacion").innerHTML = usuari.identificacio;
                        document.querySelector("#celNombre").innerHTML = usuari.nom;
                        document.querySelector("#celApellido").innerHTML = usuari.cognoms;
                        document.querySelector("#celEmail").innerHTML = usuari.email;
                        document.querySelector("#celTelefono").innerHTML = usuari.telefono;
                        document.querySelector("#celStatus").innerHTML = estatUsuari;
                        
                        $('#modalViewUser').modal("show");
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                })
                .catch(error => {
                    console.error("Error en la petició: ", error);
                    swal("Error", "Error en la petició", "error");
                });
        });
    });
}





function obrimodal() {
  document.querySelector('#idUsuario').value = "";
  document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
  document.querySelector("#btnActionForm").classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnText").innerHTML = "Guardar"; 
  document.querySelector("#titleModal").innerHTML = "Nou Usuari"; 
  document.querySelector("#formClients").reset();
  $("#modalClients").modal("show");
}


document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('formClients');
  const identificacion = document.getElementById('txtIdentificacion');
  const nombre = document.getElementById('txtNombre');
  const apellido = document.getElementById('txtApellido');
  const telefono = document.getElementById('txtTelefono');
  const email = document.getElementById('txtEmail');
  const status = document.getElementById('listStatus');
  const btnActionForm = document.getElementById('btnActionForm');

  const identificacionError = document.getElementById('identificacionError');
  const nombreError = document.getElementById('nombreError');
  const apellidoError = document.getElementById('apellidoError');
  const telefonoError = document.getElementById('telefonoError');
  const emailError = document.getElementById('emailError');
  const statusError = document.getElementById('statusError');


 

// Variable per controlar si un camp ha estat tocat (interactuat)
let touchedFields = {
    identificacion: false,
    nombre: false,
    apellido: false,
    telefono: false,
    email: false,
    status: false,
};

// Funció per validar cada camp quan l'usuari hi interactua
const validarCampo = (campo, errorCampo, validFunc) => {
    campo.addEventListener('input', () => {
        touchedFields[campo.id] = true; // Marca el camp com interactuat
        validFunc();
    });

    campo.addEventListener('focus', () => {
        touchedFields[campo.id] = true; // Marca el camp com interactuat
        validFunc();
    });
};

// Funció de validació de tot el formulari
const validarFormulario = () => {
    let valid = true;

    // Només mostrar errors si el camp ha estat tocat
    if (touchedFields.identificacion && identificacion.value.length < 5) {
        identificacionError.textContent = 'La longitud mínima ha de ser de 5 caràcters.';
        valid = false;
    } else {
        identificacionError.textContent = '';
    }

    if (touchedFields.nombre && nombre.value.length < 3) {
        nombreError.textContent = 'La longitud mínima ha de ser de 3 caràcters.';
        valid = false;
    } else {
        nombreError.textContent = '';
    }

    if (touchedFields.apellido && apellido.value.length < 3) {
        apellidoError.textContent = 'La longitud mínima ha de ser de 3 caràcters.';
        valid = false;
    } else {
        apellidoError.textContent = '';
    }

    if (touchedFields.telefono && (telefono.value.length !== 9 || !/^[0-9]{9}$/.test(telefono.value))) {
        telefonoError.textContent = 'El format ha de ser 6XXXXXXXX';
        valid = false;
    } else {
        telefonoError.textContent = '';
    }

    if (touchedFields.email && !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email.value)) {
        emailError.textContent = 'El format ha de ser d\'email';
        valid = false;
    } else {
        emailError.textContent = '';
    }

    if (touchedFields.status && !status.value) {
        statusError.textContent = 'Es necessari seleccionar un dels dos estats';
        valid = false;
    } else {
        statusError.textContent = '';
    }

    // Habilitar o deshabilitar el botó d'acció
    if (valid) {
        btnActionForm.disabled = false;
        btnActionForm.classList.replace("btn-secondary", "btn-primary");
    } else {
        btnActionForm.disabled = true;
        btnActionForm.classList.replace("btn-primary", "btn-secondary");
    }
};

// Afegir els esdeveniments d'input i focus per validar a mesura que l'usuari interactua amb els camps
validarCampo(identificacion, identificacionError, validarFormulario);
validarCampo(nombre, nombreError, validarFormulario);
validarCampo(apellido, apellidoError, validarFormulario);
validarCampo(telefono, telefonoError, validarFormulario);
validarCampo(email, emailError, validarFormulario);
validarCampo(status, statusError, validarFormulario);

btnActionForm.addEventListener('click', validarFormulario);






  identificacion.addEventListener('input', validarFormulario);
  nombre.addEventListener('input', validarFormulario);
  apellido.addEventListener('input', validarFormulario);
  telefono.addEventListener('input', validarFormulario);
  email.addEventListener('input', validarFormulario);
  status.addEventListener('change', validarFormulario);

  form.addEventListener('submit', function(event) {
      validarFormulario();
      if (btnActionForm.disabled) {
          event.preventDefault();
      }
  });

  btnActionForm.disabled = true;

  if(btnActionForm.value = true)
    {
      btnActionForm.classList.add('btn-primary');

    }
    else{
      btnActionForm.classList.add('btn-secondary');

    }
});

document.addEventListener('DOMContentLoaded', function() {
    let formClients = document.querySelector("#formClients");

    formClients.onsubmit = function(e) {
        e.preventDefault();
        let strIdentificacion = document.querySelector('#txtIdentificacion').value;
        let strNombre = document.querySelector('#txtNombre').value;
        let strApellido = document.querySelector('#txtApellido').value;
        let strEmail = document.querySelector('#txtEmail').value;
        let intTelefono = document.querySelector('#txtTelefono').value;
        let intTipousuario = document.querySelector('#listRolid').value;
        let strPassword = document.querySelector('#txtPassword').value;

        if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || intTipousuario == '') {
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

        let formData = new FormData(formClients);
        let ajaxUrl = base_url + '/Clients/setClient';

        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(objData => {
            console.log('Response data:', objData);
            if (objData.status) {
                $('#modalClients').modal("hide");
                formClients.reset();
                
                Swal.fire("Usuarios", objData.msg, "success")
               
                
                .then(() => {
                    location.reload();  
                    tableClients.api().ajax.reload(function(){
                        fntDelUsuario();
                        ftnViewUsuario();
                        fntEditUsuario();
                        tipoRolsUsuaris();
                        

                    });
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


