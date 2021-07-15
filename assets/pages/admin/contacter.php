<?php 
      $title="Contact";
      include'header.php';
      include'../../functions/function.php';
    require_once'bd.php';
    if(isset($_POST['envoi'])){
        $nom=trim(htmlspecialchars($_POST['nom']));
        $motif=trim(htmlspecialchars($_POST['motif']));
        $comment=trim(htmlspecialchars($_POST['comment']));
        $email=trim(htmlspecialchars($_POST['email']));
        
        if(empty($nom)){
            // $erreu="Veuillez donner votre nom";
            alert('danger','Veuillez donner votre nom');
        }
        else if(empty($email)){
            // $erreu="Veuillez donner votre Email";
            alert('danger','Veuillez donner votre Email');
        }
        else if(empty($motif)){
            // $erreu="Veuillez donner votre motif";
             alert('danger','Veuillez donner votre motif');
        }
        else if(empty($comment)){
            // $erreu="Veuillez donner un commentaire";
            alert('danger','Veuillez donner un commentaire');
        }
        else{
            $search=$bdd->prepare("INSERT INTO contact SET EMAIL=?, MOTIF=?, MESSAGE=?,NOM_COMPLET=?");
            $search->execute([$email,$motif,$comment,$nom]);
            // $erreur="Merci ".$nom.", message envoyé avec succès.";
            alert('success',' Merci '.''.$nom.' message envoyé avec succès');
        }
    }
?>
<div class="container" id="contact">
    <!-- <h4 class="col-12 text-center" style="color:red; position:absolute"><?php if(isset($erreu)){echo $erreu;}?></h4>
    <h4 class="col-12 text-center " style="color:green; position:absolute"><?php if(isset($erreur)){echo $erreur;}?></h4> -->

        <div class="row">
           
            <div class="col-lg-6 mx-auto py-5">  
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-bluesky text-center">Laissez nous un message</h4>
                             </div>
                        </div>
                    </div>
                    <div class="card-body">
                             <form method="post" action="#content">
                                <div class="input-group py-3 "> 
                                    <input id="input1" class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="nom"  id="nom" placeholder="Votre nom">
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>

                                <div class="input-group py-3 "> 
                                    <input id="input1" class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="email"  id="email" placeholder="Votre Email">
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>

                                <div class="input-group py-3 ">
                                    <input id="input3" class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="motif" id="motif" placeholder="Votre motif" >
                                    <div class="input-group-append">
                                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
                                    </div>
                                </div>

                               <div class="input-group py-3 col-lg-12">
                                 <span class="text-danger"> * </span>
                                 <textarea rows="10" cols="20" class="form-control"  placeholder="Votre Commentaire" size="70" Maxlenght="50"  name="comment"></textarea>
                                </div>

                                <div class="col-lg-12 form-group py-5  text-center">
                                    <input class="btn btn-outline-primary rounded-pill col-lg-12" type="submit" name="envoi" onchange="get_materiel_name(this.value)" value="Envoyer">
                                </div>
                            </form>
                    </div>
                    </div>        
                      </div>                        
                  </div>
                </div>
<<!-- a href="#" class="btn btn-info" data-toggle="modal" data-target="#monmodal">Modal</a>
 <div class="modal fade" id="monmodal">
     <div class="modal-dialog">
        <div class="modal-content">
  <div class="modal-header">
           <h1 class="modal-title">Titre du modal</h1>
<button type="button" class="close" data-dismiss="modal">X</button>
    </div>
 <div class="modal-body">
  
</div>
<div class="modal-footer">
<button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div> -->

<?php include'foot.php';?>
