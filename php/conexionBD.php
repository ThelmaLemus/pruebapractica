<?php
    $url = "localhost";
    $user = "root";
    $password = "";
    $db_name = "practica";

    $mysqli = new mysqli($url, $user, $password, $db_name);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // SCRIPT PARA OBTENER LA FECHA DEL DÍA
    $currentTime = time();
    $hoursToSubtract = 6;
    $timeToSubtract = ($hoursToSubtract * 60 * 60);
    $timeInPast = $currentTime - $timeToSubtract;
    $hoy = date("Y-m", $timeInPast);
    $hoyCompleto = date("Y-m-d", $timeInPast);

    // FECHA DEL PRIMER DÍA DEL MES
    $primerDia = date("Y-m-01", $timeInPast);
    // FECHA DEL ÚLTIMO DÍA DEL MES
    $ultimoDia = date("Y-m-t", $timeInPast);

?>
