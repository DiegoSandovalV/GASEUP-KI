

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
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
        $resultado = mysqli_query($link,$query);
        while($fila = mysqli_fetch_array($resultado)) {
            $humedad = $fila['humedad'];
            $hora = $fila['hora'];
            echo "<p>". $humedad . "</p>";
        }
    ?>



    <script src="app.js" text="text/javascript"></script>


</body>
</html>