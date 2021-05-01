<?php
    include "conexionBD.php";
    $id = $_GET['id'];

    // VALIDACIONES
    $query = $mysqli->query("DELETE FROM cuentas WHERE id = $id");

    if (!$query)
    {
        echo "<script> alert('Falló la eliminación: (" . $mysqli->errno . ") " . $mysqli->error . "));
                        window.location.href='../index.php'; 
            </script>";
    }
    else
    {
        echo "<script> alert('Eliminado exitosamente');
                    window.location.href='../index.php';
            </script>";
    }

    
?>