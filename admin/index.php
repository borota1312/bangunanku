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
                        <div class="card">
                            <?php
                            $query = "SELECT total_amount FROM `order_history` ";
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
            $query = "SELECT * FROM `order_history` WHERE MONTH(order_date) = $k";
            $result = mysqli_query($conn, $query);
            $datas[] = mysqli_num_rows($result);
        }
        ?>
        <script>
            var data = <?= json_encode($datas) ?>
        </script>
        <?php include('layouts/scripts.php') ?>
</body>

</html>