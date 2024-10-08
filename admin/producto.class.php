<?php
require_once('../sistema.class.php');

class Producto extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into productos(producto,descripcion,imagen,precio,stock)values(
                :producto,
                :descripcion,
                :imagen,
                :precio,
                :stock);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':producto', $data['producto'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $insertar->bindParam(':imagen', $data['imagen'], PDO::PARAM_STR);
        $insertar->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
        $insertar->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $this->conexion();
        $result = [];
        $sql = "update productos set 
                                    producto=:producto,
                                    descripcion=:descripcion,
                                    imagen=:imagen,
                                    precio=:precio,
                                    stock=:stock
                                    where id_producto=:id_producto;
                                     ";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_producto', $id, PDO::PARAM_INT);
        $modificar->bindParam(':producto', $data['producto'], PDO::PARAM_STR);
        $modificar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $modificar->bindParam(':imagen', $data['imagen'], PDO::PARAM_STR);
        $modificar->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
        $modificar->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "delete from productos where id_producto = :id_producto";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_producto', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($id)
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM productos where id_producto = :id_producto;";
        $sql = $this->con->prepare($query);
        $sql->bindParam(":id_producto", $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll()
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM productos";
        $sql = $this->con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>