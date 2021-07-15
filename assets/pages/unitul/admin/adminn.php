<?php
$title="Admin";
include('header.php');
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
                    header('Location:gestion.php');
                }
                
            }
        
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto py-5">
            <div class="card shadow">
                <div class="card-header bg-light">
                   <div class="row">
                        <div class="col-4">
                          <h4 class="text-bluesky">Admin</h4>
                        </div>
                        <div class="col-8 text-center text-danger text-capitalize" style="font-family: Agency FB;font-size: 1.5em">
                           <?php if(isset($erreur)){echo $erreur;}?>
                        </div>
                   </div>
                </div>

                <div class=" text-center card-body">

                       <form method="post" action="#content">
                               <p tyle="font-family: Agency FB;font-size: 1.5em">Veuillez remplir ce formulaire</p>
                                <div class="input-group py-3 "> 
                                    <input id="nom" class="form-control  border border-primary" type="password" size="70" Maxlenght="50" name="nom"  id="nom" placeholder="Nom d'utilisateur">
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>
                                <div class="input-group py-3 "> 
                                    <input id="nom" class="form-control  border border-primary" type="password" size="70" Maxlenght="50" name="pass"  id="pass" placeholder="Mot de passe">
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
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
<?php 
include('foot.php');
?>