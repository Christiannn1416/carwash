<?php require('views/header_admin.php') ?>
<h1 class="text-center"><?php if ($accion == "crear"):
    echo ("Nuevo ");
else:
    echo ("Modificar ");
endif; ?>Producto</h1>
<form action="recompensa.php?accion=<?php if ($accion == "crear"):
    echo ('nuevo');
else:
    echo ('modificar&id=' . $id);
endif; ?>" method="post" enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="recompensa" class="col-sm-2 col-form-label">Nombre de la recompensa</label>
        <div class="col-sm-10">
            <input type="text" name="data[recompensa]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($recompensas['recompensa'])):
                echo ($recompensas['recompensa']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="precio" class="col-sm-2 col-form-label">Acumulado</label>
        <div class="col-sm-10">
            <input type="number" name="data[acumulado]" placeholder="Escribe aquí el acumulado" class="form-control"
                value="<?php if (isset($recompensas['acumulado'])):
                    echo ($recompensas['acumulado']);
                endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="foto" class="col-sm-2 col-form-label">Imagen</label>
        <div class="col-sm-10">
            <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
            <div class="col-sm-10">
                <input type="file" name="imagen" placeholder="URL de la fotografía" class="form-control" value="" />
            </div>
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>