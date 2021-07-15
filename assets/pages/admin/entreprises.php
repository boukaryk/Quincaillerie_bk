<?php
$title="Quincaillerie";
    include('header.php');
    include('head1.php');
    require_once'bd.php';
    include('../../functions/function.php');
$ville=$bdd->query("SELECT DISTINCT(VILLE_QUINCAILLERIE) FROM quincaillerie");
if(empty($_POST['submit'])){
    $req = $bdd->query('SELECT * FROM quincaillerie ORDER BY ID_QUINCAILLERIE DESC LIMIT 1, 24'); 
}
else {
    $categorie=$_POST['select'];
    
if(empty($search) && isset($categorie)){
      $req = $bdd->prepare('SELECT * FROM quincaillerie WHERE VILLE_QUINCAILLERIE=?  ORDER BY ID_QUINCAILLERIE DESC LIMIT 40');
        $req->execute([$categorie]);
        $count=$req->rowCount();
        if($count==0){
        $erreur='0 resultats trouvé. Veuillez reformuler votre recherche.';
        } 
    }
}  
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-info text-center">Les quincailleries du Burkina</h4>
                    </div>
                </div>
            </div>
                <div class="card-body">
                    <div id="intr">
                        <p id="p">Ici vous pouvez avoir les quincailleries du Burkina en fonction des villes et secteur. Selectionner une ville et cliquer sur "recherche". </p>
                        <form class="py-5 my-3 px-3" method="post" action='#entreprise'>
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="input-group">
                                    <select class="form-control" name="select" id="select_entreprise">
                                        <?php
                                            while ($villes = $ville->fetch()) {
                                                ?>

                                                <option value="<?= $villes['VILLE_QUINCAILLERIE'] ?>"><?= $villes['VILLE_QUINCAILLERIE'] ?></option>
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
                                        <input type="submit" class="form-control btn-dark" name="submit" id="submit_entreprise" value="Rechercher">
                                        <div class="input-group-append">
                                            <span class="input-group-text fas fa-search"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            

                        </form>
                         <div class="py-3" id="quinc">
                             <h1 style="color:red"><?php if(isset($erreur)){echo $erreur; } ?></h1>
                            <ul><?php
                                while($an=$req->fetch()){?>
                                <li>
                                    <div id="img">
                                        <img src="../../images/<?= $an['IMAGE_QUINC'];?>" title="<?php echo $an['NOM_QUINCAILLERIE'];?>" id="affiche">
                                    </div>
                                    <p><?php echo $an['NOM_QUINCAILLERIE'];?></p>
                                    <div class="row">
                                        
                                       <h2 class="text-success text-right ville">Ville: <?= $an['VILLE_QUINCAILLERIE'];?></h2>
                                       
                                        
                                        <h2 class="text-success text-left secteur">Secteur: <?= $an['SECTEUR_QUINCAILLERIE'];?></h2>              
                                       <!--  <a  class="text-center px-4 mx-3" href="<?= $an['NOM_DOMAIN'];?>?id_quinc=<?=$an['ID_QUINCAILLERIE']?>"> Visiter la</a>     -->   
                                        <a  class="text-center px-4 mx-3" href="entreprise.php?id_quinc=<?=$an['ID_QUINCAILLERIE']?>"> Visiter la</a>                         
                                   </div>
                                
                                </li>
                           <?php
                            }?>
                            </ul>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('foot.php');
?>
