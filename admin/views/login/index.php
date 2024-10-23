<form class="vh-100 gradient-custom" method="post" action="login.php?accion=login">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Entrar</h2>
                            <p class="text-white-50 mb-5">Ingresa tu correo y contraseña</p>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input name="data[usuario]" type="text" id="typeEmailX"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX">Email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <input name="data[contrasena]" type="password" id="typePasswordX"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX">Contraseña</label>
                            </div>

                            <p class="text-white-50 mb-5"><a class="text-white-50"
                                    href="login.php?accion=forgot">Recuperar contraseña</a></p>

                            <input data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5"
                                type="submit" value="Entrar al Sistema" name="enviar"></input>
                        </div>
                        <div>
                            <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign
                                    Up</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require('views/footer.php') ?>