document.addEventListener('DOMContentLoaded', function () {
    let tablePermisos = new DataTable('#tablePermisos', {
        "aProcessing": true,
        "aServerSide": true,
        "ajax": {
            "url": base_url + "/Permisos/getPermisosRoliUsuaris//Permisos/getPermisosRoliUsuaris/", 
            "dataSrc": ""
        },
        "columns": [
            { "data": "nom" },
            { "data": "cognoms" },
            { "data": "nombre_rol" },
            { "data": "r" },
            { "data": "w" },
            { "data": "d" },
            { "data": "u" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});
