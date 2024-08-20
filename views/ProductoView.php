<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
</head>
<body>
    <h1>Gestión de Productos</h1>
    
    <!-- Formulario para crear/editar productos -->
    <form method="POST" action="ProductoController.php">
        <input type="hidden" name="id" value="<?php echo $editProducto ? $editProducto['id'] : ''; ?>">
        <input type="text" name="nombre_prod" placeholder="Nombre del Producto" value="<?php echo $editProducto ? $editProducto['nombre_prod'] : ''; ?>" required>
        <select name="tipo" required>
            <option value="Sopas" <?php echo $editProducto && $editProducto['tipo'] == 'Sopas' ? 'selected' : ''; ?>>Sopas</option>
            <option value="Segundos" <?php echo $editProducto && $editProducto['tipo'] == 'Segundos' ? 'selected' : ''; ?>>Segundos</option>
            <option value="Postres" <?php echo $editProducto && $editProducto['tipo'] == 'Postres' ? 'selected' : ''; ?>>Postres</option>
            <option value="Bebidas" <?php echo $editProducto && $editProducto['tipo'] == 'Bebidas' ? 'selected' : ''; ?>>Bebidas</option>
        </select>
        <input type="number" name="precio_prod" placeholder="Precio del Producto" value="<?php echo $editProducto ? $editProducto['precio_prod'] : ''; ?>" required>
        <button type="submit" name="<?php echo $editProducto ? 'update' : 'create'; ?>">
            <?php echo $editProducto ? 'Actualizar' : 'Crear'; ?>
        </button>
    </form>

    <!-- Tabla para mostrar productos -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['id']; ?></td>
            <td><?php echo $producto['nombre_prod']; ?></td>
            <td><?php echo $producto['tipo']; ?></td>
            <td><?php echo $producto['precio_prod']; ?></td>
            <td>
                <a href="?edit=<?php echo $producto['id']; ?>">Editar</a>
                <a href="?delete=<?php echo $producto['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
