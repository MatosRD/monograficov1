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
    <title>Desarrolladores</title>
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
                
                    $mostrar = mysqli_query($conexion, "SELECT * FROM personal WHERE correo = '$id'");

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

    <div class="filtro">
    <div class="filtro2"  >
        <h2>Filtrar por:</h2>
        <form action="" method="post">
                    <label style="margin-top: 15px;" for="favoriteOnly11"  >Habilidades:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Habilidades1" id="Habilidades1" >
                    <option value="">Todos</option>
                    <option value="Desarrollador Frontend">Desarrollador Frontend</option>
                    <option value="Desarrollador Backend">Desarrollador Backend</option>
                    <option value="Desarrollador Full Stack">Desarrollador Full Stack</option>
                    <option value="Ingeniero de Software">Ingeniero de Software</option>
                    <option value="Ingeniero de Machine Learning">Ingeniero de Machine Learning</option>
                    <option value="Desarrollador de Aplicaciones Móviles">Desarrollador de Aplicaciones Móviles</option>
                    <option value="Desarrollador de Software">Desarrollador de Software</option>
                    <option value="Administrador de Redes">Administrador de Redes</option>
                    <option value="Ingeniero de Seguridad Informática">Ingeniero de Seguridad Informática</option>
                    <option value="Especialista en Soporte Técnico">Especialista en Soporte Técnico</option>
                    <option value="Analista de Datos">Analista de Datos</option>
                    <option value="Especialista en Big Data">Especialista en Big Data</option>
                    <option value="Administrador de Bases de Datos">Administrador de Bases de Datos</option>
                    <option value="Ingeniero de Infraestructura">Ingeniero de Infraestructura</option>
                    <option value="Especialista en AWS, Azure, Google Cloud">Especialista en AWS, Azure, Google Cloud</option>
                    <option value="Diseñador UX (Experiencia de Usuario)">Diseñador UX (Experiencia de Usuario)</option>
                    <option value="Diseñador UI (Interfaz de Usuario)">Diseñador UI (Interfaz de Usuario)</option>
                    <option value="Arquitecto de Datos">Arquitecto de Datos</option>
                    <option value="Ingeniero en Robótica">Ingeniero en Robótica</option>
                    <option value="Gerente de Proyecto (Project Manager)">Gerente de Proyecto (Project Manager)</option>
                    <option value="Scrum Master">Scrum Master</option>
                    <option value="Product Manager">Product Manager</option>
                    <option value="Agile Coach">Agile Coach</option>
                    </select>
                    <label style="margin-top: 15px;" for="favoriteOnly12">Tiempo a realizar:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Habilidades2" id="Habilidades2" required >
                    <option>1 semanas</option>
                    <option>2 semanas</option>
                    <option>3 semanas</option>
                    <option>4 semasna</option>
                    <option>1 mes</option>
                    <option>1 a 2 mes</option>
                    <option>2 a 3 mes</option>
                    <option>4 a 5 mes</option>
                    <option>5 a 6 mes</option>
                    <option>6 a 7 mes</option>
                    <option>mas de 7 meses</option>
                    <option>1 año</option>
                    <option>mas de 1 año</option>
                    </select>    
                    <div style="display:flex; flex-direction: row;"><button id="filtro12">Filtrar</button> 
                    <button id="limpio" style=" background: red; margin-left:5px; border:none; border-radius:10px;  cursor: pointer;">
                        <a href="proyecto_desa.php" style="text-decoration: none; color: white;">Limpiar 🗑</a>
                    </button></div>
            
        </form>

    </div>
</div>          

<div class="vancan" style="border: none;">
    <div class="vancan1" style="background: white;" >
        <h1>Proyecto</h1>
        <div class="vancan2" >
            
            <?php
               include "conexion.php";
                $id = $_SESSION["correo"];
                $mostrar = mysqli_query($conexion, "SELECT * FROM proyecto ORDER BY id_proyecto DESC ");
                while($fila = $mostrar->fetch_assoc()){ 
                    echo '<div class="vancan3" id="vancan01">';
                    echo '<h2>' . $fila['empresa'] . '</h2>';
                    echo '<p><strong>Especialidad:</strong> ' . $fila['especialidad'] . '</p>';
                    echo '<p><strong>Descripcion:</strong> ' . $fila['descripcion'] . '</p>';
                    echo '<p><strong>Tiempo:</strong> ' . $fila['tiempo'] . '</p>';
                    echo '<p><strong>Suerdo:</strong> ' . number_format($fila['suerdo'], 2) . '</p>';
                    echo '<p style="margin-bottom:30px;"><strong>Fecha de la vacante:</strong> ' . $fila['fecha'] . '</p>';
                    echo '<a href="crear_proyectos.php?id=' . $fila['id_proyecto'] . '" style="text-decoration:none; color:white; background:green; padding:10px 20px; text-align: center; border-radius:5px;">Postular</a>';
                    echo '</div>';
                }
            ?>
            
              <?php

            if (!empty(['filtro12'])) { 
                if (!empty($_POST['Habilidades1'])) { 
                    $bus = $_POST['Habilidades1'];
                    $bus2 = $_POST['Habilidades2'];
                    $sentencia = "SELECT * FROM proyecto WHERE especialidad = '$bus' AND tiempo = '$bus2' ";
                    
                    $total = mysqli_query($conexion, $sentencia);

                    if (mysqli_num_rows($total) > 0) {
                        echo '<style>
                                #vancan01{
                                    display: none;
                                }
                                    #limpio{
                                        display: block;
                                    }
                            </style>';
                    
                        while($fila = $total->fetch_assoc()){ 
                            echo '<div class="vancan3">';
                            echo '<h2>' . $fila['empresa'] . '</h2>';
                            echo '<p><strong>Especialidad:</strong> ' . $fila['especialidad'] . '</p>';
                            echo '<p><strong>Descripcion:</strong> ' . $fila['descripcion'] . '</p>';
                            echo '<p><strong>Tiempo:</strong> ' . $fila['tiempo'] . '</p>';
                            echo '<p><strong>Sueldo:</strong> ' . number_format($fila['suerdo'], 2) . '</p>';
                            echo '<p style="margin-bottom:30px;"><strong>Fecha de la vacante:</strong> ' . $fila['fecha'] . '</p>';
                            echo '<a href="crear_postulacion.php?id=' . $fila['id_proyecto'] . '" style="text-decoration:none; color:white; background:green; padding:10px 20px; text-align: center; border-radius:5px;">Postular</a>';
                            echo '</div>';
                        }
                    }else{
                        echo '<style>
                                #vancan01{
                                    display: none;
                                }
                                    #limpio{
                                        display: block;
                                    }
                            </style>';
                        echo '<div class="vancan3">';
                        echo '<h2>No se encontraron resultados</h2>';
                        echo '</div>';
                    }
                }
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