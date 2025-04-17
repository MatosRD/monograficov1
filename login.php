<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <body>

    <a href="inicio_empleador.php" class="jj" style="display:flex; margin-top: 10px;" ><img src="atras.png" alt=""></a>
    <div class="vac">
            <img src="animacion.gif" alt="">
        </div>
    <div class="pack">
      
            <form action="" method="post" >
            
                <h1>EmpliRD</h1>
                <div class="conter" style="height: auto;">
                <?php  include "login_logica.php";   ?>
                    <input type="text" name="usuario" placeholder="Usuario" >
                    <input type="password" name="clave" placeholder="password" style="margin-top: 10px;">
                    <button id="OK" style="margin-top: 10px; margin-bottom:20px; "> Login</button>
                </div>
            </form>
        </div>
    </body>
</body>
</html>