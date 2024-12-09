<?php require('views/header_admin.php') ?>
<h1 class="text-center"><?php if ($accion == "crear"):
    echo ("Nuevo ");
else:
    echo ("Modificar ");
endif; ?>Producto</h1>
<form action="producto.php?accion=<?php if ($accion == "crear"):
    echo ('nuevo');
else:
    echo ('modificar&id=' . $id);
endif; ?>" method="post" enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="producto" class="col-sm-2 col-form-label">Nombre del producto</label>
        <div class="col-sm-10">
            <input type="text" name="data[producto]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($productos['producto'])):
                echo ($productos['producto']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="precio" class="col-sm-2 col-form-label">Precio</label>
        <div class="col-sm-10">
            <input type="number" name="data[precio]" placeholder="Escribe aquí el precio" class="form-control" value="<?php if (isset($productos['precio'])):
                echo ($productos['precio']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <label for="imagen" class="col-sm-2 col-form-label">Fotografía</label>
            <div class="col-sm-10">
                <input type="file" name="imagen" placeholder="URL de la fotografía" class="form-control" value="" />
            </div>
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>