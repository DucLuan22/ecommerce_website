<!DOCTYPE html>
<html lang="en">
<?php
include 'redirect_handler.php';
include "config.php";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['pwd']);
  $sql = "SELECT * FROM user WHERE username ='$username' AND password ='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    redirect('index.php');
  } else {
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] = 'The Username or Password is Wrong';
  }
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Login</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/fonts/ionicons.min.css" />
  <link rel="stylesheet" href="assets/css/Login-Form-Clean.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body style="background: rgb(177, 213, 224)">
  <section class="login" style="background: rgb(177, 213, 224)">
    <form method="post" style="
          border-radius: 13px;
          border-color: var(--bs-gray);
          background: rgb(205, 213, 221);
        ">
      <h2 class="visually-hidden">Login Form</h2>
      <div class="illustration">
        <i>
          <img src="./assets/image/logo.png" class="rounded mx-auto d-block" alt="...">
        </i>
      </div>
      <div class="mb-3">
        <input class="form-control" type="text" id="email-field" name="username" placeholder="Username" style="border-radius: 4px" required />
      </div>
      <div class="mb-3">
        <input class="form-control" type="password" id="password-field" name="pwd" placeholder="Password" style="border-radius: 4px" required />
      </div>
      <div class="mb-3">
        <button class="btn btn-primary d-block w-100" name="submit">
          Log In
        </button>
      </div>
      <a class="forgot" href="register.php">Don't have an account?</a>
    </form>
  </section>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'script.php';
?>