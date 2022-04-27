<?php
require_once(__DIR__ . "/../config/dbconfig.php");
class RegisterHandler
{
    public function register($username, $email, $password, $confirm)
    {
        $DB = new DBConnect();
        if ($password == $confirm) {
            $sql = "SELECT * FROM user WHERE username ='$username'";
            $dup = mysqli_query($DB->connect(), $sql);
            $sql2 = "SELECT * FROM user WHERE email ='$email'";
            $dup2 = mysqli_query($DB->connect(), $sql2);
            if ($dup->num_rows > 0) {
                $_SESSION['status'] = 'This username has already existed';
                $_SESSION['status_code'] = 'error';
            } else if ($dup2->num_rows > 0) {
                $_SESSION['status'] = 'This email has already been used';
                $_SESSION['status_code'] = 'error';
            } else {
                $sql = "INSERT INTO user(username, password,email) VALUES ('$username','$password','$email')";
                $result = mysqli_query($DB->connect(), $sql);
                if ($result) {
                    $_SESSION['status'] = 'Register successfully';
                    $_SESSION['status_code'] = 'success';
                } else {
                    $_SESSION['status'] = 'Register Unsuccessfully';
                    $_SESSION['status_code'] = 'error';
                }
            }
        } else {
            $_SESSION['status'] = 'The Confirmation Password is Wrong';
            $_SESSION['status_code'] = 'error';
        }
    }
    public function checkExist($id)
    {
        
    }
}
