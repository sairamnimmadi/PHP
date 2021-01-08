<?php

session_start();

// error_reporting(0);

$con = mysqli_connect("localhost", "root", "");

mysqli_select_db($con, "login_reg_db");

$email = $_POST["Email"];

$password = $_POST["password"];

$pre = "select * from usertable where Email = '$email'";

$s = "select * from usertable where Email = '$email' && password = '$password'";

$name_query = "select * from usertable where Email = '$email' && password = '$password'";


$result = mysqli_query($con, $s);

$check = mysqli_query($con, $pre);

$check_row = mysqli_num_rows($check);

$name = mysqli_fetch_array(mysqli_query($con, $name_query));

$num = mysqli_num_rows($result);

if (isset($_POST['btn-send'])) {
    if ($num == 1) {
        $_SESSION['username'] = $name['Name'];
        header("location:login.php?success");
    } elseif (empty($password) || empty($email)) {
        header("location:login.php?form_not_filled");
    } elseif (empty($check_row)) {
        header("location:login.php?not_registerd");
    } elseif ($check_row != 0 && $num == 0) {
        header("location:login.php?invalid_credentials");
        // echo $check_row;
    }
}
