<?php
include 'conexion.php';

if (isset($_POST["perfilgh"])) {
    if (!empty($_POST["nombre"])) {

        $nombrenew = $_POST['nombre'];
        $usuarionew = $_POST['usuario'];
        $telefononew = $_POST['telefono'];
        $luagarnew = $_POST['lugar'];
        $habilidadesnew = $_POST['Habilidades'];
        $experiencianew = $_POST['Experiencia'];
        $descripcionew = $_POST['descripcion'];
        $clavenew = $_POST['clave'];
        $confirmar = $_POST['confirmar_clave'];
      
        $usuarioExiste = mysqli_query($conexion, "SELECT * FROM personal WHERE usuario = '$usuarionew' ");
        $hash = password_hash($clavenew, PASSWORD_DEFAULT);

        if (empty($confirmar)){
            if(mysqli_num_rows($usuarioExiste) <= 1){
                $SQL = "UPDATE personal SET nombre = '$nombrenew', usuario = '$usuarionew', Telefono = '$telefononew', ubicacion = '$luagarnew', 
                descripcion = '$descripcionew', dominio = '$habilidadesnew', experiencia = '$experiencianew'
                WHERE correo = '$correoid'";
                $tll = mysqli_query($conexion, $SQL);
                $nombre = $nombrenew; 
                $usuario = $usuarionew;
                $telefono = $telefononew;
                $luagar = $luagarnew;
                $habilidades = $habilidadesnew;
                $experiencia = $experiencianew;
               

                echo' <div id="exi" >Editado Exitosamente </div>';

                mysqli_query($conexion, "UPDATE loginv1 SET nombre = '$nombrenew', usuario = '$usuarionew'
                WHERE correo = '$correoid'");


                if ($_FILES['cv']['error'] === 0 && $_FILES['cv']['type'] === 'application/pdf') {
                    $archivo = file_get_contents($_FILES['cv']['tmp_name']);
                    $query1 = "UPDATE personal SET documento = ? WHERE correo = '$correoid'";
                        $stmt = mysqli_prepare($conexion, $query1);
                        mysqli_stmt_bind_param($stmt, "s", $archivo);
                        mysqli_stmt_send_long_data($stmt, 0, $archivo);
                        mysqli_stmt_execute($stmt);
                    }else {
                        echo '<div class="error"></div>';
                    }
                    echo "<script>
                    alert('Guardado con exito ✅');
                    window.location.href = 'perfil_desa.php';
                    </script>";
            }
        }else{
            if ($clavenew != $confirmar){
                echo' <div id="exi" style="color:red" > Las contraseñas no coinciden</div>  ';
            }else{
                if(mysqli_num_rows($usuarioExiste) <= 1){
                    $SQL = "UPDATE personal SET nombre = '$nombrenew', usuario = '$usuarionew', Telefono = '$telefononew', ubicacion = '$luagarnew', 
                    descripcion = '$descripcionew', dominio = '$habilidadesnew', experiencia = '$experiencianew', clave = '$hash'
                    WHERE correo = '$correoid'";
                    $tll = mysqli_query($conexion, $SQL);
                    $nombre = $nombrenew; 
                    $usuario = $usuarionew;
                    $telefono = $telefononew;
                    $luagarnew = $luagarnew;
                    $habilidadesnew = $habilidadesnew;
                    $experiencianew = $experiencianew;
                    $clave = $hash;

                    echo' <div id="exi" >Editado Exitosamente </div>';
                    mysqli_query($conexion, "UPDATE loginv1 SET nombre = '$nombrenew', usuario = '$usuarionew', clave = '$hash'
                    WHERE correo = '$correoid'");

                    if ($_FILES['cv']['error'] === 0 && $_FILES['cv']['type'] === 'application/pdf') {
                    $archivo = file_get_contents($_FILES['cv']['tmp_name']);
                    $query1 = "UPDATE personal SET documento = ? WHERE correo = '$correoid'";
                        $stmt = mysqli_prepare($conexion, $query1);
                        mysqli_stmt_bind_param($stmt, "s", $archivo);
                        mysqli_stmt_send_long_data($stmt, 0, $archivo);
                        mysqli_stmt_execute($stmt);
                    }else {
                        echo '<div class="error"></div>';
                    }
                    echo "<script>
                    alert('Guardado con exito ✅');
                    window.location.href = 'perfil_desa.php';
                    </script>";
                }

                    
            }
            
        }       
    }
}

       

?>
