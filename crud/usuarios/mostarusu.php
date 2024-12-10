
<?php 
include("../../conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos de Usuarios</title>
    <link rel="stylesheet" href="/crud/usuarios/mostarusu.css">
</head>
<body>
<div class="container">
    <h1>Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>IdUsuarios</th>
                <th>Nombre Usuario</th>
                <th>Contraseña Usuario</th>
                <th>Tipo Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $instruccionsql = "SELECT * FROM usuarios";
                $stmt = $con->query($instruccionsql);
                while ($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($mostrar['IdUsuarios']); ?></td>
                <td><?php echo htmlspecialchars($mostrar['NombreUsuario']); ?></td>
                <td><?php echo htmlspecialchars($mostrar['ContraseñaUsuario']); ?></td>
                <td><?php echo htmlspecialchars($mostrar['TipoUsuario']); ?></td>
                <td>
                    <a href="modificar.php?id=<?php echo $mostrar['IdUsuarios']; ?>">Modificar</a> | 
                    <a href="eliminar.php?id=<?php echo $mostrar['IdUsuarios']; ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a> | 
                    <a href="/RegistroUsuario/registro.html">Insertar</a>
                </td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    <a href="/paginaprincipal/administrador.php">Volver</a>
</div>
</body>
</html>