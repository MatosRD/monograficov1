<?php
include 'conexion.php';

if(isset($_POST["editarp"])){
    if(!empty($_POST["especialidad"]) and !empty($_POST["price"]) and !empty($_POST["timpo"]) and !empty($_POST["textarea"])
    ){
        $especialidadnew = $_POST['especialidad'];
        $precionew = $_POST['price'];
        $tiemponew = $_POST['timpo'];
        $descripcionnew = $_POST['textarea'];


        $SQL = "UPDATE proyecto SET especialidad = '$especialidadnew', suerdo = '$precionew', tiempo = '$tiemponew', descripcion = '$descripcionnew'
        WHERE id_proyecto = '$id'";
        $tll = mysqli_query($conexion, $SQL);
        $especialidad = $especialidadnew; 
        $precio = $precionew;
        $tiempo = $tiemponew;
        $descripcion = $descripcionnew; 

    

        echo' <div id="exi" >Editado Exitosamente </div>';
    }else{
        echo' <div class="EDI" > Campos Vacios Intente Nuevamente</div>  ';
    }

    } 
      



?>