<?php 
      session_start();

      if(isset($_POST['add'])){

        if(isset($_SESSION['cart'])){
          $item_array_id= array_column($_SESSION['cart'], "id_produit");
          // print_r($item_array_id); 

          if(in_array($_POST['id_produit'], $item_array_id)){
           echo "<script> alert('Produit deja ajoute dans la carte')</script>";
           echo "<script>window.location='materiel.php'</script>";
          }else{
                $count= count($_SESSION['cart']);
                $item_array=array
                 (
                   'id_produit' =>$_POST['id_produit']
                 );
                 $_SESSION['cart'][$count]=$item_array;
                 
               }
        }else{
          $item_array=array
            (
              'id_produit' =>$_POST['id_produit']
            );
            $_SESSION['cart'][0]= $item_array;
        }

      }
      require_once('h.php');
      require_once('component.php');
      include('bd.php');
      $title="Shopping";
      include'head.php';
      $select_produit=$bdd->query("SELECT * FROM materiel ORDER BY ID_MATERIEL LIMIT 2,8");
      // $row_count=$select_produit->row_count();
  ?>
  <html>
    <head>
       <title>Shopping Cart</title>
       <link rel="icon" href="../../images/boutique.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">



        <link rel="stylesheet" href="../../css/cart.css" type="text/css">
        <!-- <link rel="stylesheet" href="../../css/contact.css" type="text/css">
        <link rel="stylesheet" href="../../css/head.css" type="text/css"> -->
     </head>
     <body>
           <div class="container">
               <div class="row text-center py-5">
                     <?php while($select_produits=$select_produit->fetch()){?> 
                    <div class="col-md-3 col-sm-6 my-3 my-md-0">
                       <form action="#" method="post">
                            <div class="card shadow">
                                <div>
                                   <img src="../../images/<?php echo $select_produits['LINK'] ?>" alt="" class="img-fluid card-img-top">
                                </div>
                                <div class="card body">
                                     <h5 class="card-title"> <?php echo $select_produits['NOM_MATERIEL'] ?></h5>
                                     <h6>
                                      <i class="fas fa-star"></i>
                                      <i class="fas fa-star"></i>
                                      <i class="fas fa-star"></i>
                                      <i class="fas fa-star"></i>
                                      <i class="fas fa-star"></i>
                                     </h6>
                                     <p class="card-text">
                                        some quick example text to built on the card
                                     </p>
                                     <h5>
                                         <small><s class="text-secondary">$<?php echo $select_produits['PRIX_HOMOLOGUE'] ?></s></small>
                                        <span class="price"> $<?php echo $select_produits['PRIX_REDUIT'] ?></span>
                                     </h5>
                                      <input type="hidden" name="id_produit" class="form-control" value="<?php echo $select_produits['ID_MATERIEL'];?>"/>
                                     <button type="submit" name="add" class="btn btn-warning my-3 mx-3">Add to Cart<i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                      </form>    
                  </div>
                  <?php }?>
               </div> 
           </div>



























       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


     </body>
  </html>