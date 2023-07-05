<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<!-- Vendors JS -->
<script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>

<!-- Page JS -->
<script src="assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Session -->
<?php if (@$_SESSION['sukses']) { ?>
    <script>
        Swal.fire('Berhasil', "<?php echo $_SESSION['sukses']; ?>", 'success')
    </script>
<?php
    unset($_SESSION['sukses']);
} else {
?>
    <script>
        Swal.fire('Gagal', "<?php echo $_SESSION['error']; ?>", 'error')
    </script>
<?php
    unset($_SESSION['error']);
} ?>