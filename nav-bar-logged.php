<?php
require_once('./classes/cart.php');
require_once('./classes/wishlist.php');
$wishlist = new Wishlist();
$cart = new Cart();
?>
<header>
    <div class="navbar-session container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="./assets/Images/ecommerce-logo.png" style="width: 40px" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100">
                    <li class="main-categori-wrap d-flex align-items-center" role="button">
                        <div class="categori-button-active">
                            <span class="fa-solid fa-bars"></i></span> Browse Categories
                            </a>
                        </div>
                </ul>
            </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="./index-logged.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#footer">CONTACT</a>
            </li>
            <li class="nav-item dropdown custom-dropdown">
                <a class="nav-link dropdown-toggle" id="dropdownMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0, 20">ACCOUNT <i class="far fa-user"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="./profile-view.php"><span class=""></span>Profile</a>
                    <a class="dropdown-item" href="./login-admin.php"><span class=""></span>Log out</a>
                </div>
            </li>
            </ul>
            <div class="wishlist-checkout">
                <div class="add-to-wishlist">
                    <a class="text-start" href="./wishlist-view.php">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <?php
                        $rows = $wishlist->wishlistItemsCount($_SESSION['username']);
                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                                echo '<span class="wishlist-items" style="width: 18px">' . $row['items'] . '</span>';
                            }
                        }
                        ?>
                        <span class="wishlist-items" style="width: 18px"></span>
                    </a>
                    <p class="wishlist-title my-0">My Wish List</p>
                </div>
                <div class="checkout">
                    <?php
                    $rows = $cart->CountUserCart($_SESSION['username']);
                    if (!empty($rows)) {
                        foreach ($rows as $row) {
                            echo '<a class="text-start" href="./cart-view.php"><i class="fas fa-shopping-cart"></i><span class="checkout-items" style="width: 18px">' . $row['items'] . '</span></a>';
                        }
                    }
                    ?>
                    <p class="cart-title my-0">My Cart</p>
                </div>
            </div>
    </div>
    </nav>
    </div>
</header>