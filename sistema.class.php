<?php
include('config.class.php');
class Sistema
{
    var $con;
    function conexion()
    {
        $this->con = new PDO(SGBD . ':host=' . DBHOST . ';dbname=' . DBNAME . ';port=' . DBPORT, DBUSER, DBPASS);
    }
    function alert($tipo, $mensaje)
    {
        include('views/alert.php');
    }
    function getRol($usuario)
    {
        $this->conexion();
        $data = [];
        if (filter_var($usuario)) {
            $sql = "select r.rol
                    from usuario u join usuario_rol ur on u.id_usuario = ur.id_usuario
                    join rol r on ur.id_rol = r.id_rol where u.usuario=:usuario;";
            $roles = $this->con->prepare($sql);
            $roles->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $roles->execute();
            $data = $roles->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    function getPrivilegio($usuario)
    {
        $this->conexion();
        $data = [];
        if (filter_var($usuario)) {
            $sql = "select p.permiso
                    from usuario u join usuario_rol ur on u.id_usuario = ur.id_usuario
                    join rol r on ur.id_rol = r.id_rol
                    join rol_permiso rp on r.id_rol = rp.id_rol
                    join permiso p on rp.id_permiso = p.id_permiso where u.usuario =:usuario;";
            $privilegio = $this->con->prepare($sql);
            $privilegio->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $privilegio->execute();
            $data = $privilegio->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
?>