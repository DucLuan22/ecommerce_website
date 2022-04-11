<?php
include "config.php";
include "redirect_handler.php";

if (isset($_POST['submit'])) {
    $name = $_POST['brand_name'];
    $desc = $_POST['brand_desc'];
    $sql = "INSERT INTO brand(name, description) VALUES ('$name','$desc')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect("brand.php");
    } else {
        die(mysqli_error($conn));
    }
}

if (isset($_POST['submit_update'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['brand_name_update'];
    $desc = $_POST['desc_update'];

    $sql = "UPDATE brand SET name='$name', description ='$desc' WHERE id ='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] = 'Update Successful';
        header("refresh:1.5;url=brand.php");
    }
}
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "delete from brand where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Successfull')</script>";
        redirect('brand.php');
    } else {
        echo "<script>alert('Error')</script>";
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
    <!-- Modal for Insert -->
    <form method="POST">
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nameInput1">Brand Name</label>
                            <input type="text" class="form-control" id="nameInput1" placeholder="Enter Name" autocomplete="off" name="brand_name" required />
                        </div>
                        <div class="form-group">
                            <label for="descInput1">Brand Description</label>
                            <input type="text" class="form-control" id="descInput1" placeholder="Enter Description" autocomplete="off" name="brand_desc" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="col text-center" style="margin-top: 10px;margin-bottom: 16px;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Add Brand
        </button>
    </div>
    <!-- Modal for update -->
    <form method="POST">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Update Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <label for="nameInput2">Category Name</label>
                            <input type="text" class="form-control" id="nameInput2" placeholder="Enter Name" autocomplete="off" name="brand_name_update" required />
                        </div>
                        <div class="form-group">
                            <label for="descInput2">Category Description</label>
                            <input type="text" class="form-control" id="descInput2" placeholder="Enter Description" autocomplete="off" name="desc_update" required />
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
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "Select * from brand";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $desc = $row['description'];
                        echo '
        <tr>
          <td scope="row">' . $id . '</td>
          <td>' . $name . '</td>
          <td>' . $desc . '</td>
          <td>
          <button class = "btn btn-primary edit_btn">Edit</button>
          <button class = "btn btn-danger"><a class ="text-light text-decoration-none" href="delete.php?delete_id_brand='.$id .'">Delete</a></button>
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
            });
        });
    </script>
</body>

</html>
<?php
include "script.php";
?>