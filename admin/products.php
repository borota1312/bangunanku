<?php include('layouts/header.php') ?>
<?php $page = "products"; ?>

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

                <?php include('layouts/navbar.php') ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light"><?= ucfirst($page) ?> /</span> Our <?= ucfirst($page) ?>
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-borderless border-bottom" id="our-products">
                                                <thead>
                                                    <tr>
                                                        <th class="text-nowrap">#</th>
                                                        <th class="text-nowrap text-center">Name</th>
                                                        <th class="text-nowrap text-center">Images</th>
                                                        <th class="text-nowrap text-center">Price (Rp)</th>
                                                        <th class="text-wrap text-center">Description</th>
                                                        <th class="text-nowrap text-center">Category</th>
                                                        <th class="text-nowrap text-center">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = "SELECT * FROM `products` LEFT JOIN product_images on product_images.product_id = products.product_id LEFT JOIN categories on categories.category_id = products.category_id";
                                                    $rs_result = mysqli_query($conn, $query);
                                                    $no = 1;
                                                    while ($row = mysqli_fetch_array($rs_result)) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-nowrap"><?= $no++ ?></td>
                                                            <td class="text-nowrap"><?= $row["product_name"] ?></td>
                                                            <td class="text-nowrap"><img class="img-fluid" src="../<?php echo $row["image_url"] ?>" alt="Colorlib Template" width="50">
                                                            </td>
                                                            <td class="text-nowrap"><?= number_format($row['price'], 0, ',', '.'); ?></td>
                                                            <td class="text-wrap"><?= $row['description'] ?></td>
                                                            <td class="text-nowrap"><?= $row['category_name'] ?></td>
                                                            <td class="text-nowrap">New for you</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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