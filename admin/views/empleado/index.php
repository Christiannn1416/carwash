<?php require('views/header_admin.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>


<h1 class="text-center">Empleados</h1>

<div class="container text-center">
    <div class="row row-cols-3">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons/boton-agregar.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Empleado.</h5>
                    <p class="card-text">Agrega un nuevo empleado.</p>
                    <a href="empleado.php?accion=crear" class="btn btn-success">Ir</a>
                </div>
            </div>
        </div>
        <?php foreach ($empleados as $empleado): ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?php
                    if (file_exists("../uploads/" . $empleado['fotografia'])) {
                        echo ("../uploads/" . $empleado['fotografia']);
                    } else {
                        echo ("../uploads/default.png");
                    }
                    ?> " class="card-img-top" alt="<?php echo $empleado['empleado']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $empleado['empleado']; ?></h5>
                        <p class="card-text"><?php echo $empleado['telefono']; ?></p>
                        <a href="empleado.php?accion=actualizar&id=<?php echo $empleado['id_empleado']; ?>"
                            class="btn btn-primary">Editar</a>
                        <a href="empleado.php?accion=eliminar&id=<?php echo $empleado['id_empleado']; ?>"
                            class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>