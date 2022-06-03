<?php

include('../conec.php');

$codigoFabricante = $_GET['id'];

$eliminarFabricante = "DELETE FROM fabricante WHERE codigo = '$codigoFabricante'";

$resultado = mysqli_query($conexion, $eliminarFabricante);

header('Location: ../fabricantes.php');

?>

