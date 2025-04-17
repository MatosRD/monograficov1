<?php
    include 'conexion.php';

 
    $id = $_GET['id'];
    $resul2 = mysqli_query($conexion,"DELETE FROM vacante WHERE id_vacante = '$id' ");
   
    header("location: crear_vacante.php");
    
?>