<?php
require_once('canjear.class.php');
require_once('recompensa.class.php');
require_once('cliente.class.php');
require_once('lavado.class.php');
$app = new Canjear();
$appcliente = new Cliente();
$applavado = new Lavado();
$apprecompensa = new Recompensa();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;

$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'canjear':
        $acumulado = $applavado->readAcumulado($id);
        $cliente = $appcliente->readOne($id);
        $canjeadas = $app->check_canjeo($id);
        $recompensas = $apprecompensa->readAll();
        require_once("views/recompensa/canjeo_cliente.php");
        break;
    case 'guardar_canjeo':
        $data = $_POST['data'];
        $resultado = $app->canjear($data);
        if ($resultado) {
            $mensaje = "Se ha canjeado con éxito";
            $tipo = "success";
        } else {
            $mensaje = "Ha ocurrido un error";
            $tipo = "danger";
        }
        $clientes = $appcliente->readAll();
        require_once("views/recompensa/canjeo.php");
        break;
    default:
        $clientes = $appcliente->readAll();
        require_once("views/recompensa/canjeo.php");

}
?>