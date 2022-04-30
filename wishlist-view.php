<?php
require_once('./classes/product.php');
require_once('./classes/cart.php');
require_once('./classes/category.php');
require_once('./classes/wishlist.php');

$product = new Product();
$cart = new Cart();
$wishlist = new Wishlist();
if (isset($_GET['product_id_delete'])) {
  $wishlist->remove($_GET['product_id_delete'], $_SESSION['username']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>main</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap" />
  <link rel="stylesheet" href="assets/css/styles.css" />
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

<body style="font-family: Alata, sans-serif">
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
              <a class="nav-link dropdown-toggle" id="dropdownMenuButton" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0, 20">ACCOUNT <i class="far fa-user"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="./wishlist.php"><span class=""></span>Wishlist</a>
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
  <div class="container">
    <h1>Your Wishlist</h1>
    <form action="" method="GET">
      <div id='#product-display' class="container">
        <div class="row">
          <?php
          $rows = $wishlist->fetch($_SESSION['username']);
          if (!empty($rows)) {
            foreach ($rows as $row) {
              echo '<div class="card" style="width: 16rem;margin: 0.5rem 0.5rem;">
          <img class="card-img-top" src="product-images/' . $row['img'] . '" alt="Card image cap">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">' . $row['product_name'] . '</h5>
            <p class="card-text text-center">Price: $' . $row['price'] . '</p>
            <button type="button" class="btn btn-dark">
            <a class ="text-light text-decoration-none" href="product-detail.php?product_id=' . $row['product_id'] . '">🛒 Order</a>
            </button>
            <a class ="text-dark text-decoration-none" style="text-align:center" href="wishlist-view.php?product_id_delete=' . $row['product_id'] . '">Remove From Wishlist</a>
          </div>
          </div>';
            }
          } else if ($rows == null) {
            echo '<h3 style="text-align:center;color:gray;">Your wishlist is empty.</h3>';
          }
          ?>

        </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./assets/js/index.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
include './config/script.php';
?>