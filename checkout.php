<?php
include 'config.php';

if (isset($_POST['checkout-btn'])) {
    $username = $_SESSION['username'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $payment = $_POST['payment'];
    $location = $address . ' ' . $ward . ' ' . $district . ' ' . $city;
    $sql1 = "Select * from cart where user_name = '$username'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $product_id = (int)$row['product_id'];
            $subTotal = (int)$row['subTotal'];
            $quantity = (int)$row['quantity'];
            $sql2 = "INSERT INTO orders(user_name,product_id,subTotal,quantity,location,firstName,lastName,paymentType,status) VALUES ('$username','$product_id',$subTotal,$quantity,'$location','$firstName','$lastName','$payment','waiting for confirmation')";
            $result2  = mysqli_query($conn, $sql2);
        }
        $sql_delete = "DELETE FROM cart WHERE user_name ='$username'";
        $result3 = mysqli_query($conn, $sql_delete);
        $_SESSION['status'] = 'Order Successfully';
        $_SESSION['status_code'] = 'success';
        header("refresh:2;url=index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina&amp;display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap" />
    <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<script src="/static/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<body style="font-family: Alata, sans-serif">
    <form class="container col-8 my-5 br-2 rounded" method="POST">
        <div class="row g-3">
            <div class="col-4 order-md-last">
                <h4 class="d-flex justify-content-between align-item-center">
                    <span class="text-muted">Your Cart</span>
                    <span class="badge bg-secondary rounded-pill">3</span>
                </h4>
                <ul class="list-group">
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
                                echo '<li class="list-group-item d-flex justify-content-between">
                                    <div>
                                    <h6>' . $product_name . '</h6>
                                <span class="text-muted">Total: $' . $subTotal . '</span>
                            </div>
                            <span class="text-muted">x' . $quantity . '</span>
                            </li>';
                            }
                        }
                        echo '<hr>';
                        $username = $_SESSION['username'];
                        $sql = "SELECT ROUND(SUM(subTotal), 2)as Total FROM cart WHERE user_name ='$username'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $total = $row['Total'];
                            echo "<h5>Total: $$total</h5>";
                        }
                    }
                    ?>

                </ul>
            </div>
            <div class="col-8">
                <h4>Billing Address</h4>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="firstname">First Name</label>
                        <input type="text" name="firstname" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="lastname">Last name</label>
                        <input type="text" name="lastname" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="from-label" for="username">Username</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <?php echo '<input type="text" class="form-control" id="usrname"  value ="' . $_SESSION['username'] . '" readonly>' ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="col-5">
                        <label class="form-label" for="city">City</label>
                        <select class="form-select" name="city">
                            <option>Choose</option>
                            <option>HCM</option>
                            <option>Thu Duc</option>
                            <option>Ha Noi</option>
                            <option>Hai Phong</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="district">District</label>
                        <select class="form-select" name="district">
                            <option hidden>Choose</option>
                            <option value="Quan 1">Quan 1</option>
                            <option value="Quan 2">Quan 2</option>
                            <option value="Quan 3">Quan 3</option>
                            <option value="Quan 1">Quan Thu Duc</option>
                            <option value="Quan 1">Quan 9</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label" for="ward">Ward</label>
                        <select class="form-select" name="ward">
                            <option hidden>Choose</option>
                            <option value="Linh Xuan">Linh Xuan</option>
                            <option value="Linh Tay">Linh Tay</option>
                            <option value="Linh Chieu">Linh Chieu</option>
                        </select>
                    </div>
                </div>
                <hr>
                <h4>Payment</h4>
                <div class="form-check">
                    <input type="radio" name="payment" class="form-check-input" value="Visa" required>
                    <label class="form-check-label"><span><img style="width: 50px; height:35px" src="https://image.similarpng.com/very-thumbnail/2020/06/Logo-visa-icon-PNG.png" alt=""></span> Visa</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="payment" class="form-check-input" value="MasterCard">
                    <label class="form-check-label"><span><img style="width: 50px; height:35px" src="https://w7.pngwing.com/pngs/116/678/png-transparent-mastercard-mastercard-logo-cdr-text-orange.png" alt=""></span> MasterCard</label>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="cardname">Name on Card </label>
                        <input type="text" id="cardname" class="form-control" required>
                        <small class="text-muted">Full name as displayed on card</small>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="creditcard">Credit Card Number </label>
                        <input type="text" id="creditcard" class="form-control" required>
                    </div>
                    <div class="col-3">
                        <label class="form-label" for="expiration">Expiration </label>
                        <input type="text" id="expiration" class="form-control" required>
                    </div>
                    <div class="col-3">
                        <label class="form-label" for="cvv">CVV </label>
                        <input type="text" id="cvv" class="form-control">
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-block mb-4" name="checkout-btn">Continue To Checkout</button>

            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include "script.php";
?>