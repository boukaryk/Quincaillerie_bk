<?php
include('header.php');
require_once'bd.php';
$title = 'Add produit';
?>
    <div class="container-fluid" id="fenetre">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="text-bluesky">Tous les produits</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-dark" role="button" href="ajouter_produit.php">Ajouter un produit</a>
                                <a class="btn btn-dark" role="button" href="message.php">Lire les messages</a>
                            </div>
                        </div>
                    </div>
                 <body>
                      <div class="card-body py-2">
                                <table class="table table-bordered table-hover table-responsive table-responsive-md table-responsive-lg" id="table">
                                    <thead> 
                                        <tr>
                                            <th class="text-truncate">Action</th>
                                             <th class="text-truncate">Nom du produit</th>
                                            <th class="text-truncate">Categorie</th>
                                            <th class="text-truncate">Date</th>
                                            <th class="text-truncate">Pix Reduit</th>
                                            <th class="text-truncate">Prix Homlogue</th>
                                            <th class="text-truncate">Image du produit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            $update = 'update';
                                            $delete = 'delete';
                                
                                        ?>

                                                <tr>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            <button class="btn text-truncate" title="student" data-toggle="modal" data-target="<?= '#' . $update ?>">
                                                                <i class="fas fa-edit text-warning"></i>
                                                            </button>
                                                            <button title="studentid" class="btn text-truncate" data-toggle="modal" data-target="<?= '#' . $delete ?>">
                                                                <i class="fas fa-trash text-danger"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <th class="text-truncate">Nom du produit</th>
                                                    <th class="text-truncate">Categorie</th>
                                                    <th class="text-truncate">Date</th>
                                                    <th class="text-truncate">Pix Reduit</th>
                                                    <th class="text-truncate">Prix Homlogue</th>
                                                    <th class="text-truncate">Image du produit</th>
                                                </tr>

                                                <!--Update Modal -->
                                                <div class="modal fade" id="<?= $update ?>" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h5 class="modal-title text-white">Modifier</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <form action="" method="post">
                                                                        <!-- hidden input to get the id of the user -->
                                                                        <input type="" name=""
                                                                            id="studentid"
                                                                            style="" hidden>
                                                                        <div class="row">
                                                                           
                                                                             <div class="col-lg-12 text-left">
                                                                                <h5 class="text-bluesky mt-3">Info du produit</h5>
                                                                                <hr class="bg-gradient-primary">
                                                                              </div>

                                                                            <!-- Nom du produit -->
                                                                            <div class="col-lg-4 p-4">
                                                                                <label for="nom_prod" class="pb-3">Nom du produit<span
                                                                                            class="text-danger"> * </span></label>
                                                                                <div class=" input-group">
                                                                                    <input type="text" name="nom_prod" id="nom_prod"
                                                                                           class="form-control" placeholder="Nom du produit"
                                                                                           >
                                                                                    <div class="input-group-append">
                                                                                        <span class=" input-group-text fab fa-product-hunt  bg-light"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Categorie -->
                                                                            <div class="col-lg-4 p-4">
                                                                                <label for="cat_prod" class="pb-3">Categorie<span
                                                                                            class="text-danger"> * </span></label>
                                                                                <div class="input-group">
                                                                                    <input type="text" name="cat_prod" id="cat_prod"
                                                                                           class="form-control" placeholder="Categorie"
                                                                                            >
                                                                                    <div class="input-group-append">
                                                                                        <span class=" input-group-text fas fa-portrait  bg-light"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Date-->
                                                                            <div class="col-lg-4 p-4">
                                                                                <label for="dat" class="pb-3">Date<span
                                                                                            class="text-danger"> * </span></label>
                                                                                <div class="form-group">
                                                                                    <input type="date"
                                                                                           name="dat" id="dat"
                                                                                           class="form-control" placeholder="2020/12/31" 
                                                                                           >
                                                                                </div>
                                                                            </div>

                                                                            <!-- Prix et photo -->
                                                                            <div class="col-lg-12 text-left mt-5">
                                                                                <h5 class="text-bluesky">Prix et photo du produit</h5>
                                                                                <hr class="bg-gradient-primary">
                                                                            </div>

                                                                            <!-- Prix reduit -->
                                                                            <div class="col-lg-4 p-4">
                                                                                <label for="prix_reduit_prod" class="pb-3">Prix reduit<span class="text-danger"> * </span></label>
                                                                                <div class="input-group">
                                                                                    <input type="number" name="prix_reduit_prod" id="prix_reduit_prod"
                                                                                           class="form-control" placeholder="Prix reduit"
                                                                                           >
                                                                                    <div class="input-group-append">
                                                                                        <span class=" input-group-text fas fa-dollar-sign  bg-light"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <!-- Prix homologe -->
                                                                            <div class="col-lg-4 p-4">
                                                                                <label for="prix_homologue_prod" class="pb-3">Prix homologe<span class="text-danger"> * </span></label>
                                                                                <div class="input-group">
                                                                                    <input type="number" name="prix_homologue_prod"
                                                                                           id="prix_homologue_prod" class="form-control" placeholder="Prix homologe"
                                                                                           >
                                                                                    <div class="input-group-append">
                                                                                        <span class=" input-group-text fas fa-dollar-sign  bg-light"></span>
                                                                                    </div>
                                                                                </div>  
                                                                            </div>

                                                                            <!-- Image-->
                                                                            <div class="col-lg-4 p-4">
                                                                                <label for="img" class="pb-3">Image<span class="text-danger"> * </span></label>
                                                                                <div class="input-group">
                                                                                    <input type="file" name="img" id="img"
                                                                                           class="form-control">
                                                                                    <div class="input-group-append">
                                                                                        <span class=" input-group-text fas fa-mobile bg-light"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-lg-12 text-center my-5">
                                                                                <button class="btn btn-danger w-25 my-3" data-dismiss="modal" aria-label="Close">Reset </button>
                                                                                <button class="btn btn-success w-25 my-3" name="update_student_infos">update </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Modal-->
                                                <div class="modal fade" id="<?= $delete ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <form action="" method="post">
                                                        <input type="" name="" id="idstudent"
                                                            style="display: none">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Student</h5>
                                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        You really want to delete the student
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Reset </button>
                                                                    <button type="submit" class="btn btn-danger" name="delete_student">Delete </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                    </tbody>

                                    <tfoot> 
                                        <tr>
                                            <th class="text-truncate">Action</th>
                                             <th class="text-truncate">Nom du produit</th>
                                            <th class="text-truncate">Categorie</th>
                                            <th class="text-truncate">Date</th>
                                            <th class="text-truncate">Pix Reduit</th>
                                            <th class="text-truncate">Prix Homlogue</th>
                                            <th class="text-truncate">Image du produit</th>
                                        </tr>
                                    </tfoot>
                                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include('foot.php');
?>