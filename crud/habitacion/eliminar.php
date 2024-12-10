<?php
include ("../../conexion/conexion.php");

if (isset($_GET['delete'])) {
    $idHabitacion = $_GET['delete'];
    
    // Prepare the SQL query to delete the room
    $sql = "DELETE FROM habitaciones WHERE IdHabitacion = :idHabitacion";
    $stmt = $con->prepare($sql);
    
    // Bind the parameter and execute the statement
    $stmt->bindParam(':idHabitacion', $idHabitacion, PDO::PARAM_INT);
    if ($stmt->execute()) {
        // Redirect to the habitaciones page after deletion
        header("Location: habitaciones.php");
    } else {
        echo "Error al eliminar la habitación.";
    }
}
?>
