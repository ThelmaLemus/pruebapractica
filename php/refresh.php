<?php

    $mes = $_POST['month'];
    echo $mes;

    header('Location: ../diario.php?m='.$mes.'');

?>