<?php
include("../conexion/conexion.php");

$query = "SELECT * FROM habitaciones";
$stmt = $con->prepare($query); 
$stmt->execute();              

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $imagenData = base64_encode($row["Imagen"]);
    $imagenSrc = "data:image/jpeg;base64," . $imagenData;

    echo '<div class="card">
            <img src="' . $imagenSrc . '" alt="Imagen de Habitación ' . $row["TipoHabitacion"] . '" class="card-img">
            <div class="card-body">
                <p class="card-description">Tipo: ' . $row["TipoHabitacion"] . '</p>
                <p class="card-description">Estado: ' . $row["Estado"] . '</p>
                <p class="card-description">Costo: $' . $row["Costo"] . '</p>
            </div>
          </div>';
}
?>





