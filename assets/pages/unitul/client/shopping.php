<?php
session_start();
    require_once('h.php');
    include('bd.php');
   $title="Shopping Cart";
   include('header.php');
   if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['id_produit']==$_GET['id']){
                unset($_SESSION['cart']['$key']);
                echo "<script> alert('Produit supprime avec success') </script>";
                 echo "<script> window.location='carts.php' </script>";
            }
        }

    }

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
                          <?php 
                          $total=0;
                               if(isset($_SESSION['cart']))
                               {
                               $id_produit=array_column($_SESSION['cart'],"id_produit");
                               $info_db=$bdd->query("SELECT * FROM materiel");
                               while($infos_db=$info_db->fetch()) {
                                foreach ($id_produit as $id) {
                                    if($infos_db['ID_MATERIEL']==$id){
                          ?>
                          <form action="carts.php?action=remove&id=$produitid" method="POST" class="cart-items">
                              <div class="border rounded">
                                  <div class="row bg-white">
                                      <div class="col-md-3 pl-0">
                                          <img src="../../images/boutique.jpg" class="img-fluid">
                                      </div>
                                      <div class="col-md-6">
                                          <h5 class="pt-2">Produit1</h5>
                                          <small class="text-secondary"> Seller:Frais quotidien</small>
                                          <h5 class="pt-2">$968</h5>
                                          <button type="submit" class="btn btn-warning">Enregistrer pour la suite</button>
                                          <button type="submit" class="btn btn-danger mx-2" value="$infos_db['id']"  name="remove">Supprimer</button>
                                      </div>
                                      <div class="col-md-3 py-5">
                                          <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                                          <input type="text" value="1" class="form-control w-25 d-inline"   name="">
                                          <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                          <?php
                          $total=$total+ (int)$infos_db['PRIX_REDUIT'];
                              }
                             }
                            }
                           }
                      else{
                            echo"<h5>Cart Empty</h5>";
                          }
                          ?>
                      </div> 
                  </div> 

                  <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                     <div class="pt-4">
                    <h6> Details prix</h6>
                    <hr class="bg-secondary">
                    <div class="row price_details">
                        <div class="col-md-6">
                            <?php
                            if(isset($_SESSION['cart'])){
                                $count=count($_SESSION['cart']);
                                echo "<h6>Prix($count items)</h6>";
                            }else{
                                echo "<h6>Prix(0 items)</h6>";
                            }
                            ?>
                            <h6 class=""> Charges de livraison</h6>
                            <hr class="bg-secondary">
                            <h6>Somme a payer </h6>
                        </div>
                        <div class="col-md-6">
                            <h6> <?php echo $total; ?> FCFA </h6>
                            <h6 class="text-success">Gratuit</h6>
                            <hr class="bg-secondary">
                            <h6> <?php echo $total; ?> FCFA </h6>
                            
                        </div>
                    </div>
                 </div>    
               </div>

           </div>
       </div>
  
     </body>
  </html>
 <?php  include('foot.php');?>