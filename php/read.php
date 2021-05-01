<?php

    include "conexionBD.php";

    $query = $mysqli->query("SELECT * FROM cuentas ORDER BY referencia ASC");

    if(($query->num_rows) > 0)
    {
        while ($fila = $query->fetch_assoc()) {
            $referencia = $fila['referencia'];
            $descripcion = $fila['descripcion'];
            $id = $fila['id'];
            echo 
            "
            <tr>
                <th scope='row'>".$referencia."</th>
                <td>".$descripcion."</td>
                <td><button onclick='editar(this)' value='".$id."' type='button' class='btn btn-primary' data-toggle='modal' data-target='#updateModal'>Editar</button></td>
                <td><a href='php/delete.php?id=".$id."'>Eliminar</a></td>
            </tr>
            ";
        }
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