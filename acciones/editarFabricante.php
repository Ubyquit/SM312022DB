<?php

include('../conec.php');

$codigoFabricante = $_POST['id'];
$nombreFabricante = $_POST['nomFabricante'];

$editarFabricante = "CALL sp_editarFabricante('$nombreFabricante','$codigoFabricante')";

$resultado = mysqli_query($conexion, $editarFabricante);

header('Location: ../fabricantes.php');

?>

