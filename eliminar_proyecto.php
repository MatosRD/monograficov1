<?php
    include 'conexion.php';

 
    $id = $_GET['id'];
    $resul2 = mysqli_query($conexion,"DELETE FROM proyecto WHERE id_proyecto = '$id' ");
   
    header("location: proyecto.php");
    
?>