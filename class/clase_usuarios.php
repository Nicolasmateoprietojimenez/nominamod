<?php
require_once '../conexion/conexion.php';

class usuarios extends conexion
{
    public function create($data)
    {
        try {
            $conn = $this->connect();
            $query = "INSERT INTO usuario (identidad_usuario, tipo_documento, nombre_usuario, apellido_usuario, id_tipo_usuario, telef_usuario,direcc_usuario,correo_usuario,usuario_sistema,password_usuario,estado_usuario) 
            VALUES (:identidad_usuario, :tipo_documento, :nombre_usuario, :apellido_usuario, :id_tipo_usuario, :telef_usuario,:direcc_usuario,:correo_usuario,:usuario_sistema,:password_usuario,:estado_usuario)";
            $stmt = $conn->prepare($query);
            $stmt->execute($data);            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function verificacion($datados)
    {
        try {
            $conn = $this->connect();
            $query = "INSERT INTO verificacion_usuario (codigo_verificacion, fecha_verificacion, hora_verificacion, identidad_usuario) 
            VALUES (:codigo_verificacion, :fecha_verificacion, :hora_verificacion, :identidad_usuario)";
            $stmt = $conn->prepare($query);
            $stmt->execute($datados);            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerUltimaVerificacion($identificacion_usuario)
{
    $conn = $this->connect(); // Asegúrate de tener la conexión
    $query = "SELECT obtenerUltimaVerificacion(:identificacion_usuario) as id_verificacion";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':identificacion_usuario', $identificacion_usuario, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['id_verificacion'];
}


    public function verificacionread($id_v)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM verificacion_usuario WHERE id_verificacion = :id_v";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_v', $id_v, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificacionupdate($id, $data)
    {
        try {
            $conn = $this->connect();
            $query = "UPDATE usuario SET estado_usuario = :estado_usuario  WHERE identidad_usuario = :id";
            $data['id'] = $id;
            $stmt = $conn->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function validarusuario($identidad_usuario)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM usuario WHERE identidad_usuario = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':identidad_usuario', $identidad_usuario, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
//**Funciones para usuarios *////////////////////////////

    public function read()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM tipo_usuario";
        $stmt = $conn->query($query);
        return $stmt->fetchAll();
    }

    public function readx($id)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM usuario WHERE identidad_usuario = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':identidad_usuario', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function update($id, $data)
    {
        try {
            $conn = $this->connect();
            $query = "UPDATE usuario SET nombre_usuario = :nombre_usuario, tipo_documento = :tipo_documento, identidad_usuario = :identidad_usuario, apellido_usuario = :apellido_usuario, telef_usuario = :telef_usuario, direcc_usuario = :direcc_usuario, correo_usuario = :correo_usuario, usuario_sistema = :usuario_sistema, password_usuario = :password_usuario, estado_usuario = :estado_usuario WHERE identidad_usuario = :identidad_usuario";
            $data['identidad_usuario'] = $id;
            $stmt = $conn->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($identidad_usuario)
    {
        try {
            $conn = $this->connect();
            $query = "DELETE FROM usuario WHERE identidad_usuario = :identidad_usuario";
            $stmt = $conn->prepare($query);
            $stmt->execute(['identidad_usuario' => $identidad_usuario]);
            return true;
        } catch (PDOException $e) {
            echo "Error al eliminar el usuario: " . $e->getMessage();
            return false;
        }
    }

    public function eliminarVerificaciones($identidad_usuario)
{
    try {
        $conn = $this->connect();
        $query = "DELETE FROM verificacion_usuario WHERE identidad_usuario = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->execute(['identidad_usuario' => $identidad_usuario]);
        return true;
    } catch (PDOException $e) {
        echo "Error al eliminar las verificaciones: " . $e->getMessage();
        return false;
    }
}

    
}
?>
