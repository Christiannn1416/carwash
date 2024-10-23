<?php require('views/header_admin.php') ?>
<h1 class="text-center"><?php if ($accion == "crear"):
    echo ("Nuevo ");
else:
    echo ("Modificar ");
endif; ?>empleado</h1>
<form action="empleado.php?accion=<?php if ($accion == "crear"):
    echo ('nuevo');
else:
    echo ('modificar&id=' . $id);
endif; ?>" method="post">
    <div class="row mb-3">
        <label for="empleado" class="col-sm-2 col-form-label">Nombre del empleado</label>
        <div class="col-sm-10">
            <input type="text" name="data[empleado]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($empleados['empleado'])):
                echo ($empleados['empleado']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
        <div class="col-sm-10">
            <input type="text" name="data[telefono]" placeholder="Escribe aquí el teléfono" class="form-control" value="<?php if (isset($empleados['telefono'])):
                echo ($empleados['telefono']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <input type="text" name="data[foto]" placeholder="Foto" class="form-control" value="<?php if (isset($empleados['foto'])):
                echo ($empleados['foto']);
            endif; ?>" />
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>