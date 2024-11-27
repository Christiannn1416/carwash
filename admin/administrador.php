<?php
require('views/header_admin.php');
require_once('administrador.class.php');

$app = new Administrador();
?>
<div class="container mt-5">
    <h1 class="text-center mb-4">CarWash</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div class="col">
            <div class="card h-100 shadow">
                <img src="icons/lavado-de-autos.png" class="card-img-top icon" alt="Nuevo Lavado">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Lavado</h5>
                    <p class="card-text">Registra un nuevo lavado.</p>
                    <a href="lavado.php?accion=crear" class="btn btn-primary w-100">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow">
                <img src="icons/piezas-de-automovil.png" class="card-img-top" alt="Lavados">
                <div class="card-body">
                    <h5 class="card-title">Lavados</h5>
                    <p class="card-text">Revisa el estado de los vehículos lavados.</p>
                    <a href="lavado.php" class="btn btn-primary w-100">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow">
                <img src="icons/audiencia.png" class="card-img-top" alt="Clientes">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Agrega, elimina o modifica un cliente.</p>
                    <a href="cliente.php" class="btn btn-primary w-100">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow">
                <img src="icons/carro.png" class="card-img-top" alt="Servicios">
                <div class="card-body">
                    <h5 class="card-title">Servicios</h5>
                    <p class="card-text">Agrega, elimina o modifica un servicio.</p>
                    <a href="servicio.php" class="btn btn-primary w-100">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow">
                <img src="icons/productos.png" class="card-img-top" alt="Productos">
                <div class="card-body">
                    <h5 class="card-title">Catálogo de Productos</h5>
                    <p class="card-text">Agrega, elimina o modifica un producto.</p>
                    <a href="producto.php" class="btn btn-primary w-100">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow">
                <img src="icons/empleado-del-mes.png" class="card-img-top" alt="Empleados">
                <div class="card-body">
                    <h5 class="card-title">Empleados</h5>
                    <p class="card-text">Agrega, elimina o modifica un empleado.</p>
                    <a href="empleado.php" class="btn btn-primary w-100">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow">
                <img src="icons/asignar.png" class="card-img-top" alt="Usuarios">
                <div class="card-body">
                    <h5 class="card-title">Sistema de Usuarios</h5>
                    <p class="card-text">Crea usuarios, asigna roles y permisos.</p>
                    <a href="usuario.php" class="btn btn-primary w-100 m-1">Usuarios</a>
                    <a href="rol.php" class="btn btn-primary w-100 m-1">Roles</a>
                    <a href="permiso.php" class="btn btn-primary w-100 m-1">Permisos</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow">
                <img src="icons/factura.png" class="card-img-top" alt="Tickets">
                <div class="card-body">
                    <h5 class="card-title">Tickets</h5>
                    <p class="card-text">Consulta y gestiona los tickets generados.</p>
                    <a href="ticket.php" class="btn btn-primary w-100">Ir</a>
                </div>
            </div>
        </div>
    </div>
</div>