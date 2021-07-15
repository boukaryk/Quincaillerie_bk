<?php 
$title="Ajouter produit";
include('header.php');
include'../../functions//function.php';
require_once'bd.php';
$matricule=$bdd->query("SELECT *FROM quincaillerie");
$categorie=$bdd->query("SELECT *FROM categorie");
if(isset($_POST['submit_materiel'])){
    $nom_prod=trim(htmlspecialchars($_POST['nom_prod']));
    $cat_prod=trim(htmlspecialchars($_POST['cat_prod']));
    $dat=trim(htmlspecialchars($_POST['dat']));
    $prix_reduit_prod=trim(htmlspecialchars($_POST['prix_reduit_prod']));
    $prix_homologue_prod=trim(htmlspecialchars($_POST['prix_homologue_prod']));
    $matricule_quin=trim(htmlspecialchars($_POST['matricule_quin']));
    $img=$_FILES['img']['name'];
    $filename=$_FILES['img']['tmp_name'];
    move_uploaded_file($filename,"./images/$img");

    if(empty($nom_prod)||empty($cat_prod)||empty($dat)||empty($prix_reduit_prod)||empty($prix_homologue_prod)||empty($matricule_quin)||empty($img) ){
        $erreur="Veillez remplir tous les champs";
    }else{
         $envoi=$bdd->prepare("INSERT INTO materiel set ID_QUINCAILLERIE=?,ID_CATEGORIE=?,NOM_MATERIEL=?,PRIX_HOMOLOGUE=?,PRIX_REDUIT=?,LINK=?,DATE_ENREGISTREMENT=?");
    $envoi->execute([$matricule_quin,$cat_prod,$nom_prod,$prix_homologue_prod,$prix_reduit_prod,$img,$dat]);
     $count_mater=$envoi->rowCount();
        if($count_mater==0){
        alert('info',$nom_prod.' Ce materiel existe deja');
        }else{
           alert('success',$nom_prod.' ajouté avec succès');
        } 
    }  
   
}
?>
    <div class="container-fluid" id="fenetre">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">

                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#inscription" class="nav-link active" id="inscription_tab" data-toggle="tab">Ajouter un produit</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="inscription">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <!--produit -->
                                        <div class="col-lg-12 text-left">
                                            <h5 class="text-bluesky mt-3">Info du produit</h5>
                                            <h4 class="text-center text-info"><?php if(isset($erreu)){echo $erreu;}?></h4>
                                            <h4 class="text-center text-info"><?php if(isset($erreur)){echo $erreur;}?></h4> 
                                            <div class="col-12 text-center" id="text"></div>
                                            <hr class="bg-gradient-primary">
                                        </div>

                                         <!-- Nom du produit -->
                                        <div class="col-lg-4 p-4">
                                            <label for="nom_prod" class="pb-3">Nom du produit<span
                                                        class="text-danger"> * </span></label>
                                            <div class=" input-group">
                                                <input type="text" name="nom_prod" id="nom_prod"
                                                       class="form-control" placeholder="Nom du produit" oninput="EnableDecimal(this)"
                                                       >
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fab fa-product-hunt  bg-light"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Categorie -->
                                        <div class="col-lg-4 p-4">
                                            <label for="cat_prod" class="pb-3">Categorie<span
                                                        class="text-danger"> * </span></label>
                                            <div class="input-group">
                                                <select class="form-control" name="cat_prod" id="cat_prod"
                                                        oninput="EnableDecimal(this)">
                                                    <option value="Select">Select Categorie</option>
                                                    <?php
                                                        while ($categories = $categorie->fetch()) {
                                                            ?>

                                                            <option value="<?= $categories['ID_CATEGORIE'] ?>"><?= $categories['TYPE_CATEGORIE'] ?></option>
                                                        <?php }
                                                     ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fas fa-school"></span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                         
                                         <!-- user_identity -->
                                         <div class="col-lg-4 p-4">
                                             <label for="matricule_quin" class="pb-3">Matricule Quinciallerie<span class="text-danger"> * </span></label>
                                             <div class="input-group">
                                                 <select class="form-control" name="matricule_quin" id="matricule_quin"
                                                         oninput="EnableDecimal(this)" placeholder="Votre Matricule">
                                                     <option value="Select">Select Matricule</option>
                                                     <?php
                                                         while ($matricules = $matricule->fetch()) {
                                                             ?>

                                                             <option value="<?= $matricules['ID_QUINCAILLERIE'] ?>"><?= $matricules['ID_QUINCAILLERIE'] ?></option>
                                                         <?php }
                                                      ?>
                                                 </select>
                                                 <div class="input-group-append">
                                                     <span class=" input-group-text fas fa-school"></span>
                                                 </div>
                                             </div>  
                                         </div>

                                        <!-- Prix et photo -->
                                        <div class="col-lg-12 text-left mt-5">
                                            <h5 class="text-bluesky">Prix et photo du produit</h5>
                                            <hr class="bg-gradient-primary">
                                        </div>

                                        <!-- Prix reduit -->
                                        <div class="col-lg-4 p-4">
                                            <label for="prix_reduit_prod" class="pb-3">Prix reduit<span class="text-danger"> * </span></label>
                                            <div class="input-group">
                                                <input type="number" name="prix_reduit_prod" id="prix_reduit_prod"
                                                       class="form-control" placeholder="Prix reduit" oninput="EnableDecimal(this)"
                                                       >
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fas fa-dollar-sign  bg-light"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Prix homologe -->
                                        <div class="col-lg-4 p-4">
                                            <label for="prix_homologue_prod" class="pb-3">Prix homologe<span class="text-danger"> * </span></label>
                                            <div class="input-group">
                                                <input type="number" name="prix_homologue_prod"
                                                       id="prix_homologue_prod" class="form-control" placeholder="Prix homologe"
                                                       oninput="EnableDecimal(this)"
                                                       >
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fas fa-dollar-sign  bg-light"></span>
                                                </div>
                                            </div>  
                                        </div>

                                         <!-- Date-->
                                         <div class="col-lg-4 p-4">
                                             <label for="dat" class="pb-3">Date<span
                                                         class="text-danger"> * </span></label>
                                             <div class="form-group">
                                                 <input type="date"
                                                        name="dat" id="dat"
                                                        class="form-control" placeholder="2020/12/31" oninput="EnableDecimal(this)"
                                                        >
                                             </div>
                                         </div>


                                        <!-- Image-->
                                        <div class="col-lg-4 p-4">
                                            <label for="img" class="pb-3">Image<span class="text-danger"> * </span></label>
                                            <div class="input-group">
                                                <input type="file" name="img" id="img"
                                                       class="form-control" 
                                                       >
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fas fa-mobile bg-light"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-12 text-center my-5">
                                            <input 
                                            class="btn btn-primary w-75 my-3 " type="submit"
                                                    name="submit_materiel" id="submit_materiel" value="Enregisrer">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php include('foot.php'); ?>
<script type="text/javascript">
    var inputs_remplis = [];
    var btn = document.getElementById("submit_materiel");

function EnableDecimal(val1){
           if(val1.id=="cat_prod" ||val1.id=="nom_prod" || val1.id=="dat" || val1.id=="prix_reduit_prod" || val1.id=="prix_homologue_prod" || val1.id=="matricule_quin" || val1.id=="img"){
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
           if (inputs_remplis.length ==6)
           {
               btn.disabled = false;
           }
           else
           {
               btn.disabled = true;
           }
       }  

  
      


       // function ajouter_materiel(){
       //     $.post(
       //     'ajax.php', {
       //         submit_materiel:$("#submit_materiel").val(),
       //         categorie_produit:$("#cat_prod").val(),
       //         nom_produit:$("#nom_prod").val(),
       //         date_produit:$("#dat").val(),
       //         reduit_produit:$("#prix_reduit_prod").val(),
       //         homologue_produit:$("#prix_homologue_prod").val(),
       //         matricule_produit:$("#matricule_quin").val(),
       //         image_produit:$("#img").val(),
       //     }, function (donnees){
       //      alert(donnees);
       //         if(donnees==1){
       //             $('#text').css('color','green');
       //             $('#text').html('A new Department has been succesfuly added');
       //             $('#text').css('padding','6px');
       //             $('#text').css('background-color','#e5ffe0');
       //             var reset = document.getElementById('depart');
       //             reset.reset();
       //         }else if(donnees==2){
       //             $('#text').css('color','red');
       //             $('#text').css('padding','6px');
       //             $('#text').html('This Department is already added.');
       //             $('#text').css('background-color','#f8bccb');
       //         }
               
       //     });
           
       // }


       
</script>
