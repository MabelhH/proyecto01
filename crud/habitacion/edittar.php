<?php
include("../../conexion/conexion.php");

if (isset($_GET['id'])) {
    $idHabitacion = $_GET['id'];
    
    // Fetch the room details for editing
    $sql = "SELECT * FROM habitaciones WHERE IdHabitacion = :idHabitacion";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':idHabitacion', $idHabitacion, PDO::PARAM_INT);
    $stmt->execute();
    
    $room = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$room) {
        echo "Habitación no encontrada.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the room details
    $tipoHabitacion = $_POST['TipoHabitacion'];
    $estado = $_POST['Estado'];
    $costo = $_POST['Costo'];
    
    // Update the record in the database
    $updateSql = "UPDATE habitaciones SET TipoHabitacion = :tipo, Estado = :estado, Costo = :costo WHERE IdHabitacion = :idHabitacion";
    $updateStmt = $con->prepare($updateSql);
    $updateStmt->bindParam(':tipo', $tipoHabitacion);
    $updateStmt->bindParam(':estado', $estado);
    $updateStmt->bindParam(':costo', $costo);
    $updateStmt->bindParam(':idHabitacion', $idHabitacion, PDO::PARAM_INT);
    
    if ($updateStmt->execute()) {
        // Redirect to the habitaciones list page after the update
        header("Location: habitaciones.php");
    } else {
        echo "Error al actualizar la habitación.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Habitacion</title>
    <link rel="stylesheet" href="habitacion.css">
</head>
<body>
    <div class="main-container">
        <h1>Editar Habitación</h1>
        <form method="POST">
            <label for="TipoHabitacion">Tipo:</label>
            <input type="text" id="TipoHabitacion" name="TipoHabitacion" value="<?= $room['TipoHabitacion'] ?>" required><br>

            <label for="Estado">Estado:</label>
            <input type="text" id="Estado" name="Estado" value="<?= $room['Estado'] ?>" required><br>

            <label for="Costo">Costo:</label>
            <input type="number" id="Costo" name="Costo" value="<?= $room['Costo'] ?>" step="0.01" required><br>

            <button type="submit">Actualizar</button>
        </form>
        <a href="habitaciones.php">Volver</a>
    </div>
</body>
</html>
