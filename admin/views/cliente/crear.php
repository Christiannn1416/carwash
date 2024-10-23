<?php require('views/header_admin.php') ?>
<h1 class="text-center"><?php if ($accion == "crear"):
    echo ("Nuevo ");
else:
    echo ("Modificar ");
endif; ?>cliente</h1>
<form action="cliente.php?accion=<?php if ($accion == "crear"):
    echo ('nuevo');
else:
    echo ('modificar&id=' . $id);
endif; ?>" method="post">
    <div class="row mb-3">
        <label for="cliente" class="col-sm-2 col-form-label">Nombre del cliente</label>
        <div class="col-sm-10">
            <input type="text" name="data[cliente]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($clientes['cliente'])):
                echo ($clientes['cliente']);
            endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
        <div class="col-sm-10">
            <input type="number" name="data[telefono]" placeholder="Escribe aquí el telefono" class="form-control"
                value="<?php if (isset($clientes['telefono'])):
                    echo ($clientes['telefono']);
                endif; ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
        <div class="col-sm-10">
            <input type="text" name="data[correo]" placeholder="Escribe aquí el correo" class="form-control" value="<?php if (isset($clientes['correo'])):
                echo ($clientes['correo']);
            endif; ?>" />
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>