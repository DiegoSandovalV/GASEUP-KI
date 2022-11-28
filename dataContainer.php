<?php
    $host_name = 'db5010801859.hosting-data.io';
    $database = 'dbs9139144';
    $user_name = 'dbu1511355';
    $password = 'gasepki22';
    $table = 'datos';

    // connect to database
    $link = new mysqli($host_name, $user_name, $password, $database);
    $db = mysqli_select_db($link, $database);

    $myQuery = "SELECT temperatura, humedad FROM datos";



    //Close connection
    mysqli_close($link);
    
?>