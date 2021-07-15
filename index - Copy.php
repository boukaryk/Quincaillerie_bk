<?php 
$title="Accueil";
include('header.php');
include 'utilities/QueryBuilder.php';
$obj = new QueryBuilder();

if (isset($_POST['submit']))
{
    
    extract($_POST);
    $cookies=array();
    //var_dump(extract($_POST));
    $values = array($login_username,$login_password);
    $columns = array('USER_NAME','PWD');
    $table='users';
    $sessions=array('ID_USER','USER_NAME', 'DROIT');
    $return = array('DROIT');
    
    if (isset($login_remember) AND !empty($login_remember ))
    {
        $cookies=array('USER_NAME'=>$login_username,'PWD'=>$login_password);
    }

    $connecter= $obj->Connexion($table, $columns, $values,$return,$cookies,$sessions);
  

    if (count($connecter)>0) {

        $_SESSION['connecte'] = 1;
        
        //Redirection des utilisateurs en fonction de leurs droits

        switch ($connecter[0]) {
            case 'ADMIN':
                sleep(1);
                echo "<script>window.open('assets/pages/admin/index.php' , '_self') </script>";
                break;

            case 'CLIENT':
                sleep(1);
                echo "<script>window.open('assets/pages/client/index.php' , '_self') </script>";
                break;

            case 'admin_quincaillerie':
                sleep(1);
                echo "<script>window.open('assets/pages/admin_quincaillerie/index.php' , '_self') </script>";
                break;
           
            default:
                # code...
                break;
        }     
    }else{
        
        $message="Mot de passe ou Nom d'utilisateur incorrecte, Essayez encore ! ";
        $getmsg=SetMessage($message, 'alert');
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/library/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/library/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/media/logo_bit.png">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="modal-dialog py-lg-5 wow zoomIn">
              <div class="modal-content">
                 <div class="modal-header border-0 bg-info">
                        <img src="assets/images/boutique.jpg" class="rounded-circle" width="60px" height="60px">
                        <div class="col-6">
                          <span class="modal-title text-center text-white h4">Login</span>
                        </div>
                  </div>
                     <div class="mt-2 col-12 text-center "><?php if (isset($getmsg)) {echo $getmsg;}else{if(isset($getUpdMsg)){echo $getUpdMsg;} } ?></div>
                    <div class="card-body p-lg-4">
                        
                        <form method="post" action="index.php">

                            <div class="input-group py-3">
                                <input class="form-control <?php if (isset($getmsg)): ?> border border-danger text-danger<?php endif ?>" type="text" name="login_username" id="login_username" placeholder="Enter your Username" value="<?php if(isset($_COOKIE['USER_NAME']))
                                        {
                                            echo $_COOKIE['USER_NAME'];
                                        }
                                        ?>" >
                                <div class="input-group-append">
                                    <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"></span>
                                </div>
                            </div>

                            <div class="input-group py-5">
                                <input class="form-control <?php if (isset($getmsg)): ?> border border-danger <?php endif ?>" type="password" name="login_password" id="login_password" placeholder="Enter your password" value="<?php if(isset($_COOKIE['PASSWORD']))
                                        {
                                            echo $_COOKIE['PASSWORD'];
                                        }
                                        ?>" >
                                <div class="input-group-append">
                                    <span class=" input-group-text fas fa-lock bg-light text-bluesky "></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                    <label for="login_remember">
                                        <input type="checkbox" name="login_remember" id="login_remember" > Remember me
                                    </label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                        <a href="#">Forgot password</a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 py-3 text-center">
                                    <input  name="submit" class="btn btn-outline-primary w-75 rounded-pill" type="submit" value="Login">
                                </div> 

                                <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                    <a href="assets/pages/client/index.php">Visitor section</a>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                    <a class="text-bluesky" href="create_account.php">Create an account</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>