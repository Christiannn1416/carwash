<?php require('views/header_admin.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>


<h1 class="text-center">Productos</h1>

<div class="container text-center">
    <div class="row row-cols-6">
        <div class="col-sm-2">
            <div class="card">
                <img src="icons/boton-agregar.png" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Producto.</h5>
                    <p class="card-text">Agrega un nuevo producto.</p>
                    <a href="producto.php?accion=crear" class="btn btn-success">Ir</a>
                </div>
            </div>
        </div>
        <?php foreach ($productos as $producto): ?>
            <div class="col-sm-2">
                <div class="card">
                    <img src="<?php
                    if (file_exists("../uploads/" . $producto['imagen'])) {
                        echo ("../uploads/" . $producto['imagen']);
                    } else {
                        echo ("../uploads/default.png");
                    }
                    ?> " class="card-img-top p-3 m-auto" alt="<?php echo $producto['imagen']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['producto']; ?></h5>
                        <p class="card-text">$<?php echo $producto['precio']; ?></p>
                        <a href="producto.php?accion=actualizar&id=<?php echo $producto['id_producto']; ?>"
                            class="btn btn-primary">Editar</a>
                        <a href="producto.php?accion=eliminar&id=<?php echo $producto['id_producto']; ?>"
                            class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>