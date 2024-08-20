<?php
class CrudUsuario {
    private $conexion;

    public function __construct($dbConexion) {
        $this->conexion = $dbConexion;
    }

    public function getAllUsuarios() {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsuarioById($id) {
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUsuario($usuario, $Contrasena, $gmail, $rol) {
        $query = "INSERT INTO usuarios (usuario, Contrasena, gmail, rol) VALUES (:usuario, :Contrasena, :gmail, :rol)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':Contrasena', $Contrasena);
        $stmt->bindParam(':gmail', $gmail);
        $stmt->bindParam(':rol', $rol);
        return $stmt->execute();
    }

    public function updateUsuario($id, $usuario, $Contrasena, $gmail, $rol) {
        $query = "UPDATE usuarios SET usuario = :usuario, Contrasena = :Contrasena, gmail = :gmail, rol = :rol WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':Contrasena', $Contrasena);
        $stmt->bindParam(':gmail', $gmail);
        $stmt->bindParam(':rol', $rol);
        return $stmt->execute();
    }

    public function deleteUsuario($id) {
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function getUsuarioByUsername($username) {
        $query = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':usuario', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
