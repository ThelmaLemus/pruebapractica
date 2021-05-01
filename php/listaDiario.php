<?php

    include "php/conexionBD.php";
    $base = 0;
    $suma = 0;
    $fecha = $_GET['m'];
    $splitFecha = explode("-", $fecha);

    $query = $mysqli->query("SELECT * FROM poliza WHERE YEAR(fecha) = $splitFecha[0] AND MONTH(fecha) = $splitFecha[1] ORDER BY no ASC");

    if(($query->num_rows) > 0)
    {
        while ($fila = $query->fetch_assoc()) {
            $no = $fila['no'];
            $fecha = $fila['fecha'];
            $cuentaId = $fila['cuentaId'];
            $DoH = $fila['DoH'];
            $concepto = $fila['concepto'];
            $saldo = $fila['saldo'];
            $sumaDebe = $fila['sumaDebe'];
            $sumaHaber = $fila['sumaHaber'];

            // FORMATO DE LA FECHA
            $fecha = date("j F Y", strtotime($fecha));

            // OBTENER NOMBRE Y REFERENCIA DE CUENTA
            $get = $mysqli->query("SELECT referencia, descripcion FROM cuentas WHERE id = $cuentaId");
            $resultado = $get->fetch_assoc();
            $referencia = $resultado['referencia'];
            $cuenta = $resultado['descripcion'];

            if($no != $base)
            {
                if($base != 0)
                {
                    echo "
                    <tr>
                        <td></td>
                        <td></td>
                        <th>Q.".$sumaDebeAnterior."</th>
                        <th>Q.".$sumaHaberAnterior."</th>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                </div>";
                }
                echo '<div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 marco">
                                <h5>No. poliza <b>'.$no.'</b></h5>'.$fecha.'<p>Concepto: '.$concepto.'
                                <table class="table tabla">
                                    <thead>
                                        <tr>
                                        <th scope="col">Referencia</th>
                                        <th scope="col">Cuenta</th>
                                        <th scope="col">Debe</th>
                                        <th scope="col">Haber</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td scope="row">'.$referencia.'</td>
                                        <td>'.$cuenta.'</td>';
                                        if((strcmp($DoH, 'D') == 0))
                                        {
                                            echo "<td>Q.".$saldo."</td>";
                                            echo "<td></td>";
                                        }
                                        else
                                        {
                                            echo "<td></td>";
                                            echo "<td>Q.".$saldo."</td>";
                                        }
                                    echo "</tr>";
                                        
                $base = $no;
                $sumaDebeAnterior = $sumaDebe;
                $sumaHaberAnterior = $sumaHaber;
            }
            else
            {
                echo '<tr>
                <td scope="row">'.$referencia.'</td>
                <td>'.$cuenta.'</td>';
                if((strcmp($DoH, 'D') == 0))
                {
                    echo "<td>Q.".$saldo."</td>";
                    echo "<td></td>";
                }
                else
                {
                    echo "<td></td>";
                    echo "<td>Q.".$saldo."</td>";
                }
            echo "</tr>";
            }
        }
        echo "
        <tr>
            <td></td>
            <td></td>
            <th>Q.".$sumaDebeAnterior."</th>
            <th>Q.".$sumaHaberAnterior."</th>
        </tr>
        </tbody>
        </table>
        </div>
    </div>";
    }
    else
    {
        echo 
            "
            <tr>
                <th scope='row'>No se encontró ningún resultado</th>
            </tr>
            ";
    }

?>