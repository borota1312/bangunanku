<?php
// require 'config.php';
if ($page == "Shop") {
?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <?php
                        if (isset($_GET['kategori'])) {
                            echo "<li><a href='shop.php'>All</a></li>";
                        } else {
                            echo "<li><a href='shop.php' class='active'>All</a></li>";
                        }

                        $queryc = "SELECT * FROM categories";
                        $rs_resultc = mysqli_query($conn, $queryc);
                        // echo $queryc;
                        while ($rowc = mysqli_fetch_array($rs_resultc)) {
                            if (isset($_GET['kategori'])) {
                                if (base64_decode($_GET['kategori']) == $rowc["category_id"]) {
                                    echo "<li><a class='active' href='shop.php?kategori=" . base64_encode($rowc["category_id"]) . "'>" . $rowc["category_name"] . "</a></li>";
                                } else {
                                    echo "<li><a href='shop.php?kategori=" . base64_encode($rowc["category_id"]) . "'>" . $rowc["category_name"] . "</a></li>";
                                }
                            }
                        }

                        ?>


                    </ul>
                </div>
            </div>
        <?php
    }
        ?>
        <div class="row">
            <?php
            $per_page_record = 12;
            $query = "SELECT * FROM products INNER JOIN product_images ON products.product_id=product_images.product_id";

            if (isset($_GET["kategori"])) {
                $kategori = base64_decode($_GET["kategori"]);
                $query = "$query AND category_id=$kategori";
            }

            if (isset($_GET["page"])) {
                $halaman = $_GET["page"];
            } else {
                $halaman = 1;
            }

            $start_from = ($halaman - 1) * $per_page_record;
            $query = "$query LIMIT $start_from, $per_page_record";

            $rs_result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($rs_result)) {
            ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="admin/backend/<?php echo $row["image_url"] ?>" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a><br>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#"><?php echo $row["product_name"] ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span> <?php echo rupiah($row["price"]) ?></span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="product-single.php?produk=<?php echo base64_encode($row['product_id']); ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" id="addCart" data-id="<?php echo $row['product_id']; ?>" class=" buy-now d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <!-- tag scriptnya ada di navbar.php -->
                                    <a href="#" id="addWish" data-id="<?php echo $row['product_id']; ?>" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                    <!-- tag scriptnya ada di navbar.php -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
        if ($page == "Shop") {
            if (isset($_GET["kategori"])) {
                $query = "SELECT COUNT(*) FROM products WHERE category_id=$kategori";
            } else {
                $query = "SELECT COUNT(*) FROM products";
            }

            $rs_result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / $per_page_record);
            $pageLink = "";
        ?>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <?php
                            if (isset($_GET["kategori"])) {
                                if ($halaman >= 2) {
                                    echo "<li><a href='shop.php?kategori=" . $_GET["kategori"] . "&page=" . ($halaman - 1) . "'>&lt;</a></li>";
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $halaman) {
                                        $pageLink .= "<li class='active'><span>" . $i . "</span></li>";
                                    } else {
                                        $pageLink .= "<li><a href='shop.php?kategori=" . $_GET["kategori"] . "&page=" . $i . "'>" . $i . "</a></li>";
                                    }
                                }
                                echo $pageLink;
                                if ($halaman < $total_pages) {
                                    echo "<li><a href='shop.php?kategori=" . $_GET["kategori"] . "&page=" . ($halaman + 1) . "'>&gt;</a></li>";
                                }
                            } else {
                                if ($halaman >= 2) {
                                    echo "<li><a href='shop.php?page=" . ($halaman - 1) . "'>&lt;</a></li>";
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $halaman) {
                                        $pageLink .= "<li class='active'><span>" . $i . "</span></li>";
                                    } else {
                                        $pageLink .= "<li><a href='shop.php?page=" . $i . "'>" . $i . "</a></li>";
                                    }
                                }
                                echo $pageLink;
                                if ($halaman < $total_pages) {
                                    echo "<li><a href='shop.php?page=" . ($halaman + 1) . "'>&gt;</a></li>";
                                }
                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
        }
?>