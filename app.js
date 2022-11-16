

function actualTime(){
    var hour = new Date();
    document.getElementById("time").innerHTML = hour.toLocaleTimeString();
}

function drawChart(){
    var ctx = document.getElementById('chart');

    var humidity = [10,56,34,34,57,87,65,76];
    var hours = ['22:00', '23:00', '00:00', '01:00', '02:00', '03:00','05:00', '06:00'];

    var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: hours,
                datasets: [{
                    label: 'Humidity',
                    data: humidity
                }]
            }
    });
}


setInterval(actualTime, 1000);
actualTime();
drawChart();