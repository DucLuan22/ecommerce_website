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
              <span class="fa-solid fa-bars"></span> Browse Categories
            </div>
            <div class="categori-dropdown-wrap categori-dropdown-active-large">
              <ul>
                <li class="has-children">
                  <a href="shop-grid-right.html"><i class="fa fa-mobile" aria-hidden="true"></i>
                    <span>Phone</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-block">
                      <li class="mega-menu-col">
                        <ul class="d-block">
                          <li class="mega-menu-col">
                            <ul>
                              <li>
                                <span class="submenu-title">Hot &amp; Trending</span>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Iphone</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Samsung</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Xiaomi</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Oppo</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Realme</a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="has-children">
                  <a href="shop-grid-right.html"><i class="fa fa-laptop" aria-hidden="true"></i>
                    <span>Laptop</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-block">
                      <li class="mega-menu-col">
                        <ul class="d-block">
                          <li class="mega-menu-col">
                            <ul>
                              <li>
                                <span class="submenu-title">Hot &amp; Trending</span>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Mac</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">HP</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Dell</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Lenovo</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">ASUS</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">ACER</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">LG</a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="has-children">
                  <a href="shop-grid-right.html"><i class="fa fa-tablet" aria-hidden="true"></i>
                    <span>Tablet</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-block">
                      <li class="mega-menu-col">
                        <ul class="d-block">
                          <li class="mega-menu-col">
                            <ul>
                              <li>
                                <span class="submenu-title">Hot &amp; Trending</span>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">iPad Pro</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">iPad Air</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">iPad Mini</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Samsung Tab</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Lenovo Tab</a>
                              </li>
                              <li>
                                <a class="dropdown-item nav-link nav_item" href="#">Xiaomi Pad</a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
      </div>

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