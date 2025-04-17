<?php
session_start();
if (empty($_SESSION["id"]) || $_SESSION["rol"] != "Empresa") {
    header("Location: login.php");  
  
}else{
    
}

include "conexion.php";
$correoid = $_SESSION["correo"];   
$editar_inventario = "SELECT * FROM personal WHERE correo ='$correoid'";
$ejecut = mysqli_query($conexion, $editar_inventario);

$filas = mysqli_fetch_assoc($ejecut);
    $nombre = $filas['nombre'];
    $usuario = $filas['usuario'];
    $empresa = $filas['nombre_emp'];
    $telefono = $filas['Telefono'];
    $clave = $filas['clave'];
    $ft = $filas['foto'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="inicio.css">
</head>
<body>
<div class="header">
<div class="menu">
            
            <ul>
                <img src="bandera.png" alt="" style="width: 50px; height: 35px; margin: 8px;">
                <li><a href="crear_vacante.php" style="text-decoration:none; color:black;" >Crear vacante</a></li>
                <li><a href="postulados.php" style="text-decoration:none; color:black;" >Postulados</a></li>
                <li><a href="desarrolladore.php" style="text-decoration:none; color:black;" >Desarrolladores</a></li>
                <li><a href="proyecto.php" style="text-decoration:none; color:black;" >Proyectos</a></li>
                <li><a href="perfil.php" style="text-decoration:none; color:black;" >Perfil</a></li>
            </ul>

            <div class="botton"  onclick="mostrarElemento()" style="display:flex; margin:10px 50px 10px 10px;" >
            <?php   
                    include "conexion.php";
                    $id = $_SESSION["correo"];
                
                    $mostrar = mysqli_query($conexion, "SELECT * FROM personal WHERE correo = '$id'");

                    while($fila = $mostrar->fetch_assoc()){ 
                        if(empty($fila['foto'])){
                            echo '<img src="perf.png" alt="Perfil predeterminado" />';
                        }else{
                            echo '<img src="data:image/png;base64,' . base64_encode($fila['foto']) . '"/>';
                            }
                        }
                                  
                ?>
                    <div class="menus" id="menus">
                    <a href="salir.php">salir</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="lop" style="margin-top: -40px; margin-bottom: 20px;">
        <div class="lop2">
            <h1><span style="font-size: 34px;">Perfil</h1>
        </div>
    </div>


    <div class="perfil">
        <div class="perfil_1">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="foto">
                <?php 
                    if (isset($_POST["cambio"])) {
                        if (!empty($_FILES["foto"]["tmp_name"])) {
                            $fotoTmp = $_FILES['foto']['tmp_name'];
                            $fotoData = addslashes(file_get_contents($fotoTmp)); // Guarda como binario

                            $query = "UPDATE personal SET foto = '$fotoData' WHERE correo = '$correoid'";
                            $resultado = mysqli_query($conexion, $query);
                            header("Location: perfil.php"); // Redirigir a la misma página para ver el cambio

                            if ($resultado) {
                                echo '<div id="exi">Cambio Exitosamente</div>';
                            } else {
                                echo '<div class="EDI">Error al guardar la foto</div>';
                            }
                        }
                    }
      
                if(empty($filas['foto'])){
                    echo '<img src="perf.png" alt="Perfil predeterminado" />';
                }else{
                    echo '<img src="data:image/png;base64,' . base64_encode($ft) . '"/>';
                }?>
                    <input type="file" name="foto" id="foto" style="width: 150px; margin:auto; border-radius:10px; padding:5px; cursor:pointer;  border:none; color: white;" >
                    <button name="cambio" style="width: 100px; height:40px ; border-radius:10px; margin:auto; border:none;cursor:pointer; background:green; color:white;">Cambiar</button>

                </div>
                <div class="cont">
                    <?php include 'editar_perfil.php' ?>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $nombre ?>" required>
                    <label for="">Usuario:</label>
                    <input type="text" name="usuario" value="<?php echo $usuario ?>" required>
                    <label for="">Nombre empresa</label>
                    <input type="text" name="empresa" value="<?php echo $empresa ?>" required>
                    <label for="">Telefono:</label>
                    <input type="text" name="telefono" value="<?php echo $telefono ?>" required>
                    <label for="">Contraseña</label>
                    <input type="password" name="clave" value="<?php echo $clave ?>" required>
                    <label for="">Confirmar contraseña</label>
                    <input type="password" name="confirmar_clave">
                    <button name="perfilgh" id="pin" style="margin-top: 10px; padding:10px 20px; border-radius:10px; cursor:pointer; background:rgba(0, 0, 247, 0.747); border:none; color: white;" >Guardar</button>
                </div>
            </form>
        </div>
    </div>



    <Script>
      function mostrarElemento() {
  const elemento = document.getElementById("menus");
  if (elemento.style.display === "none") {
    elemento.style.display = "block";
  } else {
    elemento.style.display = "none";
  }
}




     
    function mostrarElemento() {
        const elemento = document.getElementById("menus");
        if (elemento.style.display === "none") {
        elemento.style.display = "block";
        } else {
        elemento.style.display = "none";
        }
    }




</Script>

</body>
</html>