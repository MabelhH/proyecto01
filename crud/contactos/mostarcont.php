<?php
include '../../conexion/conexion.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contactos</title>
    <link rel="stylesheet" href="/crud/contactos/contacmos.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Contactos</h1>
        <a href="/RegistroUsuario/registro.html" role="button">Insertar</a>
        <br>
        <table>
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Mensaje</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // SQL query to fetch contacts
                $instruccionsql = "SELECT * FROM contactos";
                $result = $con->query($instruccionsql);
                
                // Fetch each row and display it
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                    echo "
                    <tr>
                        <td>" . htmlspecialchars($row['Dni']) . "</td>
                        <td>" . htmlspecialchars($row['NombreCompleto']) . "</td>
                        <td>" . htmlspecialchars($row['Correo']) . "</td>
                        <td>" . htmlspecialchars($row['Telefono']) . "</td>
                        <td>" . htmlspecialchars($row['Direccion']) . "</td>
                        <td>" . htmlspecialchars($row['Mensaje']) . "</td>
                        <td>
                            <a href='/crud/contactos/editar.php?id=" . $row['Dni'] . "'>Modificar</a> | 
                            <a href='/crud/contactos/eliminar.php?id=" . $row['Dni'] . "' onclick='return confirm(\"¿Estás seguro de eliminar este contacto?\");'>Eliminar</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="/paginaprincipal/administrador.php" class="volver">Volver</a>
    </div>
</body>
</html>
