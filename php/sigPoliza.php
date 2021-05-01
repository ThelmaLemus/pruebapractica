<?php

    include "php/conexionBD.php";

    $query = $mysqli->query("SELECT no FROM poliza ORDER BY no DESC LIMIT 1");

    if(($query->num_rows) > 0)
    {
        $fila = $query->fetch_assoc();
        echo (intval($fila['no'])+1);
    }
    else
    {
        echo 1;
    }


?>