<?php
require_once('cliente.class.php');
$app = new Cliente();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;

$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'crear':
        require_once("views/cliente/crear.php");
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado == 1) {
            $mensaje = "Una disculpa, el correo electrónico ya ha sido registrado";
            $tipo = "warning";
        } elseif ($resultado == 2) {
            $mensaje = "Ocurrió un error al agregar";
            $tipo = "danger";
        } else {
            $mensaje = "El Cliente se ha agregado correctamente";
            $tipo = "success";
        }
        $clientes = $app->readAll();
        require_once('views/cliente/index.php');
        break;
    case 'nuevo_cliente_lavado':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El cliente se ha agregado correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar";
            $tipo = "danger";
        }
        header("Location: /carwash/admin/lavado.php?accion=crear");
        exit();
        break;
    case 'actualizar':
        $clientes = $app->readOne($id);
        require_once('views/cliente/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El cliente se ha actualizado correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al actualizar";
            $tipo = "danger";
        }
        $clientes = $app->readAll();
        require_once('views/cliente/index.php');
        break;
    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "El cliente se ha eliminado correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error";
                    $tipo = "danger";
                }
            }
        }
        $clientes = $app->readAll();
        require_once("views/cliente/index.php");
        break;
    default:
        $clientes = $app->readAll();
        require_once("views/cliente/index.php");
}
?>