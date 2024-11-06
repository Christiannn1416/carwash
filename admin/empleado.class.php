<?php
require_once('../sistema.class.php');

class Empleado extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "insert into empleados(empleado, telefono, fotografia, id_usuario)values(
                                    :empleado,
                                    :telefono,
                                    :fotografia,
                                    :id_usuario);";
        $insertar = $this->con->prepare($sql);
        $fotografia = $this->uploadFoto();
        $insertar->bindParam(':empleado', $data['empleado'], PDO::PARAM_STR);
        $insertar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $insertar->bindParam(':fotografia', $fotografia, PDO::PARAM_STR);
        $insertar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $this->conexion();
        $result = [];
        $tmp = "";
        if ($_FILES['fotografia']['error'] != 4) {
            $fotografia = $this->uploadFoto();
            $tmp = "fotografia=:fotografia,";
        }
        $sql = 'update empleados set empleado=:empleado,
                                     telefono=:telefono,
                                     ' . $tmp . '
                                     id_usuario=:id_usuario
                                     where id_empleado=:id_empleado';
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':empleado', $data['empleado'], PDO::PARAM_STR);
        $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        if ($_FILES['fotografia']['error'] != 4) {
            $modificar->bindParam(':fotografia', $fotografia, PDO::PARAM_STR);
        }
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $modificar->bindParam(':id_empleado', $id, PDO::PARAM_INT);
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

    function uploadFoto()
    {
        $tipos = array("image/jpeg", "image/png", "image/gif");
        $data = $_FILES['fotografia'];
        $default = "default.png";
        if ($data['error'] == 0) {
            if ($data['size'] <= 1048576) {
                if (in_array($data['type'], $tipos)) {
                    $n = rand(1, 1000000);
                    $nombre = explode('.', $data['name']);
                    $imagen = md5($n . $nombre[0]) . "." . $nombre[sizeof($nombre) - 1];
                    $origen = $data['tmp_name'];
                    $destino = "C:\\wamp64\\www\\crops\\uploads\\" . $imagen;
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
?>