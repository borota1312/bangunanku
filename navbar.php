<?php
require 'config.php';
if (!empty($_SESSION)) {
    $session_login = $_SESSION['login'];
    if ($session_login==true) {
        $id = $_SESSION["id"];
    }
} else {
    $session_login = 'null';
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
                <li id="Cart" class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
                
                <?php
                if ($_SESSION['login']==true) {
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

<script>
    let page = "<?php echo $page;?>";
    let idtarget = "";
    if (page=="Wishlist" || page=="Cart") {
        idtarget = document.getElementById("Shop");
        idtarget.className += " active";
    } else {
        idtarget = document.getElementById(page);
        idtarget.className += " active";
    }
</script>