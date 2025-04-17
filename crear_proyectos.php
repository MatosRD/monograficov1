<?php
session_start();
include "conexion.php";

$corres = $_SESSION["correo"];
$id = $_GET['id'];

$numero = rand(5, 15);
$mostrar = mysqli_query($conexion, "SELECT * FROM proyecto WHERE id_proyecto = '$id'");
$mostrar1 = mysqli_query($conexion, "SELECT * FROM guard WHERE numero = '$id'");
$mostrar2 = mysqli_query($conexion, "SELECT * FROM personal WHERE correo = '$corres'");


while($fila = $mostrar->fetch_assoc()){
    $id_vacante = $fila['id_proyecto'];
    $nomb_en = $fila['empresa'];
    $especialidad = $fila['especialidad'];
    $salario = $fila['suerdo'];
    $descripcion = $fila['descripcion'];
    $correo = $fila['correo'];
    $fecha = date('d-m-y ');
}



if($mostrar1->num_rows == 0){

    while($fila1 = $mostrar2->fetch_assoc()){
        $esp = $fila1['descripcion'];
        $nomb = $fila1['nombre'];
        $espx = $fila1['experiencia'];

        $tel = $fila1['Telefono'];
        $cor = $fila1['correo'];
        $domi = $fila1['dominio'];
   
    }

    $tipo = 'proyecto';

    $insertar = mysqli_query($conexion, "INSERT INTO guard (numero, empresa, especialidad, suerdo,  descripcion, fecha, tipo) 
    VALUES ($id_vacante, '$nomb_en', '$especialidad', '$salario',  '$descripcion', '$fecha', '$tipo' )");

    $insertar1 = mysqli_query($conexion, "INSERT INTO postulados (especialidad, nombre, experiencia,  telefono, correo, id_correo, nombre_vacante, descripcion, dominio, tipo) 
    VALUES ('$especialidad', '$nomb', '$espx',  '$tel', '$cor', '$correo',  '$especialidad', '$descripcion',   '$domi', '$tipo')");
    echo "<script>
    alert('Guardado con exito ✅');
    window.location.href = 'proyecto_desa.php';
    </script>";


}else{
    
    echo "<script>
    alert('Ya existe una vacante guardada ❌');
    window.location.href = 'proyecto_desa.php';
    </script>";
    
}





?>