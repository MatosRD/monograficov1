<?php

include 'conexion.php';

if(isset($_POST["perfilgh"])){
    if(!empty($_POST["nombre"] and $_POST["usuario"] && $_POST["empresa"] && $_POST["telefono"] && $_POST["clave"] )
    ){
        $nombrenew = $_POST['nombre'];
        $usuarionew = $_POST['usuario'];
        $empresanew = $_POST['empresa'];
        $telefononew = $_POST['telefono'];
        $clavenew = $_POST['clave'];
        $confirmar = $_POST['confirmar_clave'];
        $hash = password_hash($clavenew, PASSWORD_DEFAULT);

        $ne = mysqli_query($conexion, "select * from personal where nombre_emp = '$empresanew'");
        $nef = mysqli_query($conexion, "select * from personal where usuario = '$usuarionew'");

        if (empty($confirmar)){
            if(mysqli_num_rows($ne) <= 1){
                if(mysqli_num_rows($nef) <= 1){
                    $SQL = "UPDATE personal SET nombre = '$nombrenew', usuario = '$usuarionew', nombre_emp = '$empresanew'
                    , Telefono = '$telefononew', clave = '$hash'
                    WHERE correo = '$correoid'";
                    $tll = mysqli_query($conexion, $SQL);
                    $nombre = $nombrenew; 
                    $usuario = $usuarionew;
                    $empresa = $empresanew; 
                    $telefono = $telefononew;
                    $clave = $clavenew;
            
                    $log = "UPDATE loginv1 SET nombre = '$nombrenew', usuario = '$usuarionew', empresa = '$empresanew'
                    ,  clave = '$hash'
                    WHERE correo = '$correoid'";
                    mysqli_query($conexion, $log);
                    echo' <div id="exi" >Editado Exitosamente </div>';

                }else{

                    echo' <div id="exi" style="color:red" > El usuario ya existe</div>  ';
                }
            }else{
                echo' <div id="exi" style="color:red" > La empresa ya existe</div>  ';
            }
        }else{
            if($clavenew != $confirmar){
                echo' <div id="exi" style="color:red" > Las contraseñas no coinciden</div>  ';
                
            }else{
                if(mysqli_num_rows($ne) <= 1){
                    if(mysqli_num_rows($nef) <= 1){
                        $SQL = "UPDATE personal SET nombre = '$nombrenew', usuario = '$usuarionew', nombre_emp = '$empresanew'
                        , Telefono = '$telefononew', clave = '$hash'
                        WHERE correo = '$correoid'";
                        $tll = mysqli_query($conexion, $SQL);
                        $nombre = $nombrenew; 
                        $usuario = $usuarionew;
                        $empresa = $empresanew; 
                        $telefono = $telefononew;
                        $clave = $clavenew;
                
                        $log = "UPDATE loginv1 SET nombre = '$nombrenew', usuario = '$usuarionew', empresa = '$empresanew'
                        ,  clave = '$hash'
                        WHERE correo = '$correoid'";
                        mysqli_query($conexion, $log);
                        echo' <div id="exi" >Editado Exitosamente </div>';
                    }else{
                        echo' <div id="exi" style="color:red" > El usuario ya existe</div>  ';
                    }
                }else{
                     echo' <div id="exi" style="color:red" > La empresa ya existe</div>  ';
                }    
            }
    
        }
           


      

    }else{
        echo' <div class="EDI" > Campos Vacios Intente Nuevamente</div>  ';
    }

    } 





?>