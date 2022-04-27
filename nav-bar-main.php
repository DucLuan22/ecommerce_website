<?php
require_once('./classes/cart.php');
$cart = new Cart();
?>
<header>
    <div class="container-fluid">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="./assets/Images/ecommerce-logo.png" width="100px" style="width: 80px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index-logged.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown" id="shopDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">SHOP
                        </a>
                        <ul class="dropdown-menu main-menu" aria-labelledby="shopDropdown">
                            <li class="nav-item">
                                <a class="nav-link" href="/blog-1">Grid (2 in Row)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog-2">Grid (3 in Row)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog-3">Grid (4 in Row)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog-4">Grid (Full Width)</a>
                            </li>
                            <li class="nav-item dropdown-submenu" id="sub-nav">
                                <a class="nav-link" href="#">Single Post</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Second level</a></li>
                                    <li><a href="#">Second level</a></li>
                                    <li><a href="#">Second level</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog-5">Right Sidebar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#footer">CONTACT</a>
                    </li>
                    <li class="nav-item dropdown custom-dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdownMenuButton" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0, 20">ACCOUNT <i class="far fa-user"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><span class=""></span>Following</a>
                            <a class="dropdown-item" href="./profile-view.php"><span class=""></span>Setting</a>
                            <a class="dropdown-item" href="./login.php"><span class=""></span>Logout</a>
                        </div>
                    </li>
                </ul>

                <div class="search-field">
                    <input type="text" class="search-input" placeholder="I'm looking for..." style="width: 200px" />
                    <button class="search-btn" type="button">
                        <i class="fa fa-search"></i>
                    </button>
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
                </div>
            </div>
        </nav>
    </div>
</header>