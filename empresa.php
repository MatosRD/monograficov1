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
                <li><a href="postulados.php" style="text-decoration:none; color:black;" >Postulados</a></li>
                <li><a href="desarrolladore.php" style="text-decoration:none; color:black;" >Desarrolladores</a></li>
                <li><a href="proyecto.php" style="text-decoration:none; color:black;" >Guardado</a></li>
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

   

    <div class="lop" style="margin-top: -40px; margin-bottom: 50px;">
        <div class="lop2">
            <h1><span style="font-size: 34px;">Bienvenido "<?php echo $_SESSION ["empresa"] ?>" a </span> EmpliRD</h1>
            <p>Te ayudamos a conseguir una oportunidad para el crecimiento de tu negocio o empresa que espera
                <br> para navegar en nuetra pagina no esperes mas. 
            </p>
            <img style="height: 450px;" src="empresa.gif" alt="">
           <div class="van">
           <a href="crear_vacante.php" style="padding: 15px 45px; border:none; text-decoration:none; color:white; background:green; border-radius:5px; cursor:pointer; ">Vacante</a>
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