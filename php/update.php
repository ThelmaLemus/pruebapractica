<?php
    include "conexionBD.php";
    $referencia = $_POST['referencia'];
    $descripcion = $_POST['descripcion'];
    $id = $_POST['id'];

    // VALIDACIONES
    $val = $mysqli->query("SELECT * FROM cuentas WHERE (referencia = '$referencia' OR descripcion = '$descripcion') AND id != $id");
    if((($val->num_rows) > 0))
    {
        echo "<script> alert('La referencia o descripción ya existen');
                        window.location.href='../index.php';
         </script>";
    }
    else
    {
        $query = $mysqli->query("UPDATE cuentas SET 
                                            referencia = '$referencia', 
                                            descripcion = '$descripcion'
                                WHERE id = '$id'");
        echo "<script> alert('Actualizado exitosamente');
                        window.location.href='../index.php';
         </script>";
    }
?>