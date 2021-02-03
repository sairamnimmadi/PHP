<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact_Us form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#delete').delay(3600).fadeOut();
        });
    </script>
</head>

<body>

    <div class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card" style="border: 1px solid grey">
                    <div class="card-title">
                        <h1 class="text-center py-2">Contact Us</h1>
                        <hr>
                        <?php

                        use PHPMailer\PHPMailer\PHPMailer;

                        try {
                            $db = new mysqli("localhost", "root", "", "my_contact_us_db");
                        } catch (\Throwable $th) {
                            echo $th;
                        }

                        if (isset($_POST['btn-send'])) {
                            $Notification_Msg = "";
                            $Username = $_POST['UName'];
                            $Email = $_POST['Email'];
                            $Subject = $_POST['Subject'];
                            $Msg = $_POST['msg'];
                            if (empty($Username) || empty($Email) || empty($Subject) || empty($Msg)) {
                                $Notification_Msg = "Please Fill all the fields";
                                echo '<p class="alert alert-danger" id="delete" style="margin-bottom : -2%">' . $Notification_Msg . '</p>';
                            } else {
                                $is_insert = $db->query("INSERT INTO `login_data`(`Name`,`Email`,`Message`) VALUES ('$Username','$Email','$Msg')");
                                $_POST = array();
                                require_once "./PHPMailer/PHPMailer.php";
                                require_once "./PHPMailer/SMTP.php";
                                require_once "./PHPMailer/Exception.php";
                                $mail = new PHPMailer(true);
                                $mail->isSMTP();
                                $mail->Host       = 'smtp.gmail.com';
                                $mail->SMTPAuth   = true;
                                $mail->Username   = 'your email';
                                $mail->Password   = 'your email password';
                                $mail->SMTPSecure = "ssl";
                                $mail->Port       = 465;
                                $mail->isHTML(true);
                                $mail->setFrom($Email, $Username);
                                $mail->addAddress("sairamnimmadi@gmail.com");
                                $mail->Subject = ("From : $Email ($Subject)");
                                $mail->Body  = $Msg;
                                if ($mail->send()) {
                                    $status = "success";
                                } else {
                                    $status = "Failed";
                                    $response = "SomeThing Went Wrong: <br>" . $mail->ErrorInfo;
                                }
                                if ($is_insert == true && $status == "success") {
                                    $Notification_Msg = "Message mailed to u  Succesfully and saved in database";
                                    echo '<p class="alert alert-success" id="delete" style="margin-bottom : -2%">' . $Notification_Msg . '</p>';
                                }
                                if ($status == "Failed") {
                                    echo '<p class="alert alert-success" id="delete" style="margin-bottom : -2%">' . $response . '</p>';
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="text" name="UName" placeholder="User Name" class="form-control mb-2">
                            <input type="email" name="Email" placeholder="Email" class="form-control mb-2">
                            <input type="text" name="Subject" placeholder="Subject" class="form-control mb-2">
                            <textarea name="msg" class="form-control mb-2" placeholder="Write The Message"></textarea>
                            <button class="btn btn-primary" style="margin-left : 35%; width: 25%" name="btn-send"> Send </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
