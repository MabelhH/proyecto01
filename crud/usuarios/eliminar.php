<?php 
include("../../conexion/conexion.php");

if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    
    $sql = "DELETE FROM usuarios WHERE IdUsuarios = :idUsuario";
    $stmt = $con->prepare($sql);
    
    // Bind the parameter and execute the query
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    if ($stmt->execute()) {
        // Redirect back to the user listing page after deletion
        header("Location: mostrarUsuarios.php"); // Make sure to replace this with the correct file name if needed
    } else {
        echo '<h3 class="bad">Error al eliminar el usuario.</h3>';
    }
} else {
    echo '<h3 class="bad">No se ha especificado un usuario para eliminar.</h3>';
}
?>
