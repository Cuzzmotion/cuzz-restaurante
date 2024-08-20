<?php
include_once '../db/conexion.php';
include_once '../models/CrudOrden.php';

$ordenModel = new CrudOrden($conexion);

// Crear una nueva orden
if (isset($_POST['create'])) {
    $usuario_id = $_POST['usuario_id'];
    $producto_id = $_POST['producto_id'];
    $fecha_hora = $_POST['fecha_hora'];
    $ordenModel->createOrden($usuario_id, $producto_id, $fecha_hora);
}

// Actualizar una orden existente
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $usuario_id = $_POST['usuario_id'];
    $producto_id = $_POST['producto_id'];
    $fecha_hora = $_POST['fecha_hora'];
    $ordenModel->updateOrden($id, $usuario_id, $producto_id, $fecha_hora);
}

// Eliminar una orden
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $ordenModel->deleteOrden($id);
}

// Obtener todas las ordenes para mostrarlas en la tabla
$ordenes = $ordenModel->getAllOrdenes();

// Determinar si estamos editando una orden
$editOrden = null;
if (isset($_GET['edit'])) {
    $editOrden = $ordenModel->getOrdenById($_GET['edit']);
}

// Cargar la vista
include '../views/OrdenView.php';
?>
