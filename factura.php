<?php
session_start();
include_once '../db/conexion.php';
include_once '../models/CrudOrden.php';
include_once '../models/CrudProducto.php';
include_once '../models/CrudUsuario.php';

$ordenModel = new CrudOrden($conexion);
$productoModel = new CrudProducto($conexion);


// Obtener el ID de la orden desde el parámetro GET
if (isset($_GET['id'])) {
    $orden_id = $_GET['id'];
    $orden = $ordenModel->getOrdenById($orden_id);
    $producto = $productoModel->getProductoById($orden['producto_id']);
    $usuario_id = $orden['usuario_id'];
    $usuarioData = $usuarioModel->getUsuarioById($usuario_id);
} else {
    echo "ID de orden no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    <h1>Factura</h1>
    <p><strong>Nombre del Restaurante:</strong> Elvis Delights</p>
    <p><strong>Producto:</strong> <?php echo $producto['nombre']; ?></p>
    <p><strong>Precio:</strong> <?php echo $producto['precio']; ?> USD</p>
    <p><strong>Hora:</strong> <?php echo $orden['fecha_hora']; ?></p>
    <p><strong>Nombre del Cliente:</strong> <?php echo $usuarioData['usuario']; ?></p>
</body>
</html>

