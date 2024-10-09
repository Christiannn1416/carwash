<?php require('views/header.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>

<h1 class="text-center">Clientes</h1>
<a href="cliente.php?accion=crear" class="btn btn-success">Nuevo<a>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acumulado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <th scope="row"><?php echo $cliente['id_cliente']; ?> </th>
                        <td><?php echo $cliente['cliente']; ?></td>
                        <td><?php echo $cliente['telefono']; ?></td>
                        <td><?php echo $cliente['correo']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <a href="cliente.php?accion=actualizar&id=<?php echo $cliente['id_cliente']; ?>"
                                    class="btn btn-primary" style="margin-right:1rem;">Actualizar</a>
                                <a href="cliente.php?accion=eliminar&id=<?php echo $cliente['id_cliente']; ?>"
                                    class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php require('views/footer.php') ?>