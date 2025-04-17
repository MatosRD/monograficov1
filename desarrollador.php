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
                <li><a href="postulaciones.php" style="text-decoration:none; color:black;" >postulaciones</a></li>
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

    <div class="lop" style="margin-top: -40px; margin-bottom: 50px;">
        <div class="lop2">
            <h1><span style="font-size: 34px;">Bienvenido "<?php echo $_SESSION["nombre"] ?>" a </span> EmpliRD</h1>
            <img src="mio.gif" alt="" style="width: 350px; height: 350px; margin-bottom: 20px;">
            
            <p> Te damos la bienvenida a nuestra plataforma, donde puedes encontrar una variedad de oportunidades laborales y proyectos que se adaptan a tus habilidades y experiencia. 
                <br>Explora nuestras vacantes y proyectos disponibles, y no dudes en postularte para aquellos que te interesen. 
                <br>Estamos aquí para ayudarte a avanzar en tu carrera profesional y alcanzar tus metas laborales.
                <br>¡Buena suerte en tu búsqueda de empleo y proyectos emocionantes!</p>
            </p>
           <div class="van" style="margin-top: 30px;">
           <a href="" style="padding: 15px 45px; border:none; text-decoration:none; color:white; background:green; border-radius:5px; cursor:pointer; ">Empleos</a>
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