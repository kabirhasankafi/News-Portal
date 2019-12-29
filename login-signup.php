<?php
include 'zzz-dbConnect.php';
session_start();


$error = '';
$_SESSION['tUsername'] = "";
$_SESSION['tEmail'] = "";

if (isset($_POST["signup"])) {
    $_SESSION['tUsername'] = $_POST["username"];
    $_SESSION['tEmail'] = $_POST["email"];

    if ($_POST["password"] == $_POST["cpassword"]) {
        $sql = "SELECT ID FROM user where Username='" . $_POST["username"] . "' and Email='".$_POST["email"]."'";
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);

        if ($count == 0) {
            //$random = rand(1000, 9999);
            $random = 0;

            $sql = "INSERT into user (Username, Email, Password, UserType, Code) values ('" . $_POST["username"] . "', '" . $_POST["email"] . "', '" . $_POST["password"] . "', 'User', '" . $random . "')";
            mysqli_query($link, $sql);

            $_SESSION['tUsername'] = "";
            $_SESSION['tEmail'] = "";

            $replyText = 'http://localhost/onlineportal/varification.php?email='.$_POST["email"];
            // $replyText = 'http://localhost/ishan/NewsPortal/varification.php?email='.$_POST["email"];

            $url = 'http://mailsender.ap-south-1.elasticbeanstalk.com/SendMail/var.php?rec=' . $_POST["email"] . '&reply=' . $replyText;

            header('Location: '.$url);

        } else {
            $error = 'Username already taken, try again to register';
            echo "<script type='text/javascript'>alert('$error');</script>";
        }
    }
}

if (isset($_POST["login"])) {
    $sql = "SELECT * FROM user where Username='" . $_POST["username"] . "' and Password='" . $_POST["password"] . "'";

    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Code'] == 0) {
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['UserType'] = $row['UserType'];

            header('Location: index.php');
        } else {
            $message = "Verify your profile from you mail";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } else {
        $message = "Invalid username or password";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Daily News</title>

    <!-- link-area-start -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="stylesheet" href="CSS/owl.carousel.min.css">
    <link rel="stylesheet" href="CSS/animate.min.css">
    <!-- link-area-end -->

</head>

<body>

    <?php include 'zzz-header.php'; ?>

    <!-- login-area-start -->

    <div class="fixed-background-login">
        <div class="overlay-fixed">
            <h1 class="wow zoomIn">LOGIN / SIGN UP</h1>
        </div>
    </div>
    <div class="login-register-area ptb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> login </h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4> sign up </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-form">
                                        <form method="POST">
                                            <input type="text" name="username" placeholder="Username"> <br>
                                            <input type="password" name="password" placeholder="Password">
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <button type="submit" name="login"><span>Login</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-form">
                                        <form method="POST">
                                            <input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['tUsername'] ?>" required> <br>
                                            <input name="email" placeholder="Email" type="email" value="<?php echo $_SESSION['tEmail'] ?>" required>
                                            <input type="password" name="password" placeholder="Password" required> <br>
                                            <input type="password" name="cpassword" placeholder="Confirm Password" required> <br>

                                            <div class="button-box">
                                                <button type="submit" name="signup"><span>Sign up</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










    <!-- login-area-end -->

    <!-- last-area-end -->
    <?php include 'zzz-footer.php'; ?>

    <div class="arrow-top"> <i class="fas fa-arrow-up"></i> </div>

    <!-- footer-area-end -->





    <!-- link-area-start -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/owl.carousel.min.js"></script>
    <script src="JS/wow.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="JS/customs.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- link-area-end -->

</body>

</html>