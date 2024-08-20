<?php
session_start();
include_once '../db/conexion.php';
include_once '../models/CrudOrden.php';
include_once '../models/CrudProducto.php';
include_once '../models/CrudUsuario.php';

$ordenModel = new CrudOrden($conexion);
$productoModel = new CrudProducto($conexion);
$usuarioModel = new CrudUsuario($conexion);

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: Login.php'); // Redirigir al login si no está autenticado
    exit;
}

// Obtener el id del usuario basado en el nombre de usuario
$usuario = $_SESSION['usuario'];
$usuarioData = $usuarioModel->getUsuarioByUsername($usuario); // Nueva función que debes crear en CrudUsuario
$usuario_id = $usuarioData['id'];

// Variables para almacenar la factura
$factura = null;

// Crear una nueva orden
if (isset($_POST['create'])) {
    $producto_id = $_POST['producto_id'];
    $fecha_hora = date('Y-m-d H:i:s'); // Fecha y hora actual
    $orden_id = $ordenModel->createOrden($usuario_id, $producto_id, $fecha_hora);
    
    // Obtener los detalles del último pedido creado para mostrar la factura
    $orden = $ordenModel->getOrdenById($orden_id);
    $producto = $productoModel->getProductoById($orden['producto_id']);
    $factura = [
        'producto' => $producto['nombre_prod'],
        'precio' => $producto['precio_prod'],
        'fecha_hora' => $orden['fecha_hora'],
        'nombre_cliente' => $usuarioData['usuario']
    ];
}

// Obtener todos los productos para mostrarlos en la lista
$productos = $productoModel->getAllProductos();

// Cargar la vista
include '../views/PedidoView.php';
?>




