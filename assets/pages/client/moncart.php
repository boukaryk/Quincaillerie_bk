<?php
require_once('h.php');
    include('bd.php');
 include('header.php');
 if(isset($_GET['ids']))
 {
  extract($_GET);
  $part1 = explode(',,', $ids)[0];
  $part2= explode(',,', $ids);

  $data =[];
  $data[0] =intval(explode(',', $part1)[1]);

  for($j = 1; $j<count($part2);$j++){
    array_push($data, $part2[$j]);
  }

$string ="SELECT * FROM materiel WHERE";
  for ( $i = 0; $i<=count($data)-1;$i++) {
    if($i>0){
      $string.=" OR ID_MATERIEL=".$data[$i];
    }else{
      $string.=" ID_MATERIEL=".$data[$i];
    }
    
  }

  


  $contenu=$bdd->query($string);
 }
?>
<html>
    <head>
        <link rel="stylesheet" href="../../css/cart.css" type="text/css">    
     </head>
        <body class="bg-light">

           <div class="container-fluid">
               <div class="row px-5">
                  <div class="col-md-7">
                      <div class="shopping-cart">
                          <h6 class="py-2">Mon panier</h6>
                          <hr class="bg-secondary"/>
                          
                               
                         
                          <form action="#" method="POST" class="cart-items">
                            <?php 
                            $item=0;
                            while ( $contenus=$contenu->fetch()){?> 
                              <div class="border rounded">
                                  <div class="row bg-white">
                                      <div class="col-md-3 pl-0">
                                          <img id="img_mat" src="../../images/<?php echo $contenus['LINK'];?>" class="img-fluid">
                                      </div>
                                      <div class="col-md-6">
                                          <h6 class="pt-1">Designation: <?php echo $contenus['NOM_MATERIEL'];?></h6>
                                          <h6 class="pt-1">Prix Unitaire: <?php echo $contenus['PRIX_REDUIT'];?> CFA</h6>
                                          <h6 class="pt-1">Sous Totatl:
                                            <?php
                                            // if(empty($_POST['Enregistrer'])){
                                            //   $qt=$_POST['qte'];
                                            //   echo intval($_POST['qte'])* intval($contenus['PRIX_REDUIT']);
                                            // }else{
                                            //   echo "Hello";
                                            // }
                                            $item++;
                                              ;?>
                                           </h6>
                                          <button type="submit" class="btn btn-warning" name="Enregistrer">Enregistrer</button>
                                          <button type="submit" class="btn btn-danger mx-2" value=""  name="remove">Supprimer</button>
                                      </div>
                                      <div class="col-md-3 py-5">
                                          
                                          <input type="number" class="form-control w-26"  name="qte">

                                      </div>
                                  </div>
                              </div>
                               <?php };?>
                          </form>
                          
                         
                      </div> 
                  </div> 

                  <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                     <div class="pt-4">
                    <h6> Details prix</h6>
                    <hr class="bg-secondary">
                    <div class="row price_details">
                        <div class="col-md-6">
                            
                                <h6>Prix(<?php echo $item;?> items)</h6>
                           
                            <h6 class=""> Charges de livraison</h6>
                            <hr class="bg-secondary">
                            <h6>Somme a payer </h6>
                        </div>
                        <div class="col-md-6">
                            <h6>78787 FCFA </h6>
                            <h6 class="text-success">Gratuit</h6>
                            <hr class="bg-secondary">
                            <h6> 78787 FCFA </h6>
                            
                        </div>
                    </div>
                 </div>    
               </div>

           </div>
       </div>
  
     </body>
  </html>
 <?php  include('foot.php');?>

 <!-- <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
<button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button> -->