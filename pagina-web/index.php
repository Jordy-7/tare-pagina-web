<?php 
include 'includes/datos.php'; // Asegúrate de que 'datos.php' tenga la lógica de conexión adecuada
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1b1b1b, #0d0d0d);
            color: #e0e0e0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .form-container {
            background: rgba(20, 20, 20, 0.8);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin: 10px 0 5px;
        }

        form input, form button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #444;
            border-radius: 4px;
            background: #222;
            color: #e0e0e0;
            font-size: 16px;
        }

        form button {
            background: #333;
            color: #fff;
            cursor: pointer;
        }

        form button:hover {
            background: #444;
        }

        @media (max-width: 600px) {
            .form-container {
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="admin.php" method="post">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
