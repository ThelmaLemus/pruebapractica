<?php

    include "conexionBD.php";

    $fechaI = $_GET['p'];
    $fechaF = $_GET['u'];
    $base = 0;
    $splitFechaI = explode("-", $fechaI);

    $currentTime2 = mktime(1, 1, 1, $splitFechaI[1], 15, $splitFechaI[0]);
    $hoursToSubtract2 = 720;
    $timeToSubtract2 = ($hoursToSubtract2 * 60 * 60);
    $timeInPast2 = $currentTime2 - $timeToSubtract2;
    $mesAnterior = date("Y-m", $timeInPast2);

    $splitMesAnterior = explode("-", $mesAnterior);

    $query = $mysqli->query("SELECT * FROM poliza WHERE (fecha BETWEEN '$fechaI' AND '$fechaF') ORDER BY cuentaId ASC");

    if(($query->num_rows) > 0)
    {
        while ($fila = $query->fetch_assoc()) {
            $fecha = $fila['fecha'];
            $cuentaId = $fila['cuentaId'];
            $DoH = $fila['DoH'];
            $concepto = $fila['concepto'];
            $saldo = $fila['saldo'];

            //OBTENER SALDO INICIAL
            $query2 = $mysqli->query("SELECT sum(saldo) AS inicial FROM poliza 
                                        WHERE YEAR(fecha) = $splitMesAnterior[0] AND 
                                        MONTH(fecha) = $splitMesAnterior[1] AND 
                                        cuentaId = $cuentaId");

            if(($query2->num_rows) > 0)
            {
                $saldoInicial = ($query2->fetch_assoc())['inicial'];
            }
            else
            {
                $saldoInicial = 0;
            }

            // FORMATO DE LA FECHA A DESPLEGAR
            $fecha = date("j-F-Y", strtotime($fecha));

            // OBTENER NOMBRE Y REFERENCIA DE CUENTA
            $get = $mysqli->query("SELECT referencia, descripcion FROM cuentas WHERE id = $cuentaId");
            $resultado = $get->fetch_assoc();
            $referencia = $resultado['referencia'];
            $cuenta = $resultado['descripcion'];

            if($base != $cuentaId)
            {
                if($base != 0)
                {
                    echo "
                    <tr class='color linea'>
                        <th></th>
                        <th></th>
                        <td></td>
                        <th></th>
                        <th></th>
                        <th style='text-align:center;'>$saldoInicialAnterior</th>
                    </tr>
                    ";
                }

                echo "
                <tr class='color'>
                    <th>".$referencia."</th>
                    <th>".$cuenta."</th>
                    <td style='text-align:center;'>".$saldoInicial."</td>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                ";

                echo "
                <tr>
                    <td>".$fecha."</td>
                    <td>".$concepto."</td>
                    <td></td>";
                    if($DoH == 'D')
                    {
                        echo "
                            <td>".$saldo."</td>
                            <td></td>";
                        $saldoInicial = $saldoInicial + $saldo;
                    }
                    else
                    {
                        echo "
                            <td></td>
                            <td>".$saldo."</td>";
                        $saldoInicial = $saldoInicial - $saldo;
                    }
                    echo "
                    <td></td>
                </tr>
                ";
                $base = $cuentaId;
                $saldoInicialAnterior = $saldoInicial;
            }
            else
            {
                echo "
                <tr>
                    <td>".$fecha."</td>
                    <td>".$concepto."</td>
                    <td></td>";
                    if($DoH == 'D')
                    {
                        echo "
                            <td>".$saldo."</td>
                            <td></td>";
                        $saldoInicial = $saldoInicial + $saldo;
                    }
                    else
                    {
                        echo "
                            <td></td>
                            <td>".$saldo."</td>";
                        $saldoInicial = $saldoInicial - $saldo;
                    }
                    echo "
                    <td></td>
                </tr>
                ";
            }

        }
        echo "
            <tr class='color linea'>
                <th></th>
                <th></th>
                <td></td>
                <th></th>
                <th></th>
                <th style='text-align:center;'>$saldoInicial</th>
            </tr>
            ";
    }
    else
    {
        echo 
            "
            <tr>
                <th scope='row'>No se encontr?? ning??n resultado</th>
            </tr>
            ";
    }
?>
