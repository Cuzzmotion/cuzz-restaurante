<?php
class CrudProducto {
    private $conexion;

    public function __construct($dbConexion) {
        $this->conexion = $dbConexion;
    }

    public function getAllProductos() {
        $query = "SELECT * FROM productos";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductoById($id) {
        $query = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProducto($tipo, $nombre_prod, $precio_prod) {
        $query = "INSERT INTO productos (tipo, nombre_prod, precio_prod) VALUES (:tipo, :nombre_prod, :precio_prod)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':nombre_prod', $nombre_prod);
        $stmt->bindParam(':precio_prod', $precio_prod);
        return $stmt->execute();
    }

    public function updateProducto($id, $tipo, $nombre_prod, $precio_prod) {
        $query = "UPDATE productos SET tipo = :tipo, nombre_prod = :nombre_prod, precio_prod = :precio_prod WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':nombre_prod', $nombre_prod);
        $stmt->bindParam(':precio_prod', $precio_prod);
        return $stmt->execute();
    }

    public function deleteProducto($id) {
        $query = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
