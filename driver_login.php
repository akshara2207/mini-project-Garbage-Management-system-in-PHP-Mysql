

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Driver Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="wavestyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" crossorigin="anonymous" />
</head>
<body>

<div class="header">
    <div class="inner-header flex">
        <svg version="1.1" class="logo" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
            <!-- Your logo path here -->
        </svg>
        <?php require_once "controllerDriver.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 form login-form">
                    <form action="controllerDriver.php" method="POST" autocomplete="">
                        <h2 class="text-center" style="color: black;"> Driver Login </h2>
                        <?php
                        if (count($errors) > 0) {
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Email Address" required >
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="login" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Waves Container -->
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <!-- Your waves path here -->
        </svg>
    </div>
    <!-- Waves end -->
</div>

<!-- Content starts -->
<div class="content flex">
    <p>Garbage Management system | 2023 |
        <a href="adminsignup/adminlogin.php"> <i class="fa fa-lock" aria-hidden="true"> Login As Admin</i></a>
        <a href="login-user.php"> <i class="fa fa-lock" aria-hidden="true"> Login As USer</i></a>
    </p>
</div>
<!-- Content ends -->

</body>
</html>
