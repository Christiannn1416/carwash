<?php
require('views/header.php');
require_once('../sistema.class.php');

$app = new Sistema();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;

switch ($accion) {
    case 'login':
        $usuario = $_POST['data']['usuario'];
        $contrasena = $_POST['data']['contrasena'];
        if ($app->login($usuario, $contrasena)) {
            $mensaje = "Bienvenido al Sistema";
            $tipo = "success";
            $app->checkRol('administrador');
            require_once('views/header.php');
            $app->alert($tipo, $mensaje);
        } else {
            $mensaje = "Usuario o contraseña equivocado <a href='login.php'>[Presione aquí para volver a intentar]</a>";
            $tipo = "danger";
            require_once('views/header.php');
            $app->alert($tipo, $mensaje);

        }
        break;
    case 'logout':
        $app->logout();
        break;

    default:
        include('views/login/index.php');
        break;
}
require_once('views/footer.php')

    ?>