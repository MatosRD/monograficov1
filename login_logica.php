<?php
    session_start();
    include "conexion.php";

    if(!empty(['OK'])){
        if(!empty($_POST['usuario']) and !empty($_POST['clave'])){
            $user = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            $buscar_login = mysqli_query($conexion, "SELECT * FROM loginv1 WHERE (usuario = '$user' OR correo = '$user') ");
          
            if ($datos = $buscar_login->fetch_assoc()) {
                if (password_verify($clave, $datos['clave'])) {
                
                    $_SESSION["id"] = $datos['id_login'];
                    $_SESSION["usuario"] = $datos['usuario'];
                    $_SESSION["nombre"] = $datos['nombre'];
                    $_SESSION["rol"] = $datos['rol'];
                    $_SESSION["correo"] = $datos['correo'];
                    $_SESSION["empresa"] = $datos['empresa'];
            
                    // Redireccionar según el rol
                    if ($_SESSION["rol"] == "Desarrollador") {
                        header("location: desarrollador.php");
                        exit();
                    }
                    if ($_SESSION["rol"] == "Empresa") {
                        header("location: empresa.php");
                        exit();
                    }
                    if ($_SESSION["rol"] == "") {
                        header("location: empleador.php");
                        exit();
                    }

                } else {
                   echo "❌ Usuario o clave incorrectos.";
                }
            }
            else {
                echo "<div style='margin-bottom:10px;' >❌ Usuario o clave incorrectos.</div>";
            }
        }
    }




?>