<?php
include_once '../db/conexion.php';
include_once '../models/CrudProducto.php';

$productoModel = new CrudProducto($conexion);

// Crear un nuevo producto
if (isset($_POST['create'])) {
    $tipo = $_POST['tipo'];
    $nombre_prod = $_POST['nombre_prod'];
    $precio_prod = $_POST['precio_prod'];
    $productoModel->createProducto($tipo, $nombre_prod, $precio_prod);
}

// Actualizar un producto existente
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $nombre_prod = $_POST['nombre_prod'];
    $precio_prod = $_POST['precio_prod'];
    $productoModel->updateProducto($id, $tipo, $nombre_prod, $precio_prod);
}

// Eliminar un producto
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $productoModel->deleteProducto($id);
}

// Obtener todos los productos para mostrarlos en la tabla
$productos = $productoModel->getAllProductos();

// Determinar si estamos editando un producto
$editProducto = null;
if (isset($_GET['edit'])) {
    $editProducto = $productoModel->getProductoById($_GET['edit']);
}

// Cargar la vista
include '../views/ProductoView.php';
?>