<?php

session_start();

error_reporting(0);

$con = mysqli_connect("localhost", "root", "");

mysqli_select_db($con, "login_reg_db");

$name = $_POST["name"];

$password = $_POST["password"];

$email = $_POST['Email'];

$contact_num = $_POST['phone'];

$gender = $_POST['Gender'];

$address = $_POST['Address'];

$lang_known = $_POST['Lang_known'];

$langs = "";

foreach ($lang_known as $lang) {
    $langs = $langs . $lang . " ,";
}

$langs = substr($langs, 0, -2);

$DOB = $_POST['date'] . "/" . $_POST['month'] . "/" . $_POST['year'];

$s = "select * from usertable where Email = '$email'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

// $_POST = array();

if (isset($_POST['btn-send'])) {
    if ($num == 1) {
        header("location:sample_reg.php?error");
    } elseif (empty($lang_known) || empty($name) || empty($password) || empty($email) || empty($gender) || empty($DOB) || empty($contact_num) || empty($address)) {
        $err = "Please Fill all the feilds";
        echo $err;
        header("location:sample_reg.php?form_not_filled");
        // exit();
    } else {
        $reg = "insert into usertable (Name,password,Email,phone_number,Gender,Languages_known,Date_of_birth,Address) values ('$name','$password','$email','$contact_num','$gender','$langs','$DOB','$address')";
        mysqli_query($con, $reg);
        header("location:sample_reg.php?success");
    }
}
