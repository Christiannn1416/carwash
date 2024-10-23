<?php
require_once('../sistema.class.php');
class Usuario extends Sistema
{
    function create($data)
    {
        $this->conexion();
        $rol = $data['rol'];
        $data = $data['data'];
        $this->con->beginTransaction();
        try {
            $sql = "insert into usuario (usuario, contrasena) values (:usuario, :contrasena)";
            $insertar = $this->con->prepare($sql);
            $data['contrasena'] = md5($data['contrasena']);
            $insertar->bindParam(':usuario', $data['usuario'], PDO::PARAM_STR);
            $insertar->bindParam(':contrasena', $data['contrasena'], PDO::PARAM_STR);
            $insertar->execute();
            $sql = "select id_usuario from usuario where usuario=:usuario;";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(':usuario', $data['usuario'], PDO::PARAM_STR);
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            $id_usuario = isset($datos['id_usuario']) ? $datos['id_usuario'] : null;
            if (!is_null(($id_usuario))) {
                foreach ($rol as $r => $k) {
                    $sql = "insert into usuario_rol(id_usuario,id_rol)
                            values(
                            :id_usuario,
                            :id_rol);";
                    $insertar_rol = $this->con->prepare($sql);
                    $insertar_rol->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
                    $insertar_rol->bindParam(':id_rol', $r, PDO::PARAM_STR);
                    $insertar_rol->execute();
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
        $sql = "update usuario set correo = :correo, contrasena = :contrasena where id_usuario = :id_usuario";
        $modificar = $this->con->prepare($sql);
        $data['contrasena'] = md5($data['contrasena']); // Encriptar la contraseña con MD5
        $modificar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $modificar->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $modificar->bindParam(':contrasena', $data['contrasena'], PDO::PARAM_STR);
        $modificar->execute();
        return $modificar->rowCount();
    }
    function delete($id)
    {
        $this->conexion();
        $sql = "delete from usuario where id_usuario = :id_usuario";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $borrar->execute();
        return $borrar->rowCount();
    }
    function readOne($id)
    {
        $this->conexion();
        $sql = "select * from usuario where id_usuario = :id_usuario";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    function readAll()
    {
        $this->conexion();
        $sql = "select * from usuario";
        $consulta = $this->con->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    function readAllRoles($id)
    {
        $this->conexion();
        $sql = "select u.*,r.rol from usuario u join usuario_rol ur on u.id_usuario=ur.id_usuario
                join rol r on ur.id_rol=r.id_rol where u.id_usuario=:id_usuario;";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>