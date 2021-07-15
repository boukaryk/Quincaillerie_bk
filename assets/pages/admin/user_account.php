<?php 
    $title="Admin create user account";
   include('header.php');
    include'../../functions//function.php';
    include('bd.php');
    $title ='Create account';

 //If the  user press on the button Create User (name="submit_user") 
 if(isset($_POST['submit_user'])) 
  {
   // Recover these inputs
   $username = trim(htmlspecialchars($_POST['username']));
   $right= trim(htmlspecialchars($_POST['right']));
   $password =trim(htmlspecialchars($_POST['password']));
   $firstname = trim(htmlspecialchars($_POST['firstname']));
   $lastname= trim(htmlspecialchars($_POST['lastname']));
   $phone = trim(htmlspecialchars($_POST['phone']));
   $email = trim(htmlspecialchars($_POST['email']));
   $city = trim(htmlspecialchars($_POST['city']));
   $sector = trim(htmlspecialchars($_POST['sector']));
   $CNIB = trim(htmlspecialchars($_POST['CNIB']));
    // Recovery of image information in order to upload it
    $user_pic_name=$_FILES['user_pic']['name'];
    $user_pic_tmp=$_FILES['user_pic']['tmp_name'];
    move_uploaded_file($user_pic_tmp,"./incones/$user_pic_name");            
    // Verify empties inputs                      
    if (empty($username) || empty($password) ||empty($right)  || empty($firstname) || empty($lastname) || empty($phone) || empty($email) || empty($city) || empty($sector) || empty($CNIB) || empty($user_pic_name)) 
    { 
      alert('danger', ' Inccorect or empty input');
    }
    else
    { // Select from the data base data sumilar to variable($username or $email or $CNIB) 
      $verifier=$bdd->prepare("SELECT USER_NAME,EMAIL,CNIB FROM users WHERE USER_NAME=? OR EMAIL=? OR CNIB=?");
      $verifier->execute([$username,$email,$CNIB]);
      // Count the number of row of the selected data. If more that one row this user exists, else insert the new user
      $count_user=$verifier->rowCount();
      if($count_user>0){
       alert('danger', ' This mail, or,username or code already exist');
      }else
      { $req_insert_utili = $bdd->prepare("INSERT INTO users SET RIGHTS=?,PWD=?,USER_NAME=?,PROFIL=?,USER_STATUS='Enable',FIRST_NAME=?,LAST_NAME=?,EMAIL=?,SECTOR=?,CITY=?,PHONE=?,CNIB=?");
        $req_insert_utili->execute([$right,$password,$username,$firstname,$user_pic_name,$lastname,$email,$sector,$city,$phone,$CNIB]);
        alert('info', 'You have been successful add');
       }
    }
 } 
?>
<div class="container-fluid py-5">
    <hr class="bg-dark">            
   <h3 class="text-info text-center"><i>Add User</i></h3>                   
    <hr class="bg-dark"> 
    <div class="row">
        <div class="col-lg-11 mx-auto">
                <div class="card shadow">

                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" id="inscription_tab" data-toggle="tab">Add a User</a>
                            </li>
                        </ul>
                    </div>

                <div class="card-body">

                   <!-- Create hardware store responsible-->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="inscription">
                        <div class="col-12 text-center" id="text"></div>
                        <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                             <div class="col-lg-12 text-left">
                                    <h5 class="text-bluesky mt-3">Identite utilisateur</h5>
                                    <hr class="bg-gradient-primary">
                             </div>
                             <!-- section first name  -->
                             <div class="form-group py-3 col-lg-4 col-md-4 col-sm-6" >
                                <label for="firstname">First Name<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="firstname"id="firstname"  placeholder="Enter First Name">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                             <!-- section lastname  -->
                             <div class="form-group py-3 col-lg-4 col-md-4 col-sm-6" >
                                <label for="lastname">PRENOM<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your Last Name">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Espace pour le CNIB de l'utilisateur  -->
                            <div class="form-group py-3 col-lg-4 col-md-4 col-sm-6">
                                <label for="CNIB">CNIB<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="CNIB" id="CNIB" placeholder="Votre CNIB" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-id-card"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Username section  -->
                            <div class="form-group py-3 col-lg-4 col-md-4 col-sm-6">
                                <label for="username">Username<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- section user right  -->
                            <div class="form-group py-3 col-lg-4 col-md-4 col-sm-12">
                               <label for="right">User right<span class="text-danger"> * </span></label>
                               <div class="input-group">
                                   <select class="form-control text-center" name="right" id="right">
                                        <!-- <option disabled selected>Right</option> -->
                                        <option>Admin</option>
                                        <option>Client</option>
                                        <option>Hardware</option>
                                  </select> 
                                  <div class="input-group-append">
                                      <span class=" input-group-text fa fa-chevron-right"></span>
                                  </div>              
                                </div>
                            </div>
                             
                           
                            <!-- Espace pour le mot de passe de l'utilisatuer  -->   
                            <div class="form-group py-3 col-lg-4 col-md-4 col-sm-12">
                                <label for="password">Mot de passe<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-key"></span>
                                    </div>
                                </div>
                            </div>


                               <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12 mx-auto">
                                     <label for="user_pic">PROFILE<span class="text-danger"> * </span></label>
                                     <div class="input-group">
                                         <input type="file" name="user_pic" id="user_pic" class="form-control">
                                         <div class="input-group-append">
                                             <span class=" input-group-text fas fa-upload bg-light"></span>
                                         </div>
                                     </div>

                                </div>

                            <div class="col-lg-12 text-left">
                                    <h5 class="text-bluesky mt-3">Adresses utilisateur</h5>
                                    <hr class="bg-gradient-primary">
                             </div>

                              <!-- Section user phone number  -->
                            <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12">
                                <label for="phone">Phone number<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                           
                           <!-- Email section  -->
                            <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12" >
                                <label for="email">EMAIL<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
    

                            <div class="col-lg-12 text-left">
                                    <h5 class="text-bluesky mt-3">Info Localite</h5>
                                    <hr class="bg-gradient-primary">
                             </div>

                            <!-- City section  -->
                            <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12">
                                <label for="city">City<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter yor city">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-city"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- section sector  -->
                            <div class="form-group py-3 col-lg-6 col-md-6 col-sm-12">
                                <label for="sector">Sector<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="sector" id="sector" placeholder="Enter your sector">
                                    <div class="input-group-append">
                                        <span class="input-group-text fa fa-home"></span>
                                    </div>
                                </div>
                            </div>

                             
                            <!-- Espace pour le boutton submit  -->
                            <div class="col-lg-6 py-3 mx-auto text-center my-3">
                                <input class="btn btn-primary w-75 my-3 " type="submit" name="submit_user" id="submit_user" value="Create User">
                            </div>
                                          
                           
                        </div>
                    </form>
                </div>
             </div>
        </div>
                 <!-- Fin hardware store creation -->
    </div>
    </div>
</div>
</div>
<p class="text-center py-5">
    Design by Boukary KABORE Etudiant de premiere promotion<i class="far fa-copyright"></i> 
    <script>
        document.write(new Date().getFullYear());
    </script>
        
</p>
<?php
include('foot.php');
?>