<?php
require_once('../sistema.class.php');

class Lavado extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into lavados(id_cliente,id_servicio,marca_vehiculo,color,placas)
                                    values(:id_cliente,
                                            :id_servicio,
                                            :marca_vehiculo,
                                            :color,
                                            :placas);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
        $insertar->bindParam(':id_servicio', $data['id_servicio'], PDO::PARAM_INT);
        $insertar->bindParam(':marca_vehiculo', $data['marca_vehiculo'], PDO::PARAM_STR);
        $insertar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $insertar->bindParam(':placas', $data['placas'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "delete from lavados where id_lavado = :id_lavado";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_lavado', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($id)
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM lavados where id_lavado = :id_lavado;";
        $sql = $this->con->prepare($query);
        $sql->bindParam(":id_lavado", $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll()
    {
        $this->conexion();
        $result = [];
        $query = "select l.*,e.empleado,s.servicio,c.cliente
                    from lavados l join asignaciones a on l.id_lavado = a.id_lavado join empleados e on a.id_empleado = e.id_empleado
                    join servicios s on l.id_servicio = s.id_servicio
                    join clientes c on l.id_cliente = c.id_cliente;";
        $sql = $this->con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>