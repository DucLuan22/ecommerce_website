<?php
require_once('./classes/cart.php');
$cart = new Cart();
if (isset($_POST['edit_quantity'])) {
    $cart->edit_quantity($_POST['edit_id'], $_SESSION['username'], (int)$_POST['update_quantity']);
}
if (isset($_GET['delete_cart_product'])) {
    $cart->removeFromCart($_GET['delete_cart_product']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>

<body>

    <form method="POST">
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Quantity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <label for="descInput1">Quantity: </label>
                            <input type="text" class="form-control" id="descInput1" placeholder="Enter Quantity" name="update_quantity" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="edit_quantity">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Shopping-Cart -->
    <div id="shopping-cart">
        <div id="header">
            <ul id="nav">
                <li><a href="">Home</a></li>
            </ul>
            <div class="cart-btn">
                <i class="cart-icon ti-shopping-cart"></i>
            </div>
        </div>
        <div id="container">
            <div class="panel-body table-responsive">
                <table class="table-border ">
                    <tr class="no">
                        <th>PRODUCT</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>SUB-TOTAL</th>
                        <th></th>
                    </tr>
                    <tbody>
                        <?php
                        $rows = $cart->fetchCartByUser($_SESSION['username']);
                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                                echo '<tr>
                    <td hidden>' . $row['product_id'] . '</td>
                    <td>
                        <div class="cart-info">
                            <img src="product-images/' . $row['img'] . '" alt="" >
                            <div>' . $row['name'] . '</div>
                        </div>
                    </td>
                    <td>$' . $row['price'] . '</td>
                    <td><span><input type="text" style ="width:60px" placeholder="' . $row['quantity'] . '" readonly>
                    <a class = "btn btn-remove edit_btn" style ="width:25px" name="quantity_edit">+</a>
                    </span>
                    </td>
                    <td>$' . $row['subTotal'] . '</td>
                    <td>
                        <button class = "btn btn-remove"><a class ="text-light text-decoration-none" href="cart-view.php?delete_cart_product=' . $row['product_id'] . '">Delete</a></button>
                    </td>
                </tr>';
                            }
                        }
                        ?>
                    <tbody>
                </table>
            </div>
            <div class="total-price">
                <table>
                    <tr>
                        <td>Total</td>
                        <td><?php
                            $rows = $cart->calculateTotal($_SESSION['username']);
                            if (!empty($rows)) {
                                foreach ($rows as $row) {
                                    echo "$" . '' . $row['Total'];
                                }
                            }

                            ?></td>
                    </tr>
                    <tr>
                        <td>Discount code:</td>
                        <td>
                            <div class="form-outline">
                                <input type="text" class="form-control" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="btn-pay" value="pay"><a href="./checkout-view.php" style='color:white;text-decoration: none;'>Check Out</a></button>
                        </td>

                    </tr>
                </table>

            </div>
            <div class="back-btn">
                <button class="back-icon"><a style="color:white; font-size: larger;text-decoration: none" href="./index-logged.php" name="quantity_edit">Back To Shop</a></button>
            </div>
        </div>
    </div>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.edit_btn').click(function() {

            $('#exampleModal1').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#edit_id').val(data[0]);

        });
    });
</script>

</html>
<?php
include './config/script.php';
?>