<?php
require 'config.php';
if (!empty($_SESSION)) {
    $session_login = $_SESSION['login'];
    if ($session_login == true) {
        $id = $_SESSION["id"];
    }
} else {
    $id = 'null';
}
function rupiah($angka)
{
    $format_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $format_rupiah;
}
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Bangunanku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li id="Home" class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li id="Shop" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="shop.php">Shop</a>
                        <a class="dropdown-item" href="wishlist.php">Wishlist</a>
                        <a class="dropdown-item" href="product-single.html">Single Product</a>
                        <a class="dropdown-item" href="cart.php">Cart</a>
                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                    </div>
                </li>
                <li id="About" class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li id="Cart" class="nav-item cta cta-colored">
                    <a href="cart.php" class="nav-link">
                        <span class="icon-shopping_cart"></span>
                        <span id="jcart"></span>
                    </a>
                </li>

                <?php
                if ($_SESSION['login'] == true) {
                ?>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                <?php
                } else {
                ?>
                    <li id="Login" class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    <li id="Create" class="nav-item"><a href="register.php" class="nav-link">Create</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        let iduser = "<?php echo base64_encode($id); ?>";
        let checkNull = "<?php echo base64_encode("null") ?>";

        function lodetable() {
            $.ajax({
                url: 'backend/get_count_cart.php',
                type: 'POST',
                data: {
                    id_user: iduser,
                },
                success: function(data) {
                    $("#jcart").html("[" + data + "]");
                }
            });
        }
        lodetable();

        $(document).on("click", "#addCart", function(e) {
            e.preventDefault();
            if (iduser == checkNull) {
                window.location.href = "login.php";
            } else {
                let id = $(this).data('id');
                // console.log(id)
                $.ajax({
                    url: 'backend/cart_data_insert.php',
                    type: 'POST',
                    data: {
                        id_user: iduser,
                        cart_id: id
                    },
                    success: function(data) {
                        lodetable();
                        Swal.fire(
                            'Berhasil',
                            data,
                            'success'
                        )
                        // alert(data);
                    }
                });
            }
        });

        $(document).on("click", "#addWish", function(e) {
            e.preventDefault();
            if (iduser == checkNull) {
                window.location.href = "login.php";
            } else {
                let id = $(this).data('id');
                // console.log(id)
                $.ajax({
                    url: 'backend/wish_data_insert.php',
                    type: 'POST',
                    data: {
                        id_user: iduser,
                        wish_id: id
                    },
                    success: function(data) {
                        Swal.fire(
                            'Berhasil',
                            data,
                            'success'
                        )
                    }
                });
            }
        });
        let page = "<?php echo $page; ?>";
        let idtarget = "";
        if (page == "Wishlist" || page == "Cart" || page == "Shop") {
            idtarget = document.getElementById("Shop");
            idtarget.className += " active";
        } else {
            idtarget = document.getElementById(page);
            idtarget.className += " active";
        }

    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
</script>