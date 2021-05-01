<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php include "php/conexionBD.php"; ?>
</head>
<body>
    <div class="container cuadro">
        <!-- PESTAÑAS DE NAVEGACIÓN -->
        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="index.php">CRUD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="polizas.php">Polizas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="diario.php?m=<?php echo $hoy; ?>">Diario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mayor.php?p=<?php echo $primerDia; ?>&u=<?php echo $ultimoDia; ?>">Mayor</a>
            </li>
        </ul>

        <!-- BUSCADOR DE MES -->
        <?php $fecha = $_GET['m']; ?>
        <form action="php/refresh.php" method="POST">
          <div class="row mes">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
              <input type="month" name="month" id="month" class="form-control" value="<?php echo $fecha; ?>" max="<?php echo $hoy; ?>">
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
              <input type="submit" class="btn btn-primary" value="Actualizar">
            </div>
          </div>
        </form>

        <!-- DESPLIEGUE DE PÓLIZAS DEL MES -->
        <?php include "php/listaDiario.php"; ?>

    </div>
    
</body>
</html>