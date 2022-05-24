<?php
require_once(__DIR__ . "/../config/dbconfig.php");
class CheckoutHandler
{
    public function checkOutCart($username, $district, $ward, $address, $city, $firstName, $lastName, $payment)
    {
        $location = $address . ' ' . $ward . ' ' . $district . ' ' . $city;
        $DB = new DBConnect();
        $sql1 = "Select * from cart where user_name = '$username'";
        $result1 = mysqli_query($DB->connect(), $sql1);
        if ($result1) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $product_id = (int)$row['product_id'];
                $subTotal = (int)$row['subTotal'];
                $quantity = (int)$row['quantity'];
                $sql2 = "INSERT INTO orders(user_name,product_id,subTotal,quantity,location,firstName,lastName,paymentType,status) VALUES ('$username','$product_id',$subTotal,$quantity,'$location','$firstName','$lastName','$payment','waiting for confirmation')";
                $result2  = mysqli_query($DB->connect(), $sql2);
            }
            $sql_delete = "DELETE FROM cart WHERE user_name ='$username'";
            $result3 = mysqli_query($DB->connect(), $sql_delete);
            if ($result3) {
                $_SESSION['status'] = 'Order Successfully';
                $_SESSION['status_code'] = 'success';
                header("refresh:1.3;url=homepage");
            }
        }
    }
}
