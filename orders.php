<?php
include 'config.php';
include 'redirect_handler.php';

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
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Location</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $username = $_SESSION['username'];
                    $sql = "Select * from orders where user_name ='$username'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $order_id = $row['order_id'];
                            $product_id = $row['product_id'];
                            $subTotal = $row['subTotal'];
                            $quantity = $row['quantity'];
                            $location = $row['location'];
                            $status = $row['status'];
                            $sql_2 = "Select * from product where id ='$product_id'";
                            $result_2 = mysqli_query($conn, $sql_2);
                            while ($row_2 = mysqli_fetch_assoc($result_2)) {
                                $product_name = $row_2['name'];
                                echo '<tr>
                        <td>' . $order_id . '</td>
                        <td>' . $product_name . '</td>
                        <td>' . $quantity . '</td>
                        <td>$' . $subTotal . '</td>
                        <td>' . $location . '</td>
                        <td>' . $status . '</td>
                        <td scope="row">
        <button class="btn btn-primary"><a class="text-light text-decoration-none" href="module.php?confirm_id_order=' . $order_id . '">Confirmed</a></button>
        <button class="btn btn-danger"><a class="text-light text-decoration-none" href="delete.php?delete_id_order=' . $order_id . '">Delete</a></button>
                </td>
                    </tr>';
                            }
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
include "script.php";
?>