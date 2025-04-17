<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set("America/Santo_Domingo"); 
$fecha = date("d-m-y ");

$correo = $_SESSION['correo'];
$empresa = $_SESSION['empresa'];
include 'conexion.php';


if(!empty(['vacante'])){
    if(!empty($_POST['especialidad'])){
        $noespecialidadmbre = $_POST['especialidad'];
        $price = $_POST['price'];
        $lugar = $_POST['lugar'];
        $Descripcion = $_POST['textarea'];


        mysqli_query($conexion, "INSERT INTO vacante (empresa, especialidad, suerdo, ubicacion, descripcion, correo, fecha) 
        VALUES ('$empresa','$noespecialidadmbre','$price','$lugar','$Descripcion','$correo', '$fecha')");
        echo '<div id="exi" style=" margin-top:15px;margin-bottom:10px;" >Agregado correctamente 🎉🎉</div>';

    }
}

?>