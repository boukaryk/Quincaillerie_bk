<?php
$title="Acheter";
include('header.php');
require_once 'bd.php';
$title = 'Acheter';
$mater=$bdd->query('SELECT * FROM materiel');


$categ=$bdd->query('SELECT * FROM categorie');
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow wow">
                <div class="card-header">
                    <div class="row">

                        <div class="col-sm-12 col-md-6 col-lg-7 mt-3">
                            <form  action="" method="post">
                                <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-input">
                                     <select onchange="get_materiel_name(this.value)" name="select" id="select" class="form-control" >
                                        <option selected>Select Categorie</option>
                                         <?php while($categr=$categ->fetch()){?>
                                         <option value="<?php echo $categr['TYPE_CATEGORIE'];?>"><?php echo $categr['TYPE_CATEGORIE'];?></option>
                                                <?php } ;?>
                                     </select>
                                    </div>
                                </div>
                                    <div class="col-lg-4">
                                        <div id="materi" class="form-input">
                                            <select disabled name="materiel" id="materiel" class="form-control" >
                                                <option selected>Select Materiel</option>
                                            <?php while($maters=$mater->fetch()){?>
                                                <option value="<?php echo $maters['ID_MATERIEL'];?>"><?php echo $maters['NOM_MATERIEL'];?></option>
                                                <?php } ;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 text-center">
                                            <input class="btn btn-primary w-75" type="submit"
                                                    name="enregistre" id="submit" value="Enregisrer">
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>              

                <div class="card-body">
                                
                    <table class="table table-bordered" id="table">
                       <thead>
                            <tr class="text-center"> 
                                <th>Designation</th>
                                <th>Quantite</th>
                                <th>Prix unitaire</th>
                                <th>Prix x*y</th>
                              </tr>
                       </thead> 
                  <tbody>
                        <form> 
                              <tr class="text-center"> 
                                  <th>Fer de 8</th>
                                  <th>
                                      <input type="number" name="quantite">   
                                  </th>
                                  <th>$8</th>
                                  <th>$18</th>
                              </tr>
                              <tr class="text-center"> 
                                  <th>Fer de 8</th>
                                  <th>
                                      <input type="number" name="quantite" >   
                                  </th>
                                  <th>$9</th>
                                  <th>$19</th>
                              </tr>
                              <p>  Prix Total</p>
                         </form> 
                   </tbody>
                        <!-- <tfoot id="foot">
                            gggggggg
                        </tfoot> -->
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('foot.php');?>

<script type="">
    function get_materiel_name(materiel){
        // alert(materiel);
        $.post(
            "ajax.php",
            {
             select_categorie:"cat",
             nom_materiel:materiel,
            },
            function (donne){
             $('#materi').html(donne);
            }
            )
    }
</script>