<?php
require_once('../sistema.class.php');

class Canjear extends Sistema
{
    function canjear($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into cliente_recompensa(id_cliente, id_recompensa) 
        values (:id_cliente, :id_recompensa)";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
        $insertar->bindParam(':id_recompensa', $data['id_recompensa'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function check_canjeo($id)
    {
        $this->conexion();
        $sql = "SELECT id_recompensa FROM cliente_recompensa WHERE id_cliente = :id_cliente;";
        $buscar = $this->con->prepare($sql);
        $buscar->bindParam('id_cliente', $id, PDO::PARAM_INT);
        $buscar->execute();
        $result = $buscar->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }

}