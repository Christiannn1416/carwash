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
            <label for="fotografia" class="col-sm-2 col-form-label">Fotografía</label>
            <div class="col-sm-10">
                <input type="file" name="fotografia" placeholder="URL de la fotografía" class="form-control" value="" />
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="id_usuario" class="col-sm-2 col-form-label">Id_usuario</label>
        <select name="data[id_usuario]" id="" class="form-select">
            <?php foreach ($usuarios as $usuario): ?>
                <?php
                $selected = "";
                if ($empleados['id_usuario'] == $usuario['id_usuario']) {
                    $selected = "selected";
                }
                ?>
                <option value="<?php echo ($usuario['id_usuario']); ?>" <?php echo ($selected); ?>>
                    <?php echo ($usuario['usuario']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>