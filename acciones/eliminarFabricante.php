<?php

include('../conec.php');

$codigoFabricante = $_GET['id'];

$eliminarFabricante = "CALL sp_eliminarFabricante('$codigoFabricante')";

$resultado = mysqli_query($conexion, $eliminarFabricante);

header('Location: ../fabricantes.php');

?>

