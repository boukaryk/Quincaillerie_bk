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
            <div class="col-lg-12 mx-auto my-5">
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
                        
                            
                    <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                <div class="input-group">
                                    <a href="contacts.php" class="btn btn-outline-info">Gestion des messges </a>
                                    <div class="input-group-append">
                                        <span class="input-group-text fab fa-facebook-messenger"></span>
                                    </div>
                                </div>
                           </div>
            

                     
                              <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                  <div class="input-group">
                                      <a href="acheter.php" class="btn btn-outline-dark ">Gestion commandes</a>
                                      <div class="input-group-append">
                                          <span class="input-group-text fas fa-tasks"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                           
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