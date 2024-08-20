<?php
class CrudAdmin {
    private $conexion;

    public function __construct($dbConexion) {
        $this->conexion = $dbConexion;
    }

    public function getAllAdmins() {
        $query = "SELECT * FROM admins";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdminById($id) {
        $query = "SELECT * FROM admins WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createAdmin($nombre_ad, $Contrasena_ad, $rol) {
        $query = "INSERT INTO admins (Nombre_ad, Contrasena_ad, Rol) VALUES (:nombre_ad, :Contrasena_ad, :rol)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre_ad', $nombre_ad);
        $stmt->bindParam(':Contrasena_ad', $Contrasena_ad);
        $stmt->bindParam(':rol', $rol);
        return $stmt->execute();
    }

    public function updateAdmin($id, $nombre_ad, $Contrasena_ad, $rol) {
        $query = "UPDATE admins SET Nombre_ad = :nombre_ad, Contrasena_ad = :Contrasena_ad, Rol = :rol WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre_ad', $nombre_ad);
        $stmt->bindParam(':Contrasena_ad', $Contrasena_ad);
        $stmt->bindParam(':rol', $rol);
        return $stmt->execute();
    }

    public function deleteAdmin($id) {
        $query = "DELETE FROM admins WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
