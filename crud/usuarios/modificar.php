<?php
include("../../conexion/conexion.php");

// Verificar si se recibe el ID del usuario
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Consultar los datos actuales del usuario
    $sql = "SELECT * FROM usuarios WHERE IdUsuarios = :id";
    $stmt = $con->prepare($sql);
    $stmt->execute([':id' => $idUsuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el usuario
    if (!$usuario) {
        echo "<script>alert('Usuario no encontrado.'); window.location.href='/crud/usuarios/index.php';</script>";
        exit;
    }
}

// Guardar cambios al enviar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUsuario = $_POST['NombreUsuario'];
    $contrasenaUsuario = $_POST['ContraseñaUsuario'];
    $tipoUsuario = $_POST['TipoUsuario'];

    // Actualizar los datos del usuario
    $sql = "UPDATE usuarios 
            SET NombreUsuario = :nombre, 
                ContraseñaUsuario = :contrasena, 
                TipoUsuario = :tipo 
            WHERE IdUsuarios = :id";
    $stmt = $con->prepare($sql);

    if ($stmt->execute([
        ':nombre' => $nombreUsuario,
        ':contrasena' => $contrasenaUsuario,
        ':tipo' => $tipoUsuario,
        ':id' => $idUsuario
    ])) {
        echo "<script>alert('Usuario actualizado correctamente.'); window.location.href='/crud/usuarios/index.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar el usuario.'); window.location.href='/crud/usuarios/index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
</head>
<body>
    <h1>Modificar Usuario</h1>
    <form method="POST">
        <label for="NombreUsuario">Nombre de Usuario:</label>
        <input type="text" id="NombreUsuario" name="NombreUsuario" value="<?= htmlspecialchars($usuario['NombreUsuario']) ?>" required>
        <br>
        <label for="ContraseñaUsuario">Contraseña:</label>
        <input type="text" id="ContraseñaUsuario" name="ContraseñaUsuario" value="<?= htmlspecialchars($usuario['ContraseñaUsuario']) ?>" required>
        <br>
        <label for="TipoUsuario">Tipo de Usuario:</label>
        <select id="TipoUsuario" name="TipoUsuario" required>
            <option value="Administrador" <?= $usuario['TipoUsuario'] === 'Administrador' ? 'selected' : '' ?>>Administrador</option>
            <option value="Usuario" <?= $usuario['TipoUsuario'] === 'Usuario' ? 'selected' : '' ?>>Usuario</option>
            <option value="Invitado" <?= $usuario['TipoUsuario'] === 'Invitado' ? 'selected' : '' ?>>Invitado</option>
        </select>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
    <br>
    <a href="/crud/usuarios/index.php">Cancelar</a>
</body>
</html>


