<?php
header("Content-type: application/json; charset=utf-8");
require_once('servicio.class.php');
$app = new Servicio();
// $accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$accion = $_SERVER['REQUEST_METHOD'];
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

$data = [];
switch ($accion) {
    case 'POST':
        $datos = $_POST;
        if (!is_null($id) && is_numeric($id)) {
            $resultado = $app->update($id, $datos);
        } else {
            $resultado = $app->create($datos);
        }
        if ($resultado == 1) {
            $data['mensaje'] = "El servicio se ha agregado correctamente";
        } else {
            $data['mensaje'] = "Ocurrió un error al agregar";
        }
        break;
    case 'DELETE':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "El servicio se ha eliminado correctamente";
                } else {
                    $mensaje = "Ocurrió un error";
                }
                $data['mensaje'] = $mensaje;
            }
        }

        break;
    default:
        if (!is_null($id) && is_numeric($id)) {
            $servicios = $app->readOne($id);
            $data = $servicios;
        } else
            $servicios = $app->readAll();
        $data = $servicios;
}
echo (json_encode($data));
?>