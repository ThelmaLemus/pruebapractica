<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
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

    <?php include "php/conexionBD.php"; echo $password; ?>
</head>
<body>
    <div class="container cuadro">

      <!-- PESTAÑAS DE NAVEGACIÓN -->
        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">CRUD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="polizas.php">Polizas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="diario.php?m=<?php echo $hoy; ?>">Diario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mayor.php?p=<?php echo $primerDia; ?>&u=<?php echo $ultimoDia; ?>">Mayor</a>
            </li>
        </ul>
      
        <!-- CREAR CUENTA -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">+ Crear nueva</button>

        <!-- MODAL PARA CREAR -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Crear nueva cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="php/create.php" method="POST">
                <div class="form-group">
                  <label class="col-form-label">Referencia:</label>
                  <input type="text" class="form-control" id="referencia" name="referencia" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Descripción:</label>
                  <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary" value="Guardar">
              </form>
              </div>
            </div>
          </div>
        </div>

      <!-- TABLA CON DATOS Y EDITAR/ELIMINAR -->
        <table class="table tabla">
          <thead>
            <tr>
              <th scope="col">Referencia</th>
              <th scope="col">Descripción</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include "php/read.php";
            ?>
          </tbody>
        </table>

        <!-- MODAL PARA ACTUALIZAR -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="php/update.php" method="POST">
                  <input type="hidden" class="form-control" id="id_mod" name="id">
                <div class="form-group">
                  <label class="col-form-label">Referencia:</label>
                  <input type="text" class="form-control" id="referencia_mod" name="referencia" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Descripción:</label>
                  <textarea class="form-control" id="descripcion_mod" name="descripcion" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary" value="Guardar">
              </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>