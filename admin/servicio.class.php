<?php
require_once('../sistema.class.php');

class Servicio extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into servicios(servicio,descripcion,precio) 
                                    values (:servicio,
                                     :descripcion,
                                     :precio)";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':servicio', $data['servicio'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $insertar->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $this->conexion();
        $result = [];
        $sql = "update servicios set servicio=:servicio,
                                     descripcion=:descripcion,
                                     precio=:precio
                                     where id_servicio=:id_servicio";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':id_servicio', $id, PDO::PARAM_INT);
        $insertar->bindParam(':servicio', $data['servicio'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $insertar->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;

    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "delete from servicios where id_servicio = :id_servicio";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_servicio', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($id)
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM servicios where id_servicio = :id_servicio;";
        $sql = $this->con->prepare($query);
        $sql->bindParam(":id_servicio", $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll()
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM servicios";
        $sql = $this->con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>