<?php
include 'conexion.php'; // Asegúrate de que la conexión está bien establecida

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Convertir a entero para seguridad

    // Consulta preparada para evitar inyección SQL
    $stmt = $conexion->prepare("SELECT documento, nombre FROM personal WHERE id_personal = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($documento, $nombre);
    $stmt->fetch();
    $stmt->close();

    if ($documento) {
        // Asegurar que el archivo es un PDF
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
