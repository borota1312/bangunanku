<?php include('layouts/header.php') ?>
<?php
$breadcum = "coupons";
$page = "coupons";
$current = "edit";
?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('layouts/sidebar.php'); ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php
                // include('layouts/navbar.php') 
                ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light"><?= ucfirst($breadcum) ?> /</span><span class="text-muted fw-light"> <a href="cupons.php"><?= ucfirst($page) ?></a> /</span> <?= ucfirst($current) ?>
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $coupon_id = $_GET['id'];
                                        $data = mysqli_query($conn, "select * from coupons where coupon_id='$coupon_id'");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <form id="formAccountSettings" method="POST" action="backend/cupons-update.php">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="firstName" class="form-label">Code</label>
                                                        <input type="hidden" id="coupon_id" name="coupon_id" autofocus value="<?= $d['coupon_id']; ?>" />
                                                        <input class="form-control" type="text" id="coupon_code" name="coupon_code" value="<?= $d['coupon_code'] ?>" autofocus />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="firstName" class="form-label">Disc</label>
                                                        <input class="form-control" type="number" placeholder="10.6" step="0.01" id="discount_percentage" value="<?= $d['discount_percentage'] ?>" name="discount_percentage" autofocus />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="lastName" class="form-label">Expiration Date</label>
                                                        <input type="date" name="expiration_date" id="expiration_date" value="<?= $d['expiration_date'] ?>" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="lastName" class="form-label">Term & Condition</label>
                                                        <textarea name="terms_condition" id="terms_condition" cols="30" rows="10" class="form-control"><?= $d['terms_condition'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2">Update</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                                </div>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <?php include('layouts/scripts.php') ?>
    <script>
        $(document).ready(function() {
            $('#our-products').DataTable();
        });
    </script>
</body>

</html>