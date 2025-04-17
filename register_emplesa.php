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
    <div class="regist">
        <div class="regist2">
            <h2>Registro</h2>
            
            <form action="" method="post">
            <?php  include 'conexion.php'; ?>
            <?php  include 'registro_empresa.php'; ?>
            <div class="cont">   
                    <label for="">Nombre empresa</label>
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
                    
                    <button id="mf">Aceptar</button>
                </form>    
            </div>
            
        </div>
    </div>
</body>
</html>