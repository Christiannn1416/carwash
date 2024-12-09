<?php require('views/header_admin.php'); ?>
<h1><?php echo ($accion == "crear") ? "Nuevo " : "Modificar "; ?>Rol</h1>
<form action="rol.php?accion=<?php echo ($accion == "crear") ? 'nuevo' : 'modificar&id=' . $id; ?>" method="post">
    <div class="row mb-3">
        <label for="rol" class="col-sm-2 col-form-label">Nombre del Rol</label>
        <div class="col-sm-10">
            <input type="text" name="data[rol]" placeholder="Escribe aquí el nombre del rol" class="form-control"
                value="<?php echo isset($rol['rol']) ? $rol['rol'] : ''; ?>" required />
        </div>
        <?php foreach ($permisos as $permiso): ?>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                    name="permiso[<?php echo ($permiso['id_permiso']); ?>]" <?php $checked = '';
                       if (in_array($permiso['id_permiso'], $mispermisos)):
                           $checked = 'checked';
                       endif;
                       echo ($checked);
                       ?>>
                <label class="form-check-label" for="flexSwitchCheckDefault"><?php echo $permiso['permiso']; ?></label>
            </div>
        <?php endforeach ?>
    </div>

    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>