<?php
class CrudModel {
    private $conexion;

    public function __construct($dbConexion) {
        $this->conexion = $dbConexion;
    }

    public function getAllClientes() {
        $query = "SELECT * FROM clientes";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agrega más funciones CRUD (Create, Update, Delete)
}
?>