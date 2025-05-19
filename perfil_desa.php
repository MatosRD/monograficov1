<?php
session_start();
if (empty($_SESSION["id"]) || $_SESSION["rol"] != "Desarrollador") {
    header("Location: login.php");  
  
}else{
    
}
include "conexion.php";
$correoid = $_SESSION["correo"];   
$editar_inventario = "SELECT * FROM personal WHERE correo ='$correoid'";
$ejecut = mysqli_query($conexion, $editar_inventario);

$filas = mysqli_fetch_assoc($ejecut);
$correo = $filas['correo'];
    $nombre = $filas['nombre'];
    $usuario = $filas['usuario'];
    $telefono = $filas['Telefono'];
    $lugar = $filas['ubicacion'];
    $Habilidades = $filas['dominio'];
    $Experiencia = $filas['experiencia'];
    $descripcion = $filas['descripcion'];
    
    $clave = $filas['clave'];
    $ft = $filas['foto'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perfil</title>
    <link rel="stylesheet" href="inicio.css">
</head>
<body>

<div class="header">
<div class="menu">
            
            <ul>
                <img src="bandera.png" alt="" style="width: 50px; height: 35px; margin: 8px;">
                <li><a href="vacante_desa.php" style="text-decoration:none; color:black;" >Buscar vacante</a></li>
                <li><a href="proyecto_desa.php" style="text-decoration:none; color:black;" >Buscar Proyector</a></li>
                <li><a href="postulaciones.php" style="text-decoration:none; color:black;" >Postulaciones</a></li>
                <li><a href="perfil_desa.php" style="text-decoration:none; color:black;" >Perfil</a></li>
            </ul>

            <div class="botton"  onclick="mostrarElemento()" style="display:flex; margin:10px 50px 10px 10px;" >
            <?php   
                    include "conexion.php";
                    $id = $_SESSION["correo"];
                
                    $mostrar = mysqli_query($conexion, "SELECT * FROM personal WHERE correo = '$id' ");

                    while($fila = $mostrar->fetch_assoc()){ 
                        if(empty($fila['foto'])){
                            echo '<img src="perf.png" alt="Perfil predeterminado" />';
                        }else{
                            echo '<img style="width:100%; border-radius:50%;" src="data:image/png;base64,' . base64_encode($fila['foto']) . '"/>';
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

    <style>
        #abh{
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin: auto;
            display: block;
        }	
    </style>

    <div class="perfil">
        <div class="perfil_1">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="foto" style="height: auto;" >
                <?php 
                    if (isset($_POST["cambio"])) {
                        if (!empty($_FILES["foto"]["tmp_name"])) {
                            $fotoTmp = $_FILES['foto']['tmp_name'];
                            $fotoData = addslashes(file_get_contents($fotoTmp)); // Guarda como binario

                            $query = "UPDATE personal SET foto = '$fotoData' WHERE correo = '$correoid'";
                            $resultado = mysqli_query($conexion, $query);
                             // Redirigir a la misma página para ver el cambio

                            if ($resultado) {
                                echo "<script>
                                alert('Guardado con exito ✅');
                                window.location.href = 'perfil_desa.php';
                                </script>";
                            } else {
                                echo '<div class="EDI">Error al guardar la foto</div>';
                            }
                        }
                    }
      
                if(empty($filas['foto'])){
                    echo '<img id="abh" src="perf.png" alt="Perfil predeterminado" />';
                }else{
                    echo '<img id="abh" src="data:image/png;base64,' . base64_encode($ft) . '"/>';
                }?>
                    <input type="file" name="foto" id="foto" style="width: 150px; margin:auto; border-radius:10px; padding:5px; cursor:pointer;  border:none; color: white;" >
                    <button name="cambio" style="width: 100px; height:40px ; border-radius:10px; margin:auto; border:none;cursor:pointer; background:green; color:white;">Cambiar</button>

                </div>
                <div class="cont">
                    <?php include 'editar_perfilde.php' ?>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $nombre ?>" required>
                    <label for="">Usuario:</label>
                    <input type="text" name="usuario" value="<?php echo $usuario ?>" required>
                    <label for="">Telefono:</label>
                    <input type="text" name="telefono" value="<?php echo $telefono ?>" required>
                    <label style="margin-top: px;" for="favoriteOnly1">Provincia:</label>
                    <select  style="height: 33px; border-radius: 10px;" name="lugar" id="lugar">
                    <option ><?php echo $lugar ?></option>
                    <option>Santo Domingo</option>
                    <option>Distrito Nacional</option>
                    <option>Valverde</option>
                    <option>Santiago Rodríguez</option>
                    <option>Santiago</option>
                    <option>Cotuí</option>
                    <option>San Pedro de Macorís</option>
                    <option>San Juan</option>
                    <option>San José de Ocoa</option>
                    <option>San Cristóbal</option>
                    <option>Samaná</option>
                    <option>Puerto Plata</option>
                    <option>Peravia</option>
                    <option>Pedernales</option>
                    <option>Monte Plata</option>
                    <option>Monte Cristi</option>
                    <option>Monseñor Nouel</option>
                    <option>Nagua</option>
                    <option>La Vega</option>
                    <option>La Romana</option>
                    <option>La Altagracia</option>
                    <option>Independencia</option>
                    <option>Hermanas Mirabal</option>
                    <option>Hato Mayor</option>
                    <option>Espaillat</option>
                    <option>Elías Piña</option>
                    <option>El Seibo</option>
                    <option>Duarte</option>
                    <option>Dajabón</option>
                    <option>Barahona</option>
                    <option>Bahoruco</option>
                    <option>Azua</option>
                    </select>

                    <label style="margin-top: 20px;" for="favoriteOnly11"  >Habilidades:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Habilidades" id="Habilidades" >
                    <option ><?php echo $Habilidades ?></option>
                    <option >Desarrollador Frontend</option>
                    <option >Desarrollador Backend</option>
                    <option >Desarrollador Full Stack</option>
                    <option >Ingeniero de Software</option>
                    <option >Ingeniero de Machine Learning</option>
                    <option >Desarrollador de Aplicaciones Móviles</option>
                    <option >Desarrollador de Software</option>
                    <option >Administrador de Redes</option>
                    <option >Ingeniero de Seguridad Informática</option>
                    <option >Especialista en Soporte Técnico</option>
                    <option >Analista de Datos</option>
                    <option >Especialista en Big Data</option>
                    <option >Administrador de Bases de Datos</option>
                    <option >Ingeniero de Infraestructura</option>
                    <option >Especialista en AWS, Azure, Google Cloud</option>
                    <option >Diseñador UX (Experiencia de Usuario)</option>
                    <option >Diseñador UI (Interfaz de Usuario)</option>
                    <option >Arquitecto de Datos</option>
                    <option >Ingeniero en Robótica</option>
                    <option >Gerente de Proyecto (Project Manager)</option>
                    <option >Scrum Master</option>
                    <option >Product Manager</option>
                    <option >Agile Coach</option>
                    </select>

                    <label style="margin-top: 10px;" for="favoriteOnly11">Experiencia:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Experiencia" id="Experiencia" >
                    <option ><?php echo $Experiencia . ' años' ?></option>
                    <option value="1" >1 años</option>
                    <option value="2" >2 años</option>
                    <option value="3" >3 años</option>
                    <option value="4" >4 años</option>
                    <option value="5" >+ 5 años</option>
                    </select>

                    <textarea name="descripcion" placeholder="Breve descripción" id="descripcion" cols="30" rows="10" style="height: 70px;" required><?php echo $descripcion?></textarea>
                    <p style="margin-bottom: 10px;" id="contador">0 / 60 palabras</p>

                    <?php include 'descargar_cv.php' ?>
                    <label for="" style="margin-top: 5px;" >Cv: <a href="descargar2_cv.php?id=<?php echo $correo ?>"> ver ⬇️</a></label>
                    <input type="file" name="cv" id="curriculum" accept="application/pdf" >

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


const textarea = document.getElementById('descripcion');
  const contador = document.getElementById('contador');
  const maxCaracteres = 60;

  textarea.addEventListener('input', () => {
    const longitud = textarea.value.length;
    contador.textContent = `${longitud} / ${maxCaracteres} caracteres`;

    if (longitud > maxCaracteres) {
      textarea.value = textarea.value.substring(0, maxCaracteres);
      contador.textContent = `${maxCaracteres} / ${maxCaracteres} caracteres`;
    }
});
     
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