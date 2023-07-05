<?php include('layouts/header.php') ?>
<?php
$breadcum = "products";
$page = "products";
$current = "tambah";
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

                <?php include('layouts/navbar.php') ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light"><?= ucfirst($breadcum) ?> /</span><span class="text-muted fw-light"> <a href="products.php"><?= ucfirst($page) ?></a> /</span> <?= ucfirst($current) ?>
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" action="backend/product-insert.php" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Name</label>
                                                    <input class="form-control" type="text" id="product_name" name="product_name" autofocus required />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Price</label>
                                                    <input class="form-control" type="number" id="price" name="price" min="0" autofocus required />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Category</label>
                                                    <select name="category_id" id="category_id" class="form-control" required>
                                                        <option disabled selected>Choose Category</option>
                                                        <?php
                                                        $sql = "SELECT * FROM categories";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                                <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Stock</label>
                                                    <input class="form-control" type="number" id="stock_quantity" name="stock_quantity" min="0" value="0" autofocus required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Image</label>
                                                    <input class="form-control" type="file" id="image_url" name="image_url" autofocus required />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Description</label>
                                                    <textarea name="category_description" id="category_description" cols="30" rows="10" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Save</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </form>
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
</body>

</html>