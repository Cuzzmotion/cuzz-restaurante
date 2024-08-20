<?php
include_once '../db/conexion.php';
include_once '../models/CrudUsuario.php';

$usuarioModel = new CrudUsuario($conexion);

// Crear un nuevo usuario
if (isset($_POST['create'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['Contrasena'];
    $gmail = $_POST['gmail'];
    $rol = 'cliente';  // Asignar automáticamente el rol de "cliente"
    $usuarioModel->createUsuario($usuario, $contraseña, $gmail, $rol);
}

// Actualizar un usuario existente
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['Contrasena'];
    $gmail = $_POST['gmail'];
    $rol = 'cliente';  // Asignar automáticamente el rol de "cliente"
    $usuarioModel->updateUsuario($id, $usuario, $contraseña, $gmail, $rol);
}

// Eliminar un usuario
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $usuarioModel->deleteUsuario($id);
}

// Obtener todos los usuarios para mostrarlos en la tabla
$usuarios = $usuarioModel->getAllUsuarios();

// Determinar si estamos editando un usuario
$editUsuario = null;
if (isset($_GET['edit'])) {
    $editUsuario = $usuarioModel->getUsuarioById($_GET['edit']);
}

// Cargar la vista
include '../views/UsuarioView.php';
?>
