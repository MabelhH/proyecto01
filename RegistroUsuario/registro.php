<?php
include '../conexion/conexion.php';

if ($_POST) {
    if (strlen($_POST['usuarios']) >= 1 &&
        strlen($_POST['contraseña']) >= 1 &&
        strlen($_POST['tipodeusuario']) >= 1) {

        $usuario = $_POST['usuarios'];
        $contraseña = $_POST['contraseña'];
        $tipousario = $_POST['tipodeusuario'];
        
    
        $check = $con->prepare("SELECT * FROM usuarios WHERE NombreUsuario = ?");
        $check->execute([$usuario]);
        if ($check->rowCount() > 0) {
            echo '<h3 class="bad">¡El nombre de usuario ya existe!</h3>';
        } else {
    
            $instruccionsql = "INSERT INTO usuarios (NombreUsuario,ContraseñaUsuario,TipoUsuario) 
                               VALUES ('$usuario','$contraseña','$tipousario')";
            $resultado = $con->query($instruccionsql);

            if ($resultado) {
                header('Location: ../iniciarsesion/usuarios.html');
            } else {
                echo '<h3 class="bad">¡Ups, ha ocurrido un error!</h3>';
            }
        }
    } else {
        echo '<h3 class="bad">¡Por favor, ingresa valor a los campos vacíos!</h3>';
    }
}
?>
