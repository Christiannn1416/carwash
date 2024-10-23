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
endif; ?>" method="post">
    <div class="row mb-3">
        <label for="producto" class="col-sm-2 col-form-label">Nombre del producto</label>
        <div class="col-sm-10">
            <input type="text" name="data[producto]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($productos['producto'])):
                echo ($productos['producto']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-10">
            <input type="text" name="data[descripcion]" placeholder="Escribe aquí la descripcion" class="form-control"
                value="<?php if (isset($productos['descripcion'])):
                    echo ($productos['descripcion']);
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
        <label for="stock" class="col-sm-2 col-form-label">Stock </label>
        <div class="col-sm-10">
            <input type="number" name="data[stock]" placeholder="Escribe aquí el stock inicial" class="form-control"
                value="<?php if (isset($productos['stock'])):
                    echo ($productos['stock']);
                endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
        <div class="col-sm-10">
            <input type="text" name="data[imagen]" placeholder="Imagen" class="form-control" value="<?php if (isset($productos['imagen'])):
                echo ($productos['imagen']);
            endif; ?>" />
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>