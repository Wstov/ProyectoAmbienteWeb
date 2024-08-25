<?php
include("../../php/config.php");

$libroID = isset($_GET['LibroID']) ? intval($_GET['LibroID']) : 0;
$unitIn = $unitOut = $cantidad = '';

// Comprobar si ya existe un registro de stock para el LibroID
if ($libroID) {
    $query = "SELECT * FROM Stock WHERE LibroID = '$libroID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $stock = mysqli_fetch_assoc($result);
        $unitIn = $stock['unitIn'];
        $unitOut = $stock['unitOut'];
        $cantidad = $stock['Cantidad'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Agregar Stock</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Agregar Stock</h1>
        <form method="POST" action="../../php/productos/agregarStock.php">
            <div class="mb-3">
                <label for="LibroID" class="form-label">ID del Libro</label>
                <input type="number" class="form-control" id="LibroID" name="LibroID" value="<?= $libroID ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="unitIn" class="form-label">Unidades Entrantes</label>
                <input type="number" class="form-control" id="unitIn" name="unitIn" value="<?= htmlspecialchars($unitIn) ?>" required>
            </div>
            <div class="mb-3">
                <label for="unitOut" class="form-label">Unidades Salientes</label>
                <input type="number" class="form-control" id="unitOut" name="unitOut" value="<?= htmlspecialchars($unitOut) ?>">
            </div>
            <div class="mb-3">
                <label for="Cantidad" class="form-label">Cantidad Total</label>
                <input type="number" class="form-control" id="Cantidad" name="Cantidad" value="<?= htmlspecialchars($cantidad) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Stock</button>
            <a href="./indexAdmin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
