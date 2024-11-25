document.addEventListener('DOMContentLoaded', function () {
    tablePedidos = new DataTable('#tablePedidos', {
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url + "/detallComanda/selectDetallComanda",
            "dataSrc": ""
        },
        "columns": [
                                         	 
            { "data": "pedidoIDDetallComanda" },
            { "data": "nomproductePedidoDetall" },
            { "data": "quantitatComandaDetall" },
            { "data": "preu" ,
                "render": function (data, type, row) {
                  

                    return parseFloat(data).toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }


                 // "1.234.567,89"
                

            },
            { "data": "subtotal"
                ,
                "render": function (data, type, row) {
                    // Formateja l'import per mostrar-lo amb coma decimal
                    return parseFloat(data).toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }
             }
            
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });

   
});


document.addEventListener('DOMContentLoaded', function () {
    // Cridem l'API per obtenir les dades de les unitats venudes
    fetch(base_url + "/detallComanda/getDadesGraficUnitatsVenudes")
        .then(response => response.json())
        .then(data => {
            let nomsProductes = [];
            let unitats = [];

            data.forEach(item => {
                nomsProductes.push(item.nomproductePedidoDetall);
                unitats.push(item.totalUnitats);
            });

            // Crear el gràfic
            let ctx = document.getElementById('myPieChart').getContext('2d');
            let myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: nomsProductes,
                    datasets: [{
                        data: unitats,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                        hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Unitats venudes per joc de taula'
                    }
                }
            });
        });
});

