<?php
require_once('../sistema.class.php');

class Servicio extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into servicios(servicio,descripcion,p_ubertaxi,p_carro,p_camioneta,p_van,imagen) 
                                    values (:servicio,
                                     :descripcion,
                                     :p_ubertaxi,
                                     :p_carro,
                                     :p_camioneta,
                                     :p_van,
                                     :imagen)";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':servicio', $data['servicio'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $insertar->bindParam(':p_ubertaxi', $data['p_ubertaxi'], PDO::PARAM_INT);
        $insertar->bindParam(':p_carro', $data['p_carro'], PDO::PARAM_INT);
        $insertar->bindParam(':p_camioneta', $data['p_camioneta'], PDO::PARAM_INT);
        $insertar->bindParam(':p_van', $data['p_van'], PDO::PARAM_INT);
        $insertar->bindParam(':imagen', $data['imagen'], PDO::PARAM_STR);
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
                                     p_ubertaxi=:p_ubertaxi,
                                     p_carro=:p_carro,
                                     p_camioneta=:p_camioneta,
                                     p_van=:p_van,
                                     imagen=:imagen 
                                     where id_servicio=:id_servicio";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':id_servicio', $id, PDO::PARAM_INT);
        $insertar->bindParam(':servicio', $data['servicio'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $insertar->bindParam(':p_ubertaxi', $data['p_ubertaxi'], PDO::PARAM_INT);
        $insertar->bindParam(':p_carro', $data['p_carro'], PDO::PARAM_INT);
        $insertar->bindParam(':p_camioneta', $data['p_camioneta'], PDO::PARAM_INT);
        $insertar->bindParam(':p_van', $data['p_van'], PDO::PARAM_INT);
        $insertar->bindParam(':imagen', $data['imagen'], PDO::PARAM_STR);
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