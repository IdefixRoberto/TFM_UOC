let tableCategoria;

document.addEventListener('DOMContentLoaded', function() {

    tableCategoria = new DataTable('#tableCategoria', {
        "processing": true,
        "serverSide": false,
        "language": {
            "code": "ca"
        },
        "ajax": {
            "url": base_url + "/Categoria/getCategorias",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idcategoria" },
            { "data": "nombre" },
            { "data": "descripcion" },
            { "data": "datecreated" },
            { "data": "status" },
            { "data": "options" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });

    // Event per a obrir el modal
    document.getElementById('formCategoria').onsubmit = function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let ajaxUrl = base_url + '/Categoria/setCategoria';

        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                $('#modalFormCategoria').modal("hide");
                tableCategoria.ajax.reload();
            }
            swal(data.msg);
        })
        .catch(error => console.log(error));
    };
});

function obrimodal() {
    document.getElementById('idCategoria').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nova categoria";
    document.getElementById('formCategoria').reset();
    $('#modalFormCategoria').modal('show');
}

function fntViewCategoria() {
    let btnViewCategoria = document.querySelectorAll(".btnViewCategoria");

    btnViewCategoria.forEach(function(btnViewCategoria) {
        btnViewCategoria.addEventListener('click', function() {
            let idCategoria = this.getAttribute("cat");
            let ajaxUrl = base_url + '/Categoria/getCategoria/' + idCategoria;

            // Utilitze fetch per obtenir la informació de la categoria
            fetch(ajaxUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la sol·licitud');
                    }
                    // Retorne la resposta en format json
                    return response.json();
                })
                .then(objData => {
                    if (objData.status) {
                        let categoria = objData.data;
                        
                        // Verifique l'estat de la categoria
                        let estatCategoria = (categoria.status == 1) 
                            ? '<span class="badge badge-success">Actiu</span>' 
                            : '<span class="badge badge-danger">Inactiu</span>';
                        
                        // Actualitze els camps del modal amb les dades de la categoria
                        document.querySelector("#celNombre").innerHTML = categoria.nombre;
                        document.querySelector("#celDescripcion").innerHTML = categoria.descripcion;
                        document.querySelector("#celStatus").innerHTML = estatCategoria;

                        // Mostre el modal
                        $('#modalViewCategoria').modal("show");
                    } else {
                        Swal.fire("Error", objData.msg, "error");
                    }
                })
                .catch(error => {
                    console.error("Error en la petició: ", error);
                    Swal.fire("Error", "Hi ha hagut un error en la sol·licitud.", "error");
                });
        });
    });
}



function fntEditCategoria() {
    let btnEditCategoria = document.querySelectorAll(".btnEditCategoria");

    btnEditCategoria.forEach(function(btn) {
        btn.addEventListener('click', function() {
            let idCategoria = this.getAttribute("cat");
            let ajaxUrl = base_url + '/Categoria/getCategoria/' + idCategoria;

            fetch(ajaxUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        let categoria = data.data;

                        document.querySelector("#idCategoria").value = categoria.idcategoria;
                        document.querySelector("#txtNombre").value = categoria.nombre;
                        document.querySelector("#txtDescripcion").value = categoria.descripcion;
                        document.querySelector("#listStatus").value = categoria.status;

                        document.querySelector(".modal-header").classList.replace("headerRegister", "headerUpdate");
                        document.querySelector("#btnActionForm").classList.replace("btn-primary", "btn-info");
                        document.querySelector("#btnText").innerHTML = "Actualizar";

                        $('#modalFormCategoria').modal('show');
                    } else {
                        Swal.fire("Error", data.msg, "error");
                    }
                })
                .catch(error => {
                    console.error("Error en la sol·licitud:", error);
                });
        });
    });
}



function fntDelCategoria() {
    // Seleccione la classe .btnDelCategoria que tenen els botons d'eliminar
    let btnDelCategoria = document.querySelectorAll(".btnDelCategoria");

    // Cree un bucle for per recórrer tots els botons
    btnDelCategoria.forEach(function(btnDelCategoria) {
        // Cree un esdeveniment per a que estigui a l'escolta dels clics
        btnDelCategoria.addEventListener("click", function() {
            let idCategoria = this.getAttribute("cat");

            // Utilitze un avís d'alerta
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
                    let formData = new FormData();
                    formData.append('idCategoria', idCategoria);

                    let ajaxURL = base_url + "/Categoria/delCategoria/";

                    fetch(ajaxURL, {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        
                        if (data.status) {
                            Swal.fire({
                                title: "Eliminat",
                                text: "Aquesta categoria ha estat eliminada!",
                                icon: "success"
                            });
                            // Recarreguem les funcions en el Datatable
                            tableCategoria.ajax.reload(function() {
                                fntDelCategoria();
                                fntEditCategoria();
                                fntViewCategoria();
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "No s'ha pogut eliminar la categoria.",
                                icon: "error"
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: "Error",
                            text: "Hi ha hagut un error en la sol·licitud.",
                            icon: "error"
                        });
                    });
                }
            });
        });
    });
}

window.addEventListener('load', function() {
    fntViewCategoria();
    fntEditCategoria();
    fntDelCategoria(); 
});



window.addEventListener('load', function() {
    fntViewCategoria();
    fntEditCategoria();
    fntDelCategoria();
}, false);
