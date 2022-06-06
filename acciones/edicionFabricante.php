<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  
    <title>Edicion Fabricante</title>
</head>

<body>
<?php

    include('../conec.php'); //Conexión a la db

    $id = $_GET['id']; //Variable enviada desde la apagina fabricantes.php

    //query
    $consulta = "SELECT * FROM fabricante WHERE codigo = '$id' "; 
    
    //consulta a la db e inserción de query
    $resultado = mysqli_query($conexion, $consulta); 
    
    //Recorrido de registros
    $fila = mysqli_fetch_array($resultado);

?>
    <form action="editarfabricante.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Editar el nombre del fabricante</label>
            <input type="text" class="form-control" name="nomFabricante" value="<?php echo $fila["nombre"] ?>"/>
        </div>
        
        <input type="hidden" name="id" value="<?php echo $fila["codigo"] ?>"/>
        
        <input type="submit" name="enviar" value="Insertar fabricante" class="btn btn-primary" />
    </form>

 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>