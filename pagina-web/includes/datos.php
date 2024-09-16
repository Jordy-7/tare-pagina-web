<?php 
session_start(); // Inicia la sesión

// Configuración de la base de datos
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "empresa";

// Crear conexión
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para obtener empleados
function getEmpleados($mysqli) {
    $query = 'SELECT * FROM Empleados';
    $result = $mysqli->query($query);
    
    if (!$result) {
        die('Error en la consulta: ' . $mysqli->error);
    }
    
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Función para agregar un empleado
function addEmpleado($mysqli, $nombre, $apellido, $correo_electronico, $telefono, $salario) {
    $query = 'INSERT INTO Empleados (nombre, apellido, correo_electronico, telefono, salario) VALUES (?, ?, ?, ?, ?)';
    $stmt = $mysqli->prepare($query);
    
    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $mysqli->error);
    }
    
    $stmt->bind_param('ssssd', $nombre, $apellido, $correo_electronico, $telefono, $salario);
    
    if (!$stmt->execute()) {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    }
    
    $stmt->close();
}

// Manejar el envío del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para obtener el usuario
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña usando password_verify
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: admin.php'); // Redirige al panel de administración
            exit();
        } else {
            echo "Nombre de usuario o contraseña incorrectos";
        }
    } else {
        echo "Nombre de usuario o contraseña incorrectos";
    }

    $stmt->close();
}

$conn->close();
?>
