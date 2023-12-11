<?php
require_once '../conexion/conexion.php';

class prestamo extends conexion
{
########## Insertar datos en las tablas de la linea prestamo ################
public function create_prestamo($data)
{
    try {
        $conn = $this->connect();
        $query = "INSERT INTO prestamo ( fecha_inicio, fecha_final, prestamo_cantidad, prestamo_valor_total, prestamo_valor_pagado, id_estado_prestamo, identidad_usuario, tasa_interes, id_modalidad_prestamo, id_linea_prestamo, pdf_cedula) 
        VALUES (:fecha_inicio, :fecha_final, :prestamo_cantidad, :prestamo_valor_total, :prestamo_valor_pagado, :id_estado_prestamo, :identidad_usuario, :tasa_interes, :id_modalidad_prestamo, :id_linea_prestamo, :pdf_cedula)";
        $stmt = $conn->prepare($query);

        // Bind de los valores
        $stmt->bindParam(':fecha_inicio', $data['fecha_inicio']);
        $stmt->bindParam(':fecha_final', $data['fecha_final']);
        $stmt->bindParam(':prestamo_cantidad', $data['prestamo_cantidad']);
        $stmt->bindParam(':prestamo_valor_total', $data['prestamo_valor_total']);
        $stmt->bindParam(':prestamo_valor_pagado', $data['prestamo_valor_pagado']);
        $stmt->bindParam(':id_estado_prestamo', $data['id_estado_prestamo']);
        $stmt->bindParam(':identidad_usuario', $data['identidad_usuario']);
        $stmt->bindParam(':tasa_interes', $data['tasa_interes']);
        $stmt->bindParam(':id_modalidad_prestamo', $data['id_modalidad_prestamo']);
        $stmt->bindParam(':id_linea_prestamo', $data['id_linea_prestamo']);

        $stmt->bindParam(':pdf_cedula', $data['pdf_cedula'], PDO::PARAM_LOB);

        $stmt->execute();
        
        return true;
    } catch (PDOException $e) {
        echo "<script>alert('Usuario no registrado en el sistema.');</script>";
        return false;
    }        
}

    public function create_modalidad($data)
    {
        try {
            $conn = $this->connect();
            $query = "INSERT INTO modalidad_prestamo (descr_modalidad, identidad_usuario) 
            VALUES (:descr_modalidad,:identidad_usuario)";
            $stmt = $conn->prepare($query);
            $stmt->execute($data);            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function create_linea($data)
    {
        try {
            $conn = $this->connect();
            $query = "INSERT INTO linea_prestamo (descr_linea_prestamo, identidad_usuario) 
            VALUES (:descr_linea_prestamo,:identidad_usuario)";
            $stmt = $conn->prepare($query);
            $stmt->execute($data);            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
	
    public function create_estado($data)
    {
        try {
            $conn = $this->connect();
            $query = "INSERT INTO estado_prestamo (descr_estado_prestamo, identidad_usuario) 
            VALUES (:descr_estado_prestamo,:identidad_usuario)";
            $stmt = $conn->prepare($query);
            $stmt->execute($data);            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
########## Leer datos en las tablas de la linea prestamo ################
    public function read_prestamo()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM prestamo";
        $stmt = $conn->query($query);
        return $stmt->fetchAll();
    }

    public function read_modalidad($id)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM modalidad_prestamo WHERE identidad_usuario = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':identidad_usuario', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read_linea($id)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM linea_prestamo WHERE identidad_usuario = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':identidad_usuario', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function read_estado($id)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM estado_prestamo WHERE identidad_usuario = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':identidad_usuario', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function read_prestamob($id)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM prestamo WHERE identidad_usuario = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':identidad_usuario', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

########## Eliminar datos en las tablas de la linea prestamo ################

    public function deletePrestamo($id_prestamo)
    {
        try {
            $conn = $this->connect();
            $query = "DELETE FROM prestamo WHERE id_prestamo = :id_prestamo";
            $stmt = $conn->prepare($query);
            $stmt->execute(['id_prestamo' => $id_prestamo]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteEstadoPrestamo($id_estado_prestamo)
    {
        try {
            $conn = $this->connect();
            $query = "DELETE FROM estado_prestamo WHERE id_estado_prestamo = :id_estado_prestamo";
            $stmt = $conn->prepare($query);
            $stmt->execute(['id_estado_prestamo' => $id_estado_prestamo]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteLineaPrestamo($id_linea_prestamo)
    {
        try {
            $conn = $this->connect();
            $query = "DELETE FROM linea_prestamo WHERE id_linea_prestamo = :id_linea_prestamo";
            $stmt = $conn->prepare($query);
            $stmt->execute(['id_linea_prestamo' => $id_linea_prestamo]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteModalidadPrestamo($id_modalidad_prestamo)
    {
        try {
            $conn = $this->connect();
            $query = "DELETE FROM modalidad_prestamo WHERE id_modalidad_prestamo = :id_modalidad_prestamo";
            $stmt = $conn->prepare($query);
            $stmt->execute(['id_modalidad_prestamo' => $id_modalidad_prestamo]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


########## Actualizar datos en las tablas de la linea prestamo ################

    public function updatePrestamo($id_prestamo, $fecha_inicio, $fecha_final, $prestamo_cantidad, $prestamo_valor_total, $prestamo_valor_pagado, $id_estado_prestamo, $identidad_usuario, $tasa_interes, $id_modalidad_prestamo, $id_linea_prestamo)
    {
        try {
            $conn = $this->connect();
            $query = "UPDATE prestamo 
                    SET fecha_inicio = :fecha_inicio, fecha_final = :fecha_final, prestamo_cantidad = :prestamo_cantidad, 
                        prestamo_valor_total = :prestamo_valor_total, prestamo_valor_pagado = :prestamo_valor_pagado, 
                        id_estado_prestamo = :id_estado_prestamo, identidad_usuario = :identidad_usuario, 
                        tasa_interes = :tasa_interes, id_modalidad_prestamo = :id_modalidad_prestamo, 
                        id_linea_prestamo = :id_linea_prestamo 
                    WHERE id_prestamo = :id_prestamo";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                'fecha_inicio' => $fecha_inicio,
                'fecha_final' => $fecha_final,
                'prestamo_cantidad' => $prestamo_cantidad,
                'prestamo_valor_total' => $prestamo_valor_total,
                'prestamo_valor_pagado' => $prestamo_valor_pagado,
                'id_estado_prestamo' => $id_estado_prestamo,
                'identidad_usuario' => $identidad_usuario,
                'tasa_interes' => $tasa_interes,
                'id_modalidad_prestamo' => $id_modalidad_prestamo,
                'id_linea_prestamo' => $id_linea_prestamo,
                'id_prestamo' => $id_prestamo,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function updateEstadoPrestamo($id_estado_prestamo, $descr_estado_prestamo)
    {
        try {
            $conn = $this->connect();
            $query = "UPDATE estado_prestamo SET descr_estado_prestamo = :descr_estado_prestamo WHERE id_estado_prestamo = :id_estado_prestamo";
            $stmt = $conn->prepare($query);
            $stmt->execute(['descr_estado_prestamo' => $descr_estado_prestamo, 'id_estado_prestamo' => $id_estado_prestamo]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function updateLineaPrestamo($id_linea_prestamo, $descr_linea_prestamo)
    {
        try {
            $conn = $this->connect();
            $query = "UPDATE linea_prestamo SET descr_linea_prestamo = :descr_linea_prestamo WHERE id_linea_prestamo = :id_linea_prestamo";
            $stmt = $conn->prepare($query);
            $stmt->execute(['descr_linea_prestamo' => $descr_linea_prestamo, 'id_linea_prestamo' => $id_linea_prestamo]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function updateModalidadPrestamo($id_modalidad_prestamo, $descr_modalidad)
    {
        try {
            $conn = $this->connect();
            $query = "UPDATE modalidad_prestamo SET descr_modalidad = :descr_modalidad WHERE id_modalidad_prestamo = :id_modalidad_prestamo";
            $stmt = $conn->prepare($query);
            $stmt->execute(['descr_modalidad' => $descr_modalidad, 'id_modalidad_prestamo' => $id_modalidad_prestamo]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


#################### InnerJoin para mostrar ambas tablas ##################################

    public function read_prestamo_con_relaciones($identidad_usuario)
    {
        $conn = $this->connect();
        $query = "SELECT p.*, mp.descr_modalidad, lp.descr_linea_prestamo, ep.descr_estado_prestamo 
                FROM prestamo p
                INNER JOIN modalidad_prestamo mp ON p.id_modalidad_prestamo = mp.id_modalidad_prestamo
                INNER JOIN linea_prestamo lp ON p.id_linea_prestamo = lp.id_linea_prestamo
                INNER JOIN estado_prestamo ep ON p.id_estado_prestamo = ep.id_estado_prestamo
                WHERE p.identidad_usuario = :identidad_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':identidad_usuario', $identidad_usuario, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}


?>
