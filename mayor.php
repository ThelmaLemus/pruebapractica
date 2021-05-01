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
              <a class="nav-link" href="diario.php?m=<?php echo $hoy; ?>">Diario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="mayor.php?p=<?php echo $primerDia; ?>&u=<?php echo $ultimoDia; ?>">Mayor</a>
            </li>
        </ul>

        <?php
          $diaUno = $_GET['p'];
          $diaFinal = $_GET['u'];
        ?>

        <h3 class="title">Libro Mayor General</h3>
        <h4 class="title">(Expresado en Quetzales)</h4>
        <form action="php/refreshM.php" method="POST">
          <div class="row fechas">
            <div class="col-2 col-sm-2 col-md-1 col-lg-1">
              <p>Fecha</p>
            </div>
            <div class="col-9 col-sm-9 col-md-4 col-lg-4">
              <input type="date" id="dateI" name="dateI" class="form-control" value="<?php echo $diaUno; ?>">
            </div>
            <div class="col-2 col-sm-2 col-md-1 col-lg-1">
              <p>a</p>
            </div>
            <div class="col-9 col-sm-9 col-md-4 col-lg-4">
              <input type="date" id="dateF" name="dateF" class="form-control" min="<?php echo $diaUno; ?>" value="<?php echo $diaFinal; ?>">
            </div>
            <div class="col-2 col-sm-2 col-md-2 col-lg-2">
              <input type="submit" value="Buscar" class="btn btn-primary">
            </div>
          </div>
        </form>

        <table class="table tabla">
          <thead>
            <tr>
              <th scope="col">Fecha</th>
              <th scope="col">Concepto</th>
              <th scope="col">Saldo inicial</th>
              <th scope="col">Debe</th>
              <th scope="col">Haber</th>
              <th scope="col">Saldo final</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include "php/listaMayor.php";
            ?>
          </tbody>
        </table>
    </div>

    <script>
      var campoFecha = document.getElementById("dateI");
      campoFecha.addEventListener('change' , setUltimo);

      function setUltimo(){
        var campoFecha2 = document.getElementById("dateF");
        campoFecha2.min = campoFecha.value;
      }
    </script>
    
</body>
</html>