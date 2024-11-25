
document.addEventListener('DOMContentLoaded', function() {

    const form = document.getElementById('formUsuario');
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
    

    const validarboto = () => {
        form.addEventListener('submit', function(event) {
            validarForm();
            if (btnActionForm.disabled) {
                event.preventDefault();
            }
        });
        };




    const validarForm = () => {
        
        let valid = true;
        identificacion.addEventListener('input', () => {
        if (touchedFields.identificacion && identificacion.value.length < 5) {
            identificacionError.textContent = 'La longitud mínima ha de ser de 5 caràcters.';
            identificacionError.classList.add('is-invalid');
            identificacionError.classList.remove('none');
            valid = false;
        } else {
            identificacionError.textContent = '';
            identificacionError.classList.remove('is-invalid');
            identificacionError.classList.add('none');
        }
    });

    nombre.addEventListener('input', () => {

        if ( nombre.value.length < 3) {
            nombreError.textContent = 'La longitud mínima ha de ser de 3 caràcters.';
            nombreError.classList.add('is-invalid');
            nombreError.classList.remove('none');
            valid = false;
        } else {
            nombreError.textContent = '';
            nombreError.classList.remove('is-invalid');
            nombreError.classList.add('none');
        }
    });

    apellido.addEventListener('input', () => {

        if (apellido.value.length < 3) {
            apellidoError.textContent = 'La longitud mínima ha de ser de 3 caràcters.';
            apellidoError.classList.add('is-invalid');
            apellidoError.classList.remove('none');
            valid = false;
        } else {
            apellidoError.textContent = '';
            apellidoError.classList.remove('is-invalid');
            apellidoError.classList.add('none');
        }
    });

    telefono.addEventListener('input', () => {
        if ( (telefono.value.length !== 9 || !/^[0-9]{9}$/.test(telefono.value))) {
            telefonoError.textContent = 'El format ha de ser 6XXXXXXXX';
            telefonoError.classList.add('is-invalid');
            telefonoError.classList.remove('none');
            valid = false;
        } else {
            telefonoError.textContent = '';
            telefono.classList.remove('is-invalid');
            telefonoError.classList.add('none');
        }
    });

    email.addEventListener('input', () => {
        if ( !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email.value)) {
            emailError.textContent = 'El format ha de ser d\'email';
            emailError.classList.add('is-invalid');
            emailError.classList.remove('none');
            valid = false;
        } else {
            emailError.textContent = '';
            emailError.classList.remove('is-invalid');
            emailError.classList.add('none');
        }
    });


        status.addEventListener('change', () => {
        if (touchedFields.status && !status.value) {
            statusError.textContent = 'Es necessari seleccionar un dels dos estats';
            statusError.classList.add('is-invalid');
            statusError.classList.remove('none');
            valid = false;
        } else {
            statusError.textContent = '';
            statusError.classList.remove('is-invalid');
            statusError.classList.add('none');
        }
    });

    window.addEventListener('change', () => {

        if (valid) {
            btnActionForm.disabled = false;
            btnActionForm.classList.replace(" btn-light", "btn-success");
        } else {
            btnActionForm.disabled = true;
            btnActionForm.classList.replace("btn-success", " btn-light");
        }
    



});
    
};
validarForm();
validarboto();
});
  

const validarboto = () => {
form.addEventListener('submit', function(event) {
    validarForm();
    if (btnActionForm.disabled) {
        event.preventDefault();
    }
});
};

window.addEventListener('change', function() {
    validarForm();
    validarboto();
    
    
}
);





let tableUsuarios;


//Cree l'event per  a que quan es carregue la web s'incorporen les dades de la taula.

document.addEventListener('DOMContentLoaded', function() {
   
    tableUsuarios = new DataTable('#tableUsuarios', {
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "code": "ca"
        },
        "ajax": {
            "url": base_url + "/Usuarios/getUsuarios",
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
    validarForm();

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




function fntEditUsuario() {
    let btnEditUsuario = document.querySelectorAll(".btnEditUsuario");

    btnEditUsuario.forEach(function(btnEditUsuario) {
        btnEditUsuario.addEventListener('click', function() {
            document.querySelector('#titleModal').innerHTML = "Actualitzar Usuari";
            document.querySelector('.modal-header').classList.replace('headerRegister', 'headerUpdate');
            document.querySelector('#btnActionForm').classList.replace('btn-primary', 'btn-info');
            document.querySelector('#btnText').innerHTML = "Actualitzar";

            let idusuari = parseInt(this.getAttribute("us"));
            let ajaxUrl = base_url + '/Usuarios/Usuario/' + idusuari;
            
            // Utilitzem fetch() per obtenir la informació de l'usuari
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

            $('#modalUsuarios').modal('show');
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

        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        let ajaxURL = base_url + "/Clients/delClient/";

        request.open("POST", ajaxURL, true);

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                if (request.status == 200) {
                    resolve(request.responseText); // Resol la promesa amb la resposta si és correcta
                } else {
                    reject(new Error('Error en la sol·licitud d’eliminació.')); // Rebutja la promesa si hi ha un error
                }
            }
        };

        request.send(formData);
    });
}



function ftnViewUsuario() {
    let btnViewUsuario = document.querySelectorAll(".btnViewUsuario");

    btnViewUsuario.forEach(function(btnViewUsuario) {
        btnViewUsuario.addEventListener('click', function() {
            let idUsuario = this.getAttribute("us");
            let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idUsuario;

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
                        
                        // Verifique l'estat de l'usuari
                        let estatUsuari = (objData.data.status == 1) 
                            ? '<span class="badge badge-success">Actiu</span>' 
                            : '<span class="badge badge-danger">Inactiu</span>';
                        
                        // Actualitze els camps del modal amb les dades de l'usuari
                        document.querySelector("#celIdentificacion").innerHTML = usuari.identificacio;
                        document.querySelector("#celNombre").innerHTML = usuari.nom;
                        document.querySelector("#celApellido").innerHTML = usuari.cognoms;
                        document.querySelector("#celEmail").innerHTML = usuari.email;
                        document.querySelector("#celTelefono").innerHTML = usuari.telefono;
                        document.querySelector("#celStatus").innerHTML = estatUsuari;
                        document.querySelector("#celRol").innerHTML = usuari.nombre_rol;

                        // Mostre el modal
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
  document.querySelector("#formUsuario").reset();
  $("#modalUsuarios").modal("show");
}







document.addEventListener('DOMContentLoaded', function() {
    let formUsuario = document.querySelector("#formUsuario");

    formUsuario.onsubmit = function(e) {
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

        let formData = new FormData(formUsuario);
        let ajaxUrl = base_url + '/Usuarios/setUsuario';

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
                $('#modalUsuario').modal("hide");
                formUsuario.reset();
                
                Swal.fire("Usuarios", objData.msg, "success")
               
                
                .then(() => {
                    location.reload(); 
                    tableUsuarios.api().ajax.reload(function(){ //Recarrega la taula
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


