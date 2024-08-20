<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Órdenes</title>
</head>
<body>
    <h1>Gestión de Órdenes</h1>
    
    <!-- Formulario para crear/editar órdenes -->
    <form method="POST" action="OrdenController.php">
        <input type="hidden" name="id" value="<?php echo $editOrden ? $editOrden['id'] : ''; ?>">
        <input type="text" name="usuario_id" placeholder="ID Usuario" value="<?php echo $editOrden ? $editOrden['usuario_id'] : ''; ?>" required>
        <input type="text" name="producto_id" placeholder="ID Producto" value="<?php echo $editOrden ? $editOrden['producto_id'] : ''; ?>" required>
        <input type="datetime-local" name="fecha_hora" value="<?php echo $editOrden ? date('Y-m-d\TH:i', strtotime($editOrden['fecha_hora'])) : ''; ?>" required>
        <button type="submit" name="<?php echo $editOrden ? 'update' : 'create'; ?>">
            <?php echo $editOrden ? 'Actualizar' : 'Crear'; ?>
        </button>
    </form>

    <!-- Tabla para mostrar órdenes -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID Usuario</th>
            <th>ID Producto</th>
            <th>Fecha y Hora</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($ordenes as $orden): ?>
        <tr>
            <td><?php echo $orden['id']; ?></td>
            <td><?php echo $orden['usuario_id']; ?></td>
            <td><?php echo $orden['producto_id']; ?></td>
            <td><?php echo $orden['fecha_hora']; ?></td>
            <td>
                <a href="?edit=<?php echo $orden['id']; ?>">Editar</a>
                <a href="?delete=<?php echo $orden['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta orden?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
