<?php
include_once '../db/conexion.php';
include_once '../models/CrudAdmin.php';

$adminModel = new CrudAdmin($conexion);

// Crear un nuevo admin
if (isset($_POST['create'])) {
    $nombre_ad = $_POST['nombre_ad'];
    $contraseña_ad = $_POST['Contrasena_ad'];
    $rol = $_POST['rol'];
    $adminModel->createAdmin($nombre_ad, $contraseña_ad, $rol);
}

// Actualizar un admin existente
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre_ad = $_POST['nombre_ad'];
    $contraseña_ad = $_POST['Contrasena_ad'];
    $rol = $_POST['rol'];
    $adminModel->updateAdmin($id, $nombre_ad, $contraseña_ad, $rol);
}

// Eliminar un admin
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $adminModel->deleteAdmin($id);
}

// Obtener todos los admins para mostrarlos en la tabla
$admins = $adminModel->getAllAdmins();

// Determinar si estamos editando un admin
$editAdmin = null;
if (isset($_GET['edit'])) {
    $editAdmin = $adminModel->getAdminById($_GET['edit']);
}

// Cargar la vista
include '../views/AdminView.php';
?>
