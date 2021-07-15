<?php
function component($nom_produit, $prix_produit, $img_produit)
{
$element='
<div class="col-md-3 col-sm-6 my-3 my-md-0">
                       <form action="Shopping.php" method="post">
                            <div class="card shadow">
                                <div>
                                   <img src="$img_produit" alt="" class="img-fluid card-img-top">
                                </div>
                                <div class="card body">
                                     <h5 class="card-title">$nom_produit</h5>
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
                                         <small><s class="text-secondary">$522</s></small>
                                        <span class="price"> $$prix_produit </span>
                                     </h5>
                                     <button type="submit" name="add" class="btn btn-warning my-3 mx-3">Add to Cart<i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                      </form>
                      
                  </div>


';
echo $element;
}












?>