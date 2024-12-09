<?php require('views/header_admin.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>

<h1 class="text-center">Servicios</h1>

<a href="servicio.php?accion=crear" class="btn btn-success">Nuevo<a></a>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Servicio</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $servicio): ?>
                <tr>
                    <th scope="row"><?php echo $servicio['id_servicio']; ?> </th>
                    <td><?php echo $servicio['servicio']; ?></td>
                    <td><?php echo $servicio['descripcion']; ?></td>
                    <td>$<?php echo $servicio['precio']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <a href="servicio.php?accion=actualizar&id=<?php echo $servicio['id_servicio']; ?>"
                                class="btn btn-primary" style="margin-right:1rem;">Actualizar</a>
                            <!-- <a href="servicio.php?accion=eliminar&id=<?php echo $servicio['id_servicio']; ?>"
                                class="btn btn-danger">Eliminar</a> -->
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>