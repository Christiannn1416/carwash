<!-- <div class="alert alert-<?php echo $tipo; ?>" role="alert">
    <?php echo $mensaje; ?>
</div> -->
<!-- Contenedor del Toast en el centro de la pantalla -->
<div class="toast-container position-fixed top-50 start-50 translate-middle" style="z-index: 1055;">
    <div id="myToast" class="toast align-items-center text-bg-<?php echo $tipo; ?> border-0" role="alert"
        aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="toast-header">
            <strong class="me-auto">CarWash System</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="d-flex">
            <div class="toast-body">
                <?php echo $mensaje; ?>
            </div>
        </div>
    </div>
</div>

<!-- Script para mostrar el toast al cargar la página -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var toastElement = document.getElementById('myToast');
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    });
</script>