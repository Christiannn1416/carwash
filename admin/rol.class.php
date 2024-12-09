<?php
require_once('../sistema.class.php');
class Rol extends Sistema
{
    function create($data)
    {
        $this->conexion();
        $permiso = $data['permiso'];
        $data = $data['data'];
        $this->con->beginTransaction();
        try {
            $sql = "insert into rol (rol) VALUES (:rol)";
            $insertar = $this->con->prepare($sql);
            $insertar->bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $insertar->execute();

            $sql = "select id_rol from rol where rol=:rol;";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            $id_rol = isset($datos['id_rol']) ? $datos['id_rol'] : null;
            if (!is_null($id_rol)) {
                foreach ($permiso as $p => $k) {
                    $sql = "insert into rol_permiso
                (id_rol,id_permiso)
                        values(
                        :id_rol,
                        :id_permiso
                        );";
                    $insertar_permiso = $this->con->prepare($sql);
                    $insertar_permiso->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
                    $insertar_permiso->bindParam(':id_permiso', $p, PDO::PARAM_INT);
                    $insertar_permiso->execute();
                }
                $this->con->commit();
                return $insertar->rowCount();
            }
        } catch (Exception $e) {
            $this->con->rollBack();
        }
        return false;
    }
    function update($id, $data)
    {
        $this->conexion();
        $permiso = $data['permiso'];
        $data = $data['data'];
        $this->con->beginTransaction();
        try {
            $sql = "update rol set rol = :rol where id_rol=:id_rol";
            $modificar = $this->con->prepare($sql);
            $modificar->bindParam(':id_rol', $id, PDO::PARAM_INT);
            $modificar->bindParam(':rol', $data['rol'], PDO::PARAM_STR);
            $modificar->execute();

            $sql = "delete from rol_permiso where id_rol=:id_rol;";
            $borrar_permiso = $this->con->prepare($sql);
            $borrar_permiso->bindParam(':id_rol', $id, PDO::PARAM_INT);
            $borrar_permiso->execute();
            if (!is_null($id)) {
                foreach ($permiso as $p => $k) {
                    $sql = "insert into rol_permiso
                (id_rol,id_permiso)
                        values(
                        :id_rol,
                        :id_permiso
                        );";
                    $insertar_permiso = $this->con->prepare($sql);
                    $insertar_permiso->bindParam(':id_rol', $id, PDO::PARAM_INT);
                    $insertar_permiso->bindParam(':id_permiso', $p, PDO::PARAM_INT);
                    $insertar_permiso->execute();
                }
                $this->con->commit();
                return $insertar_permiso->rowCount();
            }
        } catch (Exception $e) {
            $this->con->rollBack();
        }
        return false;
    }
    function delete($id)
    {
        $this->conexion();
        $sql = "delete from rol where id_rol=:id_rol";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_rol', $id, PDO::PARAM_INT);
        $borrar->execute();
        return $borrar->rowCount();
    }
    function readOne($id)
    {
        $this->conexion();
        $sql = "select * from rol where id_rol=:id_rol";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_rol', $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    function readAll()
    {
        $this->conexion();
        $sql = "select * from rol";
        $consulta = $this->con->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    function readlAllPermisos($id)
    {
        $this->conexion();
        $sql = "select distinct p.id_permiso from permiso p join rol_permiso rp on p.id_permiso = rp.id_permiso
        join rol r on rp.id_rol = r.id_rol where r.id_rol=:id_rol;";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_rol', $id, PDO::PARAM_INT);
        $consulta->execute();
        $permisos = [];
        $permisos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($permisos as $permiso) {
            array_push($data, $permiso['id_permiso']);
        }
        return $data;
    }
}
?>