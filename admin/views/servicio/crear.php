<?php require('views/header.php') ?>
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
        <label for="p_ubertaxi" class="col-sm-2 col-form-label">Precio Uber/Taxi</label>
        <div class="col-sm-10">
            <input type="number" name="data[p_ubertaxi]" placeholder="Escribe aquí el precio" class="form-control"
                value="<?php if (isset($servicios['p_ubertaxi'])):
                    echo ($servicios['p_ubertaxi']);
                endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="p_carro" class="col-sm-2 col-form-label">Precio Carro</label>
        <div class="col-sm-10">
            <input type="number" name="data[p_carro]" placeholder="Escribe aquí el precio" class="form-control" value="<?php if (isset($servicios['p_carro'])):
                echo ($servicios['p_carro']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="p_camioneta" class="col-sm-2 col-form-label">Precio Camioneta</label>
        <div class="col-sm-10">
            <input type="number" name="data[p_camioneta]" placeholder="Escribe aquí el precio" class="form-control"
                value="<?php if (isset($servicios['p_camioneta'])):
                    echo ($servicios['p_camioneta']);
                endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="p_van" class="col-sm-2 col-form-label">Precio Van</label>
        <div class="col-sm-10">
            <input type="number" name="data[p_van]" placeholder="Escribe aquí el precio" class="form-control" value="<?php if (isset($servicios['p_van'])):
                echo ($servicios['p_van']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
        <div class="col-sm-10">
            <input type="text" name="data[imagen]" placeholder="Imagen" class="form-control" value="<?php if (isset($servicios['imagen'])):
                echo ($servicios['imagen']);
            endif; ?>" />
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>
<?php require('views/footer.php') ?>