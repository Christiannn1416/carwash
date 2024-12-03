<?php
require_once('../sistema.class.php');

class Canjear extends Sistema
{
    function canjear($id_cliente, $id_recompensa)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into cliente_recompensa(id_cliente, id_recompensa) 
        values (:id_cliente, :id_recompensa)";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $insertar->bindParam(':id_recompensa', $id_recompensa, PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }


}