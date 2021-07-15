<?php 
 $title ='Manage hardware';
    include('header.php');
    include'../../functions//function.php';
    include('bd.php');

    // Add hardware store responsable

if(isset($_POST['submit_quincaillerie']) AND $_POST['submit_quincaillerie']!=empty($_POST['submit_quincaillerie'])){
$code_quincaillerie=trim(htmlspecialchars($_POST['code_quincaillerie']));
$nom_quincaillerie=trim(htmlspecialchars($_POST['nom_quincaillerie']));
$ville_quincaillerie=trim(htmlspecialchars($_POST['ville_quincaillerie']));
$secteur_quincaillerie=trim(htmlspecialchars($_POST['secteur_quincaillerie']));

$image_quincaillerie=$_FILES['image_quincaillerie']['name'];
$filename=$_FILES['image_quincaillerie']['tmp_name'];
    move_uploaded_file($filename,"./images/$image_quincaillerie");

if(empty($code_quincaillerie) || empty($nom_quincaillerie) || empty($ville_quincaillerie) || empty($secteur_quincaillerie) || empty($image_quincaillerie))
{
    alert('danger', 'Incorrect or empty input !'); 
}else
{
  // select ID_QUINCAILLERIE, NOM_QUINCAILLERIE IMAGE_QUINC from data base
    $select_hardware=$bdd->prepare("SELECT ID_QUINCAILLERIE, NOM_QUINCAILLERIE IMAGE_QUINC FROM quincaillerie WHERE ID_QUINCAILLERIE=? OR NOM_QUINCAILLERIE=? OR IMAGE_QUINC=?");
    $select_hardware->execute([$code_quincaillerie,$nom_quincaillerie,$image_quincaillerie]);
   // Count the number of row of the selected data
    $exist_hardware=$select_hardware->rowcount();
    // Compare if the selected data is supperior to 0
    if( $exist_hardware>0)
    {
       alert('danger','This hardware store already exist, please change your input information !'); 
    }
    else
    {
    $insert_quinc = $bdd->prepare("INSERT INTO quincaillerie SET ID_QUINCAILLERIE=?, ID_QUINCAILLERIER='".$code_quincaillerie."',NOM_QUINCAILLERIE=?,VILLE_QUINCAILLERIE=?,SECTEUR_QUINCAILLERIE=?, IMAGE_QUINC=?, STATUS_QUINC='Enable'");
    $insert_quinc->execute([$code_quincaillerie,$nom_quincaillerie,$ville_quincaillerie,$secteur_quincaillerie,$image_quincaillerie]);
      alert('info', $nom_quincaillerie.' Successful create ');
    }
}

}

?>
<div class="container-fluid py-5" id="fenetre">
    <hr class="bg-dark">            
       <h3 class="text-info text-center"><i>Add hardware store</i></h3>                   
    <hr class="bg-dark"> 
    <div class="row py-5">
              <div class="col-lg-10 mx-auto">
                <div class="card shadow">

                    <div class="card-header">
                        <ul class="nav nav-tabs" >
                            <li class="nav-item">
                                <a href="#" class="nav-link active" id="inscription_tab" data-toggle="tab">Add a hardware store</a>
                            </li>
                        </ul>
                    </div>

                    <div class="modal-body">
                        <div class="col-12 text-center" id="text"></div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                <form action="#" method="post" enctype="multipart/form-data"  id="reset_quinc" >
                                      <div class="row">
                                         <div class="col-lg-4 my-3 col-md-4 col-sm-12">
                                            <label for="code_quincaillerie">Code quincaillerie<span class="text-danger"> * </span></label>
                                              <div class="input-group">
                                                 <input type="text" class="form-control" name="code_quincaillerie" id="code_quincaillerie" placeholder="Entrer code quincaillerie" >
                                                 <div class="input-group-append">
                                                   <span class=" input-group-text fas fa-university"></span>
                                                 </div>
                                              </div>
                                             </div>

                                             <div class="col-lg-4 col-md-4 col-sm-12 py-3">
                                                    <label for="nom_quincaillerie">Nom quincaillerie<span class="text-danger"> * </span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="nom_quincaillerie" id="nom_quincaillerie" placeholder="Entrer nom quincaillerie" >

                                                        <div class="input-group-append">
                                                            <span class=" input-group-text fas fa-university"></span>
                                                        </div>
                                                    </div>
                                              </div>

                                            <div class="col-lg-4 col-md-4 col-sm-12 py-3">
                                                 <label for="ville_quincaillerie">Ville <span class="text-danger"> * </span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="ville_quincaillerie" id="ville_quincaillerie" placeholder="Entrer ville">        
                                                  <div class="input-group-append">
                                                      <span class="input-group-text fas fa-user-tie"></span>
                                                   </div>
                                                </div>
                                            </div>
                                                        

                                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                                <label for="secteur_quincaillerie">Secteur <span class="text-danger"> * </span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="secteur_quincaillerie" id="secteur_quincaillerie" placeholder="Entrer secteur">        
                                                    <div class="input-group-append">
                                                        <span class="input-group-text fas fa-user-tie"></span>
                                                    </div>
                                                </div>
                                             </div>

                                           <!-- Image-->
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 py-3">
                                            <label for="image_quincaillerie">Image<span class="text-danger"> * </span></label>
                                            <div class="input-group">
                                                <input type="file" name="image_quincaillerie" id="image_quincaillerie"
                                                       class="form-control" 
                                                       >
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fas fa-upload bg-light"></span>
                                                </div>
                                            </div>

                                        </div>

                                             <div class="col-lg-7 col-md-7 col-sm-12 text-center py-3">
                                                <a  href="compte_quincailleries" class="btn btn-dark w-50" type="button">Update or delete hardward store </a>
                                             </div>

                                             <div class="col-lg-5 col-md-5 col-sm-12 text-center py-3">
                                                <input class="btn btn-dark w-50" type="submit" name="submit_quincaillerie" id="submit_quincaillerie" value="Add a hardware store"> 
                                             </div>


                                       </div>
                                    </form>
                               </div>
                            </div>
                        </div>

                 <!-- Fin creer quincaillerie -->

                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
<p class="text-center py-5">
    Design by Boukary KABORE Etudiant de premiere promotion<i class="far fa-copyright"></i> 
    <script>
        document.write(new Date().getFullYear());
    </script>     
</p>

<?php
include('foot.php');
?>