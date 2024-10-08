<?php require('views/header.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>


<h1 class="text-center">Productos</h1>

<div class="container text-center">
    <div class="row row-cols-3">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Producto.</h5>
                    <p class="card-text">Agrega un nuevo producto.</p>
                    <a href="producto.php?accion=crear" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <?php foreach ($productos as $producto): ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="<?php echo $producto['producto']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['producto']; ?></h5>
                        <p class="card-text"><?php echo $producto['descripcion']; ?></p>
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