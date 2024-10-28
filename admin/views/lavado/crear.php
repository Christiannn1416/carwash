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
  <form id="regForm" action="/action_page.php">
    <?php require('views/header_admin.php') ?>
    <h1>Nuevo Lavado:</h1>
    <!-- Seleccionar cliente -->
    <div class="tab">
      <?php if (isset($mensaje)):
        $app->alert($tipo, $mensaje);
      endif; ?>
      <h1 class="text-center">Cliente:</h1>
      <a href=" lavado.php?accion=crear_cliente_lavado" class="btn btn-success">Nuevo<a>
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
                  <th scope="row"><?php echo $cliente['id_cliente']; ?> </th>
                  <td><?php echo $cliente['cliente']; ?></td>
                  <td><?php echo $cliente['telefono']; ?></td>
                  <td><?php echo $cliente['correo']; ?></td>
                  <td>
                    <input class="btn btn-primary seleccionar-btn" type="button" value="Seleccionar"
                      data-id="<?php echo $cliente['id_cliente']; ?>">
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

    </div>

    <!-- Info Carro -->
    <div class="tab">
      <h1 class="text-center">Info de vehículo:</h3>
        <p>
          <label for=" Vehículo" class="col-sm-2 col-form-label">Vehículo</label>
          <input placeholder="Vehículo" name="marca_vehiculo" id="marca_vehiculo" oninput="this.className = ''">
        </p>
        <p>
          <label for="id_cliente" class="col-sm-2 col-form-label">Color</label>
          <input placeholder="Color" name="color" id="color" oninput="this.className = ''">
        </p>
        <p>
          <label for="placas" class="col-sm-2 col-form-label">Placas</label>
          <input placeholder="Placas" name="placas" id="placas" oninput="this.className = ''">
        </p>
    </div>

    <!-- Seleccionar servicio -->
    <div class="tab">
      <h1 class="text-center">Servicio:</h3>
        <div class=" container text-center">
          <div class="row row-cols-3">
            <?php foreach ($servicios as $servicio): ?>
              <div class="col">
                <div class="card">
                  <img src="..." class="card-img-top" alt="<?php echo $servicio['servicio']; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $servicio['servicio']; ?></h5>
                    <p class="card-text"><?php echo $servicio['descripcion']; ?></p>
                    <input class="btn btn-primary seleccionar-servicio" type="button"
                      value="Uber/Taxi $<?php echo $servicio['p_ubertaxi']; ?>"
                      data-id="<?php echo $servicio['id_servicio']; ?>"
                      data-precio="<?php echo $servicio['p_ubertaxi']; ?>">
                    <input class="btn btn-primary seleccionar-servicio" type="button"
                      value="Carro $<?php echo $servicio['p_carro']; ?>" data-id="<?php echo $servicio['id_servicio']; ?>"
                      data-precio="<?php echo $servicio['p_carro']; ?>">
                    <input class="btn btn-primary seleccionar-servicio" type="button"
                      value="Camioneta $<?php echo $servicio['p_camioneta']; ?>"
                      data-id="<?php echo $servicio['id_servicio']; ?>"
                      data-precio="<?php echo $servicio['p_camioneta']; ?>">
                    <input class="btn btn-primary seleccionar-servicio" type="button"
                      value="Van $<?php echo $servicio['p_van']; ?>" data-id="<?php echo $servicio['id_servicio']; ?>"
                      data-precio="<?php echo $servicio['p_van']; ?>">
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    </div>

    <!-- Seleccionar empleado -->
    <div class="tab">
      <h1 class="text-center">Empleado:</h3>
        <div class=" container text-center">
          <div class="row row-cols-3">
            <?php foreach ($empleados as $empleado): ?>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="..." class="card-img-top" alt="<?php echo $empleado['empleado']; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $empleado['empleado']; ?></h5>
                    <input class="btn btn-primary seleccionar-empleado" type="button" value="Asignar"
                      data-empleado="<?php echo $empleado['id_empleado']; ?>">
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    </div>

    <!-- Producto extra  -->
    <div class="tab">
      <h1 class="text-center">Agrega un producto extra:</h3>
        <div class=" container text-center">
          <div class="row row-cols-3">
            <?php foreach ($productos as $producto): ?>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="..." class="card-img-top" alt="<?php echo $producto['producto']; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $producto['producto']; ?></h5>
                    <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                    <p class="card-text">$<?php echo $producto['precio']; ?></p>
                    <input class="btn btn-primary seleccionar-empleado" type="button" value="Agregar"
                      data-empleado="<?php echo $empleado['id_empleado']; ?>">
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    </div>

    <!-- Resumen -->
    <div class="tab">
      <h1 class="text-center">Resumen:</h3>
        <p>Cliente ID: <span id=" resumen_cliente"></span></p>
        <p> <span id="resumen_vehiculo"></span></p>
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
        document.getElementById('resumen_cliente').innerText = clienteId;
        sessionStorage.setItem('clienteId', clienteId);
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
    });
    document.getElementById("color").addEventListener("change", function () {
      sessionStorage.setItem("color", this.value);
    });
    document.getElementById("placas").addEventListener("change", function () {
      sessionStorage.setItem("placas", this.value);
    });

    // On page load, retrieve and display the stored data
    window.addEventListener('load', () => {
      const clienteId = sessionStorage.getItem('clienteId');
      const servicioId = sessionStorage.getItem('servicioId');
      const empleadoId = sessionStorage.getItem('empleadoId');
      const marcaVehiculo = sessionStorage.getItem('marca_vehiculo'); // Recupera marca del vehículo
      const color = sessionStorage.getItem('color');
      const placas = sessionStorage.getItem('placas');

      // Muestra el ID del cliente
      if (clienteId) document.getElementById('resumen_cliente').innerText = clienteId;

      // Muestra la información del servicio
      if (servicioId) document.getElementById('resumen_servicio').innerText = `Servicio ID: ${servicioId}`;

      // Muestra el ID del empleado
      if (empleadoId) document.getElementById('resumen_empleado').innerText = empleadoId;

      // Muestra la información del vehículo (marca, color, placas)
      if (marcaVehiculo || color || placas) {
        document.getElementById('resumen_vehiculo').innerText = `Vehículo: ${marcaVehiculo || 'N/A'}, Color: ${color || 'N/A'}, Placas: ${placas || 'N/A'}`;
      }
    });

  </script>


</body>

</html>