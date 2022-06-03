<?php

    include('conec.php');

    if(isset($_POST['enviar'])){

        $nomFabricante = $_POST['nomFabricante'];

        $insertarFabricante = 
        "INSERT INTO fabricante (nombre) 
        VALUE ('$nomFabricante')";

        $resultado = 
        mysqli_query($conexion,$insertarFabricante);

        if(!$resultado){
            echo '<script>alert("Los datos no se insertaron")</script>';
        }else{
            echo '<script>alert("Los datos se insertaron")</script>';
            
        }
    }

    header('Location: fabricantes.php');
