<?php
    include "conexionBD.php";
    $referencia = $_POST['referencia'];
    $descripcion = $_POST['descripcion'];

    // VALIDACIONES
    $val1 = $mysqli->query("SELECT referencia FROM cuentas WHERE referencia = '$referencia'");
    $val2 = $mysqli->query("SELECT descripcion FROM cuentas WHERE descripcion = '$descripcion'");
    if((($val1->num_rows) > 0) || (($val2->num_rows) > 0))
    {
        echo "<script> alert('La referencia o descripción ya existen');
                        window.location.href='../index.php';
         </script>";
    }
    else
    {
        $query = $mysqli->query("INSERT INTO cuentas(referencia, descripcion) VALUES('$referencia', '$descripcion')");
        echo "<script> alert('Guardado exitosamente');
                        window.location.href='../index.php';
         </script>";
    }
?>