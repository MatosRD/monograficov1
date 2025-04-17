<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
    <link rel="stylesheet" href="inicio.css">
</head>
<body>

    
    <div class="header">
        <div class="menu">
            
            <ul>
                <img src="bandera.png" alt="" style="width: 50px; height: 35px; margin: 8px;">
                <li>Encuentra talento</li>
                <li>Encuentra trabajo</li>
                <li>Empresa</li>
                <li>Politica</li>
            </ul>

            <div class="bottonn">
                <button class="mm" ><a style="text-decoration: none; color:white;" href="login.php">Acceso</a></button>
                <button class="nn" ><a style="text-decoration: none; color:black;" href="pres.php">Inscribirse</a></button>
            </div>
        </div>
    </div>

    <div class="lop">
        <div class="lop2">
            <h1>EmpliRD</h1>
            <p>Te ayudamos a conseguir una oportunidad para tu crecimiento personal y profecional que espera
                <br> para navegar en nuetra pagina no esperes mas. 
            </p>
        </div>
    </div>

    <div class="cont">
        <div class="cont_2">
            <div class="des">
                <h2>Quienes nosotros</h2>
                <p>En EmpliRD, revolucionamos la forma en que las empresas encuentran y gestionan talento. Nuestra plataforma conecta a los mejores profesionales con oportunidades laborales ideales, facilitando el proceso de selección y optimizando la administración de proyectos de personal.</p>
                <button>Ver mas</button>
            </div>
            <div class="imagen">
                <img src="portada.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="cent">
        <h2>Sobre nosotros</h2>
    </div>

    <div class="lema">
 
        <div class="lema_0">
            <div class="mag">
                <img src="lema.avif" alt="">
            </div>
            <div class="lema_2">
                <div class="vis">
                    <h2>Mision</h2>
                    <p>Facilitar la contratación y gestión de talento a través de tecnología innovadora, garantizando procesos ágiles, eficientes y justos tanto para empresas como para candidatos.</p>
                </div>
                <div class="vis">
                    <h2>Vision</h2>
                    <p>Ser la plataforma líder en reclutamiento y gestión de proyectos de personal, brindando herramientas inteligentes para potenciar el éxito de las organizaciones y el crecimiento profesional de cada usuario.</p>
                </div>
    
            </div>
        </div>
    </div>

    <div class="cent2">
        <h2>Desarrolladores <span style="font-size: 18px;">Destacados</span></h2>
    </div>

    <div class="progrm">
        <div class="progrm2">
        <?php
                include 'conexion.php';
                $mostrar = mysqli_query($conexion, "SELECT * FROM personal ORDER BY estrellas DESC LIMIT 6");
                ?>
                <?php  while($fila = mysqli_fetch_assoc($mostrar)) { ?>

            <div class="car">


                    <div class="descrip">
                    <h2 style="font-weight: 900;" ><?php echo $fila['nombre'] ?></h2>
                    <h4 style="margin-bottom: 5px;" ><?php echo $fila['dominio'] ?></h4>
                    <p><?php echo $fila['descripcion'] ?></p>
                    <div class="con"><img src="estrlla.avif" alt=""> <span style="margin-top: 11px;"><?php echo $fila['estrellas'] ?></span> <span style="margin-left: 20px;" ><img src="ubicacion.jpg" alt=""></span> <span style="margin-top: 11px;" > <?php  echo $fila['ubicacion'] ?> </span> </div>
                    
                </div>
                <div class="per">
                
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
        </div>
    </div>

    <div class="mapa">
        <div class="mapa1">
            <h2>Conectamos a todo un pais en una plataforma unificada, facilitando oportunidades y progreso <br> para un mejor futuro.</h2>
            <div class="imagen">
                <img src="mapa.png" alt="">
            </div>
        </div>
    </div>


    <footer style="margin-top: 50px;"  >
        <div class="cont_foter">
            <div class="inf_foter">
                <div class="one one_1">
                    <img src="bandera.png" alt="" style="margin-left: -2px;" >
                    <p>Te ayudamos a adquirir una pequeña base en el desarrollo <br> tecnologico en nuestro pais. 
                    <br><br>
                    no esteres mas comunicate que nuestros desarrolladores y desarrolla <br>
                    tus idea y coviertela en realidad!!
                </p>
                </div>
                <div class="one ">
                    <h1>Conct-Inf</h1>
                    <p>Republica Dominicana</p>
                    <a href="#"> <img src="gmail.png" alt=""  style="width:24px; height: 24px; margin-left: -2px;" > <p style="margin-left: 10px;" >EmpliRD@hotmail.com</p></a>
                    <a href="https://wa.me/18095045300"><img src="circulo.png " alt="" style="width:24px; height: 24px; margin-left: -2px;" ><p style="margin-left: 10px;">809-504-5300</p></a>
                </div>
            </div>
        </div>
    </footer>




</body>
</html>