<?php
session_start();
if (empty($_SESSION["id"]) || $_SESSION["rol"] != "Empresa") {
    header("Location: login.php");  
  
}else{
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpliRD</title>
    <link rel="stylesheet" href="inicio.css">
</head>
<body>
<div class="header">
        <div class="menu">
            
            <ul>
                <img src="bandera.png" alt="" style="width: 50px; height: 35px; margin: 8px;">
                <li><a href="crear_vacante.php" style="text-decoration:none; color:black;" >Crear vacante</a></li>
                <li><a href="" style="text-decoration:none; color:black;" >Postulados</a></li>
                <li><a href="desarrolladore.php" style="text-decoration:none; color:black;" >Desarrolladores</a></li>
                <li><a href="proyecto.php" style="text-decoration:none; color:black;" >Proyectos</a></li>
                <li><a href="perfil.php" style="text-decoration:none; color:black;" >Perfil</a></li>
            </ul>

            <div class="botton"  onclick="mostrarElemento()" style="display:flex; margin:10px 50px 10px 10px;" >
            <?php   
                    include "conexion.php";
                    $id = $_SESSION["correo"];
                
                    $mostrar = mysqli_query($conexion, "SELECT * FROM personal WHERE correo = '$id' ORDER BY id_postulados DESC");

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

    <div class="lop" style="margin-top: -40px; margin-bottom: 50px;">
        <div class="lop2">
            <h1><span style="font-size: 34px;">Postulados</h1>
            <p>
                En esta sección podrás ver los postulados a tus vacantes, puedes ver el perfil de cada postulante y si deseas puedes contactarlos directamente. 
                <br>Recuerda que la comunicación es clave para encontrar al candidato perfecto para tu empresa.
            </p>

        </div>
    </div>


    <div class="vancan" style="border: none;">
    <div class="vancan1" style=" margin-left:0px;">
        <form action="" method="post">
            <input type="text" name="buscar" placeholder="Nombre de la vacante" style="width: 400px; height: 40px; padding-left:10px; border:1px solid rgba(0, 0, 0, 0.253); background:#f5f5f5; border-radius: 10px; margin-top: 10px; margin-bottom: 20px;" />
            
            
            <label style="margin-top: 15px;" for="favoriteOnly11"></label>
            <select style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Experiencia" id="Experiencia">
                <option value="">Seleccione una opción</option>
                <option value="Vacante" <?php if(isset($_POST['Experiencia']) && $_POST['Experiencia'] == 'Vacante') echo 'selected'; ?>>Vacante</option>
                <option value="Proyecto" <?php if(isset($_POST['Experiencia']) && $_POST['Experiencia'] == 'Proyecto') echo 'selected'; ?>>Proyecto</option>
            </select>
            <button  id="bumbum"
            style="width: 100px; height: 40px; border:none; cursor:pointer; color:white; background: rgb(28, 188, 28); border-radius: 10px; margin-top: 10px; margin-left: 10px;">Buscar</button>
                        
        </form>
            <?php
               include "conexion.php";
                $id = $_SESSION["correo"];
                $mostrar = mysqli_query($conexion, "SELECT * FROM postulados WHERE id_correo = '$id' ORDER BY id_postulados DESC ");
                while($fila = $mostrar->fetch_assoc()){ 
                    echo '<div class="vancan3" id="taki" >';
                    echo '<h2>' . $fila['nombre'] .'-' .$fila['tipo']. '</h2>';
              
                    echo '<p><strong>Nombre de la vacante:</strong> ' . $fila['nombre_vacante'] . '</p>';
                    echo '<p><strong>Especialidad Del postulado:</strong> ' . $fila['especialidad'] . '</p>';
                    echo '<p><strong>Descripcion:</strong> ' . $fila['descripcion'] . '</p>';
                    echo '<p><strong>Ubicacion:</strong> ' . $fila['ubicacion'] . '</p>';
                    echo '<p><strong>Telefono:</strong> ' . $fila['telefono'] . '</p>';
                    echo '<p><strong>Correo:</strong> ' . $fila['correo'] . '</p>';
                    echo '<p><strong>Cv:</strong>' ?> <a href="descargar2_cv.php?id=<?php echo $fila['correo']; ?>"> ⬇️</a> <?php '</p>';
                   
                    echo '</div>';
                }

                if(isset($_POST['Experiencia'])){

                    $buscar1 = $_POST['buscar'];
                    $experiencia = $_POST['Experiencia'];
                    if($experiencia == "Vacante"){
                        echo' <style>
                        #taki{
                            display: none;
                        }
                        </style>';
                        include "conexion.php";
                        $id = $_SESSION["correo"];
                        $mostrar = mysqli_query($conexion, "SELECT * FROM postulados WHERE tipo = '$experiencia' AND id_correo = '$id' AND especialidad LIKE '%$buscar1%' ORDER BY id_postulados DESC");
                        while($fila = $mostrar->fetch_assoc()){ 
                            echo '<div class="vancan3">';
                            echo '<h2>' . $fila['nombre'] .'-' .$fila['tipo']. '</h2>';
              
                            echo '<p><strong>Nombre de la vacante:</strong> ' . $fila['nombre_vacante'] . '</p>';
                            echo '<p><strong>Especialidad Del postulado:</strong> ' . $fila['especialidad'] . '</p>';
                            echo '<p><strong>Descripcion:</strong> ' . $fila['descripcion'] . '</p>';
                            echo '<p><strong>Ubicacion:</strong> ' . $fila['ubicacion'] . '</p>';
                            echo '<p><strong>Telefono:</strong> ' . $fila['telefono'] . '</p>';
                            echo '<p><strong>Correo:</strong> ' . $fila['correo'] . '</p>';
                            echo '<p><strong>Cv:</strong>' ?> <a href="descargar2_cv.php?id=<?php echo $fila['correo']; ?>"> ⬇️</a> <?php '</p>';
                
                            echo '</div>';
                        }
                    }if($experiencia == "Proyecto"){
                        echo' <style>
                        #taki{
                            display: none;
                        }
                        </style>';
                        
                        $mostrar = mysqli_query($conexion, "SELECT * FROM postulados WHERE tipo = '$experiencia' AND id_correo = '$id' AND especialidad LIKE '%$buscar1%' ORDER BY id_postulados DESC ");
                        $id = $_SESSION["correo"];
                        while($fila = $mostrar->fetch_assoc()){ 
                            echo '<div class="vancan3">';
                            echo '<h2>' . $fila['nombre'] .'-' .$fila['tipo']. '</h2>';
              
                            echo '<p><strong>Nombre de la vacante:</strong> ' . $fila['nombre_vacante'] . '</p>';
                            echo '<p><strong>Especialidad Del postulado:</strong> ' . $fila['especialidad'] . '</p>';
                            echo '<p><strong>Descripcion:</strong> ' . $fila['descripcion'] . '</p>';
                            echo '<p><strong>Ubicacion:</strong> ' . $fila['ubicacion'] . '</p>';
                            echo '<p><strong>Telefono:</strong> ' . $fila['telefono'] . '</p>';
                            echo '<p><strong>Correo:</strong> ' . $fila['correo'] . '</p>';
                            echo '<p><strong>Cv:</strong>' ?> <a href="descargar2_cv.php?id=<?php echo $fila['correo']; ?>"> ⬇️</a> <?php '</p>';
                
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