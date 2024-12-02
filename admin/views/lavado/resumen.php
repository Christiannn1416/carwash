<?php require('views/header_admin.php') ?>

<form action="lavado.php?accion=<?php if ($accion == "resumen"):
    echo ('nuevo');
else:
    echo ('modificar&id=' . $id);
endif; ?>" method="post">
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="text-center">Resumen del Lavado <?php echo $id_lavado; ?></h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3">
                <h3>Cliente</h3>
                <p><strong>ID Cliente:</strong> <?php echo $id_cliente; ?></p>
                <p><strong>Cliente:</strong> <?php echo $cliente; ?></p>
            </div>
            <div class="col-md-3">
                <h3>Vehículo</h3>
                <p><strong>Marca:</strong> <?php echo $marca_vehiculo; ?></p>
                <p><strong>Color:</strong> <?php echo $color; ?></p>
                <p><strong>Placas:</strong> <?php echo $placas; ?></p>
            </div>
            <div class="col-md-3">
                <h3>Servicio</h3>
                <p><strong>ID Servicio:</strong> <?php echo $id_servicio; ?></p>
                <p><strong>Servicio:</strong> <?php echo $servicio; ?></p>
                <p><strong>Precio:</strong> $<?php echo $precio_servicio; ?></p>
            </div>
            <div class="col-md-3">
                <h3>Empleado</h3>
                <p><strong>ID Empleado:</strong> <?php echo $id_empleado; ?></p>
                <p><strong>Empleado:</strong> <?php echo $empleado; ?></p>
            </div>
        </div>


        <!-- Adicionales  -->
        <div class="row mb-4">
            <div class="col-12">
                <h3>Adicionales</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sub_prod = 0;
                        foreach ($prod_select as $prod): ?>
                            <tr>
                                <th scope="row"><?php echo $prod['id_producto']; ?></th>
                                <td><?php echo $prod['producto']; ?></td>
                                <td>$<?php echo $prod['precio']; ?></td>
                                <td><?php echo $prod['cantidad']; ?></td>
                                <td>
                                    <?php
                                    $sub = $prod['cantidad'] * $prod['precio'];
                                    $sub_prod += $sub;
                                    echo "$" . $sub;
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Total Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h3>Total a pagar</h3>
                <p><strong>Subtotal del servicio:</strong> $<?php echo $precio_servicio; ?></p>
                <p><strong>Subtotal de productos adicionales:</strong> $<?php echo $sub_prod; ?></p>
                <?php $subtotal = $precio_servicio + $sub_prod; ?>
                <h4><strong>Total:</strong> $<?php echo $subtotal; ?></h4>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Confirmar</button>
            </div>
        </div>
    </div>
</form>