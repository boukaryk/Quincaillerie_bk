<?php 
 $title ='Hardware acccount management';
    include('header.php');
    include('bd.php');
    include'../../functions//function.php';
  
    if(isset($_GET['msg_quincaillerie']) AND $_GET['msg_quincaillerie']!=empty($_GET['msg_quincaillerie'])){
        $msg=$_GET['msg_quincaillerie'];
        alert('info', ' Hardware store '.$msg.' Has been add');
    }

    $afficher_quincaillerie=$bdd->query("SELECT * FROM quincaillerie q, users u WHERE q.ID_QUINCAILLERIE=u.RIGHTS");

    if(isset($_POST['supprimer_quincaillerie'])){
    $ID_QUINCAILLERIE=$_POST['id_qui'];
    $delete_quincaillerie=$bdd->prepare("DELETE FROM users where ID_DROIT=?");
    $delete_quincaillerie->execute([$ID_QUINCAILLERIE]);
     header("Location:compte_quincailleries.php");
   }

  //  if (isset($_POST['upd_submit_quincaillerie'])) 
  // { $id_quincaillerie=trim(htmlspecialchars($_POST['id_quincaillerie']));
  //   $upd_code_quincaillerie=trim(htmlspecialchars($_POST['upd_code_quincaillerie']));
  //   $upd_nom_quincaillerie=trim(htmlspecialchars($_POST['upd_nom_quincaillerie']));
  //   $upd_ville_quincaillerie=trim(htmlspecialchars($_POST['upd_ville_quincaillerie']));
  //   $updat_secteur_quincaillerie=trim(htmlspecialchars($_POST['updat_secteur_quincaillerie']));
  //   $upd_image_quincaillerie=trim(htmlspecialchars($_POST['upd_image_quincaillerie']));

  //   $upd_quincaillerie=$bdd->prepare("DELETE FROM quincaillerie q, users u WHERE q.ID_QUINCAILLERIE=u.DROIT AND id_quincaillerie=?, upd_code_quincaillerie=?,upd_nom_quincaillerie=?, upd_ville_quincaillerie=?,updat_secteur_quincaillerie=?, updat_secteur_quincaillerie=?");
  //   $delete_quincaillerie->execute([$id_quincaillerie,$upd_code_quincaillerie,$upd_nom_quincaillerie,$upd_ville_quincaillerie,$ID_QUINCAILLERIE,$ID_QUINCAILLERIE]);

    
  //     if (!empty($nom_quincaillerie) && !empty($ville_quincaillerie) && !empty($secteur_quincaillerie) && !empty($code_quincaillerie)) 
  //        {

  //         $insert_quinc = $bdd->prepare("INSERT INTO quincaillerie SET ID_QUINCAILLERIE=?, ID_QUINCAILLERIER='".$code_quincaillerie."',NOM_QUINCAILLERIE=?,VILLE_QUINCAILLERIE=?,SECTEUR_QUINCAILLERIE=?, STATUS_QUINC='Enable'");
  //         $insert_quinc->execute([$code_quincaillerie,$nom_quincaillerie,$ville_quincaillerie,$secteur_quincaillerie]);
  //        }
  // }

?>
<div class="container-fluid py-5">
    <hr class="bg-dark">            
        <h3 class="text-info text-center"><i>Manage hardware store</i></h3>                   
       <hr class="bg-dark"> 
    <div class="row">
        <div class="col-lg-12">
            <div class="card wow fadeInDown">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-bluesky">Tous les quincaillerie</h4>
                        </div>
                        <div class="col-6 text-right">
                           <!--  <a class="btn btn-dark" data-toggle="modal" data-target="#new_department" role="button">Ajouter quincaillerie</a> -->
                            <a class="btn btn-dark" href="Ajouter_quincaillerie.php" role="button">Add hardware sotre Responsible</a>
                            <a class="btn btn-dark" href="user_account.php" role="button">Add User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body py-2">
                    
                    <table class="table table-bordered table-hover table-responsive-lg table-responsive-md table-responsive-sm" id="table">
                        <thead>
                            <tr>
                               <th class="text-truncate">Action</th>
                                <th class="text-truncate">Code quincaillerie</th>
                                <th class="text-truncate">Nom quincaillerie</th>
                                <th class="text-truncate">Nom quincaillerier</th>
                                <th class="text-truncate">Ville</th>
                                <th class="text-truncate">Secteur</th>
                                <th class="text-truncate">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 
                                    while($afficher_quincailleries = $afficher_quincaillerie->fetch()):?>
                                <tr>
                                    <td class="text-truncate">
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#upModal" onclick="Modifier_quincaillerie(<?= $afficher_quincailleries['ID_QUINCAILLERIE']?>,<?= $afficher_quincailleries['NOM_QUINCAILLERIE']?>,<?= $afficher_quincailleries['VILLE_QUINCAILLERIE']?>,<?= $afficher_quincailleries['SECTEUR_QUINCAILLERIE']?>,<?= $afficher_quincailleries['IMAGE_QUINC']?>)"><i class="fas fa-edit text-warning"></i></button>
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#delModal"><i class="fas fa-trash text-danger" onclick="Supprimer_quincaillerie(<?= htmlspecialchars(json_encode($afficher_quincailleries['RIGHTS']))?>,<?= htmlspecialchars(json_encode($afficher_quincailleries['NOM_QUINCAILLERIE']))?>)"></i></button>
                                        </div>
                                    </td>
                                    <td class="text-truncate"><?= $afficher_quincailleries['RIGHTS'] ?></td>
                                    <td class="text-truncate"> <?= $afficher_quincailleries['NOM_QUINCAILLERIE'] ?></td>
                                    <td class="text-truncate"><?= $afficher_quincailleries['LAST_NAME'] ?> <?= $afficher_quincailleries['FIRST_NAME']?></td>
                                    <td class="text-capitalize text-truncate"><?= $afficher_quincailleries['VILLE_QUINCAILLERIE']?></td>
                                    <td class="small"><?= $afficher_quincailleries['SECTEUR_QUINCAILLERIE'] ?></td>
                                    <td class="small"><?= $afficher_quincailleries['IMAGE_QUINC'] ?></td>
                                </tr>
                                <?php endwhile;?>
                                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-truncate">Action</th>
                                <th class="text-truncate">Code quincaillerie</th>
                                <th class="text-truncate">Nom quincaillerie</th>
                                <th class="text-truncate">Nom quincaillerier</th>
                                <th class="text-truncate">Ville</th>
                                <th class="text-truncate">Secteur</th>
                                <th class="text-truncate">Image</th>
                            </tr>
                        </tfoot>
                    </table>
                        <!-- Update hardware store -->
                        <div class="modal fade" id="upModal" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" aria-hidden="true">
                           <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">

                                   <div class="modal-header bg-warning">
                                        <h5 class="modal-title text-light text-uppercase">Update hardware store information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loads()">
                                             <span aria-hidden="true" class="text-dark">&times;</span>
                                        </button>
                                    </div>

                                <div class="modal-body">
                                    <div class="container-fluid ">
                                       <!--  <div class="col-12 text-center" id="texte"></div>
                                            <form action="#" method="post" id="txt" class="my-5">
                                                        545454545
                                            </form> -->

                                    <form action="#" method="post" enctype="multipart/form-data"  id="reset_quinc" >
                                      <div class="row">
                                         <div class="col-lg-4 my-3 col-md-4 col-sm-12">
                                            <label for="upd_code_quincaillerie">Code quincaillerie<span class="text-danger"> * </span></label>
                                              <div class="input-group">
                                                 <input type="text" class="form-control" name="upd_code_quincaillerie" id="upd_code_quincaillerie" >
                                                 <div class="input-group-append">
                                                   <span class=" input-group-text fas fa-university"></span>
                                                 </div>
                                              </div>
                                             </div>

                                             <div class="col-lg-4 col-md-4 col-sm-12 py-3">
                                                    <label for="upd_nom_quincaillerie">Nom quincaillerie<span class="text-danger"> * </span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="upd_nom_quincaillerie" id="upd_nom_quincaillerie">

                                                        <div class="input-group-append">
                                                            <span class=" input-group-text fas fa-university"></span>
                                                        </div>
                                                    </div>
                                              </div>

                                            <div class="col-lg-4 col-md-4 col-sm-12 py-3">
                                                 <label for="upd_ville_quincaillerie">Ville <span class="text-danger"> * </span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="upd_ville_quincaillerie" id="upd_ville_quincaillerie">        
                                                  <div class="input-group-append">
                                                      <span class="input-group-text fas fa-user-tie"></span>
                                                   </div>
                                                </div>
                                            </div>
                                                        

                                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <label for="updat_secteur_quincaillerie">Secteur <span class="text-danger"> * </span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="updat_secteur_quincaillerie" id="updat_secteur_quincaillerie">        
                                                    <div class="input-group-append">
                                                        <span class="input-group-text fas fa-user-tie"></span>
                                                    </div>
                                                </div>
                                             </div>

                                           <!-- Image-->
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 py-3">
                                            <label for="upd_image_quincaillerie">Image<span class="text-danger"> * </span></label>
                                            <div class="input-group">
                                                <input type="file" name="upd_image_quincaillerie" id="upd_image_quincaillerie"
                                                       class="form-control" 
                                                       >
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fas fa-upload bg-light"></span>
                                                </div>
                                            </div>

                                        </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 text-center py-3 mx-auto">
                                               <input class="btn btn-primary w-50" type="submit" name="upd_submit_quincaillerie" id="upd_submit_quincaillerie" value="Add a hardware store"> 
                                            </div>

                                       </div>
                                    </form>
                                </div>
                             </div>
                        </div>
                     </div>
                  </div>
                 <!-- End Update hardware store -->


                 <!--Supprimer Modal quincaillerie-->
                 <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                            <div class="modal-header bg-danger text-center text-white">
                                  <h5 class="modal-title">Delete Hardware store</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                 <div class="container-fluid">
                                      <span id="get_quinc"></span>
                                 </div>
                            </div>
                             <div class="modal-footer">
                                  <form action="#" method="post">
                                        <input type="text" value="" id="id_q" name="id_qui" hidden>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        Annuler</button>
                                        <input type="submit" class="btn btn-danger" name="supprimer_quincaillerie" value="Supprimer quincaillerie">
                                  </form>
                                                
                            </div>
                        </div>
                   </div>
             </div>
        <!-- Fin supprimer Modal quincaillerie -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


    function Supprimer_quincaillerie(id_qui,nom_quin){
       document.getElementById("id_q").value  = id_qui;
        $("#get_quinc").html("Voulez vous supprimer la quincaillerie <b>"+nom_quin+" !</b>")
    }

    function Modifier_quincaillerie(upd_code_quincaillerie,upd_nom_quincaillerie,upd_ville_quincaillerie,updat_secteur_quincaillerie,upd_image_quincaillerie){
       // document.getElementById("id_quincaillerie").value  = id_quincaillerie;
       document.getElementById("upd_code_quincaillerie").value  = upd_code_quincaillerie;
       document.getElementById("upd_nom_quincaillerie").value  = upd_nom_quincaillerie;
       document.getElementById("upd_ville_quincaillerie").value  = upd_ville_quincaillerie;
       document.getElementById("updat_secteur_quincaillerie").value  = updat_secteur_quincaillerie;
       document.getElementById("upd_image_quincaillerie").value  = upd_image_quincaillerie;
        // $("#get_quinc").html("Voulez vous supprimer la quincaillerie <b>"+nom_quin+" !</b>")
    }
     
     
    function loads(){
         window.location.replace("compte_quincailleries.php");
    }
</script>
<?php
include('foot.php');
?>