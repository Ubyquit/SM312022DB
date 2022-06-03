<?php

    include('conec.php');

    //print_r($_POST);

    if(isset($_POST['enviar'])){

        $nomProducto = $_POST['nomProducto'];
        $costoProducto = $_POST['costoProducto'];
        $codigoFabricante = $_POST['codigoFabricante'];


        $insertarProducto = 
        "INSERT INTO producto (nombre, precio, codigo_fabricante) 
        VALUE ('$nomProducto', '$costoProducto', '$codigoFabricante')";

        $resultado = mysqli_query($conexion,$insertarProducto);

        if(!$resultado){
            echo '<script>alert("Los datos no se insertaron")</script>';
        }else{
            echo '<script>alert("Los datos se insertaron")</script>';
            
        }
    }

    header('Location: productos.php');
 ?>