<?php
class CrudOrden {
    private $conexion;

    public function __construct($dbConexion) {
        $this->conexion = $dbConexion;
    }

    public function getAllOrdenes() {
        $query = "SELECT * FROM orden";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrdenById($id) {
        $query = "SELECT * FROM orden WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createOrden($usuario_id, $producto_id, $fecha_hora) {
        $query = "INSERT INTO orden (usuario_id, producto_id, fecha_hora) VALUES (:usuario_id, :producto_id, :fecha_hora)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':producto_id', $producto_id);
        $stmt->bindParam(':fecha_hora', $fecha_hora);
        return $stmt->execute();
    }

    public function updateOrden($id, $usuario_id, $producto_id, $fecha_hora) {
        $query = "UPDATE orden SET usuario_id = :usuario_id, producto_id = :producto_id, fecha_hora = :fecha_hora WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':producto_id', $producto_id);
        $stmt->bindParam(':fecha_hora', $fecha_hora);
        return $stmt->execute();
    }

    public function deleteOrden($id) {
        $query = "DELETE FROM orden WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function getLastInsertedId() {
        return $this->conexion->lastInsertId();
    }
}
?>
