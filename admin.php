<?php
include "config.php";
include "redirect_handler.php";

if (isset($_POST['submit'])) {
    $username = $_POST['admin_username'];
    $pass = $_POST['admin_password'];
    $conf = $_POST['admin_conf-pass'];
    if ($pass == $conf) {
        $sql = "INSERT INTO admin(username, password) VALUES ('$username','$pass')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['status_code'] = 'success';
            $_SESSION['status'] = 'Add Admin Successful';
            header("refresh:1.5;url=admin.php");
        } else {
            die(mysqli_error($conn));
        }
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['status'] = 'Confirmed Password is incorrect';
    }
}

if (isset($_POST['submit_update'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['admin_username_update'];
    $pass = $_POST['admin_password_update'];
    $conf = $_POST['admin_conf-password_update'];

    $sql = "UPDATE admin SET username='$username', password ='$pass' WHERE admin_id ='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] = 'Update Successful';
        header("refresh:1.5;url=admin.php");
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
</head>
<script src="/static/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<body style="font-family: Alata, sans-serif">
    <!-- Nav-bar -->
    <?php
    include 'nav-bar.php';
    ?>
    <!-- Modal for Insert -->
    <form method="POST">
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nameInput1">Username</label>
                            <input type="text" class="form-control" id="nameInput1" placeholder="Enter Name" name="admin_username" required />
                        </div>
                        <div class="form-group">
                            <label for="descInput1">Password</label>
                            <input type="text" class="form-control" id="descInput1" placeholder="Enter Password" name="admin_password" required />
                        </div>
                        <div class="form-group">
                            <label for="descInput1">Confirmed Password</label>
                            <input type="text" class="form-control" id="" placeholder="Confirmed Password" name="admin_conf-pass" required />
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

    <!-- Button trigger modal -->
    <div class="col text-center" style="margin-top: 10px;margin-bottom: 16px;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Add Category
        </button>
    </div>
    <!-- Modal for update -->
    <form method="POST">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Update Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <label for="nameInput2">Username</label>
                            <input type="text" class="form-control" id="unameField" placeholder="Enter Name" name="admin_username_update" required />
                        </div>
                        <div class="form-group">
                            <label for="descInput2">Admin Password</label>
                            <input type="text" class="form-control" id="descInput2" placeholder="Enter Password" name="admin_password_update" required />
                        </div>
                        <div class="form-group">
                            <label for="descInput2">Confirmed Password</label>
                            <input type="text" class="form-control" id="descInput2" placeholder="Enter Password" name="admin_conf-password_update" required />
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

    <!-- Table -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "Select * from admin";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['admin_id'];
                        $username = $row['username'];
                        $pass = $row['password'];
                        echo '
            <tr>
          <td scope="row">' . $id . '</td>
          <td>' . $username . '</td>
          <td>' . $pass . '</td>
          <td>
          <button class = "btn btn-primary edit_btn">Edit</button>
          <button class = "btn btn-danger"><a class ="text-light text-decoration-none" href="delete.php?delete_id_admin=' . $id . '">Delete</a></button>
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
                $('#unameField').val(data[1]);
            });
        });
    </script>
</body>

</html>

<?php
include "script.php";
?>