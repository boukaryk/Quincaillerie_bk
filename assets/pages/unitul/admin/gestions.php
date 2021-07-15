<?php 
    require_once('bd.php');
    $title = 'Admin Dashboard';
  
    include_once ('header.php');



    

    $number_quincaillerie = $bdd->query("SELECT COUNT(ID_QUINCAILLERIE) as Quincaillerie FROM quincaillerie")->fetch();
    
    $number_ville = $bdd->query("SELECT COUNT(DISTINCT(VILLE_QUINCAILLERIE)) as Ville FROM quincaillerie")->fetch();
    $number_commande = $bdd->query("SELECT COUNT(ID_COMMANDE) as Commande FROM commande")->fetch();
    $number_client = $bdd->query("SELECT COUNT(ID_CLIENT) as Client FROM client")->fetch();

    // $online_client = $obj->query("SELECT COUNT(ID_CLIENT) as Client FROM client")->fetch();
    $number_enable_quincaillerie = $bdd->query("SELECT COUNT(STATUS_QUINC) as Quincailleries FROM quincaillerie WHERE STATUS_QUINC='Enable' ")->fetch();
    
?>


<!-- ============================================================================================================================================= -->


    <div class="row mt-3 mt-md-4 mt-lg-5 mx-5">
        <div class="col-xl-3 col-md-6 mb-4 wow bounceIn">
            <div class="card border-top-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mb-1">
                                Nombre de Quincaillerie
                            </div>
                            <div class=" mb-0 text-success font-weight-bold"><?=$number_quincaillerie['Quincaillerie']?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

        <div class="col-xl-3 col-md-6 mb-4 wow bounceIn">
            <div class="card border-top-warning shadow h-100 pt-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mb-1">
                                Quincaillerie Fonctionnelle
                            </div>
                            <div class=" mb-0 text-warning font-weight-bold"><?=$number_enable_quincaillerie['Quincailleries']?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-industry text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="col-xl-3 col-md-6 mb-4 wow bounceIn">
            <div class="card border-top-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mb-1">
                                Ville
                            </div>
                            <div class=" mb-0 text-primary font-weight-bold"><?= $number_ville['Ville'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-city text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="col-xl-3 col-md-6 mb-4 wow bounceIn">
            <div class="card border-top-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="mb-1">
                                commande
                            </div>
                            <div class=" mb-0 text-dark font-weight-bold"><?= $number_commande["Commande"] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

    </div>


<!-- ============================================================================================================================================== -->



<!-- ==================================================client -->
 <div class="row mt-3 mt-md-4 mt-lg-5">
        <div class="col-lg-8 mx-auto">
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
                                      <a href="acheter.php" class="btn btn-outline-dark ">Gestion commandes</a>
                                      <div class="input-group-append">
                                          <span class="input-group-text fas fa-tasks"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row py-5">
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
       <p class="text-center py-5">
        Design by Boukary KABORE Etudiant de premiere promotion<i class="far fa-copyright"></i> 
        <script>
            document.write(new Date().getFullYear());
        </script>
        
      </p>
       
    </div>


    
    <!-- End client -->










<!-- Fin Modal de confirmation de changement d'annee -->

<?php
    include('foot.php');
?>

<!-- <script>
    chart("school_fees" , <?= json_encode($result_table_mois) ?> , "School fees incomes" , <?=json_encode($school_fees_table)?> , "cfa" , 'line');
    chart_pie("school_fees_pie", ["Up to date" , "Out to date"] , <?= json_encode($school_fees_payment_overview) ?> , 'pie');
</script> -->