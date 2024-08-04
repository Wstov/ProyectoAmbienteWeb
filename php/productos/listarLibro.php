<?php
include("../config.php"); 


// Consultar los datos de la tabla 'Libros'
$sql = "SELECT * FROM Libros";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Crear una tabla HTML para mostrar los datos
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>LibroID</th><th>Título</th><th>Autor</th><th>Editorial</th><th>Año de Publicación</th><th>Formato</th><th>Idioma</th><th>Categoría</th><th>Precio</th><th>Sinopsis</th><th>Imagen</th><th>Destacado</th></tr>";
    
    // Mostrar los datos en filas de la tabla
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["LibroID"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Titulo"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Autor"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Editorial"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["AnioPublicacion"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Formato"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Idioma"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Categoria"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Precio"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Sipnosis"]) . "</td>";
        echo "<td><img src='../booksImages/" . htmlspecialchars($row["ImagenURL"]) . "' alt='Imagen del libro' style='width: 100px; height: auto;'></td>";
        echo "<td>" . ($row["Destacado"] ? "Sí" : "No") . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
