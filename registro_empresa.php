<?php

include 'conexion.php';


if(!empty(['mf'])){
    if(!empty($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $usuario = $_POST['user'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $rol = 'Empresa';
        $contra = $_POST['contra'];
        $ubicacion = $_POST['lugar'];


        $consulta = mysqli_query($conexion, "SELECT * FROM personal WHERE correo = '$correo'");
        $consultaa = mysqli_query($conexion, "SELECT * FROM personal WHERE usuario = '$usuario'");

        $hash = password_hash($clave, PASSWORD_DEFAULT);

        if($contra == $clave){
            if(mysqli_num_rows($consulta) == 0){
                if(mysqli_num_rows($consultaa) == 0){
                     mysqli_query($conexion, "INSERT INTO personal (nombre, usuario, correo, clave, rol, ubicacion, nombre_emp) 
                     VALUES ('$nombre','$usuario','$correo','$hash','$rol','$ubicacion' ,'$nombre')");
     
                     mysqli_query($conexion, "INSERT INTO loginv1 (usuario, nombre, clave, rol, correo) 
                     VALUES ('$usuario','$nombre','$hash','$rol','$correo')");
     
                     echo '<div class="mover"> registrado correctamente </div>';
                     echo '<a href="login.php" class="mas"> Aceptar ----></a>';
                     
                     exit();
                }else{
                 echo '<div class="error">El usuario ya esta registrado </div>
                 <style> #user{border: 3px solid red;}</style>
                 ';
                }
             }else{
                 echo '<div class="error">El correo ya esta registrado </div>
                 <style> #corr{border: 3px solid red;}</style>
                 ';
             }
        }else{
            echo '<div class="error">La contraseña no coinciden </div>
            <style> #con{border: 3px solid red;}</style>
            ';
           
        }
    }
}
 

?>