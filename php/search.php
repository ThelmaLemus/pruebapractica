<?php
    include "conexionBD.php";
    $id = $_POST['id'];

    // VALIDACIONES
    $query = $mysqli->query("SELECT descripcion, referencia FROM cuentas WHERE id = '$id'");

    if (!$query)
    {
        echo "<script> alert('Por favor vuelve a presionar el botón: (" . $mysqli->errno . ") " . $mysqli->error . "));
                        window.location.href='../index.php'; 
            </script>";
    }
    else
    {
        $fila = $query->fetch_assoc();
        $referencia = $fila['referencia'];
        $descripcion = $fila['descripcion'];

        $datos = array
        (
            "id" => trim($id),
            "referencia" => trim($referencia),
            "descripcion" => trim($descripcion)
        );

        echo json_encode($datos);
    }
?>