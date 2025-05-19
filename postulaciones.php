<?php
session_start();
if (empty($_SESSION["id"]) || $_SESSION["rol"] != "Desarrollador") {
    header("Location: login.php");  
  
}else{
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulaciones</title>
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

   

<div class="vancan" style="border:none;">
    <div class="vancan1" style="margin-left:0px; background: white;">
        <h1>Tu postulaciones </h1>

        <div>
            <form action="" method="post">
                <label style="margin-top: 15px; "  for="favoriteOnly11"></label>
                <select style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Experiencia" id="Experiencia">
                    <option value="">Seleccione una opción</option>
                    <option value="Vacante" <?php if(isset($_POST['Experiencia']) && $_POST['Experiencia'] == 'Vacante') echo 'selected'; ?>>Vacante</option>
                    <option value="Proyecto" <?php if(isset($_POST['Experiencia']) && $_POST['Experiencia'] == 'Proyecto') echo 'selected'; ?>>Proyecto</option>
                </select>
                <button id="mood">Filtar</button> <a href="" id="mood1">Limpiar postulacion</a>
            </form>             
        </div>

        <div class="vancan2">
            <?php
                if(isset($_POST['Experiencia'])){
                    $experiencia = $_POST['Experiencia'];
                    if($experiencia == "Vacante"){
                        include "conexion.php";
                        $id = $_SESSION["correo"];
                        $mostrar = mysqli_query($conexion, "SELECT * FROM guard WHERE tipo = 'vacante' ORDER BY id_guardado DESC  ");
                        while($fila = $mostrar->fetch_assoc()){ 
                            echo '<div class="vancan3">';
                            echo '<h2>' . $fila['empresa'] . '</h2>';
                            echo '<p><strong>Especialidad:</strong> ' . $fila['especialidad'] . '</p>';
                            echo '<p><strong>Descripcion:</strong> ' . $fila['descripcion'] . '</p>';
                            echo '<p><strong>Ubicacion:</strong> ' . $fila['ubicacion'] . '</p>';
                            echo '<p><strong>Sueldo:</strong> ' . number_format($fila['suerdo'], 2) . '</p>';
                            echo '<p><strong>Fecha postulado:</strong> ' . $fila['fecha'] . '</p>';
                
                            echo '</div>';
                        }
                    }else{
                        include "conexion.php";
                        $mostrar = mysqli_query($conexion, "SELECT * FROM guard WHERE tipo = 'proyecto' ORDER BY id_guardado DESC  ");
                        $id = $_SESSION["correo"];
                        while($fila = $mostrar->fetch_assoc()){ 
                            echo '<div class="vancan3">';
                            echo '<h2>' . $fila['empresa'] . '</h2>';
                            echo '<p><strong>Especialidad:</strong> ' . $fila['especialidad'] . '</p>';
                            echo '<p><strong>Descripcion:</strong> ' . $fila['descripcion'] . '</p>';
                            echo '<p><strong>Ubicacion:</strong> ' . $fila['ubicacion'] . '</p>';
                            echo '<p><strong>Sueldo:</strong> ' . number_format($fila['suerdo'], 2)  . '</p>';
                            echo '<p><strong>Fecha postulado:</strong> ' . $fila['fecha'] . '</p>';
                
                            echo '</div>';
                        }
                    }
                }else{
                    echo '<div class="vancan3">';
                    echo '<h2>Selecciona una opcion para ver tus postulaciones</h2>';
                    echo '</div>';
                }    
               
            ?>

        </div>
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

</Script>



</body>
</html>