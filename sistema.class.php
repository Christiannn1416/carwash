<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
session_start();
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
            $roles = [];
            foreach ($data as $rol) {
                array_push($roles, $rol['rol']);
            }
            $data = $roles;
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
            $permisos = [];
            foreach ($data as $permiso) {
                array_push($permisos, $permiso['permiso']);
            }
            $data = $permisos;
        }
        return $data;
    }
    function login($usuario, $contrasena)
    {
        $contrasena = md5($contrasena);
        $acceso = false;
        if (filter_var($usuario)) {
            $this->conexion();
            $sql = "select * from usuario where usuario=:usuario and contrasena=:contrasena;";
            $sql = $this->con->prepare($sql);
            $sql->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $sql->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (isset($resultado[0])) {
                $acceso = true;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['validado'] = $acceso;
                $roles = $this->getRol($usuario);
                $privilegios = $this->getPrivilegio($usuario);
                $_SESSION['roles'] = $roles;
                $_SESSION['privilegios'] = $privilegios;
                return $acceso;
            }
        }
        $_SESSION['validado'] = false;
        return $acceso;
    }

    function logout()
    {
        unset($_SESSION);
        session_destroy();
        $mensaje = "Sesión cerrada <a href='login.php'>[Presione aquí para volver a entrar]<a/>";
        $tipo = "succes";
        require_once('views/header.php');
        $this->alert($tipo, $mensaje);
        require_once('views/footer.php');
    }

    function checkRol($rolesPermitidos)
    {
        if (isset($_SESSION['roles'])) {
            $roles = $_SESSION['roles'];
            if (!array_intersect((array) $rolesPermitidos, $roles)) {
                $mensaje = "ERROR: usted no tiene el rol adecuado";
                $tipo = "danger";
                require_once('views/header.php');
                $this->alert($tipo, $mensaje);
                die();
            }
        } else {
            $mensaje = "Requiere iniciar sesión <a href='login.php'>[Presione aquí para iniciar sesión]</a>";
            $tipo = "danger";
            require_once('views/header.php');
            $this->alert($tipo, $mensaje);
            die();
        }
    }

    function sendMail($destinatario, $asunto, $mensaje)
    {
        require 'vendor/autoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = '20030435@itcelaya.edu.mx';
        $mail->Password = 'iqrxjrzieqtrteph';
        $mail->setFrom('20030435@itcelaya.edu.mx', 'Christian Muñoz');
        $mail->addAddress($destinatario, 'Sistema CarWash');
        $mail->Subject = $asunto;
        $mail->msgHTML($mensaje);
        $mail->addAttachment('images/phpmailer_mini.png');
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }
}
?>