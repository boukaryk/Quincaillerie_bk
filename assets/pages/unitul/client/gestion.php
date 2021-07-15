<?php 
$title="Menu de gestion";
include('header.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <div class="card-header py-3 bg-light">
                        <h3 class="text-center text-info text-capitalize">Menu de gestion</h3>
                    </div>
                    <div class="card-body mx-auto text-center">
                        <div class="row py-3">
                            <div class="col-lg-12 mt-3">
                                <div class="input-group">
                                  <a href="modifier_suprimer_produit.php" class="btn btn-outline-success">Gestion des produits</a>
                                  <div class="input-group-append">
                                      <span class="input-group-text fab fa-product-hunt"></span>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3">
                            <div class="col-lg-12 mt-3">
                                 <div class="input-group">
                                    <a href="modifier_user.php" class="btn btn-outline-warning"> Gestion de Comptes </a>
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user-lock"></span>
                                    </div>
                               </div>
                            </div>
                        </div>

                        <div class="row py-3">
                            <div class="col-lg-12 mt-3">
                                <div class="input-group">
                                    <a href="contacts.php" class="btn btn-outline-info">Gestion des messges </a>
                                    <div class="input-group-append">
                                        <span class="input-group-text fab fa-facebook-messenger"></span>
                                    </div>
                                </div>
                           </div>
                        </div>

                         <div class="row py-3">
                              <div class="col-lg-12 mt-3">
                                  <div class="input-group">
                                      <a href="acheter.php" class="btn btn-outline-dark">Gestion commandes</a>
                                      <div class="input-group-append">
                                          <span class="input-group-text fas fa-tasks"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row py-3">
                              <div class="col-lg-12 mt-3">
                                  <div class="input-group">
                                      <a href="accueil.php" class="btn btn-outline-danger"> <------ Retour ------</a>
                                      <div class="input-group-append">
                                          <span class="input-group-text fas fa-fast-backward"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                   </div>
     
                </div> 
            </div>
        </div>
    </div>
</div>
</div>
<?php include('foot.php');?>