<?php require('views/header_admin.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>

<h1 class="text-center">Clientes</h1>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Acumulado</th>
            <th scope="col">Canjear</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <th scope="row"><?php echo $cliente['id_cliente']; ?> </th>
                <td><?php echo $cliente['cliente']; ?></td>
                <td><?php echo $cliente['telefono']; ?></td>
                <td><?php echo $cliente['correo']; ?></td>
                <td><?php $acumulado = $applavado->readAcumulado($cliente['id_cliente']);
                echo $acumulado; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <a href="canjear.php?accion=canjear&id=<?php echo $cliente['id_cliente']; ?>"
                            class="btn btn-success" style="margin-right:1rem;">Canjear</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>