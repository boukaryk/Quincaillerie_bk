<?php
session_start(); 
require_once('h.php');
$title="Materiels";
include'head.php';
require_once 'bd.php';
$cate=$bdd->query("SELECT * FROM categorie");

if(empty($_POST['submit'])){
    $req = $bdd->query('SELECT * FROM materiel m, categorie c where m.ID_CATEGORIE=c.ID_CATEGORIE ORDER BY ID_MATERIEL DESC LIMIT 28'); 
}
else {
    $categorie=$_POST['select'];
    if(isset($categorie)){
      $req = $bdd->prepare('SELECT * FROM materiel m, categorie c where m.ID_CATEGORIE=c.ID_CATEGORIE AND TYPE_CATEGORIE=?  ORDER BY ID_MATERIEL DESC LIMIT 28');
        $req->execute([$categorie]);
        $count=$req->rowCount();
        if($count==0){
        $erreur='0 resultats trouvé. Veuillez reformuler votre recherche.';
        } 
    }
} 

?>
<div class="container-fluid">
        
    <p id="p">Ici vous pouvez avoir toutes les categories de materiels. Selectionner une categorie de materiel et cliquer sur "recherche" pour voir d'autres produits relatives.</p>
    <h1 id="cpt"></h1>
     
    <form class="py-5 my-3 px-3" method="post" action='#recherche'>
        <div class="row">

            <div class="col-lg-4">
                <div class="input-group">
                    <select class="form-control text-center" name="select" id="select">
                        <?php
                            while ($categories = $cate->fetch()) {
                                ?>

                                <option value="<?= $categories['TYPE_CATEGORIE'] ?>"><?= $categories['TYPE_CATEGORIE'] ?></option>
                            <?php }
                         ?>
                    </select>
                    <div class="input-group-append">
                        <span class=" input-group-text fas fa-school"></span>
                    </div>
                </div>
            </div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="submit" class="form-control btn btn-dark" name="submit" id="submit" value="Rechercher">
                        <div class="input-group-append">
                            <span class="input-group-text fas fa-search"></span>
                        </div>
                    </div>
                </div>

  <!--               <div class="col-lg-4">

                 <div class="input-group-append "> 
                    <span class="input-group-text fas fa-sign-out-alt">                   
                         <a href="../../../index.php">decon</a>
                    </span>
                </div>
            
                </div> -->

            </div>
        </form>
     <div class="py-5" id="produit1">
         <h1 style="color:red"><?php if(isset($erreur)){echo $erreur; } ?></h1>
        <ul><?php
            while($an=$req->fetch()){?>
            <li>
                <div id="img">
                    <img src="../../images/<?php echo $an['LINK'];?>" title="<?php echo $an['NOM_MATERIEL'];?>" id="affiche">
                </div>
                <p class="text-center text-dark py-3 nom" ><?php echo $an['NOM_MATERIEL'];?></p>
                <div class="row">
                    
                    <h2 class="text-success text-left"><?= $an['PRIX_REDUIT'];?> fcfa</h2>

                   <h2 class="text-danger text-right" style="text-decoration: line-through;"><?= $an['PRIX_HOMOLOGUE'];?> fcfa</h2>
                                 
                    <input type="button" class="px-4 mt-5" id="add" onclick="addProd(<?=$an['ID_MATERIEL']?>)" value="add" enable>                               
               </div>
                
            </li>
       <?php
        } ?>
        </ul>  
    </div>
</div>

<script type="text/javascript">
    $("#cart_count").hide();
    var cpt = 0;
    var command = [];
    var lien = "http://localhost/quincaillerie/assets/pages/client/moncart.php";
    var lien1 = "http://localhost/quincaillerie/assets/pages/client/moncart.php?";

    function addProd(id){
        $("#cart_count").show();
        command.push(command,id);
        lien = lien1+'ids='+command;
        document.getElementById('cart').href=lien;
        $("#cart_count").html(++cpt);
    }
</script>
<?php include'footer.php';?>