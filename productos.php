<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  <title>Prodcutos</title>

</head>

<body>
<?php
include('partials/nav.html');
?>
  <h3>Crea un producto</h3>

  <form action="registroProducto.php" method="POST">
    <div class="mb-3">
      <label class="form-label">Ingresa el nombre del producto</label>
      <input type="text" class="form-control" name="nomProducto" />
    </div>

    <div class="mb-3">
      <label class="form-label">Ingresa el precio del producto</label>
      <input type="number" class="form-control" name="costoProducto" />
    </div>

    <div class="mb-3">
      <label class="form-label">Ingresa el fabricante</label>
      <select class="form-select" aria-label="Default select example" name="codigoFabricante">
        <?php
        include('conec.php'); //Conexión a la db
        $consulta2 = "SELECT * FROM fabricante";
        $resultado2 = mysqli_query($conexion, $consulta2);
        while ($fila2 = mysqli_fetch_array($resultado2)) {
        ?>
          <option value="<?php echo $fila2["codigo"] ?>"><?php echo $fila2["nombre"] ?></option>
        <?php  } ?>
      </select>
    </div>

    <input type="submit" name="enviar" value="Insertar producto" class="btn btn-primary" />
  </form>

  <!--Inicio de la tabla-->
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Precio</th>
        <th scope="col">Fabricante</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //consulta a la db
      $consulta = "SELECT producto.codigo, producto.nombre, producto.precio, fabricante.nombre AS fabricante
      FROM producto
      INNER JOIN fabricante
      ON producto.codigo_fabricante = fabricante.codigo ORDER BY producto.codigo ASC";

      $resultado = mysqli_query($conexion, $consulta);

      while ($fila = mysqli_fetch_array($resultado)) {
      ?>
        <tr>
          <th scope="row"><?php echo $fila["codigo"] ?></th>
          <td><?php echo $fila["nombre"] ?></td>
          <td>$ <?php echo $fila["precio"] ?></td>
          <td><?php echo $fila["fabricante"] ?></td>
          <!--Boton eliminar-->
          <td><a target="_self" href="acciones/eliminarProducto.php?id=<?php echo $fila["codigo"] ?>"><i class="bi bi-trash text-danger"></i></td>
        </tr>
      <?php  } ?>
    </tbody>
  </table>
  <!--Final de la tabla-->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>