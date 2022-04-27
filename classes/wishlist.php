<?php
require_once(__DIR__ . "/../config/dbconfig.php");
class Wishlist
{
    public function add($id, $username)
    {
        $DB = new DBConnect();

        $sql = "INSERT INTO wishlist(username, product_id) VALUES ('$username','$id')";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
        } else {
            die(mysqli_error($DB->connect()));
        }
    }
}
