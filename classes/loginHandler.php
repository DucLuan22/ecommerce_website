<?php
require_once(__DIR__ . "/../config/dbconfig.php");
class LoginHandler extends DBConnect
{
    public function checkLogin($username, $password, $table)
    {
        $DB = new DBConnect();
        $sql = "SELECT * FROM $table WHERE username ='$username' AND password ='$password'";
        $result = mysqli_query($DB->connect(), $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($table == 'user') {
                $_SESSION['username'] = $row['username'];
                header('Location: index-logged.php');
            } else {
                $_SESSION['username_admin'] = $row['username'];
                header('Location: category-view.php');
            }
        } else {
            $_SESSION['status_code'] = 'error';
            $_SESSION['status'] = 'The Username or Password is Wrong';
        }
    }
}
