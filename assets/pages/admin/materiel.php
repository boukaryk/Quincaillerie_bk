<?php 
$title="Materiels";
include'head.php';
require_once 'bd.php';
$cate=$bdd->query("SELECT * FROM categorie");

if(empty($_POST['submit'])){
    $req = $bdd->query('SELECT * FROM materiel m, categorie c where m.ID_CATEGORIE=c.ID_CATEGORIE ORDER BY ID_MATERIEL DESC LIMIT 30'); 
}
else {
    $categorie=$_POST['select'];
    if(isset($categorie)){
      $req = $bdd->prepare('SELECT * FROM materiel m, categorie c where m.ID_CATEGORIE=c.ID_CATEGORIE AND TYPE_CATEGORIE=?  ORDER BY ID_MATERIEL DESC LIMIT 30');
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
                    
                    <h2 class="text-success text-left"><?= $an['PRIX_REDUIT'];?>F</h2>

                   <h2 class="text-danger text-right" style="text-decoration: line-through;">$<?= $an['PRIX_HOMOLOGUE'];?>F</h2>
                                 
                    <a href="contact.php#content" class="px-4">Commander</a>                               
               </div>
                
            </li>
       <?php
        }?>
        </ul>  
    </div>
</div>
<?php include'footer.php';?>