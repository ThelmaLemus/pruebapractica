<?php

    $fecha1 = $_POST['dateI'];
    $fecha2 = $_POST['dateF'];

    header('Location: ../mayor.php?p='.$fecha1.'&u='.$fecha2);

?>