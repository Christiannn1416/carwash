<?php require('views/header_admin.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>

<h1 class="text-center">Lavados</h1>

<div class="text-end">
    <h2>Reportes:</h2>
    <form action="lavado.php?accion=generar_reporte" method="POST">
        <input type="date" name="fecha" required>
        <button type="submit" class="btn btn-primary">Generar Reporte</button>
    </form>
</div>

<a href="lavado.php?accion=crear" class="btn btn-success">Nuevo<a>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Vehículo</th>
                    <th scope="col">Color</th>
                    <th scope="col">Placas</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Entrada</th>
                    <th scope="col">Salida</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lavados as $lavado): ?>
                    <tr>
                        <th scope="row"><?php echo $lavado['id_lavado']; ?> </th>
                        <td><?php echo $lavado['cliente']; ?></td>
                        <td><?php echo $lavado['marca_vehiculo']; ?></td>
                        <td><?php echo $lavado['color']; ?></td>
                        <td><?php echo $lavado['placas']; ?></td>
                        <td><?php echo $lavado['servicio']; ?></td>
                        <td><?php echo $lavado['empleado']; ?></td>
                        <td><?php echo $lavado['fecha']; ?></td>
                        <td><?php echo $lavado['hora_entrada']; ?></td>
                        <td><?php echo $lavado['hora_salida']; ?></td>
                        <td><?php echo $lavado['estado']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <a href="lavado.php?accion=cambiarestado&id=<?php echo $lavado['id_lavado']; ?>"
                                    class="btn btn-success" style="margin-right:1rem;">Terminar</a>
                                <a href="lavado.php?accion=verticket&id=<?php echo $lavado['id_lavado']; ?>"
                                    class="btn btn-success" style="margin-right:1rem;">Ticket</a>
                                <a href="lavado.php?accion=actualizar&id=<?php echo $lavado['id_lavado']; ?>"
                                    class="btn btn-primary" style="margin-right:1rem;">Actualizar</a>
                                <a href="lavado.php?accion=eliminar&id=<?php echo $lavado['id_lavado']; ?>"
                                    class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>