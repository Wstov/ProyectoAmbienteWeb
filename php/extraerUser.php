<?php
// Incluir el archivo de configuración
include 'config.php';

// Consulta SQL para obtener nombre y apellido de la tabla usuarios
$sql = "SELECT Nombre, Apellido FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciar la tabla HTML
    echo "<table border='1'>
          <tr>
              <th>Nombre</th>
              <th>Apellido</th>
          </tr>";

    // Mostrar los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['Nombre']) . "</td>
                <td>" . htmlspecialchars($row['Apellido']) . "</td>
              </tr>";
    }

    // Cerrar la tabla HTML
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>