<?php

    include('conec.php');

    if(isset($_POST['enviar'])){

        $nom=$_REQUEST["txtnom"];
        $imagen = $_FILES['imagen']['name'];
        $ruta=$_FILES["imagen"]["tmp_name"];
        $destino="img/".$imagen;

        copy($ruta,$destino);

        $nomFabricante = $_POST['nomFabricante'];

        //$insertarFabricante = "INSERT INTO fabricante (nombre) VALUE ('$nomFabricante')";

        $insertarFabricante = "CALL sp_insertarFabricante('$nomFabricante','$destino')";

        $resultado = 
        mysqli_query($conexion,$insertarFabricante);

        if(!$resultado){
            echo '<script>alert("Los datos no se insertaron")</script>';
        }else{
            echo '<script>alert("Los datos se insertaron")</script>';
            
        }
    }

    header('Location: fabricantes.php');
