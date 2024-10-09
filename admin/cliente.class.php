<?php
require_once('../sistema.class.php');

class Cliente extends Sistema
{
    function create($data)
    {


    }

    function update($id, $data)
    {

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