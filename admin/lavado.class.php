<?php
require_once('../sistema.class.php');

class Lavado extends Sistema
{
    function create($data)
    {
        $result = [];
        $this->conexion();
        $data = $data['data'];
        $producto = $_POST['producto'];
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

        $id_lavado = $this->con->lastInsertId();
        if (!is_null(($id_lavado))) {
            foreach ($producto as $id_producto => $datos) {
                // Verifica si el producto está seleccionado y si la cantidad es válida
                if (isset($datos['seleccionado']) && !empty($datos['cantidad'])) {
                    $sql = "INSERT INTO lavadoproductos (id_lavado, id_producto, cantidad)
                            VALUES (:id_lavado, :id_producto, :cantidad);";
                    $insertar_product = $this->con->prepare($sql);
                    $insertar_product->bindParam(':id_lavado', $id_lavado, PDO::PARAM_INT);
                    $insertar_product->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
                    $insertar_product->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_INT);
                    $insertar_product->execute();
                }
            }
            $result = $insertar->rowCount();
            return $result;
        }
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
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
                    from lavados l join empleados e on l.id_empleado = e.id_empleado
                    join servicios s on l.id_servicio = s.id_servicio
                    join clientes c on l.id_cliente = c.id_cliente;";
        $sql = $this->con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAllProductos($id)
    {
        $this->conexion();
        $sql = "select distinct p.id_producto from productos p join lavadoproductos lp on p.id_producto = lp.id_producto 
                join lavados l on lp.id_lavado = l.id_lavado where l.id_lavado=:id_lavado;";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_lavado', $id, PDO::PARAM_INT);
        $consulta->execute();
        $roles = [];
        $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($productos as $producto) {
            array_push($data, $producto['id_producto']);
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
        $data = $_POST['data'];
        $producto = $_POST['producto'];
        $id_cliente = $data['id_cliente'];
        $vehiculo = $data['marca_vehiculo'];
        $color = $data['color'];
        $placas = $data['placas'];
        $servicio = $data['id_servicio'];
        $empleado = $data['id_empleado'];
        foreach ($producto as $id_producto => $datos) {
            // Verifica si el producto está seleccionado y si la cantidad es válida
            if (isset($datos['seleccionado']) && !empty($datos['cantidad'])) {
                $prod_select[] = array(
                    'id_producto' => $datos['seleccionado'],
                    'cantidad' => $datos['cantidad'],
                );
            }
        }
        echo ('Esto es una previa para hacer una vista de resumen antes de confirmar lavado para que el
        cliente vea su cuenta y confirme para proceder a pagar e insertarlo en la base de datos.<br>');
        echo ('Cliente:') . $id_cliente . '<br>';
        echo ('Vehiculo:') . $vehiculo . '<br>';
        echo ('color:') . $color . '<br>';
        echo ('placas:') . $placas . '<br>';
        echo ('servicio:') . $servicio . '<br>';
        echo ('empleado:') . $empleado . '<br>';
        echo ('Productos: ');
        print_r($prod_select);
    }
}
?>