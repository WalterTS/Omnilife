var validateInput = document.querySelector('#salariodolares');
if (validateInput) {
    document.getElementById('salariodolares').addEventListener('input', function() {
        let inputValue = document.getElementById('salariodolares').value;
        let tcValue = document.getElementById('tc').value;
        let result = inputValue * tcValue;        
        document.getElementById('salariopesos').value = result.toFixed(2);
    });   
}



var validateProjection = document.querySelector('#projection-mxn');
if (validateProjection) {
    var value_mx = document.getElementById('projection-mxn').value;
    var dataMx = value_mx.split(",").map(Number);
    var value_mx = document.getElementById('projection-usd').value;
    var dataUs = value_mx.split(",").map(Number);
    const dataCharMx = {
        labels: ['Mes 1', 'Mes 2', 'Mes 3', 'Mes 4', 'Mes 5', 'Mes 6'],
        datasets: [{
            label: 'Proyeccion mensual Pesos',
            backgroundColor: 'red',
            borderColor: 'gray',
            data: dataMx
        }]
    };
    
    const config = {
        type: 'line',
        data: dataCharMx,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const dataCharUs = {
        labels: ['Mes 1', 'Mes 2', 'Mes 3', 'Mes 4', 'Mes 5', 'Mes 6'],
        datasets: [{
            label: 'Proyeccion mensual Dolares',
            backgroundColor: 'blue',
            borderColor: 'blue',
            data: dataUs
        }]
    };
    
    const configUs = {
        type: 'bar',
        data: dataCharUs,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };
    
    var myChart = new Chart(
        document.getElementById('mxnChart'),
        config
    );   
    var myChartUsd = new Chart(
        document.getElementById('usdChart'),
        configUs
    );   
}