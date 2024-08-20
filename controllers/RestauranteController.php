<?php
include_once '../db/conexion.php';
include_once '../models/CrudModel.php';

$model = new CrudModel($conexion);
$clientes = $model->getAllClientes();

include '../views/header.php';
foreach ($clientes as $cliente) {
    echo "<p>{$cliente['nombre']} - {$cliente['email']}</p>";
}
include '../views/footer.php';
?>