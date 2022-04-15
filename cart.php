<?php
include "config.php";

if (isset($_POST['edit_quantity'])) {
    $id = $_POST['edit_id'];
    $quantity = (int)$_POST['update_quantity'];
    $username = $_SESSION['username'];

    $sql = "UPDATE cart SET quantity= $quantity WHERE product_id ='$id' AND user_name = '$username'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $sql_price = "SELECT price FROM product WHERE id ='$id'";
        $query_2 = mysqli_query($conn, $sql_price);
        while ($row = mysqli_fetch_assoc($query_2)) {
            $price = $row['price'];
            $sql_3 = "UPDATE cart SET subTotal = quantity * $price WHERE product_id = '$id' AND user_name ='$username'";
            $update_quantity = mysqli_query($conn, $sql_3);
            header("refresh:0;url=cart.php");
        }
    }
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
                <li><a href="">Product</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">About</a></li>
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
                        $username = $_SESSION['username'];
                        $sql = "Select * from cart where user_name ='$username'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['product_id'];
                                $subTotal = $row['subTotal'];
                                $quantity = $row['quantity'];
                                $total = 0;
                                $sql_2 = "Select * from product where id ='$product_id'";
                                $result_2 = mysqli_query($conn, $sql_2);
                                while ($row_2 = mysqli_fetch_assoc($result_2)) {
                                    $product_name = $row_2['name'];
                                    $price = $row_2['price'];
                                    $image = $row_2['img'];
                                    echo '<tr>
                    <td hidden>' . $product_id . '</td>
                    <td>
                        <div class="cart-info">
                            <img src="product-images/' . $image . '" alt="" >
                            <div>' . $product_name . '</div>
                        </div>
                    </td>
                    <td>$' . $price . '</td>
                    <td><span><input type="text" style ="width:60px" placeholder="' . $quantity . '" readonly>
                    <a class = "btn btn-remove edit_btn" style ="width:25px" name="quantity_edit">+</a>
                    </span>
                    </td>
                    <td>$' . $subTotal . '</td>
                    <td>
                        <button class = "btn btn-remove"><a class ="text-light text-decoration-none" href="delete.php?delete_cart_product=' . $product_id . '">Delete</a></button>
                    </td>
                </tr>';
                                }
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
                            $username = $_SESSION['username'];
                            $sql = "SELECT ROUND(SUM(subTotal), 2)as Total FROM cart WHERE user_name ='$username'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['Total'];
                                echo "$$total";
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
                            <button type="submit" class="btn-pay" value="pay"><a href="./checkout.php" style='color:white;text-decoration: none;'>Check Out</a></button>
                        </td>

                    </tr>
                </table>

            </div>
            <div class="back-btn">
                <button class="back-icon"><a style="color:white; font-size: larger;text-decoration: none" href="./index.php" name="quantity_edit">Back To Shop</a></button>
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
include 'script.php';
?>