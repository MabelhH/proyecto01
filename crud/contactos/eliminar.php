<?php
include '../../conexion/conexion.php';

// Verificar si se recibe el ID
if (isset($_GET['id'])) {
    $dni = $_GET['id'];

    // Preparar la consulta de eliminación
    $sql = "DELETE FROM contactos WHERE Dni = :dni";
    $stmt = $con->prepare($sql);

    // Ejecutar la consulta
    if ($stmt->execute([':dni' => $dni])) {
        echo "<script>alert('Contacto eliminado correctamente.'); window.location.href='/crud/contactos/mostarcont.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el contacto.'); window.location.href='/crud/contactos/mostarcont.php';</script>";
    }
} else {
    echo "<script>alert('ID no especificado.'); window.location.href='/crud/contactos/mostarcont.php';</script>";
}
?>
