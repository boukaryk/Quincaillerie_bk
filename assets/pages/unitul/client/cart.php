<?php 
      session_start();
      include('bd.php');
      $title="Cart";
      include'head.php';
      $select_produit=$bdd->query("SELECT * FROM materiel ORDER BY ID_MATERIEL LIMIT 6");
       // $row_count=$select_produit->row_count();
      if(isset($_POST['add_to_cart']))
      {
        if(isset($_SESSION["shopping_cart"]))
        {
          $_item_array_id=array_column($_SESSION['shopping_cart'],"item_id");
          if(!in_array($_GET['id'], $item_array_id))
          {
             $count=count($_SESSION['shopping_cart']);
             $item_array=array
            (
              'item_id' =>$_GET['id'],
              'item_name' =>$_POST['hidden_name'],
              'item_price' =>$_POST['hidden_price'],
              'item_quantity' =>$_POST['quantity']
            );
            $_SESSION['shopping_cart'][$count]=$item_array;
          }
          else
          {
            echo '<script> alert("Item Already Added")</script';
            echo '<script>window.location="index.php"</script';
          }
        }
        else
        {
            $item_array=array
            (
              'item_id'=>$_GET['id'],
              'item_name'=>$_POST['hidden_name'],
              'item_price'=>$_POST['hidden_price'],
              'item_quantity'=>$_POST['quantity']
            );
            $_SESSION['shopping'][0]=$item_array;

        }
      }
?>
   <br/>
       <div class="container" style="width:700px;">
           <h3 class="text-center">Panier</h3><br/>
           <?php
               // if(($row_count)>0):
               
                   while($row=$select_produit->fetch()){
                
           ?>
              <div class="col-md-4">
                  <form method="post" action="index.php?action=add&id=<?php echo $row['ID_MATERIEL'];?>">
                    <div class="py-5" id="produit1" > 
                     <img id="img" style="width: 200px; height: 100px;" class="img-responsive"  src="../../images/<?php echo $row['LINK'];?>"><br> 
                     <h4 class="text-info"><?php $row['NOM_MATERIEL'];?></h4>  
                     <h4 class="text-danger">$<?php echo $row['PRIX_REDUIT'];?></h4>
                     <input type="text" name="quantity" class="form-control" value="1"/>
                     <input type="hidden" name="hidden_name" class="form-control" value="<?php echo $row['NOM_MATERIEL'];?>"/>
                     <input type="hidden" name="hidden_price" class="form-control" value="<?php echo $row['PRIX_REDUIT'];?>"/>

                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Ajouter au Panier"/>
                    </div>
                  </form>
                  <div style="clear:both;"> </div>
                  <br>
                  <h3> Order Details</h3>
                  <div class="table_responsive">
                      <table class="table table-bordered">
                           <tr>
                               <th width="40%">Item Name</th>
                               <th width="10%">Quantity</th>
                               <th width="20%">Price</th>
                               <th width="15%">Total</th>
                               <th width="5%">Action</th>

                           </tr>
                                <?php
                                     if(!empty($_SESSION['shopping_cart'])){
                                     
                                        $total=0;
                                        foreach($_SESSION['shopping_cart'] as $keys =>$values)
                                        {
                                          ?>
                                          <tr>
                                              <td><?php echo $values['item_name'];?></td>
                                              <td><?php echo $values['item_quantity'];?></td>
                                              <td>$<?php echo $values['item_price'];?></td>
                                              <td><?php echo number_format($values['item_quantity']*$values['item_price'],2);?></td>
                                              <td> <a href="index.php?action=delete&id=<?php echo $values['item_id'];?>"><span class="text-danger">Remove</span></a></td>
                                          </tr>
                                  
                                     <?php 
                                     $total=$total+ ($values['item_quantity']*$values['item_price']); 
                                       } ?>
                                    
                                       <tr>
                                           <td colspan="right">Total</td>
                                           <td align="right">$<?php echo number_format($total,2);?></td>
                                           <td> </td>
                                       </tr>
                                       <?php
                                        };
                                       ?>
                      </table>

                  </div>
              </div>
            <?php }
             // endif;
              ?>
            </div>  
<?php include'footer.php';?>
