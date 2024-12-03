<?php require('views/header_admin.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>

<h1 class="text-center">Recompensas para <?php $cliente_c = $cliente['id_cliente'];
echo $cliente['cliente']; ?></h1>
<h2 class="text-center">Lavados Acumulados: <?php echo $acumulado; ?></h2>
<div class="container text-center">
    <div class="row row-cols-6">
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

                        <!-- Formulario para hacer el canje -->
                        <form action="canjear.php?accion=guardar_canjeo" method="POST">
                            <input type="hidden" name="data[id_cliente]" value="<?php echo $cliente_c; ?>">
                            <input type="hidden" name="data[id_recompensa]"
                                value="<?php echo $recompensa['id_recompensa']; ?>">
                            <button type="submit" class="btn btn-primary" <?php if ($acumulado == $recompensa['acumulado']) {
                                $mensaje = "Canjear";
                            } else {
                                $mensaje = "Bloqueado";
                                echo 'disabled';
                            }
                            if (in_array($recompensa['id_recompensa'], $canjeadas)) {
                                echo 'disabled';
                                $mensaje = "Canjeado";
                            }
                            ?>>
                                <?php echo $mensaje; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>