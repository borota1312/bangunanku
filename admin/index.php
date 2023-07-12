<?php include('layouts/header.php') ?>
<?php $page = "index"; ?>

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
                        <div class="row">
                            <div class="col-lg-8 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Wellcome <?= $_SESSION['username'] ?> 🎉</h5>
                                                <p class="mb-4">
                                                    Hello there!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Order Statistics -->
                            <?php
                            $query = "SELECT * FROM `products`";
                            $rs_result = mysqli_query($conn, $query);
                            $query2 = "SELECT * FROM `orders`";
                            $rs_result2 = mysqli_query($conn, $query2);
                            $totalProduct = 0;
                            $totalOrder = 0;
                            while ($row = mysqli_fetch_array($rs_result)) {
                                $totalProduct++;
                            }
                            while ($row2 = mysqli_fetch_array($rs_result2)) {
                                $totalOrder++;
                            }
                            ?>
                            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                        <div class="card-title mb-0">
                                            <h5 class="m-0 me-2">Order Statistics</h5>
                                            <small class="text-muted"><?= number_format($totalProduct, 0, ',', '.') ?> Total Products</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <h2 class="mb-2"><?= number_format($totalOrder, 0, ',', '.') ?></h2>
                                                <span>Total Order</span>
                                            </div>
                                            <div id="orderStatisticsChart"></div>
                                        </div>
                                        <ul class="p-0 m-0">
                                            <?php
                                            $query = "SELECT * FROM `products` LEFT JOIN product_images on product_images.product_id = products.product_id LEFT JOIN order_items on order_items.product_id = products.product_id ORDER BY products.product_id";
                                            $rs_result = mysqli_query($conn, $query);
                                            $no = 1;
                                            while ($row = mysqli_fetch_array($rs_result)) {
                                            ?>
                                                <li class="d-flex mb-4 pb-1">
                                                    <div class="avatar flex-shrink-0 me-3">
                                                        <img class="avatar-initial rounded bg-label-success" src="backend/<?php echo $row["image_url"] ?>" alt="-">
                                                    </div>
                                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                        <div class="me-2">
                                                            <h6 class="mb-0"><?= $row["product_name"] ?></h6>
                                                            <small class="text-muted"></small><?= $row['description'] ?></small>
                                                        </div>
                                                        <div class="user-progress">
                                                            <?php
                                                            $total = $row['price'] * $row['quantity'];
                                                            $sum = $total * $row['discount_amount'];
                                                            $sum = $total + $sum;
                                                            ?>
                                                            <small class="fw-semibold">Rp<?= number_format($sum, 0, ',', '.'); ?></small>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Order Statistics -->
                            <div class="col-md-6 col-lg-8 col-xl-8 mb-4 order 0">
                                <div class="card h-100">
                                    <?php
                                    $query = "SELECT total_amount FROM `orders` ";
                                    $rs_result = mysqli_query($conn, $query);
                                    $total_amount = 0;
                                    while ($row = mysqli_fetch_array($rs_result)) {
                                        $total_amount += $row['total_amount'];
                                    }
                                    ?>
                                    <div class="card-body px-0">
                                        <div class="tab-content p-0">
                                            <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                                                <div class="d-flex p-4 pt-3">
                                                    <div class="avatar flex-shrink-0 me-3">
                                                        <img src="assets/img/icons/unicons/wallet.png" alt="User" />
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block">Total Pendapatan</small>
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mb-0 me-1">Rp. <?= number_format($total_amount, 0, ',', '.') ?></h6>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="incomeChart"></div>
                                                <div class="d-flex justify-content-center pt-4 gap-2">
                                                    <div class="flex-shrink-0">

                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
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
        <?php
        $bulan = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $datas = array();
        foreach ($bulan as $k) {
            $query = "SELECT * FROM `orders` WHERE MONTH(order_date) = $k";
            $result = mysqli_query($conn, $query);
            $datas[] = mysqli_num_rows($result);
        }

        $orderItems = "SELECT * FROM order_items LEFT JOIN products on order_items.product_id = products.product_id ORDER BY products.product_id";
        $resultOrders = mysqli_query($conn, $orderItems);
        $dataOrder[] = $resultOrders;
        var_dump($dataOrder);
        ?>
        <script>
            var data = <?= json_encode($datas) ?>
            var order = <?= json_encode($dataOrder) ?>
            console.log(order)
        </script>
        <?php include('layouts/scripts.php') ?>
</body>

</html>