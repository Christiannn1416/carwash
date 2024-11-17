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
    echo ('nuevo');
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
              </tr>
            </thead>
            <tbody>
              <?php foreach ($clientes as $cliente): ?>
                <tr>
                  <th scope="row"><?php echo $cliente['id_cliente']; ?></th>
                  <td><?php echo $cliente['cliente']; ?></td>
                  <td><?php echo $cliente['telefono']; ?></td>
                  <td><?php echo $cliente['correo']; ?></td>
                  <td>
                    <!-- Botón para seleccionar cliente -->
      <input type="radio" name="data[id_cliente]" value="<?php echo $cliente['id_cliente']; ?>" <?php if (isset($_POST['data']['id_cliente']) && $_POST['data']['id_cliente'] == $cliente['id_cliente'])
           echo 'checked'; ?>><label for="" class="m-auto">Seleccionar</label>
      </td>
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
        <input placeholder="Carro" name="data[marca_vehiculo]" id="marca_vehiculo" oninput="this.className = ''">
      </p>
      <p>
        <label for="id_cliente" class="col-sm-2 col-form-label">Color</label>
        <input placeholder="Color" name="data[color]" id="color" oninput="this.className = ''">
      </p>
      <p>
        <label for="placas" class="col-sm-2 col-form-label">Placas</label>
        <input placeholder="Placas" name="data[placas]" id="placas" oninput="this.className = ''">
      </p>
    </div> 

    <!-- Seleccionar servicio -->
     <div class="tab">
      Servicio:
      <div class="container text-center">
        <div class="row row-cols-3">
          <?php foreach ($servicios as $servicio): ?>
            <div class="col">
              <div class="card">
                <img src="..." class="card-img-top" alt="<?php echo $servicio['servicio']; ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $servicio['servicio']; ?></h5>
                  <p class="card-text"><?php echo $servicio['descripcion']; ?></p>
                  <input type="radio" value="<?php echo $servicio['id_servicio']; ?>"
                    data-id="<?php echo $servicio['id_servicio']; ?>" data-precio="<?php echo $servicio['p_ubertaxi']; ?>"
                    name="data[id_servicio]">
                  <input seleccionar-servicio" type="radio" value="<?php echo $servicio['id_servicio']; ?>"
                    data-id="<?php echo $servicio['id_servicio']; ?>" data-precio="<?php echo $servicio['p_carro']; ?>"
                    name="data[id_servicio]">
                  <input seleccionar-servicio" type="radio" value="<?php echo $servicio['id_servicio']; ?>"
                    data-id="<?php echo $servicio['id_servicio']; ?>"
                    data-precio="<?php echo $servicio['p_camioneta']; ?>" name="data[id_servicio]">
                  <input seleccionar-servicio" type="radio" value="<?php echo $servicio['id_servicio']; ?>"
                    data-id="<?php echo $servicio['id_servicio']; ?>" data-precio="<?php echo $servicio['p_van']; ?>"
                    name="data[id_servicio]">
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>   

    <!-- Seleccionar empleado -->
    <div class="tab">
      <h3>Empleado</h3>
      <div class="container text-center">
        <div class="row row-cols-3">
          <?php foreach ($empleados as $empleado): ?>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="<?php echo $empleado['empleado']; ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $empleado['empleado']; ?></h5>
                  <input type="radio" value="<?php echo $empleado['id_empleado']; ?>"
                    data-empleado="<?php echo $empleado['id_empleado']; ?>" name="data[empleado]">
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
                  <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                  <p class="card-text">$<?php echo $producto['precio']; ?></p>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $producto['id_producto']; ?>"
                    id="flexCheckDefault_<?php echo $producto['id_producto']; ?>" name="producto[<?php echo $producto['id_producto']; ?>][seleccionado]" 
                    <?php echo (in_array($producto['id_producto'], $misproductos) ? 'checked' : ''); ?>>
                  <label class="form-check-label" for="flexCheckDefault_<?php echo $producto['id_producto']; ?>">
                    Seleccionar
                  </label>
                  <input type="number" name="producto[<?php echo $producto['id_producto']; ?>][cantidad]" min="0">
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>

    <!-- Resumen -->
    <div class="tab">
      <h3>Resumen:</h3>
      <p>Cliente ID: <span id="resumen_cliente"></span></p>
      <p>Carro: <span id="resumen_vehiculo"></span></p>
      <p>Servicio: <span id="resumen_servicio"></span></p>
      <p>Empleado: <span id="resumen_empleado"></span></p>
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
      for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value === "") {
          inputs[i].className += " invalid";
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

    // Handle the selection of clients, services, and employees
    const seleccionarBtns = document.querySelectorAll('.seleccionar-btn');
    seleccionarBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const clienteId = btn.getAttribute('data-id');
        const previousClientId = sessionStorage.getItem('clienteId');
        document.getElementById('resumen_cliente').innerText = clienteId;
        sessionStorage.setItem('clienteId', clienteId);


        // Si el cliente es nuevo, borrar datos previos del vehículo
        if (previousClientId !== clienteId) {
          sessionStorage.removeItem('marca_vehiculo');
          sessionStorage.removeItem('color');
          sessionStorage.removeItem('placas');

          // Actualizar el resumen del vehículo a N/A solo si se cambia de cliente
          document.getElementById('resumen_vehiculo').innerText = 'Vehículo: N/A, Color: N/A, Placas: N/A';
        }
      });
    });

    const seleccionarServicios = document.querySelectorAll('.seleccionar-servicio');
    seleccionarServicios.forEach(servicio => {
      servicio.addEventListener('click', () => {
        const servicioId = servicio.getAttribute('data-id');
        const precio = servicio.getAttribute('data-precio');
        document.getElementById('resumen_servicio').innerText = `Servicio ID: ${servicioId}, Precio: $${precio}`;
        sessionStorage.setItem('servicioId', servicioId);
      });
    });
    function selectCliente(id_cliente) {
      document.getElementById('id_cliente').value = id_cliente;
    }

    const seleccionarEmpleados = document.querySelectorAll('.seleccionar-empleado');
    seleccionarEmpleados.forEach(empleado => {
      empleado.addEventListener('click', () => {
        const empleadoId = empleado.getAttribute('data-empleado');
        document.getElementById('resumen_empleado').innerText = empleadoId;
        sessionStorage.setItem('empleadoId', empleadoId);
      });
    });

    // Guarda los datos del vehículo en el momento en que se cambian
    document.getElementById("marca_vehiculo").addEventListener("change", function () {
      sessionStorage.setItem("marca_vehiculo", this.value);
      updateVehicleSummary();
    });
    document.getElementById("color").addEventListener("change", function () {
      sessionStorage.setItem("color", this.value);
      updateVehicleSummary();
    });
    document.getElementById("placas").addEventListener("change", function () {
      sessionStorage.setItem("placas", this.value);
      updateVehicleSummary();
    });

    function updateVehicleSummary() {
      const marcaVehiculo = sessionStorage.getItem('marca_vehiculo') || 'N/A';
      const color = sessionStorage.getItem('color') || 'N/A';
      const placas = sessionStorage.getItem('placas') || 'N/A';
      document.getElementById('resumen_vehiculo').innerText = `Vehículo: ${marcaVehiculo}, Color: ${color}, Placas: ${placas}`;
    }

    // On page load, retrieve and display the stored data
    window.addEventListener('load', () => {
      const clienteId = sessionStorage.getItem('clienteId');
      const servicioId = sessionStorage.getItem('servicioId');
      const empleadoId = sessionStorage.getItem('empleadoId');

      // Muestra el ID del cliente
      if (clienteId) document.getElementById('resumen_cliente').innerText = clienteId;

      // Muestra la información del servicio
      if (servicioId) document.getElementById('resumen_servicio').innerText = `Servicio ID: ${servicioId}`;

      // Muestra el ID del empleado
      if (empleadoId) document.getElementById('resumen_empleado').innerText = empleadoId;

      // Actualiza el resumen del vehículo con los datos guardados o con N/A si están vacíos
      updateVehicleSummary();
    });

  </script>

</body>

</html>