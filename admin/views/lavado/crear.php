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
    <h1>Nuevo Lavado:</h1>

    <div class="tab">
      Cliente
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
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <a href="cliente.php?accion=actualizar&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-primary"
                    style="margin-right:1rem;">Seleccionar</a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
    <div class="tab">

      <p>
        <label for="id_cliente" class="col-sm-2 col-form-label">Carro</label>
        <input placeholder="Carro" oninput="this.className = ''" name="lname" />
      </p>
      <p>
        <label for="id_cliente" class="col-sm-2 col-form-label">Color</label>
        <input placeholder="Color" oninput="this.className = ''" name="lname" />
      </p>
      <p>
        <label for="id_cliente" class="col-sm-2 col-form-label">Placas</label>
        <input placeholder="Placas" oninput="this.className = ''" name="lname" />
      </p>
    </div>
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
                  <input class="btn btn-primary" type="button"
                    value="Uber/Taxi $<?php echo $servicio['p_ubertaxi']; ?>"></input>
                  <input class="btn btn-primary" type="button"
                    value="Carro $<?php echo $servicio['p_carro']; ?> "></input>
                  <input class="btn btn-primary" type="button"
                    value="Camioneta $<?php echo $servicio['p_camioneta']; ?>"></input>
                  <input class="btn btn-primary" type="button" value="Van $<?php echo $servicio['p_van']; ?>"></input>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="tab">
      Empleado:
      <div class="row row-cols-3">
        <?php foreach ($empleados as $empleado): ?>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top" alt="<?php echo $empleado['empleado']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $empleado['empleado']; ?></h5>
                <a href="empleado.php?accion=actualizar&id=<?php echo $empleado['id_empleado']; ?>"
                  class="btn btn-primary">Asignar</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="tab">
      Login Info:
      <p>
        <input placeholder="Username..." oninput="this.className = ''" name="uname" />
      </p>
      <p>
        <input placeholder="Password..." oninput="this.className = ''" name="pword" type="password" />
      </p>
    </div>
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
    </div>
  </form>

  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == x.length - 1) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n);
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x,
        y,
        i,
        valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className +=
          " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i,
        x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
  </script>
</body>

</html>