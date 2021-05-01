<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polizas</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- PROPIOS -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/main.js"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
              <a class="nav-link active" aria-current="page" href="polizas.php">Polizas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="diario.php?m=<?php echo $hoy; ?>">Diario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mayor.php?p=<?php echo $primerDia; ?>&u=<?php echo $ultimoDia; ?>">Mayor</a>
            </li>
        </ul>

        <!-- FORMULARIO DE PÓLIZA -->
        <div class="row formulario">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div id="error"></div>
            <div class="row">
              <!-- NÚMERO DE PÓLIZA -->
              <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <input class="form-control" type="number" value="<?php include 'php/sigPoliza.php'; ?>" disabled id="no">
              </div>
              <!-- FECHA -->
              <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <input class="form-control" type="date" id="fecha">
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Concepto:</label>
              <textarea class="form-control" id="concepto" name="concepto"></textarea>
            </div>
            <div class="row">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 marco" name="debe">
              <!-- FORMULARIO DEBE - HABER -->
                <h4>Debe</h4>
                <!-- BLOQUE FORMULARIO DEBE -->
                <div id="debe">
                  <div class="rubroDebe">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                        <select class="form-control selectDebe">
                          <?php include "php/opciones.php"; ?>
                        </select>
                      </div>
                      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                        <input class="form-control montoDebe" type="number" placeholder="Monto Q.">
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-success add" onclick="duplicate('d')">+</button>
                <input type="number" disabled class="form-control" id="totalDebe" value="0">
              </div>
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 marco">
                <h4>Haber</h4>
                <!-- BLOQUE FORMULARIO HABER -->
                <div id="haber">
                  <div class="rubroHaber">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                        <select class="form-control selectHaber">
                          <?php include "php/opciones.php"; ?>
                        </select>
                      </div>
                      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                        <input class="form-control montoHaber" type="number" placeholder="Monto Q.">
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-success add" onclick="duplicate('h')">+</button>
                <input type="number" disabled class="form-control" id="totalHaber" value="0">
              </div>
              <button type="submit" class="btn btn-primary guardar" onclick="guardar()">Guardar</button>
            </div>
          </div>
        </div>
    </div>

    <script>

        var debeMonto = document.getElementsByClassName("montoDebe");
        var haberMonto = document.getElementsByClassName("montoHaber");

        var totalDebe = document.getElementById("totalDebe");
        var totalHaber = document.getElementById("totalHaber");

        for (var i = 0 ; i < debeMonto.length; i++) {
          debeMonto[i].addEventListener('change' , sumarDebe) ; 
        }

        for (var i = 0 ; i < debeMonto.length; i++) {
          haberMonto[i].addEventListener('change' , sumarHaber) ; 
        }

        function sumarDebe() {
          totalDebe.value = 0;
            for(var i = 0; i < debeMonto.length; i++)
            {
                totalDebe.value = parseFloat(totalDebe.value) + parseFloat(debeMonto[i].value);
            }
        }
        
        function sumarHaber() {
          totalHaber.value = 0;
            for(var i = 0; i < haberMonto.length; i++)
            {
                totalHaber.value = parseFloat(totalHaber.value) + parseFloat(haberMonto[i].value);
            }
        }
    </script>
    
</body>
</html>