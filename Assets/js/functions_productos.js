document.addEventListener('DOMContentLoaded', function() {
    tableProductos = new DataTable('#tableProductos', {
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            
        },
        "ajax": {
            "url": base_url + "Productos/getProductos",
            "dataSrc": "",
        },
        "columns": [
            { "data": "nomproducte" },
            { "data": "nombre" }, 
            {
                "data": "imagen",
                "render": function(data, type, row) {
                    return '<img src="/TFM/img/jocs/' + data + '.webp" class="img-thumbnail" width="100">';
                }
            },
            { "data": "stock" },
            { "data": "options" }

        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
    fntEditProducte();
    fntViewProducte();
});

window.addEventListener('load', function() {
    fntEditProducte();
    fntViewProducte();
   
      
});



function formatDate(fecha) {
    let partes = fecha.split('-');
    return `${partes[2]}-${partes[1]}-${partes[0]}`;
}

function fntViewProducte() {
    let btnProductes = document.querySelectorAll(".btnProductes");
    
    // Recorrec tots el botons
    btnProductes.forEach(function(btnProductes) { 
        btnProductes.addEventListener('click', function() {
            let idProducte = this.getAttribute("pr");
            let ajaxUrl = base_url + 'Productos/getProducto/' + idProducte;
            
            
            // Utilitzem fetch per obtenir les dades
            fetch(ajaxUrl)
                .then(response => {

                    if (response.ok == false) {
                        throw new Error('Error en la sol·licitud');
                    }
                   
                    
                    return response.json();
                })
                .then(objData => {
                    let producte = objData.data;
                    
                    // Actualitze les dades del modal amb les dades del producte
                    document.querySelector("#txtnomproducte2").innerHTML = producte.nomproducte;
                    document.querySelector("#txtdescripcion2").innerHTML = producte.descripcion;
                    
                    document.querySelector("#numpreu2").innerHTML = producte.precio;
                    document.querySelector("#numstock2").innerHTML = producte.stock;
                    document.querySelector("#txtimatge2").innerHTML = producte.imagen;
                    document.querySelector("#txtidioma2").innerHTML = producte.idioma;
                    document.querySelector("#txteditorial2").innerHTML = producte.editorial;
                    document.querySelector("#dateLlancament2").innerHTML = formatDate(producte.fechaLanzamiento);
                    document.querySelector("#numtempsDeJoc2").innerHTML = producte.tempsDeJoc;
                    document.querySelector("#numjugadors2").innerHTML = producte.jugadores;
                    document.querySelector("#listcategory2").innerHTML = producte.nombre;
                    
                    document.querySelector("#listStatus2").innerHTML = producte.status == 1 ? 'Actiu' : 'Inactiu';
                    document.querySelector("#listreserva2").innerHTML = producte.reserva == 1 ? 'Sí' : 'No';
                    document.querySelector("#listOulet2").innerHTML = producte.outlet == 1 ? 'Sí' : 'No';
                    
                    // Assignar els valors als inputs del formulari per editar
                    document.querySelector("#txtnomproducte2").value = producte.nomproducte;
                    document.querySelector("#txtdescripcion2").value = producte.descripcion;
                    document.querySelector("#numpreu2").value = producte.precio;
                    document.querySelector("#numstock2").value = producte.stock;
                    document.querySelector("#txtimatge2").value = producte.imagen;
                    document.querySelector("#listcategory2").value = producte.idcategoria;
                    document.querySelector("#txtidioma2").value = producte.idioma;
                    document.querySelector("#txteditorial2").value = producte.editorial;
                    document.querySelector("#listreserva2").value = producte.reserva == 1 ? 'Sí' : 'No';
                    document.querySelector("#dateLlancament2").value = producte.fechaLanzamiento;
                    document.querySelector("#listOulet2").value = producte.outlet == 1 ? 'Sí' : 'No';
                    document.querySelector("#numtempsDeJoc2").value = producte.tempsDeJoc;
                    document.querySelector("#numjugadors2").value = producte.jugadores;
                    document.querySelector("#listStatus2").value = producte.status == 1 ? 'Sí' : 'No';
                    document.querySelector(".modal-header").classList.replace("headerRegister", "headerUpdate");
                    
                    $('#modalViewProducto').modal('show');
                    fntEditProducte();
                    fntViewProducte();
                    })
                
                .catch(error => {
                    console.error('Error en la petició:', error);
                });
        });
    });
}


function fntEditProducte() {
    let btnEditProductes = document.querySelectorAll(".btnEditProductes");
    
    // Iterem sobre cada boto
    btnEditProductes.forEach(function(btnEditProductes) { 
        btnEditProductes.addEventListener('click', function() {
           
                
            
           
           
            let idProducte = this.getAttribute("pr");
            let ajaxUrl = base_url + '/Productos/getProducto/' + idProducte;
            
            
            // Utilitze fetch per obtenir les dades
            fetch(ajaxUrl)
                .then(response => {
                    console.log(response.ok)
                    if (response.ok == false) {
                        throw new Error('Error en la sol·licitud');
                    }
                   
                   
                    return response.json();
                })
                .then(objData => {
                    console.log(objData.data);
                    
                    let producte = objData.data;
                    document.querySelector("#idProducte").value = idProducte;

                    document.querySelector("#txtnomproducte").innerHTML = producte.nomproducte;
                    document.querySelector("#txtdescripcion").innerHTML = producte.descripcion;
                    document.querySelector("#numpreu").innerHTML = producte.precio;
                    document.querySelector("#numstock").innerHTML = producte.stock;
                    document.querySelector("#txtimatge").innerHTML = producte.imagen;
                    document.querySelector("#txtidioma").innerHTML = producte.idioma;
                    document.querySelector("#txteditorial").innerHTML = producte.editorial;
                     document.querySelector("#dateLlancament").innerHTML =  (producte.fechaLanzamiento);
                    document.querySelector("#numtempsDeJoc").innerHTML = producte.tempsDeJoc;
                    document.querySelector("#numjugadors").innerHTML = producte.jugadores;
                                      

                    document.querySelector("#txtnomproducte").value = producte.nomproducte;
                    document.querySelector("#txtdescripcion").value = producte.descripcion;
                    document.querySelector("#numpreu").value = producte.precio;
                    document.querySelector("#numstock").value = producte.stock;
                    document.querySelector("#txtimatge").value = producte.imagen;
                    document.querySelector("#listcategory").value = producte.idcategoria;
                    document.querySelector("#txtidioma").value = producte.idioma;
                    document.querySelector("#txteditorial").value = producte.editorial;
                    document.querySelector("#listreserva").value = producte.reserva;
                    document.querySelector("#dateLlancament").value = (producte.fechaLanzamiento);
                    document.querySelector("#listOulet").value = producte.outlet;
                    document.querySelector("#numtempsDeJoc").value = producte.tempsDeJoc;
                    document.querySelector("#numjugadors").value = producte.jugadores;
                    document.querySelector("#listStatus").value = producte.status;
                    document.querySelector(".modal-header").classList.replace("headerRegister", "headerUpdate");
                    document.querySelector("#btnActionForm").classList.replace("btn-secondary", "btn-info");
                    document.querySelector("#btnText").innerHTML = "Actualizar";
                    document.querySelector("#titleModal").innerHTML = "Actualizar Producte";
                    document.querySelector("#btnActionForm").disabled = false;

                    $('#modalProducto').modal('show');
                    fntEditProducte();
                    fntViewProducte();
                    fntSaveProductes()
                })
                .catch(error => {
                    console.error('Error en la petició:', error);
                });
        });
    });
}

document.querySelector('#formProducte').addEventListener('submit', fntSaveProductes, false);

function fntSaveProductes(event) {
    event.preventDefault();
    
    // Comprovar que tots els camps tinguin valors
    let formElement = document.querySelector("#formProducte");
    let formData = new FormData(formElement);
    
    // Validació dels camps
    if (!formElement.checkValidity()) {
        Swal.fire({
            icon: "error",
            title: "Validació fallida",
            text: "Comprova que tots els camps obligats són complets."
        });
        return;
    }

    const btnEditProductes = document.querySelectorAll(".btnEditProductes");


}
    

tableProductos.addEventListener('change', function() {
    fntEditProducte();
    fntViewProducte();
});

document.addEventListener('click', function() {
    fntEditProducte();
    fntViewProducte();
});


  
  
  


function obrimodal() {
        
    document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
    document.querySelector("#btnActionForm").classList.replace( "btn-secondary", "btn-primary");
    document.querySelector("#btnText").innerHTML = "Guardar"; 
    document.querySelector("#titleModal").innerHTML = "Nou Producte"; 
    document.querySelector("#btnActionForm").disabled = true;
    document.querySelector("#formProducte").reset();
    $("#modalProducto").modal("show");
    document.querySelector(".modal-header").classList.replace("headerRegister", "headerUpdate");

}





document.addEventListener('DOMContentLoaded', function() {
    let selectCategory = document.getElementById('listcategory');

    fetch('http://localhost/TFM/Productos/selectCategoriesController')
        .then(response => response.json())
        .then(data => {
            // Verifiquem si hi ha categories
            if (data.length > 0) {
                data.forEach(category => {
                    let option = document.createElement('option');
                    option.value = category.idcategoria;
                    option.text = category.nombre;
                    selectCategory.appendChild(option);
                });
            } else {
                let option = document.createElement('option');
                option.value = "";
                option.text = "No hi ha categories disponibles";
                selectCategory.appendChild(option);
            }
        })
        .catch(error => {
            console.error('Error carregant les categories:', error);
            let option = document.createElement('option');
            option.value = "";
            option.text = "Error carregant les categories";
            selectCategory.appendChild(option);
        });
});

//Seleccione el id del formulario formRol
let formProducte = document.querySelector("#formProducte");

formProducte.onsubmit = function(e) {
    e.preventDefault();
    
    let strNomProducto = document.querySelector('#txtnomproducte').value;
    let strDescripcion = document.querySelector('#txtdescripcion').value;
    let fltPrecio = document.querySelector('#numpreu').value;
    let intStock = document.querySelector('#numstock').value;
    let strImagen = document.querySelector('#txtimatge').value;
    let intCategoria = parseInt(document.querySelector('#listcategory').value);
    let intStatus = document.querySelector('#listStatus').value;
    let strIdioma = document.querySelector('#txtidioma').value;
    let strEditorial = document.querySelector('#txteditorial').value;
    let intReserva = document.querySelector('#listreserva').value;
    let strFechaLanzamiento = document.querySelector('#dateLlancament').value;
    let intOulet = document.querySelector('#listOulet').value;
    let intTempsDeJoc = document.querySelector('#numtempsDeJoc').value;
    let intJugadors = document.querySelector('#numjugadors').value;

    // Validació dels camps
    if (strNomProducto == '' || strDescripcion == '' || fltPrecio == '' || intStock == '' || strImagen == '' || intCategoria == '' || intStatus == '' || strIdioma == '' || strEditorial == ''  || intReserva == '' || strFechaLanzamiento == '' || intOulet == '' || intTempsDeJoc == '' || intJugadors == '') {
        Swal.fire({
            icon: "error",
            title: "Tots els camps son obligatoris",
            text: "Cumplimente de forma correcte el formulari"
        });
        return false;
    }

    // Preparar la sol·licitud AJAX amb Fetch
    let ajaxUrl = base_url + 'Productos/setProducto';
    let formData = new FormData(formProducte);

    fetch(ajaxUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la sol·licitud.');
        }
        return response.text();
    })
    .then(data => {
        console.log(data);
        if (data) {
            // Amaga el modal i reseteja el formulari
            $('#modalProducto').modal("hide");
            formProducte.reset();
            
            // Mostra l'alerta de confirmació
            Swal.fire({
                icon: "success",
                title: "Producte inserit",
                text: "Producte inserit correctament!"
            });

            // Recàrrega de la taula de productes (ajusta el nom de la taula si és necessari)
            tableProductos.ajax.reload();
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: data.msg
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Hi ha hagut un problema amb la sol·licitud"
        });
        console.error('Error:', error);
    });
};



document.addEventListener('DOMContentLoaded', function() {
    const btnActionForm = document.querySelector("#btnActionForm");
    const formFields = [
        document.querySelector('#txtnomproducte'),
        document.querySelector('#txtdescripcion'),
        document.querySelector('#numpreu'),
        document.querySelector('#numstock'),
        document.querySelector('#txtimatge'),
        document.querySelector('#txtidioma'),
        document.querySelector('#txteditorial'),
        document.querySelector('#dateLlancament'),
        document.querySelector('#numtempsDeJoc'),
        document.querySelector('#numjugadors')
    ];

    const checkFormFields = () => {
        let allFieldsFilled = formFields.every(field => field.value.trim() !== '');
        btnActionForm.disabled = !allFieldsFilled;
    };

    formFields.forEach(field => {
        field.addEventListener('input', checkFormFields);
        field.addEventListener('change', checkFormFields);
    });

    // Inicialment comprova els camps per establir l'estat del botó
    checkFormFields();
});