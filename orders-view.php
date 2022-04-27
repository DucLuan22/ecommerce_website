<?php
require_once('./classes/orders.php');
$order = new Order();
if (isset($_GET['confirm_id_order'])) {
    $order->confirmedOrder();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina&amp;display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap" />
    <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<script src="/static/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<body style="font-family: Alata, sans-serif">
    <?php
    include 'nav-bar.php';
    ?>

    <!-- Table -->
    <div class="container">
        <form method="GET">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Location</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rows = $order->fetch();
                    if (!empty($rows)) {
                        foreach ($rows as $row) {
                            echo '<tr>
                        <td>' . $row['order_id'] . '</td>
                        <td>' . $row['user_name'] . '</td>
                        <td>' . $row['product_name'] . '</td>
                        <td>' . $row['quantity'] . '</td>
                        <td>$' . $row['subTotal'] . '</td>
                        <td>' . $row['paymentType'] . '</td>
                        <td>' . $row['location'] . '</td>
                        <td>' . $row['status'] . '</td>
                        <td scope="row">
        <button class="btn btn-primary"><a class="text-light text-decoration-none" href="index.php?confirm_id_order=' . $row['order_id'] . '">Confirmed</a></button>
        <button class="btn btn-danger"><a class="text-light text-decoration-none" href="index.php?delete_id_order=' . $row['order_id'] . '">Delete</a></button>
                </td>
                    </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
<?php
include "./config/script.php";
?>