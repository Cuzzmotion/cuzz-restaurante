<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    
    <!-- Formulario para crear/editar usuarios -->
    <form method="POST" action="UsuarioController.php">
        <input type="hidden" name="id" value="<?php echo $editUsuario ? $editUsuario['id'] : ''; ?>">
        <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $editUsuario ? $editUsuario['usuario'] : ''; ?>" required>
        <input type="text" name="Contrasena" placeholder="Contrasena" value="<?php echo $editUsuario ? $editUsuario['Contrasena'] : ''; ?>" required>
        <input type="email" name="gmail" placeholder="Gmail" value="<?php echo $editUsuario ? $editUsuario['gmail'] : ''; ?>" required>
        <!-- Eliminar el campo de selección de rol -->
        <button type="submit" name="<?php echo $editUsuario ? 'update' : 'create'; ?>">
            <?php echo $editUsuario ? 'Actualizar' : 'Crear'; ?>
        </button>
    </form>

    <!-- Tabla para mostrar usuarios -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Gmail</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['usuario']; ?></td>
            <td><?php echo $usuario['Contrasena']; ?></td>
            <td><?php echo $usuario['gmail']; ?></td>
            <td><?php echo $usuario['rol']; ?></td>
            <td>
                <a href="?edit=<?php echo $usuario['id']; ?>">Editar</a>
                <a href="?delete=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
