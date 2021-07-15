<?php
$title="suprimer, modifier";
include('header.php');
require_once'bd.php';
$affiche=$bdd->query("SELECT * from materiel m , categorie c where c.ID_CATEGORIE=m.ID_CATEGORIE");
if(isset($_POST['delete_materiel'])){
    $ID_MATERIEL=$_POST['id_materiel'];
    $delete=$bdd->prepare("DELETE FROM materiel where ID_MATERIEL=?");
    $delete->execute([$ID_MATERIEL]);
     header("Location:modifier_suprimer_produit.php");
}

?>

    <div class="container-fluid" id="fenetre">
        <div class="row">
            <div class="col-lg-12 py-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row py-3">
                            <div class="col-6">
                                <h4 class="text-bluesky">Tous les produits</h4>
                            </div>
                            <div class="col-6 text-right">
                                <div class="col-4">
                                        <a class="btn btn-dark" role="button" href="ajouter_produit.php" title="Cliquer pour ajouter de produit" id="ajout">Ajouter un produit
                                        </a>
                                </div>
                           </div>
                       </div>
                 <body>
                      <div class="card-body py-2">
                     <table class="table table-bordered table-hover table-responsive-lg table-responsive-md table-responsive-sm" id="table">
                        
                        <thead>
                            <tr>
                                 <th class="text-truncate">Action</th>
                                 <th class="text-truncate">Product Name</th>
                                 <th class="text-truncate">Category</th>
                                <th class="text-truncate">Date</th>
                                <th class="text-truncate">Reduce price</th>
                                <th class="text-truncate">Market price</th>
                                 <th class="text-truncate">Product Image</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $update = 'update';
                                $delete = 'delete';
                                
                            ?>
                           <?php  while($affiches=$affiche->fetch()):?>
                                <tr>
                                    <td class="text-truncate">
                                        <div class="btn-group" role="group" aria-label="Button group">
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#update"><i class="fas fa-edit text-warning"></i></button> 
                                            <button class="btn text-truncate" data-toggle="modal" data-target="#delete" onclick="deletemateriel(<?= htmlspecialchars(json_encode($affiches['ID_MATERIEL']))?>,<?= htmlspecialchars(json_encode($affiches['NOM_MATERIEL']))?>)">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="text-truncate"><?= $affiches['NOM_MATERIEL'] ?></td>
                                     <td class="text-truncate"><?php echo $affiches['TYPE_CATEGORIE'];?></td>
                                     <td class="text-truncate"><?php echo $affiches['DATE_ENREGISTREMENT'];?></td>
                                      <td class="text-truncate">$<?php echo $affiches['PRIX_REDUIT'];?></td>
                                      <td class="text-truncate">$<?php echo $affiches['PRIX_HOMOLOGUE'];?></td>
                                       <td class="text-truncate"><?php echo $affiches['LINK'];?></td> 
                                     
                                </tr>
                                <?php endwhile;?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th class="text-truncate">Action</th>
                                 <th class="text-truncate">Product Name</th>
                                 <th class="text-truncate">Category</th>
                                <th class="text-truncate">Date</th>
                                <th class="text-truncate">Reduce price</th>
                                <th class="text-truncate">Market price</th>
                                 <th class="text-truncate">Product Image</th>
                            </tr>
                        </tfoot>
                    </table> 

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
                            <!-- <input type="" name="" id="ID_MARIEL"
                                style="display: none"> -->
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Suprimer produit</h5>
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container-fluid" id="GET_MATER">
                                            <!-- You really want to delete this materiel -->
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="text" value="" id="ID_MATER" name="id_materiel" hidden>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Reset </button>
                                        <button type="submit" class="btn btn-danger" name="delete_materiel">Delete </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                                   
                    </div>
                </body>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('foot.php');
?>
<script type="">
       var inputs_remplis = [];
       var btn = document.getElementById("submit_department");

       function update_materiel(){
           $.post(
           '../../../ajax.php', {

               Up_Dep:$("#Up_Dep").val(),
               idDepart:$("#idDepart").val(),
               up_department_chief:$("#up_department_chief").val(),
               up_description:$("#up_description").val(),
               up_department_name:$("#up_department_name").val(),
           }, function (donnees){
               alert(donnees);
               if(donnees=="ok" || donnees=="okk"){
                   $('#texte').css('color','green');
                   $('#texte').css('padding','6px');
                   $('#texte').css('background-color','#e5ffe0');
                   $('#texte').html('The Department has been succesfuly Updated');
               }else if(donnees=="exit"){
                   $('#texte').css('color','red');
                   $('#texte').css('padding','6px');
                   $('#texte').html('This Department is already added.');
                   $('#texte').css('background-color','#f8bccb');
               }
               else if(donnees=="empty"){
                   $('#texte').css('color','red');
                   $('#texte').css('padding','6px');
                   $('#texte').html('Please fill up all the fields');
                   $('#texte').css('background-color','#f8bccb');
                   
               }
               
           });
           
       }



       function EnableDecimal(val1){
           if(val1.id=="department_name" || val1.id=="department_chief" || val1.id=="description" || val1.id=="up_description" || val1.id=="up_department_name" || val1.id=="up_department_chief"){
               if (val1.value =="")
               {
                   val1.style.color = 'red';


                   val1.style.border = '1px solid red';
                   val1.style.backgroundColor = '#ffdbd8';
                   Pop(val1);
               }
               else
               {
                   val1.style.color = 'black';
                   val1.style.border = '1px solid #ced3db';
                   val1.style.backgroundColor = 'white';
               Push(val1);
               }
           }
       }

       function Push(input){
         //console.log(input);
            //console.log(inputs_remplis.indexOf(input.id));
            if (inputs_remplis.indexOf(input.id) <= -1)
            {
                inputs_remplis.push(input.id);
            }
            Enable();
       }

       function Pop(input){
           //console.log(inputs_remplis.indexOf(input.id));
           if (inputs_remplis.indexOf(input.id) >= 0)
              {
               inputs_remplis.splice(inputs_remplis.indexOf(input.id), 1);
              }
              Enable();
       }

       function Enable(){
           if (inputs_remplis.length == 7)
           {
               btn.disabled = false;
           }
           else
           {
               btn.disabled = true;
           }
       }   



       function loads(){
            window.location.replace("department.php");
       }


    function deletemateriel(id_materiel,nommateril){
       document.getElementById("ID_MATER").value  = id_materiel;
        $("#GET_MATER").html("do You really want to delete <b>"+nommateril+"</b>")
    }

    
    // $(function(){
    //     $('#ajout').tooltip();
    // })

</script>
