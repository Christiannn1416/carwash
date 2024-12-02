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
        $misproductos = $app->readAllProductos($id);
        require_once("views/lavado/crear.php");
        break;
    case 'crear_cliente_lavado':
        $clientes = $appcliente->readAll();
        $servicios = $appservicio->readAll();
        $empleados = $appempleado->readAll();
        $productos = $appproducto->readAll();
        require_once("views/lavado/crear_cliente_lavado.php");
        break;
    case 'resumen':
        $resumen = $app->resumen();
        $_SESSION['resumen'] = $resumen;
        $id_lavado = $resumen['id_lavado'];
        $id_cliente = $resumen['id_cliente'];
        $cliente = $resumen['cliente'];
        $marca_vehiculo = $resumen['marca_vehiculo'];
        $color = $resumen['color'];
        $placas = $resumen['placas'];
        $id_servicio = $resumen['id_servicio'];
        $servicio = $resumen['servicio'];
        $precio_servicio = $resumen['precio_servicio'];
        $id_empleado = $resumen['id_empleado'];
        $empleado = $resumen['empleado'];
        $prod_select = $resumen['productos'];
        $correo_usuario = $resumen['correo'];
        require_once("views/lavado/resumen.php");
        break;

    case 'resumen_editar':
        $resumen = $app->resumen();
        $_SESSION['resumen'] = $resumen;
        $id_lavado = $resumen['id_lavado'];
        $id_cliente = $resumen['id_cliente'];
        $cliente = $resumen['cliente'];
        $marca_vehiculo = $resumen['marca_vehiculo'];
        $color = $resumen['color'];
        $placas = $resumen['placas'];
        $id_servicio = $resumen['id_servicio'];
        $servicio = $resumen['servicio'];
        $precio_servicio = $resumen['precio_servicio'];
        $id_empleado = $resumen['id_empleado'];
        $empleado = $resumen['empleado'];
        $prod_select = $resumen['productos'];
        $correo_usuario = $resumen['correo'];
        require_once("views/lavado/resumen.php");
        break;

    case 'nuevo':
        if (isset($_SESSION['resumen'])) {
            $data = $_SESSION['resumen'];

        } else {
            $data = $_POST;
        }
        if (isset($data['correo'])) {

            $data['correo'] = $data['correo'];
        } else {

            $data['correo'] = 'No disponible';
        }
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El lavado se ha agregado correctamente";
            $tipo = "success";
            $app->ticket();
            $app->mandar_ticket($data['correo'], 'Ticket de servicio', 'Le proporcionamos su ticket.', '../tickets/reporte_lavado' . $data['id_lavado'] . '.pdf');

        } else {
            $mensaje = "Ocurrió un error al agregar";
            $tipo = "danger";
        }
        $lavados = $app->readAll();
        require_once('views/lavado/index.php');
        break;

    case 'actualizar':
        $lavados = $app->readOne($id);
        $clientes = $appcliente->readAll();
        $servicios = $appservicio->readAll();
        $empleados = $appempleado->readAll();
        $productos = $appproducto->readAll();
        $misproductos = $app->readAllProductos($id);
        require_once('views/lavado/crear.php');
        break;

    case 'modificar':
        if (isset($_SESSION['resumen'])) {
            $data = $_SESSION['resumen'];
        } else {
            $data = $_POST;
        }

        if (isset($data['correo'])) {
            $data['correo'] = $data['correo'];
        } else {

            $data['correo'] = 'No disponible';
        }
        if (isset($data['correo'])) {

            $data['correo'] = $data['correo'];
        } else {

            $data['correo'] = 'No disponible';
        }
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El lavado se ha actualizado correctamente";
            $tipo = "success";
            $app->ticket();
            $app->mandar_ticket($data['correo'], 'Ticket de servicio', 'Le proporcionamos su ticket Corregido.', '../tickets/reporte_lavado' . $data['id_lavado'] . '.pdf');
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
    case 'cambiarestado':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->cambiarEstado($id);
                if ($resultado) {
                    $mensaje = "El Estado se ha cambiado a Terminado";
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

    case 'verticket':
        if (!is_numeric($id)) {
            echo "ID de ticket inválido.";
            return;
        }

        $archivo = '../tickets/reporte_lavado' . $id . '.pdf';

        if (file_exists($archivo)) {
            // Enviar encabezados para abrir el PDF en el navegador
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($archivo) . '"');
            header('Content-Length: ' . filesize($archivo));
            readfile($archivo);
            exit;
        } else {
            echo "El ticket no existe o no se encuentra disponible.";
        }
        break;
    default:
        $lavados = $app->readAll();
        require_once("views/lavado/index.php");

}
?>