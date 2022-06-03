<?php

include('../conec.php');

$codigoFabricante = $_POST['id'];
$nombreFabricante = $_POST['nomFabricante'];

$editarFabricante = "UPDATE fabricante 
                     SET nombre = '$nombreFabricante'
                     WHERE codigo = '$codigoFabricante'";

$resultado = mysqli_query($conexion, $editarFabricante);

header('Location: ../fabricantes.php');

?>

