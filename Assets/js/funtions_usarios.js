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
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary mt-3 mr-2"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success mt-3 mr-2"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger mt-3 mr-2",
                "orientation": "landscape", //Indicar que en PDF es vegi en horitzontal
                "pageSize": "A4" 
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info mt-3"
            }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]],
        "initComplete": function() {
            // Elimina la clase dt-buttons
            document.querySelector('.dt-buttons').classList.remove('dt-buttons');
        }
    });
});




window.addEventListener('load', function() {
    ftnViewUsuario();
    fntEditUsuario();
    fntDelUsuario();
    tipoRolsUsuaris();
    let valit = false

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
            document.querySelector('#btnActionForm').classList.replace('btn-light', 'btn-primary');
            document.querySelector('#btnText').innerHTML = "Actualitzar";
            document.querySelector('#btnActionForm').disabled = false;
            let idusuari = parseInt(this.getAttribute("us"));
            let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idusuari;
            
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

                        // Actualitzar altres camps del formulari
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

            //SweetAlert2 per a generar un avís d'alerta
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
                            tableUsuarios.ajax.reload(function() {
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
            let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idUsuario;

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
                    tableUsuarios.api().ajax.reload(function(){
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








const form = document.getElementById('formUsuario');
const identificacion = document.getElementById('txtIdentificacion');
const nombre = document.getElementById('txtNombre');
const apellido = document.getElementById('txtApellido');
const telefono = document.getElementById('txtTelefono');
const email = document.getElementById('txtEmail');
const estat = document.getElementById('listStatus');
const btnActionForm = document.getElementById('btnActionForm');

const identificacionError = document.getElementById('identificacionError');
const nombreError = document.getElementById('nombreError');
const apellidoError = document.getElementById('apellidoError');
const telefonoError = document.getElementById('telefonoError');
const emailError = document.getElementById('emailError');
const statusError = document.getElementById('statusError');

//Validació dels camps
let validacioNom = false
let validacioCognom  = false
let validacioTelefon  = false
let validacioEmail  = false
let validacioStatus  = false
let validacioIdentificacion  = false




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


email.addEventListener('input', validarEmail)

// Validació Status

const validarStatus = () => {
    const status = document.getElementById('listStatus').value;
    const statusError = document.getElementById('statusError');

    if (status === null || status === undefined || status === "") {
        statusError.innerHTML = "El status és obligatori";
        statusError.classList.add('is-invalid');
        statusError.classList.remove('none');
        validacioStatus = false;
    } else {
        statusError.innerHTML = "";
        statusError.classList.remove('is-invalid');
        statusError.classList.add('none');
        validacioStatus = true;
    }
}

// Afegir l'esdeveniment de canvi al select
document.getElementById('listStatus').addEventListener('change', validarStatus);

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


estat.addEventListener("change", validarStatus);


  const validacioForm = () => {

    if (validacioNom && validacioIdentificacion && validacioCognom && validacioTelefon && validacioEmail && validacioStatus) {
        // Totes les validacions són verdaderes
        btnActionForm.disabled = false;
        btnActionForm.classList.remove('btn-light');
        btnActionForm.classList.add('btn-success');
    } else {
        // Alguna de les validacions és falsa
        btnActionForm.disabled = true;
        btnActionForm.classList.add('btn-light');
        btnActionForm.classList.remove('btn-success');
    }

}

form.addEventListener("change", validacioForm);


document.addEventListener('DOMContentLoaded', function() {
    const formUsuario = document.getElementById('formUsuario');
    const btnActionForm = document.getElementById('btnActionForm');
    const camposRequerits = ["txtIdentificacion", "txtNombre", "txtApellido", "txtTelefono", "txtEmail", "listRolid"];

    function validarForm() {
        let totValid = true;
        camposRequerits.forEach(id => {
            const input = document.getElementById(id);
            if (!input.value.trim()) {
                totValid = false;
            }
        });
        btnActionForm.disabled = !totValid;
        btnActionForm.classList.toggle('btn-success', totValid);
        btnActionForm.classList.toggle('btn-light', !totValid);
    }

    formUsuario.addEventListener("input", validarForm);
    formUsuario.addEventListener("change", validarForm);
});
