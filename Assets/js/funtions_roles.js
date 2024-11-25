
let tableRoles;


//Cree una funcio per eliminar les cookies, ja que em donaven problemes quan enviaba el formulari
function eliminarCookies() {

  let cookies = document.cookie.split("; ");
  // Iterene sobre cada cookie
  for (let i = 0; i < cookies.length; i++) {
      // Separe el nom de la cookie de la seva valor
      let cookie = cookies[i].split("=");
      let nomCookie = cookie[0];
      // Elimine la cookie mitjançant la seva nom
      document.cookie = nomCookie + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }
}

$('.modalPermisos').on('hidden.bs.modal', function (e) {

  document.querySelector('#contentAjax').innerHTML = '';
})


//Cree l'event per  a que quan es carregue la web s'incorporen les dades de la taula.

document.addEventListener('DOMContentLoaded', function(){

   
    tableRoles = new DataTable('#tableRoles', {
        "aProcessing": true,
        "aServerSide": true,
        "language": {
          "code": "ca" 
        },
        "ajax": {
          "url":  base_url + "/Roles/getRoles",
          "dataSrc": "",
          }
        ,
        "columns": [
          { "data": "idrol" },
          { "data": "nombre_rol" },
          { "data": "descripcion" },
          { "data": "status" },
          { "data": "options" },

        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
      });

      //També carregue les funcions 
      fntEditRol();
      fntDelRol();
      fntPermisos();
})

//Seleccione el id del formulario formRol
let formRol = document.querySelector("#formRol");
    //Ara el que faig es capturar les variables nom, descripció i status

function canvisFormulari(e){
  let strNom = document.querySelector("#txtNombre").value;
  let  strDescripcion = document.querySelector("#txtDescripcion").value;
  let  intStatus = document.querySelector("#listStatus").value;
  
// Comprova si alguna de les variables és buida
if(strNom !== "" && strDescripcion !== "" && intStatus !== "") {
  // Si alguna condició no es compleix, activa el botó i canvia l'estil
  btnActionForm.disabled = false;
  btnActionForm.classList.remove('btn-secondary');
  btnActionForm.classList.add('btn-primary');
  } else {
  // Si es compleixen totes les condicions, desactiva el botó i restaura l'estil
  btnActionForm.disabled = true;
  btnActionForm.classList.remove('btn-primary');
  btnActionForm.classList.add('btn-secondary'); 
  }


}

  // Crida la funció checkConditions quan es canvia algun dels camps
  formRol.addEventListener("input", canvisFormulari)
 
//Amb onsubmit s'utilitza per a quan s'envie el formulari s'execute la funció com onclick, però en lloc de punxa quan s'envia.

  formRol.onsubmit = function(e) {
    e.preventDefault();

    let intIdRol = document.querySelector('#idRol').value;
    let strNombre = document.querySelector('#txtNombre').value;
    let strDescripcion = document.querySelector('#txtDescripcion').value;
    let intStatus = document.querySelector('#listStatus').value;

    if (strNombre == '' || strDescripcion == '' || intStatus == '') {
        Swal.fire({
            icon: "error",
            title: "Tots els camps són obligatoris",
            text: "Complimenteu correctament el formulari",
        });
        return false;
    }

    let ajaxUrl = base_url + '/Roles/setRol';
    let formData = new FormData(formRol);

    fetch(ajaxUrl, {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la sol·licitud');
        }

        return response;
    })
    .then(objData => {

        
        if (objData.status) {
            $('#modalFormRol').modal("hide");
            formRol.reset();
            Swal.fire({
                icon: "success",
                title: objData.msg,
                text: "Rols usuaris",
            });

            tableRoles.ajax.reload(function() {
                fntEditRol();
                fntDelRol();
                fntPermisos();
            });
        } else {
            Swal.fire({
                icon: "error",
                title: objData.msg,
                text: "Error",
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Hi ha hagut un problema en la petició",
        });
        console.error('Error:', error);
    });
}


$('#tableRoles').DataTable();




function obrimodal(){
  document.querySelector('#idRol').value="";
  document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister" );

  document.querySelector("#btnText").innerHTML="Guardar";
  document.querySelector('#titleModal').innerHTML="Nou Rol";
  document.querySelector("#btnActionForm").classList.replace( "btn-info", "btn-secondary");
  document.querySelector("#btnActionForm").disabled = true;
  document.querySelector("#formRol").reset();

    $('#modalFormRol').modal('show');
}








//Funcio per a eliminar un rol

function fntDelRol() {
  // En primer lloc seleccionem la classe .btnDelRol que tenen els botons d'eliminar
  let btnDelRol = document.querySelectorAll(".btnDelRol");

  // Cree un bucle for per recórrer tots els botons
  btnDelRol.forEach(function(btnDelRol) {
      // Cree un esdeveniment per a que estiga a l'escolta dels clics
      btnDelRol.addEventListener("click", function() {
          let idrol = this.getAttribute("rl");

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
                  let formData = new FormData();
                  formData.append('idrol', idrol);

                  let ajaxURL = base_url + "Roles/delRol/";

                  // Utilitze fetch per enviar les dades
                  fetch(ajaxURL, {
                      method: 'POST',
                      body: formData
                  })
                  .then(response => {
                    
                      if (!response.ok) {
                          throw new Error('Error en la sol·licitud');
                      }
                      alert(response)
                      return response;
                  })
                  .then(Data => {
                      
                      Swal.fire({
                          title: "Eliminat",
                          text: "Aquest rol ha estat eliminat!",
                          icon: "success"
                      });
                      // I recarregue les funcions en el Datatable
                      tableRoles.ajax.reload(function() {
                          fntEditRol();
                          fntDelRol();
                          fntPermisos();
                      });
                  })
                  .catch(error => {
                      console.error('Error en la petició:', error);
                      Swal.fire({
                          icon: "error",
                          title: "Error",
                          text: "Hi ha hagut un error en la sol·licitud.",
                          footer: '<button type="button" class="btn btn-danger text-white" data-dismiss="modal">Cancel·lar</button>'
                      });
                  });
              }
          });
      });
  });
}



//funcio per a editar un rol


function fntEditRol() {
  let btnEditRol = document.querySelectorAll(".btnEditRol");
  btnEditRol.forEach(function(btn) {
      btn.addEventListener('click', function() {
          document.querySelector('#titleModal').innerHTML = "Actualitzar Rol";
          document.querySelector(".modal-header").classList.replace("headerRegister", "headerUpdate");
          document.querySelector("#btnActionForm").classList.replace("btn-secondary", "btn-info");
          document.querySelector("#btnText").innerHTML = "Actualizar";
          document.querySelector("#btnActionForm").disabled = false;
          let idrol = this.getAttribute("rl");
          let ajaxURL = base_url + 'Roles/getRol/' + idrol;

          // Utilitze fetch per obtenir les dades
          fetch(ajaxURL)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Error en la sol·licitud');
                  }
                  return response.json();
              })
              .then(objData => {
                  if (objData.status == true) {
                      document.querySelector("#idRol").value = objData.data.idrol;
                      document.querySelector("#txtNombre").value = objData.data.nombre_rol;
                      document.querySelector("#txtDescripcion").value = objData.data.descripcion;

                      let optionSelect = objData.data.status == 1 
                          ? '<option value="1" selected class="notBlock">Actiu</option>'
                          : '<option value="2" selected class="notBlock">Inactiu</option>';

                      let htmlSelect = `
                          ${optionSelect}
                          <option value="1">Actiu</option>
                          <option value="2">Inactiu</option>
                      `;
                      document.querySelector("#listStatus").innerHTML = htmlSelect;
                      $('#modalFormRol').modal('show');
                  } else {
                      Swal.fire({
                          icon: "error",
                          title: objData.msg,
                          text: "Per favor, recarrega la pàgina i torna a intentar-ho",
                          footer: '<button type="button" class="btn btn-danger text-white" data-dismiss="modal">Cancel·lar</button>'
                      });
                  }
              })
              .catch(error => {
                  console.error('Error en la petició:', error);
                  Swal.fire({
                      icon: "error",
                      title: "Error",
                      text: "Hi ha hagut un error en la sol·licitud.",
                      footer: '<button type="button" class="btn btn-danger text-white" data-dismiss="modal">Cancel·lar</button>'
                  });
              });
      });
  });
}

  function fntPermisos() {
    let btnPermisosRol = document.querySelectorAll(".btnPermisosRol");

    // Iterem sobre cada boto
    btnPermisosRol.forEach(function(btnPermisosRol) {
        // Afegim el listener al botó
        btnPermisosRol.addEventListener('click', function() {
            let idrol = this.getAttribute("rl");
            let ajaxUrl = base_url + 'Permisos/getPermisosRol/' + idrol;

            // Utilitze fetch per obtenir les dades
            fetch(ajaxUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la sol·licitud');
                    }
                    return response.text(); // Canvie a text() perquè esperem HTML
                })
                .then(data => {
                    document.querySelector('#contentAjax').innerHTML = data;
                    $('.modalPermisos').modal('show');

                    document.querySelector('#formPermisos').addEventListener('submit', fntSavePermisos, false);
                })
                .catch(error => {
                    console.error('Error en la petició:', error);
                });
        });
    });
}
 
  
  




function fntSavePermisos(e) {
  e.preventDefault();
  
  let ajaxUrl = base_url + '/Permisos/setPermisos';
  let formElement = document.querySelector("#formPermisos");
  let formData = new FormData(formElement);
  
  fetch(ajaxUrl, {
      method: 'POST',
      body: formData
  })
  .then(response => response.json())
  .then(objData => {
      if (objData.status) {
          Swal.fire({
              icon: "success",
              title: objData.msg,
              text: "Permisos usuaris actualitzats",
              footer: 'Ja podrà veure els nous permisos de cada usuari',
              showConfirmButton: false,
              timer: 1500
          });

          // Amagar el modal després d'actualitzar els permisos
          $('#modalPermisos').modal('hide');
      } else {
          Swal.fire({
              icon: "error",
              title: objData.msg,
              text: "No ha estat possible actualitzar els permisos",
              footer: 'Per favor, torne a intentar-ho passats uns minuts'
          });
      }
  })
  .catch(error => {
      Swal.fire({
          icon: "error",
          title: "Error",
          text: "No s'ha pogut processar la petició",
          footer: error.message
      });
  });
}









//Carregue les funcions una vegada iniciada la web
window.onload = function () {
  fntEditRol();
  fntDelRol();
  fntPermisos();
  
};



document.addEventListener('DOMContentLoaded', function() {
    const formRol = document.getElementById('formRol');
    const btnActionForm = document.getElementById('btnActionForm');
    const camposRequerits = ["txtNombre", "txtDescripcion", "listStatus"];

    function validarForm() {
        let totValid = true;
        camposRequerits.forEach(id => {
            const input = document.getElementById(id);
            if (!input.value.trim()) {
                totValid = false;
            }
        });
        btnActionForm.disabled = !totValid;
        btnActionForm.classList.toggle('btn-primary', totValid);
        btnActionForm.classList.toggle('btn-secondary', !totValid);
    }

    formRol.addEventListener("input", validarForm);
    formRol.addEventListener("change", validarForm);
});

