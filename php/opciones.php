<?php

    include "conexionBD.php";

    $query = $mysqli->query("SELECT * FROM cuentas ORDER BY referencia ASC");

    if(($query->num_rows) > 0)
    {
        echo "<option disabled selected>Seleccione una cuenta</option>";
        while ($fila = $query->fetch_assoc()) {
            $referencia = $fila['referencia'];
            $descripcion = $fila['descripcion'];
            $id = $fila['id'];
            echo "<option value='".$id."'>".$descripcion."</option>";
        }
    }
    else
    {
        echo "<option disabled>No hay cuentas agregadas</option>";
    }

?>