<?php
include 'config.php';
include 'redirect_handler.php';
if (isset($_GET['delete_id_category'])) {
    $id = $_GET['delete_id_category'];
    $sql = "delete from category where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect('category.php');
    } else {
        echo "<script>alert('Error')</script>";
    }
}

if (isset($_GET['delete_id_brand'])) {
    $id = $_GET['delete_id_brand'];
    $sql = "delete from brand where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect('brand.php');
    } else {
        echo "<script>alert('Error')</script>";
    }
}

if (isset($_GET['delete_id_product'])) {
    $id = $_GET['delete_id_product'];
    $sql = "delete from product where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect('product.php');
    } else {
        echo "<script>alert('Error')</script>";
    }
}

if (isset($_GET['delete_cart_product'])) {
    $id = $_GET['delete_cart_product'];
    $sql = "delete from cart where product_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect('cart.php');
    } else {
        echo "<script>alert('Error')</script>";
    }
}

if (isset($_GET['delete_id_customer'])) {
    $id = $_GET['delete_id_customer'];
    $sql = "delete from user where user_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect('customer.php');
    } else {
        echo "<script>alert('Error')</script>";
    }
}

if (isset($_GET['delete_id_admin'])) {
    $id = $_GET['delete_id_admin'];
    $sql = "delete from admin where admin_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect('admin.php');
    } else {
        echo "<script>alert('Error')</script>";
    }
}
if (isset($_GET['delete_id_order'])) {
    $id = $_GET['delete_id_order'];
    $sql = "delete from orders where order_id= $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect('orders.php');
    } else {
        echo "<script>alert('Error')</script>";
    }
}
