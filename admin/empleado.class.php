<?php
require_once('../sistema.class.php');

class Empleado extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into empleados(empleado,telefono,foto)values(
                                    :empleado,
                                    :telefono,
                                    :foto,
                                    id_usuario);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':empleado', $data['empleado'], PDO::PARAM_STR);
        $insertar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $insertar->bindParam(':foto', $data['foto'], PDO::PARAM_STR);
        $insertar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $this->conexion();
        $result = [];
        $sql = "update empleados set empleado=:empleado,
                                    telefono=:telefono,
                                    foto=:foto,
                                    id_usuario=:id_usuario
                                    where id_empleado=:id_empleado;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_empleado', $id, PDO::PARAM_STR);
        $modificar->bindParam(':empleado', $data['empleado'], PDO::PARAM_STR);
        $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_INT);
        $modificar->bindParam(':foto', $data['foto'], PDO::PARAM_STR);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "delete from empleados where id_empleado = :id_empleado";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_empleado', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($id)
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM empleados where id_empleado = :id_empleado;";
        $sql = $this->con->prepare($query);
        $sql->bindParam(":id_empleado", $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll()
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM empleados";
        $sql = $this->con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>