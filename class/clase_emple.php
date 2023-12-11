<?php
require_once '../conexion/conexion.php';

class emple extends conexion
{

    public function read_emple($id)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM empleado WHERE identificacion = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':identidad_usuario', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read_emplex()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM empleado";
        $stmt = $conn->query($query);
        return $stmt->fetchAll();
    }

    public function create_emple($data){
        try {
            $conn = $this->connect();
            $query = "INSERT INTO empleado (identificacion, nombre1, nombre2, apellido1, apellido2, estado_civil, correo, sexo, tipo_sangre, nomenclatura, calle, zona, id_supervisor, cod_sede, id_area,nro_cuenta, id_tipo_empleado, doc_identidad) 
            VALUES (:identificacion, :nombre1, :nombre2, :apellido1, :apellido2, :estado_civil, :correo, :sexo, :tipo_sangre, :nomenclatura, :calle, :zona, :id_supervisor, :cod_sede, :id_area,:nro_cuenta, :id_tipo_empleado, :doc_identidad)";
            $stmt = $conn->prepare($query);
            $stmt->execute($data);            
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    public function read_supervisor()
    {
        $conn = $this->connect();
        $query = "SELECT identificacion FROM empleado";
        $stmt = $conn->query($query);
        return $stmt->fetchAll();
    }

    public function read_sede()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM sede";
        $stmt = $conn->query($query);
        return $stmt->fetchAll();
    }

    public function read_area()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM area";
        $stmt = $conn->query($query);
        return $stmt->fetchAll();
    }

    public function read_tipo()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM tipo_empleado";
        $stmt = $conn->query($query);
        return $stmt->fetchAll();
    }
    
    public function delete_emple($identificacion)
    {
        try {
            $conn = $this->connect();
            $query = "DELETE FROM empleado WHERE identificacion = :identificacion";
            $stmt = $conn->prepare($query);
            $stmt->execute(['identificacion' => $identificacion]);
            return true;
        } catch (PDOException $e) {
            echo "Error al eliminar el usuario: " . $e->getMessage();
            return false;
        }
    }

    /**Actualizar */

    public function update_emple($identificacion, $nombre1, $nombre2, $apellido1, $apellido2, $estado_civil, $correo, $sexo, $tipo_sangre, $nomenclatura, $calle, $zona, $id_supervisor, $cod_sede, $id_area, $nro_cuenta, $id_tipo_empleado, $doc_identidad)
{
    try {
        $conn = $this->connect();
        $query = "UPDATE empleado SET nombre1 = :nombre1, nombre2 = :nombre2, apellido1 = :apellido1, apellido2 = :apellido2, estado_civil = :estado_civil, correo = :correo, sexo = :sexo, tipo_sangre = :tipo_sangre, nomenclatura = :nomenclatura, calle = :calle, zona = :zona, id_supervisor = :id_supervisor, cod_sede = :cod_sede, id_area = :id_area, nro_cuenta = :nro_cuenta, id_tipo_empleado = :id_tipo_empleado, doc_identidad = :doc_identidad WHERE identificacion = :identificacion";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':nombre1', $nombre1);
        $stmt->bindParam(':nombre2', $nombre2);
        $stmt->bindParam(':apellido1', $apellido1);
        $stmt->bindParam(':apellido2', $apellido2);
        $stmt->bindParam(':estado_civil', $estado_civil);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':tipo_sangre', $tipo_sangre);
        $stmt->bindParam(':nomenclatura', $nomenclatura);
        $stmt->bindParam(':calle', $calle);
        $stmt->bindParam(':zona', $zona);
        $stmt->bindParam(':id_supervisor', $id_supervisor);
        $stmt->bindParam(':cod_sede', $cod_sede);
        $stmt->bindParam(':id_area', $id_area);
        $stmt->bindParam(':nro_cuenta', $nro_cuenta);
        $stmt->bindParam(':id_tipo_empleado', $id_tipo_empleado);
        $stmt->bindParam(':doc_identidad', $doc_identidad);
        $stmt->bindParam(':identificacion', $identificacion);

        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error al actualizar el usuario: " . $e->getMessage();
        return false;
    }
}

}
?>
