<?php require_once('header.php');
require_once('../sistema.class.php');

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- Marca o título principal -->
        <a class="navbar-brand" href="administrador.php">
            <h1>Inicio</h1>
        </a>

        <!-- Botón para expandir el menú en pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del menú -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <!-- Mostrar nombre del usuario -->
                <li class="nav-item">
                    <h5>
                        <span class="nav-link text-dark">Bienvenido,
                            <strong><?php echo ($_SESSION['usuario']); ?></></span>
                    </h5>
                </li>

                <!-- Botón para cerrar sesión -->
                <li class="nav-item ms-3">
                    <a class="btn btn-danger" href="login.php?accion=logout">Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>