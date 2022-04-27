<?php
require_once(__DIR__ . "/../config/dbconfig.php");
class Product
{
    private $id;
    private $name;
    private $price;
    private $desc;
    private $category;
    private $brand;

    public function addProduct($name, $desc, $brand_id, $category_id, $price, $img)
    {
        $DB = new DBConnect();
        $description = str_replace("'", "\'", $desc);
        $sql = "INSERT INTO product(name, description, brand_id, category_id, price, img) VALUES ('$name','$description',$brand_id,$category_id,$price,'$img')";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            $_SESSION['status_code'] = 'success';
            $_SESSION['status'] = 'Add Successfully';
            header("refresh:1.5;url=product-view.php");
        } else {
            die(mysqli_error($DB->connect()));
        }
    }
    public function updateProduct($id, $name, $desc, $brand_id, $category_id, $price, $img)
    {
        $DB = new DBConnect();
        $description = str_replace("'", "\'", $desc);
        try {
            $sql = "UPDATE product SET name='$name', description ='$description', brand_id = $brand_id, category_id = $category_id, price = $price, img = '$img' WHERE id ='$id'";
            $query = mysqli_query($DB->connect(), $sql);
            if ($query && $brand_id != '' && $category_id != '') {
                $_SESSION['status_code'] = 'success';
                $_SESSION['status'] = 'Update Successful';
                header("refresh:1.5;url=product-view.php");
            }
        } catch (Exception $ex) {
            $_SESSION['status_code'] = 'error';
            $_SESSION['status'] = 'Something is wrong. Please try again.';
        }
    }
    public function removeProduct($id)
    {
        $DB = new DBConnect();
        $sql = "delete from product where id=$id";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            header("refresh:0.5;url=cart-view.php");
        } else {
            echo "<script>alert('Error')</script>";
        }
    }
    public function fetch()
    {
        $DB = new DBConnect();
        $data = null;
        $sql = "SELECT product.id, product.name, product.description, brand.name AS brand_name, category.name AS category_name, product.price,product.img FROM product INNER JOIN brand ON product.brand_id = brand.id INNER JOIN category ON product.category_id = category.id";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetchByID($id)
    {
        $DB = new DBConnect();
        $data = null;
        $sql = "SELECT product.id, product.name, product.description, brand.name AS brand_name, category.name AS category_name, product.price,product.img FROM product INNER JOIN brand ON product.brand_id = brand.id INNER JOIN category ON product.category_id = category.id WHERE product.id = $id";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetchRandom()
    {
        $DB = new DBConnect();
        $data = null;
        $sql = "SELECT product.id, product.name, product.description, brand.name AS brand_name, category.name AS category_name, product.price,product.img FROM product INNER JOIN brand ON product.brand_id = brand.id INNER JOIN category ON product.category_id = category.id ORDER BY RAND()";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function fetchByCategory($category)
    {
        $DB = new DBConnect();
        $data = null;
        $sql = "SELECT product.id AS productID, product.name, product.description, brand.name AS brand_name, category.id, category.name AS category_name, product.price,product.img FROM product INNER JOIN brand ON product.brand_id = brand.id INNER JOIN category ON product.category_id = category.id WHERE product.category_id = $category ORDER BY RAND() LIMIT 8";
        $result = mysqli_query($DB->connect(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
