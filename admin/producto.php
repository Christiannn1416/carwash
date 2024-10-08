<?php
require_once('producto.class.php');
$app = new Producto();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;

$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'crear':
        require_once("views/producto/crear.php");
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El producto se ha agregado correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al agregar";
            $tipo = "danger";
        }
        $productos = $app->readAll();
        require_once('views/producto/index.php');
        break;
    case 'actualizar':
        $productos = $app->readOne($id);
        require_once('views/producto/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El producto se ha actualizado correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Ocurrió un error al actualizar";
            $tipo = "danger";
        }
        $productos = $app->readAll();
        require_once('views/producto/index.php');
        break;
    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "El producto se ha eliminado correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error";
                    $tipo = "danger";
                }
            }
        }
        $productos = $app->readAll();
        require_once("views/producto/index.php");
        break;
    default:
        $productos = $app->readAll();
        require_once("views/producto/index.php");

}
?>