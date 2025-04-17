<?php
session_start();

// Verificar si el usuario no tiene sesión iniciada o si el rol es "Empresa"
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
    <title>Crear vacante</title>
    <link rel="stylesheet" href="inicio.css">
    <script> function confirmar(){return confirm('¿Estas seguro de eliminar la vacante?');}</script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
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
            <h1>Crea tu Vacantes</h1>
            <p> 
                para crear una vacante debes de llenar el formulario que se encuentra a continuacion,
                <br>para que futuros desarrolladores puedan ver tu vacante y postularse a ella.
            </p>
        </div>
    </div>

    <div class="dos">
        <div class="dos_1">
            <div class="form">
                <form action="" method="post">
                    <h2>Vacante <br> <?php include "c_vacante.php" ?></h2>
                    <label style="margin-top: 15px;" for="favoriteOnly11">Especialidad:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="especialidad" id="especialidad" required >
                    <option>Desarrollador Frontend</option>
                    <option>Desarrollador Backend</option>
                    <option>Desarrollador Full Stack</option>
                    <option>Ingeniero de Software</option>
                    <option>Ingeniero de Machine Learning</option>
                    <option>Desarrollador de Aplicaciones Móviles</option>
                    <option>Desarrollador de Software</option>
                    <option>Administrador de Redes</option>
                    <option>Ingeniero de Seguridad Informática</option>
                    <option>Especialista en Soporte Técnico</option>
                    <option>Analista de Datos</option>
                    <option>Especialista en Big Data</option>
                    <option>Administrador de Bases de Datos</option>
                    <option>Ingeniero de Infraestructura</option>
                    <option>Especialista en AWS, Azure, Google Cloud</option>
                    <option>Diseñador UX (Experiencia de Usuario)</option>
                    <option>Diseñador UI (Interfaz de Usuario)</option>
                    <option>Arquitecto de Datos</option>
                    <option>Ingeniero en Robótica</option>
                    <option>Gerente de Proyecto (Project Manager)</option>
                    <option>Scrum Master</option>
                    <option>Product Manager</option>
                    <option>Agile Coach</option>
                    </select>
                    <label for="price">Suerdo</label>
                    <input
                        type="range"
                        name="price"
                        id="price"
                        min="10000"
                        max="500000"
                        step="100"
                        value="250000" />
                        <output class="price-output" for="price" required ></output>
                        <label style="margin-top: 15px;" for="favoriteOnly1">ubicacion:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="lugar" id="lugar" required >
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
                    <label for="">Descripcion</label>
                    <textarea name="textarea"  id="editor" placeholder="Descripcion de la vacante" style="padding: 10px;" required >
                    &lt;p&gt;Descripcion de la vacante.&lt;/p&gt;
                    </textarea>
                    <button  id="vacante" style="margin-top: 10px; padding:10px 20px; cursor:pointer; background:rgba(0, 0, 247, 0.747); border:none; color: white;" >Enviar</button>
                </form>
            </div>

            <div class="traer">
                <div class="buscar">
                    <form action="" method="post">
                    <input name="buscarr" type="text" placeholder=" ⌕ Buscar vacantes" style="width: 400px; height: 30px; border-radius: 10px; margin-bottom:10px; padding: 5px; border: 1px solid #ccc;">
                    <button id="buscar1" style="padding:12px 15px; border:none; color:white; background:rgba(0, 0, 247, 0.747); border-radius:5px; cursor:pointer;" >Buscar</button>
                    </form>
                </div>
                
            <table>
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Vacante</th>
                        <th>Sueldo</th>
                        <th>Ubicacion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                        <?php
                            include 'conexion.php';
                            $correo = $_SESSION['correo'];
                            $mostrar_q = "SELECT * FROM vacante WHERE correo = '$correo'  ORDER BY id_vacante DESC";
                            $total_q = mysqli_query($conexion, $mostrar_q);
                        ?>
                        <?php         
                        if (mysqli_num_rows($total_q) == 0) {
                            echo "<tr><td colspan='5'>Aún no has creado una vacante!!</td></tr>";
                        } else { 
                            while ($fila_q = mysqli_fetch_assoc($total_q)) { ?>
                    <tbody id="no1">    
                    <tr>                      
                            <td><?php echo $fila_q['empresa'] ?> </td>       
                            <td><?php echo $fila_q['especialidad'] ?> </td>
                            <td><?php echo number_format($fila_q['suerdo'], 2); ?></td>
                            <td><?php echo $fila_q['ubicacion'] ?></td>
                            <td> <a <?php echo "href='editar_vacante.php?id=".$fila_q['id_vacante']."' "?> style="padding:10px 8px;  border-radius:5px;color:white; text-decoration: none; background:rgba(0, 0, 247, 0.747); ">Editar</a> 
                            <?php echo "<a id='eliminar' href='eliminar_vacante.php?id=".$fila_q['id_vacante']."' '
                            onclick='return confirmar()'>-</a>"; ?>
                            </td>
                    </tr>
                    <tr>
                        <td colspan='5' style="text-align:left;">
                            
                         <?php echo $fila_q['descripcion']?></td>
                    </tr>
                    <?php }} ?>
                    <tr>
                        <td colspan='5'></td>
                    </tr>
                    </tbody>

                       

                <?php
                    if (!empty(['buscar1'])) { // Corregido para comprobar la variable $_POST
                        if (!empty($_POST['buscarr'])) { 
                            $bus = $_POST['buscarr'];
                            $sentencia = "SELECT * FROM vacante WHERE especialidad LIKE '%" . $bus . "%' ";
                            $total = mysqli_query($conexion, $sentencia);

                            if (mysqli_num_rows($total) > 0) {
                                echo '<style>
                                        #no1{
                                            display: none;
                                        }
                                    </style>';
                                
                                echo '<a href="crear_vacante.php" style="margin-top:40px; text-decoration: none;">
                                        <button style="display:flex; color: white; background: red;
                                        padding: 8px 15px; border:none; border-radius:10px;text-decoration: none; margin-bottom:10px;  cursor: pointer;">Limpiar busqueda 🗑</button>
                                    </a>';

                                // Aquí estamos recorriendo los resultados obtenidos de la base de datos
                                while ($fila_q = mysqli_fetch_assoc($total)) { ?>
                                    <tbody>   
                                        <tr>
                                            <td><?php echo $fila_q['empresa']; ?> </td>       
                                            <td><?php echo $fila_q['especialidad']; ?> </td>
                                            <td><?php echo number_format($fila_q['suerdo'], 2); ?></td>
                                            <td><?php echo $fila_q['ubicacion']; ?></td>
                                            <td>
                                                <a <?php echo "href='editar_vacante.php?id=".$fila_q['id_vacante']."' "?> style="padding:10px 8px; border-radius:5px; color:white; text-decoration: none; background:rgba(0, 0, 247, 0.747); ">Editar</a> 
                                                <?php echo "<a id='eliminar' href='eliminar_vacante.php?id=".$fila_q['id_vacante']."' onclick='return confirmar()'>-</a>"; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan='5' style="text-align:left;">
                                                <?php echo $fila_q['descripcion']; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } 
                            } else {
                                echo '<div class="cliente" style="margin-left: 30px;">Articulo no encontrado</div>';
                            }
                        }
                    }
                ?>                           
            </table>
            </div>
        </div>
    </div>
<script>
    const price = document.querySelector("#price");
    const output = document.querySelector(".price-output");

    output.textContent = price.value;

    price.addEventListener("input", function () {
    output.textContent = price.value;
    });

    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
    console.error( error );
    } );


 
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