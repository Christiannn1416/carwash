<?php require('views/header_admin.php') ?>
<h1 class="text-center">Administrador</h1>
<div class="container text-center ">
    <div class="row row-cols-4">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons\lavado-de-autos.png" class="card-img-top" alt="Nuevo Lavado">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Lavado</h5>
                    <p class="card-text">Registra un nuevo lavado.</p>
                    <a href="lavado.php?accion=crear" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons\piezas-de-automovil.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Lavados</h5>
                    <p class="card-text">Revisa el estado de los vehículos lavados.</p>
                    <a href="lavado.php" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons/audiencia.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Agrega, elimina o modifica un cliente.</p>
                    <a href="cliente.php" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons/carro.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Servicios</h5>
                    <p class="card-text">Agrega, elimina o modifica un servicio.</p>
                    <a href="servicio.php" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons/productos.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Catálogo de Productos</h5>
                    <p class="card-text">Agrega, elimina o modifica un producto.</p>
                    <a href="producto.php" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons/empleado-del-mes.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Empleados</h5>
                    <p class="card-text">Agrega, elimina o modifica un empleado.</p>
                    <a href="empleado.php" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons/asignar.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Asignaciones</h5>
                    <p class="card-text">Asignaciones.</p>
                    <a href="asignacion.php" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="icons/factura.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tickets</h5>
                    <p class="card-text">Tickets.</p>
                    <a href="ticket.php" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
    </div>
</div>