<?php
$host_name = 'db5010801859.hosting-data.io';
$database = 'dbs9139144';
$user_name = 'dbu1511355';
$password = 'gasepki22';
$table = 'datos';

// connect to database
$link = new mysqli($host_name, $user_name, $password, $database);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PruebasPHP</title>
    <link rel="stylesheet" href="stylesMain.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="left">
                <a href="C:\Users\diego\Desktop\IOT\GASEUP-KI\Welcome.html" class="main">GASEUP-KI</a>
            </div>
            <div class="right">
            </div>
        </div>
        <div class="container1">
            <div class="leftSide">
                <canvas id="chart">
                </canvas>
            </div>
            <div class="rightSide">
                <div class="dataContainer">
                    <h2>CURRENT HOUR</h2>
                    <h2 id="time">a</h2>

                    <h2>CURRENT HUMIDITY</h2>
                    <h2>50%</h2>
                </div>
            </div>

        </div>

    </div>

    <?php
    $query = "SELECT * FROM datos";
    $resultado = mysqli_query($link, $query);
    ?>
    <script type="text/javascript">
        const humedades = [<?php while ($fila = mysqli_fetch_array($resultado)) {
                                echo '"' . $fila['humedad'] . '",';
                            } ?>];
        <?php $resultado = mysqli_query($link, $query); ?>
        const tiempos = [<?php while ($fila = mysqli_fetch_array($resultado)) {
                                echo '"' . $fila['tiempo'] . '",';
                            } ?>];
        <?php mysqli_close($link); ?>
    </script>

    <script src="app.js"></script>
</body>

</html>