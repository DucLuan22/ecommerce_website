<?php
require_once('./classes/product.php');
require_once('./classes/category.php');
$category = new Category();
$product = new Product();
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Project Ecommerce</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/Responsive.css" />
  <link rel="stylesheet" href="./assets/css/styles.css" />
  <link rel="stylesheet" href="./assets/css/product-filter.css" />
  <link rel="stylesheet" href="./assets/css/filter-price.css" />
  <link rel="stylesheet" href="./assets/css/user-dropdown.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php include 'nav-bar-logged.php' ?>

  <main class="main">
    <div class="container">
      <div class="page-header breadcrumb-wrap">
        <div class="container">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index-logged.php">Home</a></li>
            <?php
            $rows = $category->fetchByID($_GET['category_id']);
            if (!empty($rows)) {
              foreach ($rows as $row) {
                echo '<li class="breadcrumb-item"><a href="#">' . $row['name'] . '</a></li>';
              }
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="products-filter-bar">
        <div class="container">
          <div class="filter-bar d-flex justify-content-end align-items-center">
            <strong class="filter-label">Filter:</strong>
            <div class="category-filter py-2 px-4">
              <details class="category-select">
                <summary class="radios">
                  <input type="radio" name="category" id="default" title="Category" checked="" />
                  <input type="radio" name="category" id="category1" title="Phone" />
                  <input type="radio" name="category" id="category2" title="Laptop" />
                  <input type="radio" name="category" id="category3" title="Tablet" />
                  <input type="radio" name="category" id="category4" title="Watch" />
                  <input type="radio" name="category" id="category5" title="Headphone" />
                </summary>
                <ul class="list">
                  <li>
                    <label for="category1">Phone</label>
                  </li>
                  <li>
                    <label for="category2">Laptop</label>
                  </li>
                  <li>
                    <label for="category3">Tablet</label>
                  </li>
                  <li>
                    <label for="category4">Watch</label>
                  </li>
                  <li>
                    <label for="category5">Headphone</label>
                  </li>
                </ul>
              </details>
            </div>
            <div class="brand-filter py-2 px-4">
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
            </div>
            <div class="sort-filter py-2 px-4">
              <details class="category-select">
                <summary class="radios">
                  <input type="radio" name="sort" id="default" title="Sort" checked="" />
                  <input type="radio" name="sort" id="high-low" title="High to Low" />
                  <input type="radio" name="sort" id="low-high" title="Low to High" />
                </summary>
                <ul class="list">
                  <li>
                    <label for="high-low">High to Low</label>
                  </li>
                  <li>
                    <label for="low-high">Low to High</label>
                  </li>
                </ul>
              </details>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-8">
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
                <input type="text" class="search-input" placeholder="I'm looking for..." />
                <button class="search-btn" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="grid mt-4">
            <?php
            $rows = $product->fetchByCategory($_GET['category_id']);
            if (!empty($rows)) {
              foreach ($rows as $row) {
                echo '<div class="grid-item ' . $row['brand_name'] . '">
                <div class="top-products__item">
                  <div class="top-products__item__img">
                    <img src="./product-images/' . $row['img'] . '" style="width: 100%" />
                  </div>
                  <a class="item-name"  href="product-detail.php?product_id=' . $row['productID'] . '">' . $row['name'] . '</a>
                  <div class="item-rating">
                    <p>
                      <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                    </p>
                  </div>
                  <strong>$' . $row['price'] . '</strong>
                </div>
              </div>';
              }
            }
            ?>
          </div>
        </div>
        <div class="col-4">
          <div class="wrapper">
            <header>
              <h2 class="text-center">Price Range</h2>
            </header>
            <div class="price-input">
              <div class="field">
                <span><i class="fa-solid fa-dollar-sign"></i></span>
                <input type="number" class="input-min" value="2500" />
              </div>
              <div class="separator">-</div>
              <div class="field">
                <span><i class="fa-solid fa-dollar-sign"></i></span>
                <input type="number" class="input-max" value="7500" />
              </div>
            </div>
            <div class="slider">
              <div class="progress"></div>
            </div>
            <div class="range-input">
              <input type="range" class="range-min" min="0" max="10000" value="2500" step="100" />
              <input type="range" class="range-max" min="0" max="10000" value="7500" step="100" />
            </div>
            <div class="mt-5 d-flex justify-content-center">
              <button class="filter-button" role="button">
                <i class="fa-solid fa-filter"></i>Filter
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./assets/js/index.js"></script>
  <script src="./assets/js/product-filter.js"></script>
</body>

</html>