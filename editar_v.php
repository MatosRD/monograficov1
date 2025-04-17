<?php
include 'conexion.php';

if(isset($_POST["editarr"])){
    if(!empty($_POST["especialidad"]) and !empty($_POST["price"]) and !empty($_POST["lugar"]) and !empty($_POST["textarea"])
    ){
        $especialidadnew = $_POST['especialidad'];
        $precionew = $_POST['price'];
        $ubicacionnew = $_POST['lugar'];
        $descripcionnew = $_POST['textarea'];


        $SQL = "UPDATE vacante SET especialidad = '$especialidadnew', suerdo = '$precionew', ubicacion = '$ubicacionnew', descripcion = '$descripcionnew'
        WHERE id_vacante = '$id'";
        $tll = mysqli_query($conexion, $SQL);
        $especialidad = $especialidadnew; 
        $precio = $precionew;
        $ubicacion = $ubicacionnew;
        $descripcion = $descripcionnew; 

    

        echo' <div id="exi" >Editado Exitosamente </div>';
    }else{
        echo' <div class="EDI" > Campos Vacios Intente Nuevamente</div>  ';
    }

    } 
      



?>