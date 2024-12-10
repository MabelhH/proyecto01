<?php
include ("../conexion/conexion.php");

if ($_POST) {
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $costo = $_POST['costo'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $imagenTmp = $_FILES['imagen']['tmp_name'];  
        $imagenContent = file_get_contents($imagenTmp);  
        $imagenTipo = $_FILES['imagen']['type'];  
    } else {
        echo 'Error al subir la imagen';
        exit();
    }

    if ($tipo == 'especial') {
        echo "Especial";
    } elseif ($tipo == 'familiar') {
        echo "Familiar";
    } elseif ($tipo == 'normal') {
        echo "Normal";
    } else {
        echo "Elige un tipo de habitación";
    }

    // Validación del estado
    if ($estado == 'libre') {
        echo "Libre";
    } elseif ($estado == 'ocupado') {
        echo "Ocupado";
    } else {
        echo "El estado de la habitación es desconocido";
    }

    $instruccionsql = "INSERT INTO habitaciones (TipoHabitacion, Estado, Costo, Imagen) VALUES (:tipo, :estado, :costo, :imagen)";

    if ($stmt = $con->prepare($instruccionsql)) {
      
        $stmt->bindValue(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindValue(':costo', $costo, PDO::PARAM_INT);
        $stmt->bindValue(':imagen', $imagenContent, PDO::PARAM_LOB); 
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            header('Location: ../paginaprincipal/administrador.php');
        } else {
            echo '<h3 class="bad">¡Ups, ha ocurrido un error!</h3>';
        }
    } else {
        echo '<h3 class="bad">¡Error en la preparación de la consulta!</h3>';
    }
} else {
    $mensaje = '¡Por favor, ingresa valor a los campos vacíos!';
    $tipoMensaje = 'bad';
}
?>
