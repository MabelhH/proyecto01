<?php 
include '../conexion/conexion.php';

    
        $usuario = $_POST['usuarios'];
        $contraseña = $_POST['contraseña'];
        $instruccionsql=$con->query("SELECT * FROM usuarios
        where NombreUsuario='".$usuario."' and ContraseñaUsuario='".$contraseña."';");
        $instruccionsql->execute();

        if($registro = $instruccionsql->fetch(PDO::FETCH_OBJ)) // la consulta se carga a $registro y preguntamos si algún registro cumple la condición
        {
            session_start();
            $_SESSION["IdUsuarios"]=$registro->IdUsuarios;
            $_SESSION["NombreUsuario"]=$registro->NombreUsuario;
            $_SESSION["ContraseñaUsuario"]=$registro->ContraseñaUsuario;
            $_SESSION["TipoUsuario"]=$registro->TipoUsuario;
            if ($_SESSION['TipoUsuario']=="Administrador") {
                header('Location: ../paginaprincipal/administrador.php');
            }elseif($_SESSION['TipoUsuario']=="Cliente"){
                header('Location: ../paginaprincipal/usuario.php');
            }
        }
        else
        {
            echo "Las credenciales del usuario no existen";
        }
?>




