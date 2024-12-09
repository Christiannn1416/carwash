<?php
require_once('../sistema.class.php');
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lavado extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        // Recuperamos los datos directamente de la sesión
        if (isset($_SESSION['resumen'])) {
            $data = $_SESSION['resumen'];  // Usamos los datos del resumen guardados en sesión
        }
        // Verificamos si hay productos seleccionados
        $producto = isset($data['productos']) ? $data['productos'] : [];
        $sql = "insert into lavados(id_cliente,id_servicio,id_empleado,marca_vehiculo,color,placas)
                                    values(:id_cliente,
                                            :id_servicio,
                                            :id_empleado,
                                            :marca_vehiculo,
                                            :color,
                                            :placas);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
        $insertar->bindParam(':id_servicio', $data['id_servicio'], PDO::PARAM_INT);
        $insertar->bindParam(':id_empleado', $data['id_empleado'], PDO::PARAM_INT);
        $insertar->bindParam(':marca_vehiculo', $data['marca_vehiculo'], PDO::PARAM_STR);
        $insertar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $insertar->bindParam(':placas', $data['placas'], PDO::PARAM_STR);
        $insertar->execute();

        $sql_correo = "select correo from clientes where id_cliente = :id_cliente;";
        $buscar_correo = $this->con->prepare($sql_correo);
        $buscar_correo->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $buscar_correo->execute();
        $correo_usuario = $buscar_correo->fetch(PDO::FETCH_ASSOC);

        $id_lavado = $data['id_lavado'];
        if (!empty($id_lavado)) {
            // Inserción en la tabla `lavadoproductos`
            $sql_product = "INSERT INTO lavadoproductos (id_lavado, id_producto, cantidad)
                        VALUES (:id_lavado, :id_producto, :cantidad)";
            $insertar_product = $this->con->prepare($sql_product);

            foreach ($producto as $prod) {
                if (!empty($prod['id_producto']) && !empty($prod['cantidad'])) {
                    $insertar_product->bindParam(':id_lavado', $id_lavado, PDO::PARAM_INT);
                    $insertar_product->bindParam(':id_producto', $prod['id_producto'], PDO::PARAM_INT);
                    $insertar_product->bindParam(':cantidad', $prod['cantidad'], PDO::PARAM_INT);
                    $insertar_product->execute();
                }
            }
        }
        return $insertar->rowCount();
    }

    function update($id, $data): int
    {
        $this->conexion();

        // Actualizar la tabla 'lavados'
        $sql = "UPDATE lavados SET id_cliente = :id_cliente,
                                id_servicio = :id_servicio,
                                id_empleado = :id_empleado,
                                marca_vehiculo = :marca_vehiculo,
                                color = :color,
                                placas = :placas
                                WHERE id_lavado = :id_lavado";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
        $modificar->bindParam(':id_servicio', $data['id_servicio'], PDO::PARAM_INT);
        $modificar->bindParam(':id_empleado', $data['id_empleado'], PDO::PARAM_INT);
        $modificar->bindParam(':marca_vehiculo', $data['marca_vehiculo'], PDO::PARAM_STR);
        $modificar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $modificar->bindParam(':placas', $data['placas'], PDO::PARAM_STR);
        $modificar->bindParam(':id_lavado', $id, PDO::PARAM_INT);
        $modificar->execute();

        // Contar las filas afectadas por el UPDATE
        $filas_afectadas = $modificar->rowCount();

        // Eliminar productos relacionados
        $sql2 = "DELETE FROM lavadoproductos WHERE id_lavado = :id_lavado";
        $borrar_p = $this->con->prepare($sql2);
        $borrar_p->bindParam(':id_lavado', $id, PDO::PARAM_INT);
        $borrar_p->execute();

        // Insertar productos actualizados
        $productos = $data['productos'] ?? [];
        if (!empty($productos)) {
            $sql_product = "INSERT INTO lavadoproductos (id_lavado, id_producto, cantidad)
                        VALUES (:id_lavado, :id_producto, :cantidad)";
            $insertar_product = $this->con->prepare($sql_product);

            foreach ($productos as $id_producto => $prod) {
                // Verificar que la cantidad esté definida y no vacía
                if (!empty($prod['cantidad'])) {
                    $insertar_product->bindParam(':id_lavado', $id, PDO::PARAM_INT);
                    $insertar_product->bindParam(':id_producto', $prod['id_producto'], PDO::PARAM_INT);
                    $insertar_product->bindParam(':cantidad', $prod['cantidad'], PDO::PARAM_INT);
                    $insertar_product->execute();
                    $filas_afectadas += $insertar_product->rowCount();
                }
            }
        }

        return $filas_afectadas;
    }


    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "delete from lavados where id_lavado = :id_lavado";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_lavado', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($id)
    {
        $this->conexion();
        $result = [];
        $query = "SELECT * FROM lavados where id_lavado = :id_lavado;";
        $sql = $this->con->prepare($query);
        $sql->bindParam(":id_lavado", $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll()
    {
        $this->conexion();
        $result = [];
        $query = "select l.*,e.empleado,s.servicio,c.cliente
                    from lavados l left join empleados e on l.id_empleado = e.id_empleado
                    left join servicios s on l.id_servicio = s.id_servicio
                    left join clientes c on l.id_cliente = c.id_cliente;";
        $sql = $this->con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAllProductos($id)
    {
        $this->conexion();
        $sql = "SELECT DISTINCT p.id_producto, lp.cantidad 
            FROM productos p 
            JOIN lavadoproductos lp ON p.id_producto = lp.id_producto 
            JOIN lavados l ON lp.id_lavado = l.id_lavado 
            WHERE l.id_lavado = :id_lavado;";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_lavado', $id, PDO::PARAM_INT);
        $consulta->execute();
        $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($productos as $producto) {
            $data[$producto['id_producto']] = ['cantidad' => $producto['cantidad']];
        }
        return $data;
    }

    function cambiarEstado($id)
    {
        $this->conexion();
        $sql = "update lavados set estado='Terminado', hora_salida=current_timestamp()
         where id_lavado=:id_lavado";
        $update = $this->con->prepare($sql);
        $update->bindParam('id_lavado', $id, PDO::PARAM_INT);
        $update->execute();
        $result = $update->rowCount();
        return $result;
    }

    function resumen()
    {
        $this->conexion();
        $data = $_POST['data'];
        $producto = $_POST['producto'];
        $id_cliente = $data['id_cliente'];
        if ($id_cliente) {
            $id_cliente = 0;
        }

        $sql_cliente = 'select cliente from clientes where id_cliente = :id_cliente;';
        $buscar_cliente = $this->con->prepare($sql_cliente);
        $buscar_cliente->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $buscar_cliente->execute();
        $cliente_info = $buscar_cliente->fetch(PDO::FETCH_ASSOC);
        if ($cliente_info) {
            $cliente = $cliente_info['cliente'];
        } else {
            $cliente = 'Cliente no seleccionado';
        }

        $sql_correo = "select correo from clientes where id_cliente = :id_cliente;";
        $buscar_correo = $this->con->prepare($sql_correo);
        $buscar_correo->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $buscar_correo->execute();
        $correo_usuario = $buscar_correo->fetch(PDO::FETCH_ASSOC);

        if ($correo_usuario) {
            // Asegurarse de que la clave correcta del array es 'correo', no 'correo_usuario'
            $correo_usuario = $correo_usuario['correo'];
        } else {
            // Establecer un valor predeterminado si no se encuentra el correo
            $correo_usuario = 'No disponible';
        }

        $id_empleado = $data['id_empleado'];
        $sql2 = 'select empleado from empleados where id_empleado = :id_empleado;';
        $buscar2 = $this->con->prepare($sql2);
        $buscar2->bindParam('id_empleado', $id_empleado, PDO::PARAM_INT);
        $buscar2->execute();
        $empleado = $buscar2->fetch(PDO::FETCH_ASSOC);
        if ($empleado) {
            $empleado = $empleado['empleado'];
        } else {
            $empleado = 'Empleado no seleccionado';
        }

        $vehiculo = $data['marca_vehiculo'];
        $color = $data['color'];
        $placas = $data['placas'];

        $id_servicio = $data['id_servicio'];
        $sql_serv = 'select precio from servicios where id_servicio = :id_servicio;';
        $buscar = $this->con->prepare($sql_serv);
        $buscar->bindParam('id_servicio', $id_servicio, PDO::PARAM_INT);
        $buscar->execute();
        $precio_servicio = $buscar->fetch(PDO::FETCH_ASSOC);
        if ($precio_servicio) {
            $precio_servicio = $precio_servicio['precio'];
        }
        $sql_serv2 = 'select servicio from servicios where id_servicio = :id_servicio;';
        $buscar = $this->con->prepare($sql_serv2);
        $buscar->bindParam('id_servicio', $id_servicio, PDO::PARAM_INT);
        $buscar->execute();
        $servicio = $buscar->fetch(PDO::FETCH_ASSOC);
        if ($servicio) {
            $servicio = $servicio['servicio'];
        }

        $id_lavado = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id_lavado) {
        } else {
            $sql = 'SHOW TABLE STATUS LIKE "lavados";';
            $consulta = $this->con->prepare($sql);
            $consulta->execute();
            $tabla_info = $consulta->fetch(PDO::FETCH_ASSOC);
            $id_lavado = $tabla_info['Auto_increment']; // Siguiente valor auto_increment
        }


        $prod_select = [];
        foreach ($producto as $id_producto => $datos) {
            if (isset($datos['seleccionado']) && !empty($datos['cantidad'])) {
                $prod_select[] = [
                    'id_producto' => $id_producto,
                    'cantidad' => $datos['cantidad'],
                ];
            }
        }

        foreach ($prod_select as &$prod) {
            $sql = "select id_producto, producto, precio from productos where id_producto = :id_producto";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(':id_producto', $prod['id_producto'], PDO::PARAM_INT);
            $consulta->execute();
            $producto = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($producto) {
                $prod['producto'] = $producto['producto'];
                $prod['precio'] = $producto['precio'];
            }
        }

        return [
            'id_cliente' => $id_cliente,
            'cliente' => $cliente,
            'id_empleado' => $id_empleado,
            'empleado' => $empleado,
            'marca_vehiculo' => $vehiculo,
            'color' => $color,
            'placas' => $placas,
            'id_servicio' => $id_servicio,
            'servicio' => $servicio,
            'precio_servicio' => $precio_servicio,
            'productos' => $prod_select,
            'id_lavado' => $id_lavado,
            'correo' => isset($correo_usuario) ? $correo_usuario : 'Correo no disponible',
        ];
    }

    function ticket()
    {
        require_once('../vendor/autoload.php');
        $this->conexion();

        $data = $_SESSION['resumen'];
        $id_cliente = $data['id_cliente'];
        $id_empleado = $data['id_empleado'];
        $id_servicio = $data['id_servicio'];
        $cliente = $data['cliente'];
        $empleado = $data['empleado'];
        $servicio = $data['servicio'];
        $precio_servicio = $data['precio_servicio'];
        $id_lavado = $data['id_lavado'];
        $prod_select = $data['productos'];

        try {
            /* include('../lib/phpqrcode/qrlib.php');
            $id_ticket = $id_lavado;
            $file_name = '../tickets/lavado' . $id_lavado . '.png';
            QRcode::png('https://sourceforge.net/projects/phpqrcode/', $file_name, 2, 20, 2); */
            header('Content-Type: text/html; charset=utf-8');
            ob_start();
            $content = ob_get_clean();
            $content = '
    <html>
    <body>
    <div style="text-align:center; margin-bottom: 20px;">
        <img src="../images/logo.png" alt="logo" width="250">
        <h1 style="font-family: Arial, sans-serif; color: #333;">Reporte de Lavado ' . $id_lavado . '</h1>
    </div>
    <div style="margin: auto; width: 80%; font-family: Arial, sans-serif; color: #333;">
        <h2>Datos del Cliente</h2>
        <p><strong>Cliente:</strong> ' . $cliente . '</p>
        <p><strong>Empleado:</strong> ' . $empleado . '</p>
        <p><strong>Servicio:</strong> ' . $servicio . ' - <strong>Precio:</strong> $' . $precio_servicio . '</p>
    </div>
    <h2>Productos Seleccionados</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: center;">
        <tr style="background-color: #4CAF50; color: white;">
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>';

            $total_productos = 0;
            foreach ($prod_select as $prod) {
                $total = $prod['precio'] * $prod['cantidad'];
                $content .= '<tr style="background-color: #f2f2f2;">
            <td>' . $prod['producto'] . '</td>
            <td>' . $prod['cantidad'] . '</td>
            <td>$' . $prod['precio'] . '</td>
            <td>$' . $total . '</td>
        </tr>';
                $total_productos += $total;
            }

            $content .= '</table>
    <h3>Total de Productos: $' . $total_productos . '</h3>
    <h3>Total de Servicio: $' . $precio_servicio . '</h3>
    <h2>Total General: $' . ($total_productos + $precio_servicio) . '</h2>

    <div>
        <p> Dirección: Av Irrigación 105-3 P · Contacto: 461 612 9727 </p>
    </div>
    </body>
    </html>';


            $outputDir = $_SERVER['DOCUMENT_ROOT'] . '/carwash/tickets/';
            $filename = 'reporte_lavado' . $id_lavado . '.pdf';
            $html2pdf = new Html2Pdf('P', 'A4', 'fr');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content);
            $html2pdf->output($outputDir . $filename, 'F');
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
    }

    function mandar_ticket($destinatario, $asunto, $mensaje, $pdfPath)
    {
        require '../vendor/autoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = '20030435@itcelaya.edu.mx';  // Tu correo electrónico
        $mail->Password = 'iqrxjrzieqtrteph';  // Tu contraseña de aplicación de Gmail
        $mail->setFrom('20030435@itcelaya.edu.mx', 'Sistema CarWash');  // Remitente
        $mail->addAddress($destinatario, 'Sistema CarWash');  // Destinatario
        $mail->Subject = $asunto;
        $mail->msgHTML($mensaje);

        $mail->addAttachment($pdfPath);
        if ($mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    function readAcumulado($id)
    {
        $this->conexion();
        $sql = "SELECT COUNT(id_cliente) AS acumulado
            FROM lavados
            WHERE id_cliente = :id_cliente;";
        $read = $this->con->prepare($sql);
        $read->bindParam(':id_cliente', $id, PDO::PARAM_INT);
        $read->execute();
        $result = $read->fetch(PDO::FETCH_ASSOC);
        return (int) $result['acumulado']; // Aseguramos que se devuelve un entero
    }

    function generar_reporte($data)
    {
        require_once "../vendor/autoload.php";

        $this->conexion();
        $sql = "select * from lavados where fecha = :fecha;";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':fecha', $data, PDO::PARAM_STR);
        $consulta->execute();
        $n_lavados = $consulta->rowCount();
        if ($n_lavados == 0) {
            return 0;
        } else {
            try {
                # Obtener base de datos
                $this->conexion();

                $documento = new Spreadsheet();
                $documento
                    ->getProperties()
                    ->setCreator("CarWash")
                    ->setLastModifiedBy('Carwash')
                    ->setTitle('Reporte del día' . $data);

                $hojaDeLavados = $documento->getActiveSheet();
                $hojaDeLavados->setTitle("Lavados");

                # Encabezado de los productos
                $encabezado = ["Id", "Id Cliente", "Vehiculo", "Color", "Placas", "Servicio", "Empleado", "Subtotal Servicio", "Subtotal Productos", "Fecha", "Total"];
                $hojaDeLavados->fromArray($encabezado, null, 'A1');

                $consulta = "select * from lavados where fecha = :fecha;";
                $sentencia = $this->con->prepare($consulta, [
                    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
                ]);
                $sentencia->bindParam(':fecha', $data, PDO::PARAM_STR);
                $sentencia->execute();

                $numeroDeFila = 2;
                $sumaTotal = 0;
                $contadorLavados = 0;

                while ($lavado = $sentencia->fetchObject()) {
                    # Obtener registros de MySQL
                    $id = $lavado->id_lavado;
                    $cliente = $lavado->id_cliente;
                    $vehiculo = $lavado->marca_vehiculo;
                    $color = $lavado->color;
                    $placas = $lavado->placas;
                    $servicio = $lavado->id_servicio;
                    $empleado = $lavado->id_empleado;
                    $fecha = $lavado->fecha;

                    # Subtotal de servicio
                    $sql_servicio = "select precio from servicios where id_servicio = :id_servicio;";
                    $consulta = $this->con->prepare($sql_servicio);
                    $consulta->bindParam(':id_servicio', $servicio, PDO::PARAM_INT);
                    $consulta->execute();
                    $precio_servicio = $consulta->fetch(PDO::FETCH_ASSOC);

                    # Subtotal de productos
                    $sql_prod = "select sum(lp.cantidad*p.precio) as sub from lavadoproductos lp
                         join productos p on lp.id_producto = p.id_producto
                         where id_lavado = :id_lavado;";
                    $consulta = $this->con->prepare($sql_prod);
                    $consulta->bindParam(':id_lavado', $id, PDO::PARAM_INT);
                    $consulta->execute();
                    $sub_prod = $consulta->fetch(PDO::FETCH_ASSOC);

                    if (!$sub_prod) {
                        $sub_prod['sub'] = 0;
                    }

                    $total = $precio_servicio['precio'] + $sub_prod['sub'];
                    $sumaTotal += $total;
                    $contadorLavados++;

                    # Escribir registros en el documento
                    $hojaDeLavados->setCellValueByColumnAndRow(1, $numeroDeFila, $id);
                    $hojaDeLavados->setCellValueByColumnAndRow(2, $numeroDeFila, $cliente);
                    $hojaDeLavados->setCellValueByColumnAndRow(3, $numeroDeFila, $vehiculo);
                    $hojaDeLavados->setCellValueByColumnAndRow(4, $numeroDeFila, $color);
                    $hojaDeLavados->setCellValueByColumnAndRow(5, $numeroDeFila, $placas);
                    $hojaDeLavados->setCellValueByColumnAndRow(6, $numeroDeFila, $servicio);
                    $hojaDeLavados->setCellValueByColumnAndRow(7, $numeroDeFila, $empleado);
                    $hojaDeLavados->setCellValueByColumnAndRow(8, $numeroDeFila, $precio_servicio['precio']);
                    $hojaDeLavados->setCellValueByColumnAndRow(9, $numeroDeFila, $sub_prod['sub']);
                    $hojaDeLavados->setCellValueByColumnAndRow(10, $numeroDeFila, $fecha);
                    $hojaDeLavados->setCellValueByColumnAndRow(11, $numeroDeFila, $total);
                    $numeroDeFila++;
                }

                # Agregar los totales al final
                $hojaDeLavados->setCellValue("A" . $numeroDeFila, "Número total de lavados:");
                $hojaDeLavados->setCellValue("B" . $numeroDeFila, $contadorLavados);
                $hojaDeLavados->setCellValue("A" . ($numeroDeFila + 1), "Suma del total:");
                $hojaDeLavados->setCellValue("B" . ($numeroDeFila + 1), $sumaTotal);

                # Guardar el archivo
                $writer = new Xlsx($documento);
                $writer->save('../excel/reporte_de_' . $data . '.xlsx');

                return 1; # Si todo salió bien
            } catch (Exception $e) {
                return 2;
            }
        }



    }

}
?>