<?php
require_once'bd.php';
        
            if(isset($_POST['send'])){
                $user=$_POST['nom'];
                $pass=$_POST['pass'];
                if(empty($user)){
                    $erreur="Veuillez saisir le nom d'utilisateur";
                }
                else if(empty($pass)){
                    $erreur="Veuillez entrer le mot de passe";
                }
                else if($user!='boukary'){
                    $erreur="Nom d'utilisateur incorrect";
                }
                else if($pass!='aime'){
                    $erreur="Mot de passe incorrect";
                }
                else{
                    header('Location:entreprise.php');
                }
                
            }
        
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Materiels de construction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>

        <link rel="stylesheet" href="../../css/acheter.css" type="text/css">
        <link rel="stylesheet" href="../../css/contact.css" type="text/css">
        <link rel="stylesheet" href="../../css/head.css" type="text/css">
        <link rel="stylesheet" href="../../css/responsive.css" type="text/css">
        <link rel="stylesheet" href="../../css/footer.css" type="text/css">
        <link rel="stylesheet" href="../../css/materiel.css">
        <link rel="stylesheet" href="../../css/style.css">
   
        <link rel="stylesheet" href="../../css/stylebody.css" type="text/css">
        <!-- ---------- Bootstrap css --------- -->
        <link rel="stylesheet" href="../../library/bootstrap4/css/bootstrap.css">
        <!-- ---------- Font Awesome css --------- -->
        <link rel="stylesheet" href="../../library/fontawesome/css/all.min.css">
        <!-- ---------- Animate css --------- -->
        <link rel="stylesheet" href="../../library/wow/animate.css">
        <!-- ---------- DataTable css --------- -->
        <link rel="stylesheet" href="../../library/DataTable/css/bootstrap-table.css">
        <link rel="stylesheet" href="../../library/DataTables/css/dataTables.bootstrap4.css">
        <!--Scrol bar -->
        <link rel="stylesheet" href="../../css/scrollbar/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="../../library/toast/toastr.min.css">
    </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto py-5">
            <div class="card shadow">
                <div class="card-header bg-light">
                   <div class="row">
                        <div class="col-4">
                          <h4 class="text-info">Admin</h4>
                        </div>
                        <div class="col-8 text-center text-danger text-capitalize" style="font-family: Agency FB;font-size: 1.5em">
                           <?php if(isset($erreur)){echo $erreur;}?>
                        </div>
                   </div>
                </div>

                <div class=" text-center card-body">

                       <form method="post" action="#content">
                               <h5 class="py-3" tyle="font-family: Agency FB;font-size: 1.5em"><i>Veuillez remplir ce formulaire</i></h5>
                                <div class="input-group py-3 "> 
                                    <input id="nom" class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="nom"  id="nom" placeholder="Nom d'utilisateur">
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>
                                <div class="input-group py-3 "> 
                                    <input id="nom" class="form-control  border border-primary" type="password" size="70" Maxlenght="50" name="pass"  id="pass" placeholder="Mot de passe">
                                    <div class="input-group-append">
                                        <span class=" input-group-text fa fa-key bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>

                            <div class="row"> 
                                <div class="col-lg-6 form-group py-5">
                                        <a class="btn" role="button" href="entreprise.php">
                                            <input class="btn btn-danger col-lg-6" value="Retour"> 
                                        </a>
                                </div>
                                <div class="col-lg-6 form-group py-5">
                                    <input class="btn btn-primary col-lg-6" type="submit" name="send" value="Confirmer">
                                </div>
                            </div>
                          </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>

        <script src="../../library/jquery/jquery.js"></script>
        <script src="../../library/bootstrap4/js/bootstrap.bundle.js"></script>
        <script src="../../library/wow/wow.min.js"></script>
         <!-- data table JS ============================================ -->
        <script src="../../library/DataTable/js/bootstrap-table.js"></script>
        <script src="../../library/DataTable/js/tableExport.js"></script>

        <script src="../../library/DataTable/js/data-table-active.js"></script>

        <script src="../../library/DataTable/js/bootstrap-table-export.js"></script>
        <script src="../../library/DataTables/js/jquery.dataTables.min.js"></script>
        <script src="../../library/DataTables/js/dataTables.bootstrap4.js"></script>
        <script src="../../js/main.js"></script>

        
        <script src="../../library/DataTable/js/data-table-active.js"></script>