<?php
require_once('../sistema.class.php');

class Producto extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into productos(producto,imagen,precio)values(
                :producto,
                :imagen,
                :precio);";
        $insertar = $this->con->prepare($sql);
        $fotografia = $this->uploadFoto();
        $insertar->bindParam(':producto', $data['producto'], PDO::PARAM_STR);
        $insertar->bindParam(':imagen', $fotografia, PDO::PARAM_STR);
        $insertar->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $this->conexion();
        $result = [];
        $tmp = "";
        if ($_FILES['imagen']['error'] != 4) {
            $fotografia = $this->uploadFoto();
            $tmp = "imagen=:imagen,";
        }
        $sql = 'update productos set 
                                    producto=:producto,
                                    ' . $tmp . '
                                    precio=:precio
                                    where id_producto=:id_producto;
                                     ';
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_producto', $id, PDO::PARAM_INT);
        $modificar->bindParam(':producto', $data['producto'], PDO::PARAM_STR);
        if ($_FILES['imagen']['error'] != 4) {
            $modificar->bindParam(':imagen', $fotografia, PDO::PARAM_STR);
        }
        $modificar->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
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
    function uploadFoto()
    {
        $tipos = array("image/jpeg", "image/png", "image/gif");
        $data = $_FILES['imagen'];
        $default = "default.png";
        if ($data['error'] == 0) {
            if ($data['size'] <= 1048576) {
                if (in_array($data['type'], $tipos)) {
                    $n = rand(1, 1000000);
                    $nombre = explode('.', $data['name']);
                    $imagen = md5($n . $nombre[0]) . "." . $nombre[sizeof($nombre) - 1];
                    $origen = $data['tmp_name'];
                    $destino = "C:\\wamp64\\www\\carwash\\uploads\\" . $imagen;
                    if (move_uploaded_file($origen, $destino)) {
                        return $imagen;
                    }
                    return $default;
                }
            }
        }
        return $default;
    }
}