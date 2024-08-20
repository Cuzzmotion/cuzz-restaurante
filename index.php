<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            margin: 10px 0;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .login-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }
        .login-btn:hover {
            background-color: #2980b9;
        }
        .user-info {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Sistema de Gestión del Restaurante</h1>

        <div class="user-info">
            <?php if (isset($_SESSION['usuario'])): ?>
                <p>Usuario logueado: <?php echo $_SESSION['usuario']; ?> (<?php echo $_SESSION['rol']; ?>)</p>
                <a href="logout.php">Cerrar sesión</a>
            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
            <?php endif; ?>
        </div>

        <h2>Opciones:</h2>
        <ul>
            <li><a href="controllers/AdminController.php">Administradores</a></li>
            <li><a href="controllers/UsuarioController.php">Usuarios</a></li>
            <li><a href="controllers/ProductoController.php">Productos</a></li>
            <li><a href="controllers/OrdenController.php">Órdenes</a></li>
            <li><a href="controllers/PedidoController.php">pedidos</a></li>
            
        </ul>
    </div>
</body>
</html>
