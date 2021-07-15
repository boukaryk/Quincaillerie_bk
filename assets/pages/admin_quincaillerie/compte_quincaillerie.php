<?php 
    require_once 'bd.php';
    $title = 'Compte quincaillerie';
    $afficher_quincaillerie=$bdd->query("SELECT * FROM quincaillerie q, quincaillerier qu WHERE q.ID_QUINCAILLERIE=qu.ID_QUINCAILLERIER");
    $select_status_quinc=$bdd->query("SELECT DISTINCT(STATUS_QUINC) FROM quincaillerie");

    if(isset($_POST['supprimer_quincaillerie'])){
    $ID_QUINCAILLERIE=$_POST['id_qui'];
    $delete_quincaillerie=$bdd->prepare("DELETE FROM quincaillerie where ID_QUINCAILLERIE=?");
    $delete_quincaillerie->execute([$ID_QUINCAILLERIE]);
     header("Location:compte_quincaillerie.php");
}

    include('header.php');

?>
<div class="container-fluid" id="fenetre">
    <div class="row">
        <div class="col-lg-12">
            <div class="card wow fadeInDown">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-bluesky">Tous les quincaillerie</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-dark" data-toggle="modal" data-target="#new_department" role="button">Ajouter quincaillerie</a>
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
                                <th class="text-truncate">Nom de domain</th>
                                <th class="text-truncate">Image</th>
                                <th class="text-truncate">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 if(is_object($afficher_quincaillerie)){
                                    while($afficher_quincailleries = $afficher_quincaillerie->fetch()){?>
                                <tr>
                                    <td class="text-truncate">
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#upModal" onclick="Modifier_quincaillerie(<?= $afficher_quincailleries['ID_QUINCAILLERIE']?>)"><i class="fas fa-edit text-warning"></i></button>
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#delModal"><i class="fas fa-trash text-danger" onclick="Supprimer_quincaillerie(<?= htmlspecialchars(json_encode($afficher_quincailleries['ID_QUINCAILLERIE']))?>,<?= htmlspecialchars(json_encode($afficher_quincailleries['NOM_QUINCAILLERIE']))?>)"></i></button>
                                        </div>
                                    </td>
                                    <td class="text-truncate"><?= $afficher_quincailleries['ID_QUINCAILLERIE'] ?></td>
                                    <td class="text-truncate"><?= $afficher_quincailleries['NOM_QUINCAILLERIE'] ?></td>
                                    <td class="text-truncate"><?= $afficher_quincailleries['PRENOM_QUINC'] ?> <?= $afficher_quincailleries['NOM_QUINC'] ?></td>
                                    <td class="text-capitalize text-truncate"><?= $afficher_quincailleries['VILLE_QUINCAILLERIE']?></td>
                                    <td class="small"><?= $afficher_quincailleries['SECTEUR_QUINCAILLERIE'] ?></td>
                                    <td class="small"><?= $afficher_quincailleries['NOM_DOMAIN'] ?></td>
                                    <td class="small"><?= $afficher_quincailleries['IMAGE_QUINC'] ?></td>
                                    <td class="small"><?= $afficher_quincailleries['STATUS_QUINC'] ?></td>
                                </tr>
                                <?php } }?>
                                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-truncate">Action</th>
                                <th class="text-truncate">Code quincaillerie</th>
                                <th class="text-truncate">Nom quincaillerie</th>
                                <th class="text-truncate">Nom quincaillerier</th>
                                <th class="text-truncate">Ville</th>
                                <th class="text-truncate">Secteur</th>
                                <th class="text-truncate">Nom de domain</th>
                                <th class="text-truncate">Image</th>
                                <th class="text-truncate">Status</th>
                            </tr>
                        </tfoot>
                    </table>
                                <!-- Department Update -->
                                <div class="modal fade" id="upModal" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header bg-light">
                                                <h5 class="modal-title text-info text-uppercase">Modifier  Info quincaillerie</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loads()">
                                                    <span aria-hidden="true" class="text-dark">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="container-fluid ">
                                                   <div class="col-12 text-center" id="texte"></div>
                                                    <form action="" method="post" id="txt" class="my-5">
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--Fin de Modification Quincaillerie  -->


                                <!-- Suppression Modal de la Quincaillerie -->
                                <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header bg-danger text-center text-white">
                                                        <h5 class="modal-title">Supprimer quincaillerie</h5>
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
                                                   <button type="button" class="btn btn-warning" data-dismiss="modal">Reset</button>
                                                <input type="submit" class="btn btn-danger" name="supprimer_quincaillerie" value="Supprimer">
                                               </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin suppression du Modal de Quincaillerie  -->
                           
                       

                                <!-- Creer une nouvelle quincaillerie -->
                                <div class="modal fade" id="new_department" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                        <h5 class="modal-title text-info text-uppercase">Ajouter une nouvelle quincaillerie</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loads()">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                            <div class="modal-body">
                                               <div class="col-12 text-center" id="text"></div>
                                                <form action="#" method="post" id="reset_quinc" class="my-3">
                                                    <div class="row">

                                                        <div class="col-lg-4">
                                                            <label for="code_quincaillerie">Code quincaillerie<span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <!-- <input type="text" name="code_quincaillerie" id="code_quincaillerie" hidden> -->
                                                                <input type="text" class="form-control" name="code_quincaillerie" id="code_quincaillerie" placeholder="Entrer code quincaillerie" oninput="EnableDecimal(this)" required>

                                                                <div class="input-group-append">
                                                                    <span class=" input-group-text fas fa-university"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label for="nom_quincaillerie">Nom quincaillerie<span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="nom_quincaillerie" id="nom_quincaillerie" placeholder="Entrer nom quincaillerie" oninput="EnableDecimal(this)" required>

                                                                <div class="input-group-append">
                                                                    <span class=" input-group-text fas fa-university"></span>
                                                                </div>
                                                            </div>
                                                          </div>

                                                        <div class="col-lg-4">
                                                            <label for="ville_quincaillerie">Ville <span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="ville_quincaillerie" id="ville_quincaillerie" placeholder="Entrer ville" oninput="EnableDecimal(this)" required>
                                                            
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text fas fa-user-tie"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                         <div class="col-lg-4 py-5">
                                                            <label for="secteur_quincaillerie">Secteur <span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" name="secteur_quincaillerie" id="secteur_quincaillerie" placeholder="Entrer secteur" oninput="EnableDecimal(this)" required>
                                                            
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text fas fa-user-tie"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 py-5">
                                                            <label for="domain_quincaillerie">Domain<span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="domain_quincaillerie" id="domain_quincaillerie" placeholder="Entrer Domain" oninput="EnableDecimal(this)" required>
                                                            
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text fas fa-user-tie"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Status  -->
                                                        <div class="col-lg-4 col-md-6 col-sm-12 py-5">
                                                            <label for="status_quincaillerie">Choix status quincaillerie<span class="text-danger"> * </span></label>
                                                            <div class="input-group">
                                                                <select class="form-control text-center" id="status_quincaillerie" name="status_quincaillerie">
                                                                    <?php
                                                                        while ($select_status_quincs = $select_status_quinc->fetch()) {
                                                                            ?>

                                                                            <option value="<?= $select_status_quincs['STATUS_QUINC'] ?>"><?= $select_status_quincs['STATUS_QUINC'] ?></option>
                                                                        <?php }
                                                                     ?>
                                                                </select>
                                                            
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text fas fa-user-tie"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- image  -->
                                                       <!--  <div class="form-group col-lg-4 col-md-6 mx-auto col-sm-12 py-3" id="user_pic">
                                                            <label for="image_quincaillerie">Image <span class="text-danger"> * </span></label>
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="image_quincaillerie" class="form-control custom-file-input">
                                                                    <label class="custom-file-label" for="upload_pic">Choisir Image</label>
                                                                </div>
                                                            </div>  
                                                        </div> -->



                                                        <div class="col-lg-12 text-center my-3 py-3">
                                                            <input class="btn btn-primary w-50" type="submit" name="submit_quincaillerie" id="submit_quincaillerie" value="Creer une quincaillerie" onclick="Ajouter_quincaillerie()" disabled > 
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- End Create New Field -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    var inputs_remplis = [];
    var btn = document.getElementById("submit_quincaillerie");
    var btn2 = document.getElementById("upd_quincaillerie");
    
    function Ajouter_quincaillerie(){

        $.post(
        'ajax.php', {
            submit_quincaillerie:$("#submit_quincaillerie").val(),
            nom_quincaillerie:$("#nom_quincaillerie").val(),
            ville_quincaillerie:$("#ville_quincaillerie").val(),
            secteur_quincaillerie:$("#secteur_quincaillerie").val(),
            domain_quincaillerie:$("#domain_quincaillerie").val(),
            status_quincaillerie:$("#status_quincaillerie").val(),
            code_quincaillerie:$("#code_quincaillerie").val(),
            // image_quincaillerie:$("#image_quincaillerie").val(),
        }, function (donnees){
            if(donnees==1)
            {
                alert(donnees);
                toastr.success("Quincaillerie ajoute avec succes");
                
                var reset = document.getElementById('reset_quinc');
                reset.reset();
            }
            else if(donnees==2)
            {
                alert(donnees);
                toastr.error("Cette quincaillerie existe");
                
            }
        });
        
    }
    function Modifier_quinc(){
        $.post(
        'ajax.php', {

           upd_quincaillerie:$("#upd_quincaillerie").val(),
            idDepart:$("#idDepart").val(),
            upd_nom_quincaillerie:$("#up_department_chief").val(),
            upd_ville_quincaillerie:$("#up_description").val(),
            upd_secteur_quincaillerie:$("#up_department_name").val(),
            upd_domain_quincaillerie:$("#up_department_name").val(),
            upd_status_quincaillerie:$("#up_department_name").val(),
            upd_image_quincaillerie:$("#up_department_name").val(),
            upd_code_quincaillerie:$("#upd_code_quincaillerie").val(),
        }, function (donnees){
        
            if(donnees=="ok" || donnees=="okk")
            {
                toastr.success("Cette quincaillerie a ete modifier avec succes");
            
            }
            
            else if(donnees=="exit")
            {
                toastr.error("Cette quincaillerie existe");
               
            }
            
            else if(donnees=="empty")
            {
                toastr.error("S'il vous plait remplir tous les champs");
                
            }
        });
    }
    function Supprimer_quincaillerie(id_qui,nom_quin){
       document.getElementById("id_q").value  = id_qui;
        $("#get_quinc").html("Voulez vous supprimer la quincaillerie <b>"+nom_quin+" !</b>")
    }
    

    function EnableDecimal(val1){
        if(val1.id=="nom_quincaillerie" || val1.id=="ville_quincaillerie" || val1.id=="secteur_quincaillerie" || val1.id=="domain_quincaillerie" || val1.id=="status_quincaillerie" || val1.id=="image_quincaillerie"|| val1.id=="upd_nom_quincaillerie"|| val1.id=="upd_ville_quincaillerie"|| val1.id=="upd_secteur_quincaillerie"|| val1.id=="upd_domain_quincaillerie"|| val1.id=="code_quincaillerie" || val1.id=="upd_code_quincaillerie"   ){
            if (val1.value =="")
            {
                val1.style.color = 'red';
                val1.style.border = '1px solid red';
                val1.style.backgroundColor = '#ffdbd8';
                Pop(val1);
            }
            else
            {
                val1.style.color = 'black';
                val1.style.border = '1px solid #ced3db';
                val1.style.backgroundColor = 'white';
               Push(val1);
            }
        }
    }
    
    function Push(input){
      //console.log(input);
         //console.log(inputs_remplis.indexOf(input.id));
         if (inputs_remplis.indexOf(input.id) <= -1)
         {
             inputs_remplis.push(input.id);
         }
         Enable();
    }
    
    function Pop(input){
        //console.log(inputs_remplis.indexOf(input.id));
        if (inputs_remplis.indexOf(input.id) >= 0)
           {
            inputs_remplis.splice(inputs_remplis.indexOf(input.id), 1);
           }
           Enable();
    }
    
    function Enable(){
        if (inputs_remplis.length ==5)
        {
            btn.disabled = false;
        }
        else
        {
            btn.disabled = true;
        }
    }   
    
    function Modifier_quincaillerie(id){
         $.post(
            'ajax.php', {
                quinc_Upd:'ok',
                quinc_Id:id,
            }, function (donnees){
                $('#txt').html(donnees);
            });
    }
    
    function loads(){
         window.location.replace("compte_quincaillerie.php");
    }
</script>
<?php
include('foot.php');
?>