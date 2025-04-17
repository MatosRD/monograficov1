<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fondo">
<a href="inicio_empleador.php" class="jj" ><img style="margin-top: -110px;" src="atras.png" alt=""></a>
    <div class="regist" >
        <div class="regist2" style="margin-bottom: 20px;" >
            <h2>Registro</h2>
            
            <form action="" method="post"  enctype="multipart/form-data" >
            <?php  include 'conexion.php'; ?>
            <?php  include 'registro.php'; ?>
            <div class="cont" >   
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" required >
                    <label for="">usuario</label>
                    <input type="text" name="user" id="user" required >
                    <label for="">correo</label>
                    <input type="email" name="correo" id="corr"
                    pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$"
                    title="Debe ser un correo de Gmail válido"
                    placeholder="@gmail.com"
                    required>
                    <label for="" >contraseña</label>
                    <input type="password" name="contra" id="con" required >
                    <label for="">confirmar contraseña</label>
                    <input type="password" name="clave" required >
                    <label for="favoriteOnly">Descripcion:</label>
                    <textarea name="descripcion" placeholder="Breve descripción" id="descripcion" cols="30" rows="10" style="height: 70px;" required></textarea>
                    <p style="margin-bottom: 10px;" id="contador">0 / 60 palabras</p>
                    <label for="favoriteOnly1">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" required >
                    <label style="margin-top: px;" for="favoriteOnly1">Provincia:</label>
                    <select  style="height: 33px; border-radius: 10px;" name="lugar" id="lugar">
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

                    <label style="margin-top: 15px;" for="favoriteOnly11"  >Habilidades:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Habilidades" id="Habilidades" >
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

                    <label for="" >Curriculum</label>
                    <input type="file" name="cv" id="curriculum" accept="application/pdf" required >
                    <label style="margin-top: 15px;" for="favoriteOnly11">Experiencia:</label>
                    <select  style="height: 33px; border-radius: 10px; margin-bottom:10px;" name="Experiencia" id="Experiencia" >
                   
                    <option value="1" >1 año</option>
                    <option value="2" >2 años</option>
                    <option value="3" >3 años</option>
                    <option value="4" >4 años</option>
                    <option value="5" >+ 5 años</option>
                    </select>
                    <button id="mf">Aceptar</button>
                </form>    
            </div>
            
        </div>
    </div>

    <script>
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
</script>


</body>
</html>