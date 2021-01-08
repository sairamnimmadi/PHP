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

<body id="reg">

    <div class="login-box" style="margin: 3% auto;">

        <div class="login-left">
            <h2 style="margin-bottom: 5%;">REGISTRATION FORM</h2>
            <form action="./registration.php" method="POST">
                <?php
                $msg = "";
                if (isset($_GET['error'])) {
                    $msg = "User With The Mail Already Exists Use Another Email";
                    echo '<p class="alert alert-danger" id="delete" style="text-align : center;font-weight:bolder;background-color:rgba(204, 70, 37)">' . $msg . '</p>';
                } else if (isset($_GET['success'])) {
                    $msg = "Registerd Succesfully and you will be redirected to login page";
                    echo '<p class="alert alert-success" id="delete" style="text-align : center;font-weight:bolder;background-color:rgba(73, 204, 37)">' . $msg . '</p>';
                    header("Refresh:5; url=login.php");
                } else if (isset($_GET['form_not_filled'])) {
                    $msg = "Please fill all the feilds";
                    echo '<p class="alert alert-danger" id="delete" style="text-align : center;font-weight:bolder;background-color:rgba(204, 70, 37)">' . $msg . '</p>';
                    // header("Refresh:4;url=sample_reg.php");
                }
                ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="Email" placeholder="Email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">Tel number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="Telephone number" name="phone" pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Gender" class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9" style="margin-top: 1%;">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="inlineRadio3" value="Other">
                            <label class="form-check-label" for="inlineRadio3">Other</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Lang_known[]" class="col-sm-3 col-form-label">Languages Known</label>
                    <div class="col-sm-9" style="margin-top: 1%;">

                        <div class="form-check form-check-inline col-lg-12">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="English" name="Lang_known[]">
                            <label class="form-check-label" for="inlineCheckbox1">English</label>
                        </div>
                        <div class="form-check form-check-inline col-lg-12">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Telugu" name="Lang_known[]">
                            <label class="form-check-label" for="inlineCheckbox2">Telugu</label>
                        </div>
                        <div class="form-check form-check-inline col-lg-12">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Hindi" name="Lang_known[]">
                            <label class="form-check-label" for="inlineCheckbox3">Hindi</label>
                        </div>
                        <div class="form-check form-check-inline col-lg-12">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Tamil" name="Lang_known[]">
                            <label class="form-check-label" for="inlineCheckbox3">Tamil</label>
                        </div>
                    </div>
                </div>
                <div class="from-group row">
                    <label for="DOB" class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">

                        <div class="form-inline">
                            <select name="date" class="form-control">
                                <option>DATE</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
                            </select>&nbsp;&nbsp;&nbsp;
                            <select name="month" class="form-control">
                                <option>MONTH</option>
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>&nbsp;&nbsp;&nbsp;
                            <select name="year" class="form-control">
                                <option>YEAR</option>
                                <option>1980</option>
                                <option>1981</option>
                                <option>1982</option>
                                <option>1983</option>
                                <option>1984</option>
                                <option>1985</option>
                                <option>1986</option>
                                <option>1987</option>
                                <option>1988</option>
                                <option>1989</option>
                                <option>1990</option>
                                <option>1991</option>
                                <option>1992</option>
                                <option>1993</option>
                                <option>1994</option>
                                <option>1995</option>
                                <option>1996</option>
                                <option>1997</option>
                                <option>1998</option>
                                <option>1999</option>
                                <option>2000</option>
                                <option>2001</option>
                                <option>2002</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label for="Address" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="address" rows="5" name="Address"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col" style="text-align: start;">
                        <button type="submit" class="btn btn-primary" name="btn-send">Register</button>
                    </div>
                    <div class="col" style="text-align: end;">
                        <button type="reset" class="btn btn-danger" value="cancel">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>