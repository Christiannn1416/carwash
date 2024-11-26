<?php require_once('views\header.php'); ?>
<?php if (isset($mensaje)):
  $app->alert($tipo, $mensaje);
endif; ?>
<div class="container-fluid text-center">
  <!-- navbar start-->
  <div class="row">
    <div class="col-sm-4 text-start">
      <img src="..\images\logo.png" style="height:100%;" class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-4"><i class="bi bi-geo-alt-fill"></i>
          <h5>Ubicación</h5>
        </div>
        <div class="col-sm-4"><i class="bi bi-telephone-fill"></i>
          <h5>Contacto</h5>
        </div>
        <div class="col-sm-4"><i class="bi bi-telephone-fill"></i>
          <h5>Sobre nosotros</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"><i class="bi bi-bag-fill"></i>
          <h5>Productos</h5>
        </div>
        <div class="col-sm-3"><i class="bi bi-currency-dollar"></i>
          <h5>Precios</h5>
        </div>
        <div class="col-sm-4">
          <h5>Síguenos en <i class="bi bi-facebook"></i> <i class="bi bi-instagram"></i></h5>
        </div>
      </div>
    </div>
    <div class="col-sm-2">Checa el estado de tu servcio</div>
  </div>
  <!-- navbar end -->
  <!-- promo start-->
  <div class="bg-warning rounded-pill p-1">
    <h2 class="fw-bold">Registrate y obtén un servicio gratis.</h2>
  </div>
  <!-- promo end -->

  <!-- presentacion start -->
  <div class="bg-img rounded-3">
    <div class="row">
      <div class="col-sm-6"></div>
      <div class="col-sm-6">
        <h1 class="fw-bold text-light" style="font-size:3rem;">Love <br>Your <br>Car</h1>
      </div>
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
          <div class="row">
            <!-- List Group único -->
            <div class="col-4">
              <div class="border-0 list-group w-100" id="list-tab" role="tablist">
                <a class="rounded-3 m-1 list-group-item list-group-item-action active" id="list-home-list"
                  data-bs-toggle="list" href="#list-home-1" role="tab" aria-controls="list-home-1">
                  <p>Calidad</p>
                </a>
                <a class="rounded-3 m-1 list-group-item list-group-item-action" id="list-profile-list"
                  data-bs-toggle="list" href="#list-profile-1" role="tab" aria-controls="list-profile-1">
                  <p>Confianza</p>
                </a>
                <a class="rounded-3 m-1 list-group-item list-group-item-action" id="list-messages-list"
                  data-bs-toggle="list" href="#list-messages-1" role="tab" aria-controls="list-messages-1">
                  <p>Beneficios de registrarse.</p>
                </a>
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent1">
                <div class="tab-pane fade show active" id="list-home-1" role="tabpanel"
                  aria-labelledby="list-home-list">
                  <p class="text-light">Nos enorgullece ofrecer servicios de lavado y cuidado de vehículos
                    con una calidad excepcional. Sabemos lo importante que es su auto para usted, y por eso nos
                    aseguramos
                    de que cada proceso sea realizado por personal experto, utilizando productos y técnicas de primera
                    clase. </p>
                </div>
                <div class="tab-pane fade" id="list-profile-1" role="tabpanel" aria-labelledby="list-profile-list">
                  <p class="text-light">La confianza es uno de nuestros valores fundamentales. Puede dejar su vehículo
                    con nosotros con
                    total
                    tranquilidad, ya que contamos con sistemas de seguridad y un equipo comprometido con su
                    satisfacción.
                    Además, para su comodidad, le notificaremos de inmediato cuando su auto esté listo para ser
                    recogido,
                    asegurando que tenga control sobre su tiempo y su agenda.</p>
                </div>
                <div class="tab-pane fade" id="list-messages-1" role="tabpanel" aria-labelledby="list-messages-list">
                  <p class="text-light">Registrarse en nuestro sitio es Gratis, además de obtener beneficios exclusivos,
                    como descuentos
                    especiales. Al registrarse, podrá acceder a
                    promociones personalizadas y regalos por su lealtad, sólo necesitas ingresar tu correo y número
                    telefónico.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row p-3 align-items-center">
            <div class="col">
              <button type="button" class="btn btn-warning fs-3">Regístrate para obtener tu primer
                servicio
                gratis. <i class="bi bi-send-arrow-down"></i>
            </div>
            <div class="col">

              <form action="visitor.php?accion=nuevo_registro" method="post">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" name="data[cliente]"
                    placeholder="Juanito Bananas" required>
                  <label for="floatingInput">Nombre completo</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="data[correo]" id="floatingInput"
                    placeholder="name@example.com" required>
                  <label for="floatingInput">Correo electrónico</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" name="data[telefono]" id="floatingPassword"
                    placeholder="Teléfono" required>
                  <label for="floatingPassword">Teléfono</label>
                </div>
                <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-primary" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- presentacion end -->

  <!--  -->
  <div class="row">
    <div class="col-sm-4">
      <i class="bi bi-calendar2-range fs-1"></i>
      <h1 class="">Horarios</h1>
      <table class="table w-50 m-auto">
        <thead>
          <tr>
            <th scope="col">Día</th>
            <th scope="col">Hora</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Lunes</th>
            <td>8 am a 5 pm.</td>
          </tr>
          <tr>
            <th scope="row">Martes</th>
            <td>8 am a 5 pm.</td>
          </tr>
          <tr>
            <th scope="row">Miercóles</th>
            <td>8 am a 5 pm.</td>
          </tr>
          <tr>
            <th scope="row">Jueves</th>
            <td>8 am a 5 pm.</td>
          </tr>
          <tr>
            <th scope="row">Viernes</th>
            <td>8 am a 5 pm.</td>
          </tr>
          <tr>
            <th scope="row">Sábado</th>
            <td>9 am a 3 pm.</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-sm-4">
      <i class="bi bi-card-heading fs-1"></i>
      <h1>Tarjeta de lealtad</h1>
      <p class="w-50 m-auto">Consigue tu tarjeta de lealtad, registrate y pasa a sucursal por ella. <br> obtén los
        siguientes
        beneficios:
      <table class="w-75 table m-auto">
        <thead>
          <tr>
            <th scope="col">Acumulando</th>
            <th scope="col">Regalo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">3 lavados</th>
            <td>20% de descuento en el siguiente servicio</td>
          </tr>
          <tr>
            <th scope="row">5 lavados</th>
            <td>Trapo de microfibra de regalo </td>
          </tr>
          <tr>
            <th scope="row">10 lavados</th>
            <td colspan="2">Lavado gratis</td>
          </tr>
        </tbody>
      </table>

      </p>
    </div>
    <div class="col-sm-4">
      <i class="bi bi-cloud-lightning-rain-fill fs-1"></i>
      <h1>LLuvia?</h1>
      <p class="w-75 m-auto">Llovió y se desperdció el servicio que te brindamos? <br>
        No te preocupes, si viniste a nuestras instalaciones por un servicio de lavado y llovió por la tarde o noche
        regresa por tu
        servicio gratis. <br><span class="fw-bold">NOTA:</span><br><i>No se hace válido si pasan más de 2 días desde
          servicio.</i>
        <br><i>No cuenta para el acumulado.</i>
      </p>
    </div>
  </div>
  <!--  -->
  <!-- galería start -->
  <div class="row w-75 m-auto">
    <h1>Galería de Fotos</h1>
    <p>Conoce nuestro trabajo.</p>
    <div class="row p-0">
      <div class="col-sm-4 p-2">
        <img src="../images/g1.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
      <div class="col-sm-4 p-2">
        <img src="../images/g9.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
      <div class="col-sm-4 p-2">
        <img src="../images/g3.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
    </div>
    <div class="row p-0">
      <div class="col-sm-4 p-2">
        <img src="../images/g4.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
      <div class="col-sm-4 p-2">
        <img src="../images/g5.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
      <div class="col-sm-4 p-2">
        <img src="../images/g6.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
    </div>
    <div class="row p-0 ">
      <div class="col-sm-4 p-2">
        <img src="../images/g7.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
      <div class="col-sm-4 p-2">
        <img src="../images/g8.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
      <div class="col-sm-4 p-2">
        <img src="../images/g2.jpg" class="w-100 rounded-3 m-4" alt="">
      </div>
    </div>
  </div>
  <!-- galería end -->
  <!-- servicios y productos start-->
  <div class="row w-100 m-0 p-3">
    <h1>Conoce los servicios y productos que te brindamos.</h1>
    <div class="col-sm-6 m-auto">
      <h1>Servicios</h1>
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
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <a href="servicio.php?accion=actualizar&id=<?php echo $servicio['id_servicio']; ?>"
                    class="btn btn-primary" style="margin-right:1rem;">Actualizar</a>
                  <a href="servicio.php?accion=eliminar&id=<?php echo $servicio['id_servicio']; ?>"
                    class="btn btn-danger">Eliminar</a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col-sm-6 m-0">
      <h1>Productos de Limpieza</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Detalle</th>
            <th scope="col">Precio</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($productos as $producto): ?>
            <tr>
              <th scope="row"><?php echo ($producto['producto']) ?></th>
              <td><?php echo ($producto['producto']) ?></td>
              <td><?php echo ($producto['precio']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>
  <!-- servicios y productos end-->

  <!-- Quejas start -->
  <div class="row w-75 m-auto p-3">
    <h1>Queremos saber tu opinión sobre nuestro servicio. Por favor llena este formulario y cuéntanos tu experiencia.
    </h1>
    <div class="col-sm-6">
      <form class="form-floating">
        <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="">
        <label for="floatingInputValue">Ingresa tu correo</label>
      </form>
      <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
          <option selected>Selecciona a qué va dirigido tu observación</option>
          <option value="1">Lavado</option>
          <option value="2">Atención al cliente</option>
          <option value="3">Tiempo de espera</option>
          <option value="3">Otro</option>
        </select>
        <label for="floatingSelect">Observación</label>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
          style="height: 100px"></textarea>
        <label for="floatingTextarea2">Describe tu observación.</label>
        <button type="submit" class="btn btn-primary m-3">Enviar</button>
      </div>
    </div>

  </div>
  <!-- Quejas end -->




</div>