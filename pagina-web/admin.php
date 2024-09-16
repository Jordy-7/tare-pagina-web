<?php
// Incluir archivos de conexión y funciones
include 'includes/conexion.php';
include 'includes/datos.php';

// Procesar el formulario si se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
    $salario = $_POST['salario'];
    
    addEmpleado($mysqli, $nombre, $apellido, $correo_electronico, $telefono, $salario);
}

// Obtener empleados
$empleados = getEmpleados($mysqli);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <div class="container">
        <!-- Formulario de ingreso de datos -->
        <section class="form-container">
            <h2>Agregar Empleado</h2>
            <form action="admin.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
                
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" id="correo_electronico" name="correo_electronico" required>
                
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono">
                
                <label for="salario">Salario:</label>
                <input type="number" id="salario" name="salario" step="0.01" required>
                
                <button type="submit">Agregar Empleado</button>
            </form>
        </section>
        
        <!-- Tabla de empleados -->
        <section class="table-container">
            <h2>Lista de Empleados</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th>Salario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empleados as $empleado): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($empleado['id']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['apellido']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['correo_electronico']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['telefono']); ?></td>
                            <td><?php echo htmlspecialchars($empleado['salario']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
    <script src=""></script>
</body>
</html>
