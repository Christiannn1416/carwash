<?php
require_once('../sistema.class.php');

class Cliente extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into clientes(cliente,telefono,correo) values
                                    (:cliente,
                                    :telefono,
                                    :correo);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':cliente', $data['cliente'], PDO::PARAM_STR);
        $insertar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $insertar->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
        $sql = "update clientes set cliente=:cliente,
                                    telefono=:telefono,
                                    correo=:correo where id_cliente=:id_cliente;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':cliente', $data['cliente'], PDO::PARAM_STR);
        $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $modificar->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "delete from clientes where id_cliente = :id_cliente";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_cliente', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($id)
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM clientes where id_cliente = :id_cliente;";
        $sql = $this->con->prepare($query);
        $sql->bindParam(":id_cliente", $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll()
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM clientes";
        $sql = $this->con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>