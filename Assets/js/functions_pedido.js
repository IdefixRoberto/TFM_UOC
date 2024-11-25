document.addEventListener('DOMContentLoaded', function () {
    tablePedidos = new DataTable('#tablePedidos', {
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url + "/Pedido/getPedidos",
            "dataSrc": ""
        },
        "columns": [

                 	 
            { "data": "idpedido" },
            { "data": "nomComprador" },
            { "data": "cognomComprador" },
            { 
                "data": "fecha",
                "render": function (data, type, row) {
                    // Formateja la data a dd-mm-yyyy
                    let date = new Date(data);
                    let day = ('0' + date.getDate()).slice(-2);
                    let month = ('0' + (date.getMonth() + 1)).slice(-2); // Els mesos són de 0 a 11
                    let year = date.getFullYear();
                    return day + '-' + month + '-' + year;
                }
            },
            { 
                "data": "importe",
                "render": function (data, type, row) {
                    // Formateja l'import per mostrar-lo amb coma decimal
                    return parseFloat(data).toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }
            },
            { 
                "data": "tipopago",

            },
            { 
                "data": "status",
            }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });

   
});
//Grafic de vendes per categories<script src="https://cdn.jsdelivr.net/npm/date-fns@2.23.0/dist/date-fns.min.js"></script>
document.addEventListener('DOMContentLoaded', function () {
    fetch(base_url + "pedido/getselectPedidosIVendes")
        .then(response => response.json())
        .then(data => {
            let dates = [];
            let totals = [];
            let categories = {};
            const categoryNames = new Set(); 

            data.sort((a, b) => new Date(a.fecha) - new Date(b.fecha));

            data.forEach(item => {
                let date = new Date(item.fecha);
                let dateString = date.toISOString().split('T')[0];

                if (!dates.includes(dateString)) {
                    dates.push(dateString);

                    Object.keys(categories).forEach(categoria => {
                        categories[categoria].push(0);
                    });
                }

                if (!categories[item.categoria]) {
                    categories[item.categoria] = Array(dates.length).fill(0);
                }

                categories[item.categoria][dates.indexOf(dateString)] = parseFloat(item.totalVenda);

                categoryNames.add(item.categoria);
            });

            totals = dates.map((date, index) => {
                return Object.keys(categories).reduce((acc, categoria) => {
                    return acc + (parseFloat(categories[categoria][index]) || 0);
                }, 0);
            });

            let datasets = [];

            Array.from(categoryNames).forEach((categoria, index) => {
                datasets.push({
                    label: categoria,
                    data: categories[categoria],
                    borderColor: `hsl(${index * 40}, 70%, 50%)`, 
                    fill: false
                });
            });

            datasets.push({
                label: 'Vendes totals',
                data: totals,
                borderColor: '#000000', 
                fill: false,
                borderWidth: 2
            });

            let ctx = document.getElementById('myLineChart').getContext('2d');
            let myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Vendes totals i per categories'
                    },
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day',
                                displayFormats: {
                                    day: 'MMM D'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Import (€)'
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error carregant dades: ', error));
});

