<?php 
    include('header.php');
    include'../../functions//function.php';
    include('bd.php');
    $title ='Compte Quincaillerie';

//Add user
if(isset($_POST['submit_utilisateur']) AND $_POST['submit_utilisateur']!=empty($_POST['submit_utilisateur']) ) 
      {
            // Traitement des input input des upload
             // Recuperation des input input des upload
             $nom_uti = trim(htmlspecialchars($_POST['nom_uti']));
             $droit =$_POST['droit'];
             $password = trim(htmlspecialchars($_POST['password']));
             $nom_utilisateur = trim(htmlspecialchars($_POST['nom_utilisateur']));
             $prenom_utilisateur= trim(htmlspecialchars($_POST['prenom_utilisateur']));
             $numero = trim(htmlspecialchars($_POST['numero']));
             $email = trim(htmlspecialchars($_POST['email']));
             $ville = trim(htmlspecialchars($_POST['ville']));
             $secteur = trim(htmlspecialchars($_POST['secteur']));
             $CNIB = trim(htmlspecialchars($_POST['CNIB']));
             $code = trim(htmlspecialchars($_POST['code_uti']));
    
            // detaille de l'upload
              $user_pic_name=$_FILES['user_pic']['name'];
              $user_pic_tmp=$_FILES['user_pic']['tmp_name'];
              move_uploaded_file($user_pic_tmp,"./incones/$user_pic_name");


         if (!empty($nom_uti) && !empty($droit) && !empty($password) && !empty($user_pic_name) && !empty($nom_utilisateur) && !empty($prenom_utilisateur) && !empty($numero) && !empty($email)&& !empty($ville)&& !empty($secteur)&& !empty($CNIB)&& !empty($code)) 
         { 
            //Selection de donnees dans users pour verifier l'existance de USER_NAME,PROFIL,EMAIL;
           $verifier=$bdd->query("SELECT USER_NAME,PROFIL,EMAIL from users");
           $verifier=$verifier->fetch();
           
           // command d'insertion dans la table users
          
           
           // Verification de ressemblance d'une ligne complete 
           // $count_mater=$req_insert_utili->rowCount();

           if($verifier['USER_NAME']==$nom_uti ||$verifier['PROFIL']== $user_pic_name ||$verifier['EMAIL']== $email)
           {
            alert('info', "L'utilisateur " .$nom_uti." existe deja");
           }
          else{
        $req_insert_utili = $bdd->prepare("INSERT INTO users SET DROIT=?,PWD=?,USER_NAME=?,PROFIL=?,USER_STATUS='Enable',NOM=?,PRENOM=?,EMAIL=?,SECTEUR=?,VILLE=?,TELEPHONE=?,CNIB=?,CODE_UTILISATEUR=?");
          $req_insert_utili->execute([$droit,$password,$nom_uti,$user_pic_name,$nom_utilisateur,$prenom_utilisateur,$email,$secteur,$ville,$numero,$CNIB,$code]);
                 echo "<script>window.location='compte_quincailleries.php?msg_quincaillerie=$nom_quincaillerie'</script>";
                 // header('location:ajouter_user.php');

                  // $error_verify1 = array(
                  //               "status" => "alert-success",
                  //               "message" => "User created successfully"
                  //                       );

              } 
   
       }
    }

   
?>
<div class="container-fluid" id="fenetre">
    <div class="row">
        <div class="col-lg-12">
                <div class="card-body">
                      <hr>
                      <div id="add_user">
                         <h3 class="text-info text-center">Add user</h3>   
                      </div>
                       <hr>
                   <!-- Create hardware store responsible-->
                    <div class="modal-dialog modal-xl" role="document">
                         <div class="modal-content">
                               <div class="modal-header bg-light">
                                    <h5 class="modal-title text-info text-uppercase">Add a hardware store responsible</h5>
                                </div>
                            <div class="modal-body">
                                <div class="col-12 text-center" id="text"></div>
                                <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                             <div class="col-lg-12 text-left">
                                    <h5 class="text-bluesky mt-3">Identite utilisateur</h5>
                                    <hr class="bg-gradient-primary">
                             </div>
                             <!-- Espace pour le nom de famille de l'utilisateur  -->
                             <div class="form-group py-3 col-lg-4 col-md-4 col-sm-6" >
                                <label for="nom_utilisateur">NOM<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nom_utilisateur"id="nom_utilisateur"  placeholder="Votre Nom">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                             <!-- Espace pour le Prenom de l'utilisateur  -->
                             <div class="form-group py-3 col-lg-4 col-md-4 col-sm-6" >
                                <label for="prenom_utilisateur">PRENOM<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="prenom_utilisateur" id="prenom_utilisateur" placeholder="Votre Prenom">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Espace pour le CNIB de l'utilisateur  -->
                            <div class="form-group py-3 col-lg-4 col-md-4 col-sm-6">
                                <label for="CNIB">CNIB<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="CNIB" id="CNIB" placeholder="Votre CNIB" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-id-card"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Espace pour le nom d'utilisateur  -->
                            <div class="form-group py-3 col-lg-4 col-md-4 col-sm-6">
                                <label for="nom_uti">Nom d'utilisateur<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nom_uti" id="nom_uti" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Espace pour les droits du l'utilisateur  -->
                            <div class="form-group py-3 col-lg-4 col-md-4 col-sm-12">
                                <label for="droit">Droit Utilisateur<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                        <input type="text" class="form-control" name="droit" id="droit" placeholder="droit" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fa fa-chevron-right"></span>
                                    </div>
                                </div>
                            </div>
                             
                           
                            <!-- Espace pour le mot de passe de l'utilisatuer  -->   
                            <div class="form-group py-3 col-lg-4 col-md-4 col-sm-12">
                                <label for="password">Mot de passe<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-key"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Espace pour upload code de l'utilisateur-->
                             <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12" >
                                <label for="code_uti">Code Utilisateur<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="code_uti" id="code_uti"  placeholder="Le code utilisateur" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fa fa-user-secret"></span>
                                    </div>
                                </div>
                            </div>


                               <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12">
                                     <label for="user_pic">PROFILE<span class="text-danger"> * </span></label>
                                     <div class="input-group">
                                         <input type="file" name="user_pic" id="user_pic" class="form-control">
                                         <div class="input-group-append">
                                             <span class=" input-group-text fas fa-upload bg-light"></span>
                                         </div>
                                     </div>

                                </div>

                            <div class="col-lg-12 text-left">
                                    <h5 class="text-bluesky mt-3">Adresses utilisateur</h5>
                                    <hr class="bg-gradient-primary">
                             </div>

                              <!-- Espace pour le numero de telephone de l'utilisateur  -->
                            <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12">
                                <label for="numero">Numero Telephone<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="numero" id="numero" placeholder="(+226)">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                           
                           <!-- Espace pour le numero email de l'Utilisateur  -->
                            <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12" >
                                <label for="email">EMAIL<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
    

                            <div class="col-lg-12 text-left">
                                    <h5 class="text-bluesky mt-3">Info Localite</h5>
                                    <hr class="bg-gradient-primary">
                             </div>

                            <!-- Espace pour le numero ville de l'utilisateur  -->
                            <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12">
                                <label for="ville">VILLE<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="ville" id="ville">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-city"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Espace pour le numero secteur de l'utilisateur  -->
                            <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12">
                                <label for="secteur">SECTEUR<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="secteur" id="secteur">
                                    <div class="input-group-append">
                                        <span class="input-group-text fa fa-home"></span>
                                    </div>
                                </div>
                            </div>

                             
                            <!-- Espace pour le boutton submit  -->
                            <div class="col-lg-6 py-3 mx-auto text-center my-3">
                                <input class="btn btn-primary w-75 my-3 " type="submit" name="submit_utilisateur" id="submit_utilisateur" value="Creer un utilisateur">
                            </div>
                                          
                           
                        </div>
                    </form>
                               </div>
                            </div>
                        </div>
                 <!-- Fin creer quincaillerie -->

                </div>
        </div>
    </div>
</div>
<script type="text/javascript">

       var inputs_remplis = [];
    var btn = document.getElementById("submit_quincaillerie");
    var btn2 = document.getElementById("upd_quincaillerie");
    
   
    function Supprimer_quincaillerie(id_qui,nom_quin){
       document.getElementById("id_q").value  = id_qui;
        $("#get_quinc").html("Voulez vous supprimer la quincaillerie <b>"+nom_quin+" !</b>")
    }
    

    function EnableDecimal(val1){
        if(val1.id=="nom_quincaillerie" || val1.id=="ville_quincaillerie" || val1.id=="secteur_quincaillerie"|| val1.id=="image_quincaillerie"|| val1.id=="upd_nom_quincaillerie"|| val1.id=="upd_ville_quincaillerie"|| val1.id=="upd_secteur_quincaillerie"|| val1.id=="code_quincaillerie" || val1.id=="upd_code_quincaillerie"   ){
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
        if (inputs_remplis.length ==4)
        {
            btn.disabled = false;
        }
        else
        {
            btn.disabled = true;
        }
    }   
    
</script>
<?php
include('foot.php');
?>