<?php 
include '../conexion/conexion.php';

if ($_POST) {
    $nombreCliente = $_POST['NombreCliente'];
    $fechaEntrada = $_POST['FechaEntrada'];
    $fechaSalida = $_POST['FechaSalida'];
    $habitacion = $_POST['Habitacion'];
    $estado = $_POST['Estado'];
    if ($habitacion==="101") {
         $habitacion='Habitación 101';
    }elseif ($habitacion==="102") {
        $habitacion='Habitación 102';
    }elseif ($habitacion==="201") {
        $habitacion='Habitación 201';
    }elseif ($habitacion==="202") {
        $habitacion='Habitación 202';
    }elseif ($habitacion==="301") {
        $habitacion='Habitación 301 suid';
    }else {
        $estado='Habitación ';
    }
    if ($estado==="Pendiente") {
        $estado='Pendiente';
   }elseif ($estado==="Confirmada") {
       $estado='Confirmada';
   }elseif ($estado==="Cancelada") {
       $estado='Cancelada';
   }else {
       $estado='selecione un estado';
   }
    try
    {
        $instruccionSql = "INSERT INTO reserva (NombreCliente, FechaEntrada, FechaSalida, Habitacion, Estado) 
            VALUES ('$nombreCliente', '$fechaEntrada', '$fechaSalida', '$habitacion','$estado')";
            $resutado=$con->query($instruccionSql);
            header('Location: ../paginaprincipal/usuario.php');
        
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
?>
