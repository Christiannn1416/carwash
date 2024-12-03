<?php require('views/header_admin.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>


<h1 class="text-center">Recompensas</h1>

<div class="container text-center">
    <div class="row row-cols-6">
        <div class="col-sm-2">
            <div class="card">
                <img src="icons/boton-agregar.png" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Producto.</h5>
                    <p class="card-text">Agrega una nueva recompensa.</p>
                    <a href="recompensa.php?accion=crear" class="btn btn-success">Ir</a>
                </div>
            </div>
        </div>
        <?php foreach ($recompensas as $recompensa): ?>
            <div class="col-sm-2">
                <div class="card">
                    <img src="<?php
                    if (file_exists("../uploads/" . $recompensa['imagen'])) {
                        echo ("../uploads/" . $recompensa['imagen']);
                    } else {
                        echo ("../uploads/default.png");
                    }
                    ?> " class="card-img-top p-3 m-auto" alt="<?php echo $recompensa['imagen']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $recompensa['recompensa']; ?></h5>
                        <p class="card-text">Hasta acumular <?php echo $recompensa['acumulado']; ?> lavados</p>
                        <a href="recompensa.php?accion=actualizar&id=<?php echo $recompensa['id_recompensa']; ?>"
                            class="btn btn-primary">Editar</a>
                        <a href="recompensa.php?accion=eliminar&id=<?php echo $recompensa['id_recompensa']; ?>"
                            class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>