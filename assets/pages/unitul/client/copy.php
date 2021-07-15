<!-- <marquee>Boukary kabore</marquee>
<strike>BJHIJHBJKNHBJNH</strike>
 <div class="card"> -->


 <?php 
 // include'head.php';

    require_once'bd.php';
    
    if(isset($_POST['envoi'])){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $motif=$_POST['motif'];
        $comment=$_POST['comment'];
        
        if(empty($nom)){
            $erreu="Veuillez donner votre nom";
        }
        else if(empty($prenom)){
            $erreu="Veuillez donner votre prenom";
        }
        else if(empty($motif)){
            $erreu="Veuillez donner votre motif";
        }
        else if(empty($comment)){
            $erreu="Veuillez donner un commentaire";
        }
        else{
            $search=$bdd->prepare("INSERT INTO contact SET name=?, prenom=?, motif=?, commentaire=?");
            $search->execute([$nom,$prenom,$motif,$comment]);
            $erreur="Merci ".$nom.", message envoyé avec succès.";
        }
    }
?>


 <!DOCTYPE html>

<html>
    <head>
        <title>copy</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>

        <link rel="stylesheet" href="../../css/acheter.css" type="text/css">
        <link rel="stylesheet" href="../../css/contact.css" type="text/css">
        <link rel="stylesheet" href="../../css/head.css" type="text/css">
        <link rel="stylesheet" href="../../css/responsive.css" type="text/css">
        <link rel="stylesheet" href="../../css/footer.css" type="text/css">
        <link rel="stylesheet" href="../../css/materiel.css">
        <link rel="stylesheet" href="../../css/style.css">
   
        <link rel="stylesheet" href="../../css/stylebody.css" type="text/css">
        <!-- ---------- Bootstrap css --------- -->
        <link rel="stylesheet" href="../../library/bootstrap4/css/bootstrap.css">
        <!-- ---------- Font Awesome css --------- -->
        <link rel="stylesheet" href="../../library/fontawesome/css/all.min.css">
        <!-- ---------- Animate css --------- -->
        <link rel="stylesheet" href="../../library/wow/animate.css">
        <!-- ---------- DataTable css --------- -->
        <link rel="stylesheet" href="../../library/DataTable/css/bootstrap-table.css">
        <link rel="stylesheet" href="../../library/DataTables/css/dataTables.bootstrap4.css">
        <!--Scrol bar -->
        <link rel="stylesheet" href="../../css/scrollbar/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="../../library/toast/toastr.min.css">
    </head>




<div class="container">
	<h3 style="color:red; margin-left:40%; position:absolute"><?php if(isset($erreu)){echo $erreu;}?></h3>
    <h1 style="color:green; margin-left:40%; position:absolute"><?php if(isset($erreur)){echo $erreur;}?></h1>
        <div class="row">
           
				        <div class="col-lg-7">	
				             <form method="post" action="#content">
                               <h1><u>Laissez nous un message</u></h1>
				                <div class="input-group py-3 "> 
				                    <input class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="nom"  id="nom" placeholder="Votre nom">
				                    <div class="input-group-append">
				                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
				                    </div>
				                </div>

				                <div class="input-group py-3">
				                    <input class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="prenom" id="prenom" placeholder="Votre Prenom" >
				                    <div class="input-group-append">
				                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
				                    </div>
				                </div>

				                <div class="input-group py-3 ">
				                    <input class="form-control  border border-primary" type="text" size="70" Maxlenght="50" name="motif" id="motif" placeholder="Votre motif" >
				                    <div class="input-group-append">
				                        <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"><span class="text-danger"> * </span></span>
				                    </div>
				                </div>

				               <div class="input-group py-3 col-lg-12">
	                             <span class="text-danger"> * </span>
	                             <textarea rows="10" cols="20" class="form-control"  placeholder="Votre Commentaire" size="70" Maxlenght="50"  name="comment"></textarea>
                         		</div>

                         		<div class="col-lg-12 form-group py-5  text-center">
                             		<input class="btn btn-primary col-lg-12" type="submit" name="envoi" value="Envoyer">
                        		</div>
				            </form>
						</div>
						                      
				</div>
                <hr class="bg-danger">
			


		<!--  <div class="col-lg-6 mx-auto my-5"> -->
               <!--  <div class="card">
				  <div class="card-header py-3 bg-gradient-primary">
				      <h3 class="text-uppercase text-center text-black">Contact</h3>
				       <p class="text-center text-black small">contact info</p>
				      </div>
				        <div class="card-body p-lg-6"> -->
		  	
  		<!-- </div>
	</div>
 -->

 								<form action="" method="post">
 									<div class="text-center">
                                    <div class="row">
                                        <div class="col-lg-6"> 
                                            <div class="input-group">
                                                <input type="text" name="inscription_nom" id="inscription_nom"
                                                       class="form-control" placeholder="Votre nom" required>
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fas fa-portrait  bg-light">
                                                    	<span class="text-danger"> * </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Last Name -->
                                        <div class="col-lg-6">    
                                            <div class=" input-group">
                                                <input type="text" name="inscription_prenom" id="inscription_prenom"
                                                       class="form-control" placeholder="Votre Prenom" required>
                                                <div class="input-group-append">
                                                    <span class=" input-group-text fas fa-portrait  bg-light">
                                                    	<span class="text-danger"> * </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                    	<div class="col-lg-12">
                                    		<div class="input-group py-3 col-lg-12">
				                                 <span class="text-danger"> * </span>
				                                 <textarea rows="10" cols="20" class="form-control"  placeholder="Votre Commentaire" size="70" Maxlenght="50"  name="comment"></textarea>
                                			</div>
                                    	</div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-4">
                                    	</div>
                                    	<div class="col-lg-4">
                                    		<div class="col-lg-12 form-group py-5  text-center">
			                                    <input class="btn btn-primary col-lg-12" type="submit" name="envoi" value="Envoyer">
			                                </div>
                                    	</div>
                                    	<div class="col-lg-4">
                                    	</div>
                                    </div>
                                    </div>
                                 </form>




</div>



 		 <script src="../../library/jquery/jquery.js"></script>
        <script src="../../library/bootstrap4/js/bootstrap.bundle.js"></script>
        <script src="../../library/wow/wow.min.js"></script>
         <!-- data table JS ============================================ -->
        <script src="../../library/DataTable/js/bootstrap-table.js"></script>
        <script src="../../library/DataTable/js/tableExport.js"></script>

        <script src="../../library/DataTable/js/data-table-active.js"></script>

        <script src="../../library/DataTable/js/bootstrap-table-export.js"></script>
        <script src="../../library/DataTables/js/jquery.dataTables.min.js"></script>
        <script src="../../library/DataTables/js/dataTables.bootstrap4.js"></script>
        <script src="../../js/main.js"></script>

        
        <script src="../../library/DataTable/js/data-table-active.js"></script>