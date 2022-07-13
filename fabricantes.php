<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  <title>Fabricantes</title>

</head>

<body>
  <?php
  include('partials/nav.html');
  ?>
  <h3>CREAR UN FABRICANTE</h3>

  <form action="registrofabricante.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
  <input type="hidden" value="imagen" name="txtnom">
  <input type="file" name="imagen" lang="es" required>
  </div>  
  <div class="mb-3">
      <label class="form-label">Ingresa el nombre del fabricante</label>
      <input type="text" class="form-control" name="nomFabricante" required/>
    </div>
    <input type="submit" name="enviar" value="Insertar fabricante" class="btn btn-primary" />
  </form>

  <!--Inicio de la tabla-->
  <div class="row">
    <?php

    include('conec.php'); //Conexión a la db

    //consulta a la db
    $consulta = "CALL sp_mostrarFabricantes";

    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_array($resultado)) {

    ?>

      <div class="col-sm-4">
        <div class="card">
          <img src="<?php
                    if ($fila["imagen"] != Null || $fila["imagen"] != 0) {
                      echo $fila["imagen"];
                    } else {
                      echo 'img/default.png';
                    }
                    ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $fila["codigo"] ?> <?php echo $fila["nombre"] ?></h5>
            <a href="acciones/eliminarFabricante.php?id=<?php echo $fila["codigo"] ?>" class="btn btn-primary">Eliminar</a>
            <a href="acciones/edicionFabricante.php?id=<?php echo $fila["codigo"] ?>" class="btn btn-primary">Editar</a>
          </div>
        </div>
      </div>

    <?php  } ?>
    <!--Final de la tabla-->
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>