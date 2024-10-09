<?php require('views/header.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>

<h1 class="text-center">Servicios</h1>

<div class="container text-center">
    <div class="row row-cols-3">
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Servicio.</h5>
                    <p class="card-text">Agrega un nuevo servicio.</p>
                    <a href="servicio.php?accion=crear" class="btn btn-success">Ir</a>
                </div>
            </div>
        </div>
        <?php foreach ($servicios as $servicio): ?>
            <div class="col">
                <div class="card">
                    <img src="..." class="card-img-top" alt="<?php echo $servicio['servicio']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $servicio['servicio']; ?></h5>
                        <p class="card-text"><?php echo $servicio['descripcion']; ?></p>
                        <p class="card-text">Uber $<?php echo $servicio['p_ubertaxi']; ?></p>
                        <p class="card-text">Carro $<?php echo $servicio['p_carro']; ?></p>
                        <p class="card-text">Camioneta $<?php echo $servicio['p_camioneta']; ?></p>
                        <p class="card-text">Van $<?php echo $servicio['p_van']; ?></p>
                        <a href="servicio.php?accion=actualizar&id=<?php echo $servicio['id_servicio']; ?>"
                            class="btn btn-primary">Editar</a>
                        <a href="servicio.php?accion=eliminar&id=<?php echo $servicio['id_servicio']; ?>"
                            class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>