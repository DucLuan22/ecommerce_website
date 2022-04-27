<?php
require_once('./classes/product.php');
require_once('./classes/cart.php');
require_once('./classes/category.php');
if (!$_SESSION['username']) {
  $_SESSION['username'] = '';
}
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
              <a class="nav-link dropdown-toggle" id="dropdownMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0, 20">ACCOUNT <i class="far fa-user"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="profile-view.php"><span class=""></span>Setting</a>
                <a class="dropdown-item" href="login.php"><span class=""></span>Logout</a>
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
            <a class="text-start" href="#"><i class="fas fa-shopping-cart"></i><span class="checkout-items" style="width: 18px">0</span></a>
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
            <h1 class="hero-title animate__animated animate__delay-1s">Hero Technology</h1>
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
        <h1>Featured Products</h1>
      </div>
      <div class="top-products__body">
        <div class="row top-products__list">
          <!- Start --->
            <?php
            $rows = $product->fetch();
            if (!empty($rows)) {
              foreach ($rows as $row) {
                echo '<div class="col-12 col-md-6 top-products__item col-lg-3">
              <div class="top-products__item__img">
              <form method="POST">
                <input type="text" value ="' . $row['id'] . '" name="product_id" hidden></input>
                <img src="product-images/' . $row['img'] . '" href="product-detail.php?product_id=' . $row['id'] . '" style="width: 100%"/>
              </div>
              <a class="item-name"  href="product-detail.php?product_id=' . $row['id'] . '">' . $row['name'] . '<a>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                </p>
                </form>
              </div>
              <strong>$' . $row['price'] . '</strong>
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
        <div class="all-brands-header d-flex justify-content-between mb-5">
          <h1 class="text-left">Brands</h1>
          <div id="filters" class="button-group text-right">
            <button class="btn is-checked" data-filter="*">All</button>
            <button class="btn" data-filter=".Xiaomi">Apple</button>
            <button class="btn" data-filter=".Samsung">Samsung</button>
            <button class="btn" data-filter=".Xiaomi">Xiaomi</button>
            <button class="btn" data-filter=".Asus">Asus</button>
            <button class="btn" data-filter=".Dell">Dell</button>
            <button class="btn" data-filter=".Lenovo">Lenovo</button>
            <button class="btn" data-filter=".HP">HP</button>

          </div>
        </div>
        <div class="grid">
          <div class="grid-item Apple">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/42/153856/iphone-xi-do-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">Iphone 11 64GB</h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                </p>
              </div>
              <strong>16.490.000VND</strong>
            </div>
          </div>
          <div class="grid-item Apple">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/42/213033/iphone-12-pro-max-xam-new-600x600-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">Iphone 12 Pro Max 256GB</h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-star-half"></i>
                </p>
              </div>
              <strong>31.990.000VND</strong>
            </div>
          </div>
          <div class="grid-item Xiaomi">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/42/251216/Xiaomi-11T-Grey-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">Xiaomi 11T 5G 256GB</h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-star-half"></i>
                </p>
              </div>
              <strong>11.990.000VND</strong>
            </div>
          </div>
          <div class="grid-item Samsung">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/42/267211/Samsung-Galaxy-S21-FE-tim-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">Samsung Galaxy S21 FE 5G</h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                </p>
              </div>
              <strong>15.990.000VND</strong>
            </div>
          </div>
          <div class="grid-item Xiaomi">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/42/262566/xiaomi-11t-pro-5g-8gb-thumb-600x600.jpeg" style="width: 100%" />
              </div>
              <h3 class="item-name">Xiaomi 11T Pro 5G</h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                </p>
              </div>
              <strong>13.990.000VND</strong>
            </div>
          </div>
          <div class="grid-item Xiaomi">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/42/233241/xiaomi-mi-11-lite-4g-blue-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">Xiaomi Mi 11 series</h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                </p>
              </div>
              <strong>7.990.000VND</strong>
            </div>
          </div>
          <div class="grid-item Apple">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/44/239552/macbook-air-m1-2020-gray-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">Macbook Air M1 2020 7-CORE GPU</h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-star-half"></i>
                </p>
              </div>
              <strong>30.990.000VND</strong>
            </div>
          </div>
          <div class="grid-item Apple">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/44/253581/apple-macbook-pro-14-m1-pro-2021-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">
                MacBook Pro 14 M1 Pro 2021/14 core-GPU
              </h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-star-half"></i>
                </p>
              </div>
              <strong>52.990.000VND</strong>
            </div>
          </div>

          <div class="grid-item Lenovo">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/44/269603/lenovo-ideapad-3-14itl6-i5-1135g7-8gb-512gb-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">
                Lenovo IdeaPad 3 14ITL6 i5 1135G7 (82H700WAVN)
              </h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-star-half"></i>
                </p>
              </div>
              <strong>17.690.000VND</strong>
            </div>
          </div>
          <div class="grid-item Dell">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/44/264354/dell-gaming-g15-5511-i5-70266676-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">
                Dell Gaming G15 5511 i5 11400H (70266676)
              </h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-star-half"></i>
                </p>
              </div>
              <strong>27.490.000VND</strong>
            </div>
          </div>
          <div class="grid-item HP">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/44/242415/hp-elitebook-x360-1040-g8-i7-3g1h4pa-18-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">
                HP EliteBook X360 1040 G8 i7 1165G7 (3G1H4PA)
              </h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-star-half"></i>
                </p>
              </div>
              <strong>48.890.000VND</strong>
            </div>
          </div>
          <div class="grid-item Asus">
            <div class="top-products__item">
              <div class="top-products__item__img">
                <img src="https://cdn.tgdd.vn/Products/Images/44/269582/asus-zenbook-ux425ea-i5-1135g7-8gb-512gb-600x600.jpg" style="width: 100%" />
              </div>
              <h3 class="item-name">
                Asus ZenBook UX425EA i5 1135G7 (KI839W)
              </h3>
              <div class="item-rating">
                <p>
                  <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-star-half"></i>
                </p>
              </div>
              <strong>22.690.000VND</strong>
            </div>
          </div>
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
  <script src="./assets/js/Card-Carousel.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/js/index.js"></script>
</body>

</html>