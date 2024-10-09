<?php require('views/header.php') ?>
<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
endif; ?>

<h1 class="text-center">Servicios</h1>