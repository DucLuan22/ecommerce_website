<?php
require_once(__DIR__ . "/../config/dbconfig.php");
class LoginHandler extends DBConnect
{
    public function checkLogin($username, $password, $type)
    {
        $DB = new DBConnect();
        $sql = "SELECT * FROM $type WHERE username ='$username' AND password ='$password'";
        $result = mysqli_query($DB->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header('Location: index.php');
        } else {
            $_SESSION['status_code'] = 'error';
            $_SESSION['status'] = 'The Username or Password is Wrong';
        }
    }
}
