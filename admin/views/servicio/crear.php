<?php require('views/header_admin.php') ?>
<h1 class="text-center"><?php if ($accion == "crear"):
    echo ("Nuevo ");
else:
    echo ("Modificar ");
endif; ?>servicio</h1>
<form action="servicio.php?accion=<?php if ($accion == "crear"):
    echo ('nuevo');
else:
    echo ('modificar&id=' . $id);
endif; ?>" method="post">
    <div class="row mb-3">
        <label for="servicio" class="col-sm-2 col-form-label">Nombre del servicio</label>
        <div class="col-sm-10">
            <input type="text" name="data[servicio]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($servicios['servicio'])):
                echo ($servicios['servicio']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-10">
            <input type="text" name="data[descripcion]" placeholder="Escribe aquí la descripcion" class="form-control"
                value="<?php if (isset($servicios['descripcion'])):
                    echo ($servicios['descripcion']);
                endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="p_ubertaxi" class="col-sm-2 col-form-label">Precio</label>
        <div class="col-sm-10">
            <input type="number" name="data[precio]" placeholder="Escribe aquí el precio" class="form-control" value="<?php if (isset($servicios['precio'])):
                echo ($servicios['precio']);
            endif; ?>" />
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>