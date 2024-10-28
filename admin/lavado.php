<?php
require_once('lavado.class.php');
require_once('cliente.class.php');
require_once('servicio.class.php');
require_once('empleado.class.php');
require_once('producto.class.php');
$app = new Lavado();
$appcliente = new Cliente();
$appservicio = new Servicio();
$appempleado = new Empleado();
$appproducto = new Producto();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;

$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'crear':
        $clientes = $appcliente->readAll();
        $servicios = $appservicio->readAll();
        $empleados = $appempleado->readAll();
        $productos = $appproducto->readAll();
        require_once("views/lavado/crear.php");
        break;
    case 'crear_cliente_lavado':
        $clientes = $appcliente->readAll();
        $servicios = $appservicio->readAll();
        $empleados = $appempleado->readAll();
        $productos = $appproducto->readAll();
        require_once("views/lavado/crear_cliente_lavado.php");
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El lavado se ha agregado correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar";
            $tipo = "danger";
        }
        $lavados = $app->readAll();
        require_once('views/lavado/index.php');
        break;
    case 'actualizar':
        $lavados = $app->readOne($id);
        require_once('views/lavado/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El lavado se ha actualizado correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al actualizar";
            $tipo = "danger";
        }
        $lavados = $app->readAll();
        require_once('views/lavado/index.php');
        break;
    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "El lavado se ha eliminado correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error";
                    $tipo = "danger";
                }
            }
        }
        $lavados = $app->readAll();
        require_once("views/lavado/index.php");
        break;
    default:
        $lavados = $app->readAll();
        require_once("views/lavado/index.php");
}
?>