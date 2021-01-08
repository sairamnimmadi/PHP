<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login and Registration</title>
    <link rel="stylesheet" href="./style.css" type="text/css">;
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#delete').delay(3600).fadeOut();
        });
    </script>
</head>

<body id="login">


    <div class="login-box">

        <div class="col-md-8 offset-md-2 login-left">
            <h2>LOGIN FORM</h2>
            <form action="validation.php" method="POST">
                <?php
                $msg = "";
                if (isset($_GET['success'])) {
                    $msg = "Logged in succesfully you will be redirected to home page";
                    echo '<p class="alert alert-success" id="delete" style="text-align : center;font-weight:bolder;background-color:rgba(73, 204, 37)">' . $msg . '</p>';
                    header("Refresh:5; url=home.php");
                } elseif (isset($_GET['form_not_filled'])) {
                    $msg = "Please fill all the feilds";
                    echo '<p class="alert alert-danger" id="delete" style="text-align : center;font-weight:bolder;background-color:rgba(204, 70, 37)">' . $msg . '</p>';
                } elseif (isset($_GET['not_registerd'])) {
                    $msg = "Register first to login, and you will be redirected to registration page";
                    echo '<p class="alert alert-danger" id="delete" style="text-align : center;font-weight:bolder;background-color:rgba(204, 70, 37)">' . $msg . '</p>';
                    header("Refresh:5;url=sample_reg.php");
                } elseif (isset($_GET['invalid_credentials'])) {
                    $msg = "Invalid Email or password";
                    echo '<p class="alert alert-danger" id="delete" style="text-align : center;font-weight:bolder;background-color:rgba(204, 70, 37)">' . $msg . '</p>';
                }
                ?>
                <div class="form-group">
                    <label for="Email">Email </label>
                    <input type="text" name="Email" class="form-control" placeholder="Email" required>

                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="password" name="password" class="form-control" required>


                </div>

                <div class="text-center"><button class="btn btn-info" name="btn-send" type="submit">LOGIN</button>
                </div>
                <div class="from-group text-center mt-2">
                    <p>Don't have an account?<a href="./sample_reg.php" style="text-decoration: none;color : black"><strong>Click here</strong></a></p>
                </div>

            </form>

        </div>
    </div>

</body>

</html>