

function actualTime(){
    var hour = new Date();
    document.getElementById("time").innerHTML = hour.toLocaleTimeString();
}

function drawChart(){
    var ctx = document.getElementById('chart');

    var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: tiempos,
                datasets: [{
                    label: 'Humidity',
                    data: humedades,
                    position: 'left',
                    borderColor: '#3e95cd'
                }]
            },
            options: {
                transitions: {
                    show: {
                      animations: {
                        x: {
                          from: 0
                        },
                        y: {
                          from: 0
                        }
                      }
                    },
                    hide: {
                        animations: {
                          x: {
                            to: 0
                          },
                          y: {
                            to: 0
                          }
                        }
                      }
                },
                legend: { display: false },
                    title: {
                    display: true,
                    text: 'Humidity'
                        
                    }
            }
    });
}

function test(){
  for(let i = 0; i<humedades.length; i++){
    console.log(humedades[i]);
  }
}

setInterval(actualTime, 1000);
actualTime();
drawChart();
