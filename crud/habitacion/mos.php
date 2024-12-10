<?php

include("../../conexion/conexion.php");

try {
    
    $instruccionsql = "SELECT * FROM habitaciones";
    $stmt = $con->query($instruccionsql);
} catch (PDOException $e) {
    die('Error en la consulta: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Habitaciones</title>
    <link rel="stylesheet" href="/crud/habitacion/mostrarhab.css"> <!-- Asegúrate de que la ruta del CSS sea correcta -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="main-container">
        <h1>Habitaciones Registradas</h1>
        
        <div class="action-bar">
            <a href="/paginaprincipal/administrador.php">Inicio</a>
            <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline" type="submit">Buscar</button>
            <a href="/habitacion/habitacion.html">Insertar</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Costo</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($stmt->rowCount() > 0): ?>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?= $row['IdHabitacion']; ?></td>
                        <td><?= ucfirst($row['TipoHabitacion']); ?></td>
                        <td><?= ucfirst($row['Estado']); ?></td>
                        <td><?= number_format($row['Costo'], 2); ?></td>
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($row['Imagen']); ?>" width="50"></td>
                        <td>
                            <a href="/crud/habitacion/editar.php?id=<?= $row['IdHabitacion']; ?>">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="/crud/habitacion/eliminar.php?id=<?= $row['IdHabitacion']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta habitación?');">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </a>
                        </td>

                    </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay habitaciones registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="/paginaprincipal/administrador.php" class="volver">Volver</a>
    </div>
</body>
</html>