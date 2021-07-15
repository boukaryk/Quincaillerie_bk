<?php
    session_destroy();
    setcookie("username","",time()-3600);
    setcookie("password","",time()-3600);
    header('Location:index.php');
?>
<?php
$title="Forgot password";
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password</title>
    <link rel="stylesheet" href="assets/library/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/library/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/media/logo_bit.png">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto my-5">
                <div class="card">
                    <div class="card-header bg-gradient-primary">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-ms-12">
                             <img src="assets/images/boutique.jpg" class="rounded-circle" width="60px" height="60px">
                        </div>
                        <div class="col-lg-6 col-md-6 col-ms-12">
                          <span class="modal-title text-center text-white h4">Recover Password</span>
                        </div>
                        </div>
                    </div>
                    <div class="card-body p-lg-5">
                        <form method="post" action="forgot_password.php">
                            <div class="input-group py-3">
                                <input class="form-control" type="email" name="recover_mail" id="recover_mail" placeholder="Enter your email address" required>
                                <div class="input-group-append">
                                    <span class=" input-group-text fas fa-envelope  bg-light text-bluesky"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 py-3 text-center">
                                    <button class="btn btn-outline-primary w-75 rounded-pill" type="submit">Recover</button>
                                </div>
                                <div class="col-12 text-center">
                                    Already have an account <a class="text-bluesky" href="index.php">Sign in</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
include'foot.php';
?>