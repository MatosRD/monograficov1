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
    <title>Desarrolladores</title>
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

    <div class="lop">
        <div class="lop2" style="margin-top: 50px; margin-bottom: 50px;">
            <h1>Desarrolladores</h1>
            <p> 
                Busca el desarrollador que se adapte a tu empresa, puedes filtrar por habilidades, experiencia.
                <br> No esperes mas, encuentra el talento que necesitas para tu empresa.
            </p>
        </div>
    </div>

<div class="filtro">
    <div class="filtro2">
        <h2>Filtrar por:</h2>
        <form action="" method="post">
        <label style="margin-top: 15px;" for="favoriteOnly11"  >Habilidades:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Habilidades" id="Habilidades" >
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
                    <label style="margin-top: 15px;" for="favoriteOnly11">Experiencia:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Experiencia" id="Experiencia" >
                    <option value="">Ninguna</option>
                    <option value="1">1 año</option>
                    <option value="2">2 años</option>
                    <option value="3">3 años</option>
                    <option value="3">4 años</option>
                    <option value="5">+ 5 años</option>
                    </select>
                    <div style="display:flex; flex-direction: row;"><button id="filtro">Filtrar</button> 
                    <button id="limpio" style=" background: red; margin-left:5px; border:none; border-radius:10px;  cursor: pointer;">
                        <a href="desarrolladore.php" style="text-decoration: none; color: white;">Limpiar 🗑</a>
                    </button></div>
            
        </form>
        <a href="desarrolladores5.php">⭐ 5 Desarroladores mejor votados en EmpliaRD</a>
        <a href="desarrolladores10.php">⭐ 10 Desarroladores mejor votados en EmpliaRD </a>
        <a href="desarrolladoresmenos.php">⭐ 10 Desarroladores menos votados en EmpliaRD</a>
        <div id="linea"></div>
        <a href="desarrolladoresment.php">👨‍💻 Desarroladores Recien unidos a EmpliaRD </a>
        <a href="desarrolladoresmast.php">👨‍💻 Desarroladores con mas tiempo en EmpliaRD </a>
    </div>
</div>

<div class="progrm2">
    <div class="progrm22">
    <?php
                include 'conexion.php';
                $mostrar = mysqli_query($conexion, "SELECT * FROM personal WHERE rol = 'Desarrollador' LIMIT 30");
                ?>
                <?php  while($fila = mysqli_fetch_assoc($mostrar)) { ?>

            <div class="car2" id="van">


                <div class="descrip2">
                    <h2 style="font-weight: 900;" ><?php echo $fila['nombre'] ?></h2>
                    <h4 style="margin-bottom: 5px;" ><?php echo $fila['dominio'] ?></h4>
                    <p><?php echo $fila['descripcion'] ?></p>
                    <br>
                    <p><?php echo 'Experiencia laboral '.$fila['experiencia']. ' años' ?></p>
                    <p style="margin-top: 5px;"><?php echo "📞 ". $fila['Telefono'] ?></p>
                    <p><?php echo "📧 ". $fila['correo'] ?></p>
                    <div class="con2"><img src="estrlla.avif" alt=""> <span style="margin-top: 11px;"><?php echo $fila['estrellas'] ?></span> <span style="margin-left: 20px;" ><img src="ubicacion.jpg" alt=""></span> <span style="margin-top: 11px;" > <?php  echo $fila['ubicacion'] ?> </span> <span style="margin-top: 9px;"><a href="descargar_cv.php?id=<?php echo $fila['id_personal']; ?>">CV ⬇️</a></span> </div>
                    <?php include 'descargar_cv.php' ?>
                </div>
                <div class="per2">
                
                <?php 

                if(empty($fila['foto'])){
                    echo '<img src="perf.png" alt="Perfil predeterminado" />';
                }else{
                    echo '<img src="data:image/png;base64,' . base64_encode($fila['foto']) . '"/>';
                }
              
                ?>
                  
                </div>
            </div>
            <?php } ?>   
            
            <?php

                    if (!empty(['filtro'])) { 
                        if (!empty($_POST['Habilidades'])) { 
                            $bus = $_POST['Habilidades'];
                            $bus2 = $_POST['Experiencia'];
                            $sentencia = "SELECT * FROM personal WHERE dominio = '$bus' and experiencia LIKE '%$bus2%' ";
                            $total = mysqli_query($conexion, $sentencia);

                            if (mysqli_num_rows($total) > 0) {
                                echo '<style>
                                        #van{
                                            display: none;
                                        }
                                            #limpio{
                                                display: block;
                                            }
                                    </style>';
                                


                                // Aquí estamos recorriendo los resultados obtenidos de la base de datos
                                while ($fila_q = mysqli_fetch_assoc($total)) { ?>

                                    <div class="car2" >


                                    <div class="descrip2">
                                        <h2 style="font-weight: 900;" ><?php echo $fila_q['nombre'] ?></h2>
                                        <h4 style="margin-bottom: 5px;" ><?php echo $fila_q['dominio'] ?></h4>
                                        <p><?php echo $fila_q['descripcion'] ?></p>
                                        <br>
                                        <p><?php echo 'Experiencia laboral '.$fila_q['experiencia']. ' años' ?></p>
                                        <p style="margin-top: 5px;"><?php echo "📞 ". $fila_q['Telefono'] ?></p>
                                        <p><?php echo "📧 ". $fila_q['correo'] ?></p>
                                        <div class="con2"><img src="estrlla.avif" alt=""> <span style="margin-top: 11px;"><?php echo $fila_q['estrellas'] ?></span> <span style="margin-left: 20px;" ><img src="ubicacion.jpg" alt=""></span> <span style="margin-top: 11px;" > <?php  echo $fila_q['ubicacion'] ?> </span> <span style="margin-top: 9px;"><a href="">CV ⬇️</a></span> </div>
                                        
                                    </div>
                                    <div class="per2">

                                    <?php 

                                    if(empty($fila_q['foto'])){
                                        echo '<img src="perf.png" alt="Perfil predeterminado" />';
                                    }else{
                                        echo '<img src="data:image/png;base64,' . base64_encode($fila_q['foto']) . '"/>';
                                    }

                                    ?>
                                    
                                    </div>
                                    </div>
                                    
                                <?php } 
                            } else {
                                echo '<div class="cliente" style="margin-left: 30px;">Articulo no encontrado</div>';
                            }
                        }
                    }
                ?>                     

    </div>
</div>

<script>
     
     function mostrarElemento() {
        const elemento = document.getElementById("menus");
        if (elemento.style.display === "none") {
        elemento.style.display = "block";
        } else {
        elemento.style.display = "none";
        }
    }


</script>

</body>
</html>