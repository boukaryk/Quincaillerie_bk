<?php 
    include('header.php');
    $title = 'Manage User';
    $breadcrumb = 'Add user';
    include_once ('bd.php');

    
      if (isset($_POST['user_submit'])) 
      {
        // Traitement des input input des upload
             // Recuperation des input input des upload
             $user_name = trim(htmlspecialchars($_POST['user_name']));
             $user_rights = trim(htmlspecialchars($_POST['user_rights']));
             $user_pwd = trim(htmlspecialchars($_POST['user_pwd']));
             $user_last_name = trim(htmlspecialchars($_POST['user_last_name']));
             $user_first_name= trim(htmlspecialchars($_POST['user_first_name']));
             $user_phone = trim(htmlspecialchars($_POST['user_phone']));
             $user_email =trim(htmlspecialchars($_POST['user_email']));

         if (!empty($user_name['user_name']) && !empty($user_rights['user_rights']) && !empty($user_pwd['user_pwd']) && !empty($user_email['user_email']) && !empty($user_phone['user_phone']) && !empty($user_last_name['user_last_name']) && !empty($user_first_name['user_first_name'])) 
         {
            // Image Upload FILES details
            $user_pic_name = $_FILES['upload_user_pic']['name'];
            $user_pic_tmp = $_FILES['upload_user_pic']['tmp_name'];
            $user_pic_error = $_FILES['upload_user_pic']['error'];
            $user_pic_size = $_FILES['upload_user_pic']['size'] ;
             
             // Image placement folder
             $img_dir = "../../icones/";
             // Get file path
             $img_file = $img_dir.basename($user_pic_name);
             // Get file extension
             $img_ext = strtolower(pathinfo($img_file,PATHINFO_EXTENSION));
             // Allowed Extensions
             $img_allow_ext = array("jpg","png","jpeg","gif");
            // Picture in the database
             $img_db = $bdd->query("SELECT PROFIL FROM user WHERE PROFIL='".$img_file."'");
            
            // Check if the file already exists
            $req_verify1 = $bdd->query("SELECT PROFIL FROM user WHERE PROFIL='".$user_pic_name."'");
                if (!file_exists($user_pic_tmp)) 
                {
                    $error_verify1 = array(
                        "status"=>"alert-danger",
                        "message" => "Select image to upload."
                    );

                }elseif(!in_array($img_ext,$img_allow_ext)) 
                {
                    $error_verify1 = array(
                        "status"=>"alert-danger",
                        "message"=>"Allowed file formats, .jpg, .jpeg, .png"
                    );
                }elseif($user_pic_size > 2097152)
                {
                    $error_verify1 =  array(
                        "status" => "alert-danger",
                        "message" => "File is too large. File size should be less than 2 megabytes."
                    );
                }elseif (file_exists($img_file)) 
                {
                    $error_verify1 = array(
                        "status" => "alert-danger",
                        "message" => "Picture already exists."
                    );
                }elseif ($req_verify1->rowCount() >=1) {
                    $error_verify1 = array(
                        "status" => "alert-danger",
                        "message" => "Picture already exists."
                    );
                }
             if($bdd->query("SELECT * FROM user WHERE USER_NAME='".$user_name."' AND DROIT='".$user_rights."'")->rowCount() >= 1 ){
                     //Verifier si les inputs ne sont pas deja existants
                     
                    $error_verify1=$arrayName = array('status' =>"alert-danger" , "message"=>"User alert-danger exist");

                }else{
                    if (move_uploaded_file($user_pic_tmp,$img_file)) {
                        //Insertion dans la table user
                        $req_insert_user=$bdd->prepare("INSERT INTO user SET DROIT=?,PWD=? USER_NAME=?,PROFIL=?,USER_STATUS=?");
                        $req_insert_user->execute([$user_rights,$user_pwd,$user_name,$user_pic_name,'enable']);

                        $selecta = $bdd->query("SELECT * FROM user WHERE USER_NAME='".$user_name."' AND DROIT='".$user_rights."' AND USER_STATUS='enable'");
                        $selecta_fetch = $selecta->fetch();

                        //Select pour recuperer l'ID_USER
                        $sel_id_user = $bdd->query("SELECT * FROM user WHERE ID_USER='".$selecta_fetch['ID_USER']."' AND DROIT='".$selecta_fetch['DROIT']."'");
                        $sel_id_user_fetch = $sel_id_user->fetch();

                        if($bdd->query("SELECT * FROM user WHERE ID_USER='".$sel_id_user_fetch['ID_USER']."' AND EMAIL='".$user_email."' AND LAST_NAME='".$user_last_name."' AND FIRST_NAME='".$user_first_name."'")->rowCount() >= 1)
                        {

                            $error_verify1 = array(
                                "status" => "alert-danger",
                                "message" => "User already exists."
                            );
                                
                        // }else{
                        //     // Insertion dans la table administration
                        //     $req_insert_administration=$bdd->("INSERT INTO user SET  DROIT=?,ID_USER=?,LAST_NAME=?,FIRST_NAME=?,EMAIL=?,PHONE=?")
                        //     $req_insert_administration->execute([$sel_id_user_fetch['DROIT'],[$sel_id_user_fetch['ID_USER'],$user_last_name,$user_first_name,$user_email,$user_phone]]);
                        //     $error_verify1 = array(
                        //         "status" => "alert-success",
                        //         "message" => "User created successfully"
                        //     );
                        // }

                    }
                }
                
        }
    }
}
         // else{
         //     $error_input = "Fill all the input";
         // }
      
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h2>User Creation</h2>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-dark" role="button" href="modifier_user.php">Edit Users</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                             <!-- Espace pour le nom de famille du User  -->
                             <div class="form-group col-lg-6 col-md-6 col-sm-12" id="user_name">
                                <label for="user_last_name">Last Name<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="user_last_name">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                             <!-- Espace pour le Prenom du User  -->
                             <div class="form-group col-lg-6 col-md-6 col-sm-12" id="user_name">
                                <label for="user_first_name">First Name<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="user_first_name" >
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Espace pour le nom du User  -->
                            <div class="form-group col-lg-6 col-md-6 col-sm-12" id="user_name">
                                <label for="user_name">User Name<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="user_name">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Espace pour les droits du User  -->
                            <div class="form-group col-lg-6 col-md-6 col-sm-12" id="user_rights">
                                <label for="user_rights">User Rights<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <select class="form-control" name="user_rights">
                                        <option value="" selected disabled>Choose the right</option>
                                        <option value="admin">Admin</option>
                                        <option value="client">Client</option>
                                        <option value="quincaillerier">Chef Quincaillerie</option>
                                    </select>
                                </div>
                            </div>
                             <!-- Espace pour l'Email du User  -->
                             <div class="form-group col-lg-6 col-md-6 col-sm-12" id="user_name">
                                <label for="user_email">Email<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="user_email">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-email"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Espace pour le numero de telephone du User  -->
                            <div class="form-group col-lg-6 col-md-6 col-sm-12" id="user_name">
                                <label for="user_phone">Phone Number<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="user_phone" placeholder="(+226)">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Espace pour le mot de passe du User  -->   
                            <div class="form-group col-lg-6 col-md-6 col-sm-12" id="user_pwd">
                                <label for="user_pwd">User Password<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="user_pwd">
                                    <div class="input-group-append">
                                        <span class="input-group-text fas fa-key"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Espace pour upload la photo de profil du User  -->
                            <div class="form-group col-lg-6 col-md-6 col-sm-12" id="user_pic">
                                <label for="upload_user_pic">User Picture<span class="text-danger"> * </span></label>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="upload_user_pic" class="form-control custom-file-input">
                                        <label class="custom-file-label" for="upload_pic">Choose Picture</label>
                                    </div>
                                </div>  
                            </div>

                            <!-- Espace pour le boutton submit  -->
                            <div class="user_submit mx-auto">
                                <button type="submit" name="user_submit" class="btn btn-outline-primary" id="user_submit">
                                    Create User
                                </button>
                            </div>
                            <?php
                                if (!empty($error_verify1)) {?>
                                <div class="col-12 text-center">
                                <div class="mt-3 alert <?php echo $error_verify1['status']; ?>">
                                    <?php echo $error_verify1['message']; ?>
                                </div>
                                </div>
                                <?php
                                }
                            ?>               
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  
<?php
    include('foot.php');
?>

<script>
    $(".custom-file-input").on("change", function()
    {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
