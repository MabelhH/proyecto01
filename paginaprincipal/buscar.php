<?php
include('../conexion/conexion.php');

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $query = mysqli_real_escape_string($conexion, $query);

    $sql = "SELECT * FROM habitaciones WHERE TipoHabitacion LIKE '%$query%'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='habi'>";
            echo "<h3>" . $row['tipo'] . "</h3>";
            echo "<p>" . $row['estado'] . "</p>";
            echo "<p>" . $row['costo'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
} else {
    echo "Por favor ingrese un término de búsqueda.";
}
?>
