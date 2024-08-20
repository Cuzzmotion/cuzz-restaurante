<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        h1 {
            color: #333;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>Crear Pedido</h1>
    
    <!-- Formulario para crear pedidos -->
    <form method="POST" action="PedidoController.php">
        <label for="producto_id">Seleccionar Producto:</label>
        <select name="producto_id" id="producto_id" required>
            <?php foreach ($productos as $producto): ?>
                <option value="<?php echo $producto['id']; ?>"><?php echo $producto['nombre_prod']; ?> - <?php echo $producto['precio_prod']; ?> bs</option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="create">Crear Pedido</button>
    </form>

    <!-- Mostrar factura si existe -->
    <?php if ($factura): ?>
        <h2>Factura</h2>
        <p><strong>Nombre del Restaurante:</strong> Elvis Delights</p>
        <table class="invoice-table">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Fecha y Hora</th>
                <th>Nombre del Cliente</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($factura['producto']); ?></td>
                <td><?php echo htmlspecialchars($factura['precio']); ?> bs</td>
                <td><?php echo htmlspecialchars($factura['fecha_hora']); ?></td>
                <td><?php echo htmlspecialchars($factura['nombre_cliente']); ?></td>
            </tr>
        </table>
    <?php endif; ?>
</body>
</html>


