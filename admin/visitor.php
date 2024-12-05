<?php
require_once('visitor.class.php');
require_once('cliente.class.php');
require_once('servicio.class.php');
require_once('producto.class.php');
require_once('recompensa.class.php');
$appservicio = new Servicio();
$appcliente = new Cliente();
$appproducto = new Producto();
$apprecompensa = new Recompensa();
$app = new Visitor();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'nuevo_registro':
        $data = $_POST['data'];
        $resultado = $appcliente->create($data);
        if ($resultado == 3) {
            $mensaje = "Una disculpa, el correo electrónico ya ha sido registrado.";
            $tipo = "warning";
        } elseif ($resultado == 2) {
            $mensaje = "Ocurrió un error al registrarse, intenta de nuevo.";
            $tipo = "danger";
        } else {
            $mensaje = "Te has registrado correctamente, revisa tu correo electrónico.";
            $tipo = "success";
        }
        $servicios = $appservicio->readAll();
        $productos = $appproducto->readAll();
        $recompensas = $apprecompensa->readAll();
        require_once('views/visitante/index.php');
        break;
    default:
        $servicios = $appservicio->readAll();
        $productos = $appproducto->readAll();
        $recompensas = $apprecompensa->readAll();

        require_once("views/visitante/index.php");

}
?>