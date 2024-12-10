<?php
include '../../conexion/conexion.php';

// Verificar si se recibe el ID
if (isset($_GET['id'])) {
    $dni = $_GET['id'];

    // Consultar los datos actuales del contacto
    $sql = "SELECT * FROM contactos WHERE Dni = :dni";
    $stmt = $con->prepare($sql);
    $stmt->execute([':dni' => $dni]);
    $contacto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contacto) {
        echo "<script>alert('Contacto no encontrado.'); window.location.href='/crud/contactos/index.php';</script>";
        exit;
    }
}

// Guardar los cambios al enviar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['Nombre'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];
    $mensaje = $_POST['Mensaje'];

    // Actualizar el contacto
    $sql = "UPDATE contactos SET 
            Nombre = :nombre, 
            Correo = :correo, 
            Telefono = :telefono, 
            Direccion = :direccion, 
            Mensaje = :mensaje 
            WHERE Dni = :dni";
    $stmt = $con->prepare($sql);

    if ($stmt->execute([
        ':nombre' => $nombre,
        ':correo' => $correo,
        ':telefono' => $telefono,
        ':direccion' => $direccion,
        ':mensaje' => $mensaje,
        ':dni' => $dni
    ])) {
        echo "<script>alert('Contacto actualizado correctamente.'); window.location.href='/crud/contactos/mostarcont.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar el contacto.'); window.location.href='/crud/contactos/mostarcont.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
</head>
<body>
    <h1>Editar Contacto</h1>
    <form method="POST">
    <label for="Nombre">Nombre:</label>
        <input type="text" id="Dni" name="Dni" value="<?= htmlspecialchars($contacto['Dni']) ?>" required>
        <br>
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value="<?= htmlspecialchars($contacto['NombreCompleto']) ?>" required>
        <br>
        <label for="Correo">Correo:</label>
        <input type="email" id="Correo" name="Correo" value="<?= htmlspecialchars($contacto['Correo']) ?>" required>
        <br>
        <label for="Telefono">Teléfono:</label>
        <input type="text" id="Telefono" name="Telefono" value="<?= htmlspecialchars($contacto['Telefono']) ?>" required>
        <br>
        <label for="Direccion">Dirección:</label>
        <input type="text" id="Direccion" name="Direccion" value="<?= htmlspecialchars($contacto['Direccion']) ?>" required>
        <br>
        <label for="Mensaje">Mensaje:</label>
        <textarea id="Mensaje" name="Mensaje" required><?= htmlspecialchars($contacto['Mensaje']) ?></textarea>
        <br>
        <button type="submit">Guardar cambios</button>
    </form>
    <br>
    <a href="/crud/contactos/mostarcont.php">Cancelar</a>
</body>
</html>
