<?php
include 'conexion.php'; 

if (isset($_GET['id']) ) {
    $correo = $_GET['id']; 

    
    $stmt = $conexion->prepare("SELECT documento, nombre FROM personal WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->bind_result($documento, $nombre);
    $stmt->fetch();
    $stmt->close();

    if ($documento) {
        
        header("Content-Type: application/pdf");
        header("Content-Disposition: attachment; filename=\"cv_$nombre.pdf\"");
        header("Content-Length: " . strlen($documento));
        echo $documento;
    } else {
        echo "No se encontró el documento.";
    }
} else {
    
}


?>
