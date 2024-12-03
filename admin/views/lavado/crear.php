<?php require('views/header_admin.php') ?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #f1f1f1;
  }

  #regForm {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px;
  }

  h1 {
    text-align: center;
  }

  input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
  }

  button {
    background-color: #04aa6d;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
  }

  button:hover {
    opacity: 0.8;
  }

  #prevBtn {
    background-color: #bbbbbb;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }

  .step.active {
    opacity: 1;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #04aa6d;
  }
</style>

<body>
  <form id="regForm" action="lavado.php?accion=<?php if ($accion == "crear"):
    echo ('resumen');
  else:
    echo ('resumen_editar&id=' . $id);
  endif; ?>" method="post">

    <h1>Nuevo Lavado:</h1>
    <!-- Seleccionar cliente -->
    <div class="tab">
      Clientes:

      <?php if (isset($mensaje)):
        $app->alert($tipo, $mensaje);
      endif; ?>

      <h1 class="text-center">Clientes</h1>
      <a href="lavado.php?accion=crear_cliente_lavado" class="btn btn-success">Nuevo<a>

          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Cliente</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Acumulado</th>
                <th scope="col">Seleccionar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($clientes as $cliente): ?>
                <tr>
                  <th scope="row">
                    <?php
                    echo $cliente['id_cliente'];
                    $id = $cliente['id_cliente'];
                    ?>
                  </th>
                  <td><?php echo $cliente['cliente']; ?></td>
                  <td><?php echo $cliente['telefono']; ?></td>
                  <td><?php echo $cliente['correo']; ?></td>
                  <td>
                    <?php
                    // Capturar el acumulado del cliente
                    $acumulado = $app->readAcumulado($id);
                    echo $acumulado; // Mostrar el acumulado
                    ?>
                  </td>
                  <td>
                    <!-- Botón para seleccionar cliente -->
                    <input id="id_cliente_<?php echo $cliente['id_cliente']; ?>" type="radio" name="data[id_cliente]"
                      value="<?php echo $cliente['id_cliente']; ?>" <?php if (isset($lavados['id_cliente']) && $lavados['id_cliente'] == $cliente['id_cliente']): ?> checked <?php endif; ?>>
                    <label for="id_cliente_<?php echo $cliente['id_cliente']; ?>" class="m-auto">Seleccionar</label>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
    </div>
    <!-- Info Carro -->
    <div class="tab">
      <p>
        <label for="Carro" class="col-sm-2 col-form-label">Carro</label>
        <input placeholder="Carro" name="data[marca_vehiculo]" id="marca_vehiculo" require value="<?php if (isset($lavados['marca_vehiculo'])):
          echo ($lavados['marca_vehiculo']);
        endif; ?>">
      </p>
      <p>
        <label for="id_cliente" class="col-sm-2 col-form-label">Color</label>
        <input placeholder="Color" name="data[color]" id="color" require value="<?php if (isset($lavados['color'])):
          echo ($lavados['color']);
        endif; ?>">
      </p>
      <p>
        <label for="placas" class="col-sm-2 col-form-label">Placas</label>
        <input placeholder="Placas" name="data[placas]" id="placas" require value="<?php if (isset($lavados['placas'])):
          echo ($lavados['placas']);
        endif; ?>">
      </p>
    </div>

    <!-- Seleccionar servicio -->
    <div class="tab">
      Servicio:

      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Servicio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($servicios as $servicio): ?>
            <tr>
              <th scope="row"><?php echo $servicio['id_servicio']; ?> </th>
              <td><?php echo $servicio['servicio']; ?></td>
              <td><?php echo $servicio['descripcion']; ?></td>
              <td>$<?php echo $servicio['precio']; ?></td>
              <td>
                <input id="id_servicio_<?php echo $servicio['id_servicio']; ?>" type="radio" name="data[id_servicio]"
                  value="<?php echo $servicio['id_servicio']; ?>" <?php if (isset($lavados['id_servicio']) && $lavados['id_servicio'] == $servicio['id_servicio']): ?> checked <?php endif; ?>>
                <label for="" class="m-auto">Seleccionar</label>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Seleccionar empleado -->
    <div class="tab">
      <h3>Empleado</h3>
      <div class="container text-center">
        <div class="row row-cols-3">
          <?php foreach ($empleados as $empleado): ?>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $empleado['empleado']; ?></h5>
                  <input type="radio" value="<?php echo $empleado['id_empleado']; ?>" <?php if (isset($lavados['id_empleado']) && $lavados['id_empleado'] == $empleado['id_empleado']): ?> checked
                    <?php endif; ?> data-empleado="<?php echo $empleado['id_empleado']; ?>" name="data[id_empleado]">
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Producto extra -->
    <div class="tab">
      <h3>Producto extra:</h3>
      <div class="container text-center">

        <div class="row row-cols-5">
          <?php foreach ($productos as $producto): ?>
            <div class="col">
              <div class="card">
                <img src="<?php
                if (file_exists("../uploads/" . $producto['imagen'])) {
                  echo ("../uploads/" . $producto['imagen']);
                } else {
                  echo ("../uploads/default.png");
                }
                ?> " class="card-img-top" alt="<?php echo $producto['imagen']; ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $producto['producto']; ?></h5>
                  <p class="card-text">$<?php echo $producto['precio']; ?></p>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $producto['id_producto']; ?>"
                    id="flexCheckDefault_<?php echo $producto['id_producto']; ?>"
                    name="producto[<?php echo $producto['id_producto']; ?>][seleccionado]" <?php echo (isset($misproductos[$producto['id_producto']]) ? 'checked' : ''); ?>>
                  <label class="form-check-label" for="flexCheckDefault_<?php echo $producto['id_producto']; ?>">
                    Seleccionar
                  </label>
                  <input type="number" name="producto[<?php echo $producto['id_producto']; ?>][cantidad]"
                    value="<?php echo isset($misproductos[$producto['id_producto']]['cantidad']) ? ($misproductos[$producto['id_producto']]['cantidad']) : ''; ?>">
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>


    <!--  -->
    <div style="overflow: auto">
      <div style="float: right">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">
          Previous
        </button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align: center; margin-top: 40px">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>

  <script>
    let currentTab = 0;
    showTab(currentTab);

    function showTab(n) {
      let tabs = document.getElementsByClassName("tab");
      tabs[n].style.display = "block";
      if (n === 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n === (tabs.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      fixStepIndicator(n);
    }

    function nextPrev(n) {
      let tabs = document.getElementsByClassName("tab");
      if (n === 1 && !validateForm()) return false;
      tabs[currentTab].style.display = "none";
      currentTab = currentTab + n;
      if (currentTab >= tabs.length) {
        document.getElementById("regForm").submit();
        return false;
      }
      showTab(currentTab);
    }


    function validateForm() {
      let tabs = document.getElementsByClassName("tab");
      let inputs = tabs[currentTab].getElementsByTagName("input");
      let valid = true;
      let idsPermitidos = ["marca_vehiculo", "color", "placas"];
      for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value === "" && idsPermitidos.includes(inputs[i].id)) {
          inputs[i].className += "invalid";
          valid = false;
        }
      }
      return valid;
    }

    function fixStepIndicator(n) {
      let steps = document.getElementsByClassName("step");
      for (let i = 0; i < steps.length; i++) {
        steps[i].className = steps[i].className.replace(" active", "");
      }
      steps[n].className += " active";
    }

  </script>

</body>

</html>