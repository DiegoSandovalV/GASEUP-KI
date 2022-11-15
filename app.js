

/**
 * Shows the actual time in the page
 */

function actualTime(){
    var hour = new Date();
    document.getElementById("time").innerHTML = hour.toLocaleTimeString();
}

// // // function drawChart() {
//     new Chart(document.getElementById("chart")), {
//         type: 'line',
//         data: {
//             labels: ['22:00', '23:00', '00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00'],
//             datasets: [{
//                 data: [33,35,36,37,38,39,40,41,42,43],
//                 borderColor: '#3e95cd',
//                 fill : false
//             }]
//         },
//         options: {
//             title: {
//                 display: true,
//                 text: 'Humidity'
//             }
//         }
// }
// // }


setInterval(actualTime, 1000);
actualTime();
