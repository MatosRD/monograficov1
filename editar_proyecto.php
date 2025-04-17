<?php


include "conexion.php";
$id = $_GET['id'];     
$editar_inventario = "SELECT * FROM proyecto WHERE id_proyecto ='$id'";
$ejecut = mysqli_query($conexion, $editar_inventario);

$filas = mysqli_fetch_assoc($ejecut);
    $especialidad = $filas['especialidad'];
    $precio = $filas['suerdo'];
    $descripcion = $filas['descripcion'];
    $tiempo = $filas['tiempo'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vacante</title>
    <link rel="stylesheet" href="inicio.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>
<body>
    
<div class="ed">
    <div class="ed_1">
        <div class="equis">
            <a href="proyecto.php">X</a>
        </div>
        <h2>Editar Vacante</h2>
        <?php include 'editar_p.php';?>
        <form action="" method="post">
        <label style="margin-top: 15px;" for="favoriteOnly11">Especialidad:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="especialidad" id="especialidad"  required >
                    <option value="<?php echo $especialidad ?>"><?php echo $especialidad ?></option>
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
                         value="<?php echo $precio ?>" />
                        <output class="price-output" for="price" required ></output>
                    <label style="margin-top: 15px;" for="favoriteOnly1">Tiempo a realizar:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="timpo" id="timpo" required >
                    <option value="<?php echo $tiempo ?>"><?php echo $tiempo ?></option>
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
                    <label for="">Descripcion</label>
                    <textarea name="textarea"  id="editor" placeholder="Descripcion de la vacante" style="padding: 10px;" required >
                    &lt;p&gt;<?php echo $descripcion ?>&lt;/p&gt;
                    </textarea>
                    <button name="editarp" class="editar">Editar</button>
        </form>
        
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
</script>

</body>
</html>