<?php

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['nombre']) && isset($_FILES['cv'])) {
        $nombre      = $_POST['nombre'];
        $usuario     = $_POST['user'];
        $correo      = $_POST['correo'];
        $clave       = $_POST['clave'];
        $contra      = $_POST['contra'];
        $rol         = 'Desarrollador';
        $telefono    = $_POST['telefono'];
        $ubicacion   = $_POST['lugar'];
        $descripcion = $_POST['descripcion'];
        $experiencia = $_POST['Habilidades'];
        $exp         = $_POST['Experiencia'];
        $fecha       = date('Y-m-d');

        // Validación del archivo
        if ($_FILES['cv']['error'] === 0 && $_FILES['cv']['type'] === 'application/pdf') {
            $archivo = file_get_contents($_FILES['cv']['tmp_name']);

            $correoExiste = mysqli_query($conexion, "SELECT * FROM personal WHERE correo = '$correo'");
            $usuarioExiste = mysqli_query($conexion, "SELECT * FROM personal WHERE usuario = '$usuario'");

            if ($clave === $contra) {
                if (mysqli_num_rows($correoExiste) == 0) {
                    if (mysqli_num_rows($usuarioExiste) == 0) {
                        $hash = password_hash($clave, PASSWORD_DEFAULT);

                        $query1 = "INSERT INTO personal (nombre, usuario, correo, clave, rol, ubicacion, Telefono, descripcion, dominio, documento, fecha, experiencia) 
                                   VALUES ('$nombre', '$usuario', '$correo', '$hash', '$rol', '$ubicacion', '$telefono', '$descripcion', '$experiencia', ?, '$fecha', '$exp')";
                        $stmt = mysqli_prepare($conexion, $query1);
                        mysqli_stmt_bind_param($stmt, "s", $archivo);
                        mysqli_stmt_send_long_data($stmt, 0, $archivo);
                        mysqli_stmt_execute($stmt);

                        mysqli_query($conexion, "INSERT INTO loginv1 (usuario, nombre, clave, rol, correo) 
                                                 VALUES ('$usuario','$nombre','$hash','$rol','$correo')");

                        echo '<div class="mover">Registrado correctamente</div>';
                        echo '<a href="login.php" class="mas">Aceptar ----></a>';
                        exit();
                    } else {
                        echo '<div class="error">El usuario ya está registrado</div>
                              <style>#user { border: 3px solid red; }</style>';
                    }
                } else {
                    echo '<div class="error">El correo ya está registrado</div>
                          <style>#corr { border: 3px solid red; }</style>';
                }
            } else {
                echo '<div class="error">Las contraseñas no coinciden</div>
                      <style>#con { border: 3px solid red; }</style>';
            }
        } else {
            echo '<div class="error">Debe subir un archivo PDF válido</div>';
        }
    }
}
?>