<?php
require_once('./classes/cart.php');
$cart = new Cart();
if (isset($_POST['action'])) {
  if ($_POST["action"] == "update") {
    $cart->edit_quantity($_POST['id'], $_SESSION['username'], $_POST['updateQuantity']);
  }
}
if (isset($_GET['delete_cart_product'])) {
  $cart->removeFromCart($_GET['delete_cart_product']);
}
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
  <link rel="stylesheet" href="./assets/css/cart.css" />
  <link rel="stylesheet" href="./assets/css/user-dropdown.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php include 'nav-bar-logged.php' ?>
  <main class="main">
    <div class="cart-title text-center my-5">
      <h1 style="color: #333;">Shopping Cart</h1>
    </div>
    <div class="main-cart my-5">
      <div class="container-fluid px-5">
        <div class="row">
          <div class="col-9">
            <table class="table cart-table text-center">
              <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Subtotal</th>
                  <th scope="col">Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $rows = $cart->fetchCartByUser($_SESSION['username']);
                if (!empty($rows)) {
                  foreach ($rows as $row) {
                    echo '<tr>
                    <td class="product-image">
                      <img src="./product-images/' . $row['img'] . '" alt="">
                    </td>
                    <td class="product-description">
                      <h5 class="product-name">
                        <a href="">' . $row['name'] . '</a>
                      </h5>
                      <p class="product-brand">
                        Brand:
                        <a href="">' . $row['brand_name'] . '</a>
                      </p>
                    </td>
                    <td class="product-price">
                      <span>$' . $row['price'] . '</span>
                    </td>
                    <td class="product-quantity">
                    <div class="input-group mb-3">
                    <input type="number" id="update_quantity' . $row['product_id'] . '" class="form-control"  aria-describedby="basic-addon1" min="1" value="' . $row['quantity'] . '" >
                      <div class="input-group-append">
                      <button class="btn btn-outline-secondary" name="edit_quantity" onclick = "updateQuantity(' . $row['product_id'] . ')">+</button>
                    </div>
                  </div>
                    </td>
                    <td class="product-subtotal">
                      <span>$' . $row['subTotal'] . '</span>
                    </td>
                    <td class="product-remove">
                      <a href="cart-view.php?delete_cart_product=' . $row['product_id'] . '">
                        <i class="fa-regular fa-trash-can"></i>
                      </a>
                    </td>
                  </tr>';
                  }
                }
                ?>
                <tr>
                  <td colspan="6" class="text-right">
                    <a href="#" class="text-muted"> <i class="fa fa-times" aria-hidden="true"></i>
                      Clear Cart</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-3">
            <div class="border p-md-4 p-5 rounded cart-totals">
              <div class="heading_s1 mb-3">
                <h4>Cart Totals</h4>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="cart_total_label">Shipping</td>
                      <td class="cart_total_amount">Free</td>
                    </tr>
                    <tr>
                      <td class="cart_total_label">Total</td>
                      <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">
                            <?php
                            $rows = $cart->calculateTotal($_SESSION['username']);
                            if (!empty($rows)) {
                              foreach ($rows as $row) {
                                echo "$" . '' . $row['Total'];
                              }
                            }

                            ?></span></strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <a href="./checkout-view.php" class=" btn btn-secondary btn-lg btn-block">Checkout</a>
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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script src="./assets/js/index.js"></script>
  <script src="./assets/js/cart.js"></script>
  <script>
    function updateQuantity(id) {
      const quantity = $(`#update_quantity${id}`).val();
      $(document).ready(function() {
        $.ajax({
          url: 'cart-view.php',
          type: 'POST',
          data: {
            id: id,
            updateQuantity: quantity,
            action: "update"
          },
          success: function(response) {
            if (1 == 1) {
              window.location.href = 'cart-view.php';
            } else if (response == 0) {
              alert("Didn't add to cart");
            }
          }
        });
      });
    }
  </script>
</body>

</html>