<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Admins</title>
</head>
<body>
    <h1>Gestión de Admins</h1>
    
    <!-- Formulario para crear/editar admins -->
    <form method="POST" action="AdminController.php">
        <input type="hidden" name="id" value="<?php echo $editAdmin ? $editAdmin['id'] : ''; ?>">
        <input type="text" name="nombre_ad" placeholder="Nombre Admin" value="<?php echo $editAdmin ? $editAdmin['Nombre_ad'] : ''; ?>" required>
        <input type="text" name="Contrasena_ad" placeholder="Contrasena_ad" value="<?php echo $editAdmin ? $editAdmin['Contrasena_ad'] : ''; ?>" required>
        <select name="rol" required>
            <option value="Admin" <?php echo $editAdmin && $editAdmin['Rol'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
        </select>
        <button type="submit" name="<?php echo $editAdmin ? 'update' : 'create'; ?>">
            <?php echo $editAdmin ? 'Actualizar' : 'Crear'; ?>
        </button>
    </form>

    <!-- Tabla para mostrar admins -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($admins as $admin): ?>
        <tr>
            <td><?php echo $admin['id']; ?></td>
            <td><?php echo $admin['Nombre_ad']; ?></td>
            <td><?php echo $admin['Contrasena_ad']; ?></td>
            <td><?php echo $admin['Rol']; ?></td>
            <td>
                <a href="?edit=<?php echo $admin['id']; ?>">Editar</a>
                <a href="?delete=<?php echo $admin['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este admin?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
