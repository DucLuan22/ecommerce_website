<?php
require_once('./classes/product.php');
require_once('./classes/cart.php');
require_once('./classes/category.php');

$product = new Product();
$cart = new Cart();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Project Ecommerce</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/best-carousel-slide.css" />
  <link rel="stylesheet" href="./assets/css/Responsive.css" />
  <link rel="stylesheet" href="./assets/css/styles.css" />
  <link rel="stylesheet" href="./assets/css/user-dropdown.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <div class="container-fluid">
      <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="./assets/Images/ecommerce-logo.png" width="100px" style="width: 80px" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
              <a class="nav-link dropdown-toggle" id="dropdownMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0, 20">ACCOUNT <i class="far fa-user"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#"><span class=""></span>Following</a>
                <a class="dropdown-item" href="./profile-view.php"><span class=""></span>Setting</a>
                <a class="dropdown-item" href="./login.php"><span class=""></span>Logout</a>
              </div>
            </li>
          </ul>

          <div class="checkout">
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
        </div>
      </nav>
    </div>
  </header>

  <section id="banner">
    <div class="container-fluid">
      <div class="owl-carousel owl-theme banner">
        <div class="item">
          <div class="bg-light border rounded border-light hero-nature carousel-hero jumbotron py-5 px-4">
            <h1 class="hero-title animate__animated animate__backInRight animate__delay-1s">
              Hero
            </h1>
            <p class="hero-subtitle animate__animated animate__backInRight animate__delay-2s">
              Nullam id dolor id nibh ultricies vehicula ut id elit. Cras
              justo odio, dapibus ac facilisis in, egestas eget quam.
            </p>
            <p>
              <a class="btn btn-primary hero-button plat animate__animated animate__backInRight animate__delay-3s" role="button" href="#">Learn more</a>
            </p>
          </div>
        </div>
        <div class="item">
          <div class="bg-light border rounded border-light hero-photography carousel-hero jumbotron py-5 px-4">
            <h1 class="hero-title animate__animated animate__delay-1s">
              Hero Photography
            </h1>
            <p class="hero-subtitle animate__animated animate__delay-2s">
              Nullam id dolor id nibh ultricies vehicula ut id elit. Cras
              justo odio, dapibus ac facilisis in, egestas eget quam.
            </p>
            <p>
              <a class="btn btn-primary hero-button plat animate__animated animate__delay-3s" role="button" href="#">Learn more</a>
            </p>
          </div>
        </div>
        <div class="item">
          <div class="bg-light border rounded border-light hero-technology carousel-hero jumbotron py-5 px-4">
            <h1 class="hero-title animate__animated animate__delay-1s">
              Hero Technology
            </h1>
            <p class="hero-subtitle animate__animated animate__delay-2s">
              Nullam id dolor id nibh ultricies vehicula ut id elit. Cras
              justo odio, dapibus ac facilisis in, egestas eget quam.
            </p>
            <p>
              <a class="btn btn-primary hero-button plat animate__animated animate__delay-3s" role="button" href="#">Learn more</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="top-products">
    <div class="container top-products">
      <div class="top-products__header">
        <h1>Featured Smartphone</h1>
      </div>
      <div class="top-products__body">
        <div class="row top-products__list">
          <?php
          $rows = $product->fetchByCategory('5');
          if (!empty($rows)) {
            foreach ($rows as $row) {
              echo '<div class="col-12 col-md-6 top-products__item col-lg-3">
              <div class="top-products__item__img">
              <form method="POST">
                <input type="text" value ="' . $row['productID'] . '" name="product_id" hidden></input>
                <img src="product-images/' . $row['img'] . '" href="product-detail.php?product_id=' . $row['productID'] . '" style="width: 100%"/>
              </div>
              <a class="item-name"  href="product-detail.php?product_id=' . $row['productID'] . '">' . $row['name'] . '<a>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                </p>
                </form>
              </div>
              <strong>$' . $row['price'] . '</strong>
              <div class="wishlist" data-bs-toggle="tooltip" data-bs-placement="auto" title="Add to wishlist">
              <a class="heart fa fa-heart-o" aria-hidden="true" style="color: #e91111;"></a>
            </div>
            </div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
    <div class="container top-products">
      <div class="top-products__header">
        <h1><strong>Featured</strong> Laptop</h1>
      </div>
      <div class="top-products__body">
        <div class="top-products__list">
          <div class="owl-carousel owl-theme featured-laptop">

            <?php
            $rows = $product->fetchByCategory('3');
            if (!empty($rows)) {
              foreach ($rows as $row) {
                echo '<div class="top-products__item item">
              <div class="top-products__item__img">
                <img src="product-images/' . $row['img'] . '" style="width: 100%" />
              </div>
              <a class="item-name" href="product-detail.php?product_id=' . $row['productID'] . '">' . $row['name'] . '<a>
                  <div class="item-rating">
                    <p>
                      <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                    </p>
                  </div>
                  <strong>$' . $row['price'] . '</strong>
                  <div class="wishlist" data-bs-toggle="tooltip" data-bs-placement="auto" title="Add to wishlist">
                    <a class="heart fa fa-heart-o" aria-hidden="true" style="color: #e91111;"></a>
                  </div>
            </div>';
              }
            }
            ?>



          </div>
        </div>
      </div>
    </div>
    <div class="container all-brands">
      <div>
        <div class="all-brands-header mb-5">
          <h1 class="text-left text-center">Brands</h1>
          <div class="search-session d-flex justify-content-center">
            <div class="search-bar">
              <select id="brands">
                <option value="*">All</option>
                <option value=".Apple">Apple</option>
                <option value=".Samsung">Samsung</option>
                <option value=".Xiaomi">Xiaomi</option>
                <option value=".Asus">Asus</option>
                <option value=".Dell">Dell</option>
                <option value=".Lenovo">Lenovo</option>
                <option value=".HP">HP</option>
              </select>
              <div class="search-field">
                <input type="text" class="search-input" placeholder="I'm looking for..." style="width: 200px" />
                <button class="search-btn" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="grid">
          <?php
          $rows = $product->fetch();
          if (!empty($rows)) {
            foreach ($rows as $row) {
              echo '<div class="grid-item ' . $row['brand_name'] . '">
                        <div class="top-products__item">
                            <div class="top-products__item__img">
                                <img src="./product-images/' . $row['img'] . '" style="width: 100%" />
                            </div>
                            <a class="item-name"  href="product-detail.php?product_id=' . $row['id'] . '">' . $row['name'] . '<a>
                            <div class="item-rating">
                                <p>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                </p>
                            </div>
                            <strong>$' . $row['price'] . '</strong>
                            <div class="wishlist" data-bs-toggle="tooltip" data-bs-placement="auto" title="Add to wishlist">
                <a class="heart fa fa-heart-o" aria-hidden="true" style="color: #e91111;"></a>
              </div>
                        </div>
                    </div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <section id="footer">
    <footer>
      <div class="container">
        <div class="row">
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <div class="store-info">
              <h3>About the store</h3>
              <div class="info">
                <ul class="contact-info">
                  <li>
                    <i class="fa-solid fa-location-dot"></i>
                    <a href="http://maps.google.com/?q=Wonder Street,
                      USA, New York">Wonder Street, USA, New York</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:+1-541-754-3010
                      ">+1-541-754-3010
                    </a>
                  </li>
                  <li>
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto: abc@example.com">abc@example.com</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <h3>Follow us</h3>
            <ul class="social-network-info">
              <li>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
              </li>
              <li>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
              </li>
              <li>
                <a href=""><i class="fa-brands fa-github"></i></a>
              </li>
              <li>
                <a href=""><i class="fa-brands fa-linkedin"></i></a>
              </li>
            </ul>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <h3>Customer support</h3>
            <ul>
              <li><a href="">My account</a></li>
              <li><a href="">Checkout</a></li>
              <li><a href="">Cart</a></li>
              <li><a href="">FAQ's</a></li>
              <li><a href="">Help and support</a></li>
            </ul>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <h3>Site information</h3>
            <ul>
              <li><a href="">Accessibility</a></li>
              <li><a href="">Term and conditions</a></li>
              <li><a href="">Privacy notices</a></li>
              <li><a href="">Cookie policy</a></li>
              <li><a href="">Fraud and scam alert</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./assets/js/index.js"></script>
</body>
</html>