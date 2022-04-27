<?php
require_once(__DIR__ . "/../config/dbconfig.php");
class Order
{
    private $id;
    private $username;
    private $location;
    private $product_id;
    private $quantity;
    private $brand;

    public function createOrder($name, $desc, $brand_id, $category_id, $price, $img)
    {
        $DB = new DBConnect();
        $sql = "INSERT INTO product(name, description, brand_id, category_id, price, img) VALUES ('$name','$desc',$brand_id,$category_id,$price,'$img')";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            $_SESSION['status_code'] = 'success';
            $_SESSION['status'] = 'Add Successfully';
            header("refresh:1.5;url=product-view.php");
        } else {
            die(mysqli_error($DB->connect()));
        }
    }
    public function removeOrder($id)
    {
        $DB = new DBConnect();
        $sql = "delete from orders where id= $id";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            header("refresh:0.5;url=product-view.php");
        } else {
            echo "<script>alert('Error')</script>";
        }
    }
    public function confirmedOrder()
    {
    }
    public function fetch()
    {
        $DB = new DBConnect();
        $data = null;
        $sql = "SELECT order_id, user_name, product.name as product_name, orders.quantity, orders.subTotal, orders.paymentType, orders.location, status FROM orders INNER JOIN product ON product.id = orders.product_id; ";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function fetchByID($username)
    {
        $DB = new DBConnect();
        $data = null;
        $sql = "SELECT order_id, user_name, product.name as product_name, orders.quantity, orders.subTotal, orders.paymentType, orders.location, status FROM orders INNER JOIN product ON product.id = orders.product_id WHERE user_name = '$username';";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
