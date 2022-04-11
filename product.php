<?php
include 'config.php';
include 'redirect_handler.php';
if (isset($_POST['submit_product'])) {

    $name = $_POST['product_name'];
    $desc = $_POST['product_desc'];
    $brand = (int) $_POST['brand-id'];
    $category = (int) $_POST['category-id'];
    $price = (float) $_POST['price'];
    $img = $_POST['img'];

    $sql = "INSERT INTO product(name, description, brand_id, category_id, price, img) VALUES ('$name','$desc',$brand,$category,$price,'$img')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect("product.php");
    } else {
        die(mysqli_error($conn));
    }
}

if (isset($_POST['submit_update'])) {
    try {
        $id = $_POST['edit_id'];
        $name = $_POST['product_name_update'];
        $desc = $_POST['product_desc_update'];
        $brand = (int)$_POST['brand-id-update'];
        $category = (int)$_POST['category-id-update'];
        $price = (float) $_POST['price_update'];
        $img = $_POST['img_update'];

        $sql = "UPDATE product SET name='$name', description ='$desc', brand_id = $brand, category_id = $category, price = $price, img = '$img' WHERE id ='$id'";
        $query = mysqli_query($conn, $sql);
        if ($query && $brand != '' && $category != '') {
            $_SESSION['status_code'] = 'success';
            $_SESSION['status'] = 'Update Successful';
            header("refresh:1.5;url=product.php");
        } 
    } catch (Exception $ex) {
        $_SESSION['status_code'] = 'error';
        $_SESSION['status'] = 'Something is wrong. Please try again.';
    }

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
    <!-- Model for inserting product -->
    <form method="POST">
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nameInput2">Product Name</label>
                            <input type="text" class="form-control" id="nameInput1" placeholder="Enter Name" autocomplete="off" name="product_name" required />
                        </div>
                        <div class="form-group">
                            <label for="descInput2">Product Description</label>
                            <input type="text" class="form-control" id="descInput1" placeholder="Enter Description" autocomplete="off" name="product_desc" required />
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <select class="form-select" aria-label="Default select example" id='category-id' name="brand-id">
                                <option selected disabled hidden>- Select Brand -</option>
                                <?php
                                $sql1 = "Select * from brand";
                                $result = mysqli_query($conn, $sql1);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        echo '<option value=" ' . $id . '">' . $name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category-id">Category</label>
                            <select class="form-select" aria-label="Default select example" id='category-id' name='category-id'>
                                <option selected disabled hidden>- Select Category -</option>
                                <?php
                                $sql1 = "Select * from category";
                                $result = mysqli_query($conn, $sql1);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        echo '<option value="' . $id . '">' . $name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Price" autocomplete="off" name="price" required />
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Image Link" autocomplete="off" name="img" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit_product">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="col text-center" style="margin-top: 10px;margin-bottom: 16px;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Add Product
        </button>
    </div>
    <!-- Model for updating product -->
    <form method="POST">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="form-group">
                            <label for="nameInput1">Product Name</label>
                            <input type="text" class="form-control" id="nameInput2" placeholder="Enter Name" autocomplete="off" name="product_name_update" required />
                        </div>
                        <div class="form-group">
                            <label for="descInput1">Product Description</label>
                            <input type="text" class="form-control" id="descInput2" placeholder="Enter Description" autocomplete="off" name="product_desc_update" required />
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <select class="form-select" aria-label="Default select example" id='brand-id-2' name="brand-id-update">
                                <option selected value =''>- Select Brand -</option>
                                <?php
                                $sql1 = "Select * from brand";
                                $result = mysqli_query($conn, $sql1);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        echo '<option value=" ' . $id . '">' . $name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category-id">Category</label>
                            <select class="form-select" aria-label="Default select example" id='category-id-2' name='category-id-update'>
                                <option selected value =''>- Select Category -</option>
                                <?php
                                $sql1 = "Select * from category";
                                $result = mysqli_query($conn, $sql1);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        echo '<option value="' . $id . '">' . $name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" id="price2" placeholder="Enter Price" autocomplete="off" name="price_update" required />
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="text" class="form-control" id="img2" placeholder="Enter Image Link" autocomplete="off" name="img_update" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit_update">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Table -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "Select * from product";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $desc = $row['description'];
                        $price = $row['price'];
                        $brand_id = $row['brand_id'];
                        $brand = mysqli_fetch_assoc(mysqli_query($conn, "Select * from brand where id = '$brand_id'"));
                        $category_id = $row['category_id'];
                        $category = mysqli_fetch_assoc(mysqli_query($conn, "Select * from category where id = '$category_id'"));
                        $img = $row['img'];
                        echo '
            <tr>
          <td scope="row">' . $id . '</td>
          <td scope="row">' . $name . '</td>
          <td scope="row">' . $desc . '</td>
          <td scope="row">' . $brand['name'] . '</td>
          <td scope="row">' . $category['name'] . '</td>
          <td scope="row">' . $price . '</td>
          <td scope="row">' . $img . '</td>
          <td scope="row">
          <button class = "btn btn-primary edit_btn">Edit</button>
          <button class = "btn btn-danger"><a class ="text-light text-decoration-none" href="delete.php?delete_id_product=' . $id . '">Delete</a></button>
          </td>
        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit_btn').click(function() {

                $('#exampleModal2').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#edit_id').val(data[0]);
                $('#nameInput2').val(data[1]);
                $('#descInput2').val(data[2]);
                $("#brand-id-2 option[value='2']").prop('selected', true);
                $('#price2').val(data[5]);
                $('#img2').val(data[6]);

            });
        });
    </script>
</body>

</html>
<?php
include "script.php";
?>