<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">;
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Home Page</title>
</head>

<body id="home">
    <div class="mt-2 mr-2" style="text-align: end;color:white"><a href="logout.php" class="btn btn-danger">LOG OUT</a></div>
    <h1 style="margin-top:1%;">Welcome <?php echo $_SESSION['username']; ?></h1>
</body>

</html>