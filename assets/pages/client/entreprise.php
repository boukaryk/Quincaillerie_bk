<?php 
$title="Accueil";
include 'head.php';

    require_once 'bd.php';
    $req = $bdd->query('SELECT * FROM materiel ORDER BY ID_MATERIEL DESC LIMIT 6' );
   $entreprise = $bdd->query("SELECT * FROM quincaillerie WHERE ID_QUINCAILLERIE='".$_GET['id_quinc']."' LIMIT 1 ");
   $entreprise=$entreprise->fetch();

    
?>

</head>
    
    <body>
        <div class="nav-bar">
            <div class="text-center text-info bg-light" id="logo">
                <li><?php echo $entreprise['NOM_QUINCAILLERIE'];?></li>
            </div>
            <nav id="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    
                    <li><a href="materiel.php">Material</a></li>
                    <li><a href="contact.php#content">About us</a></li>
                    <li>
                        <div class="input-group-append"> 
                             <!-- <span class=" input-group-text fas fa-sign-out-alt"> -->
                                 <!-- <i class="fas fa-user-alt"></i> -->
                                <a class=" input-group-text fas fa-sign-out-alt" href="../../../index.php">Log out</a>
                             <!-- </span> -->
                       </div> 
                    </li>
                    
                    <li><a href="acheter.php" hidden>Paiement</a></li>

                    
                   <!--  <li><a href="contact.php#content">Forum et Blog</a></li> -->
                </ul>
            </nav>
                 <!------------------*******************************------------>           
                 <!------------------*******************************------------>           
                 <!------------------********Slider section*********------------>           
                 <!------------------*******************************------------>           
                 <!------------------*******************************------------>           
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="6"></li> -->
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"  >
                    <img class="d-block img-fluid" src="../../images/CIMENT.jpg"  > 
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/face2.jpg"  >
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/tole (12).jpg"  >                 
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/face4.jpg"  >                  
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/Fer de 10 1.jpg"  >                  
                    </div>
                    <!-- <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/face1.jpg"  >                 
                    </div> -->
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/fer-soude (11).jpg"  >                  
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>







  <h3 class="py-4 text-center" id="p">Welcome to: <b><?= $entreprise['NOM_QUINCAILLERIE'];?></b></h3>
  <div id="desc">
        <p><?php echo $entreprise['NOM_QUINCAILLERIE'];?> vend des materiels de contruction de tous genres et de toutes les qualités afin de vous accompagner dans vos constructions. Vous pouvez avoir tous les types de materiels dont vous avez besoin dans la quincaillerie. Il est situé à <?php echo $entreprise['VILLE_QUINCAILLERIE'];?> au secteur N <?php echo $entreprise['SECTEUR_QUINCAILLERIE'];?>. Veuillez cliquer sur le menu "Materiels" pour faire vos commande. </p>
        <img src="../../images/<?= $entreprise['IMAGE_QUINC'];?>">
    </div>
    <h1>Overview of product</h1>
    <div id="produit">
        <ul>
            <?php while($an=$req->fetch()) {?>
            <li>
                <a href="materiel.php#form"><img src="../../images/<?php echo $an['LINK'];?>">
                   <p class="text-center nm"><?php echo $an['NOM_MATERIEL'];?></p>
                   <div class="row">
                      <div class="text-right">
                         <h2 class="text-danger pr"><?= $an['PRIX_HOMOLOGUE'];?> fcfa</h2>
                      </div>
                      <div class="text-left">
                         <h2 class="text-success pri"><?= $an['PRIX_REDUIT'];?> fcfa</h2>              
                      </div>                               
                    </div>
                 </a>
            </li>   
            <?php } ?>    
        </ul>
    </div>
        <a href="materiel.php#form" id="lien">See more product</a>
    
<?php include'footer.php';?>