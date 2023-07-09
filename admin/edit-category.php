<?php include('layouts/header.php') ?>
<?php
$breadcum = "products";
$page = "category";
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
                            <span class="text-muted fw-light"><?= ucfirst($breadcum) ?> /</span><span class="text-muted fw-light"> <a href="category.php"><?= ucfirst($page) ?></a> /</span> <?= ucfirst($current) ?>
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $category_id = $_GET['id'];
                                        $data = mysqli_query($conn, "select * from categories where category_id='$category_id'");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <form method="post" action="backend/category-update.php">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="firstName" class="form-label">Name</label>
                                                        <input type="hidden" id="category_id" name="category_id" autofocus value="<?= $d['category_id']; ?>" />
                                                        <input class="form-control" type="text" id="category_name" name="category_name" autofocus value="<?= $d['category_name']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="lastName" class="form-label">Description</label>
                                                        <textarea name="category_description" id="category_description" cols="30" rows="10" class="form-control"><?= $d['category_description']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2">Save</button>
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