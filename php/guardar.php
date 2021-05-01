<?php

    include "conexionBD.php";

    $no = $_POST["no"];
    $fecha = $_POST["fecha"];
    $concepto = $_POST["concepto"];
    $debeSelect = $_POST["debeSelectValues"];
    $haberSelect = $_POST["haberSelectValues"];
    $debeMonto = $_POST["debeMontoValues"];
    $haberMonto = $_POST["haberMontoValues"];
    $sumaDebe = $_POST["sumaDebe"];
    $sumaHaber = $_POST["sumaHaber"];
    
    $sql = "INSERT INTO poliza(no, fecha, cuentaId, DoH, concepto, saldo, sumaDebe, sumaHaber) VALUES";

    for ($i = 0; $i < count($debeSelect); $i++) {
        $sql .= "(".$no.", '".$fecha."', ".$debeSelect[$i].", 'D', '".$concepto."', ".$debeMonto[$i].", ".$sumaDebe.", ".$sumaHaber."),";
    }

    for ($i = 0; $i < count($haberSelect); $i++) {
        $sql .= "(".$no.", '".$fecha."', ".$haberSelect[$i].", 'H', '".$concepto."', ".$haberMonto[$i].", ".$sumaDebe.", ".$sumaHaber."),";
    }

    $sql = substr($sql, 0, -1);

    if ($mysqli->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

?>