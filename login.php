<?php
session_start();
include_once 'db/conexion.php';
include_once 'models/CrudUsuario.php';
include_once 'models/CrudAdmin.php';

$usuarioModel = new CrudUsuario($conexion);
$adminModel = new CrudAdmin($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar en la tabla de usuarios
    $usuarios = $usuarioModel->getAllUsuarios();
    foreach ($usuarios as $user) {
        if ($user['usuario'] === $usuario && $user['Contrasena'] === $contrasena) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $user['rol'];
            header("Location: index.php");
            exit();
        }
    }

    // Verificar en la tabla de administradores
    $admins = $adminModel->getAllAdmins();
    foreach ($admins as $admin) {
        if ($admin['Nombre_ad'] === $usuario && $admin['Contrasena_ad'] === $contrasena) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $admin['Rol'];
            header("Location: index.php");
            exit();
        }
    }

    $error = "Credenciales inválidas";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            font-size: 16px;
        }
        button:hover {
            background-color: #2980b9;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Iniciar sesión</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>

