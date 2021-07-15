 <?php
 $title="Securite";   
        include('header.php');
        require_once'bd.php';
        
            if(isset($_POST['send'])){
                $user=$_POST['nom'];
                $pass=$_POST['pass'];
                if(empty($user)){
                    $erreur="Veuillez saisir le nom d'utilisateur";
                }
                else if(empty($pass)){
                    $erreur="Veuillez entrer le mot de passe";
                }
                else if($user!='nana'){
                    $erreur="Nom d'utilisateur incorrect";
                }
                else if($pass!='oui'){
                    $erreur="Mot de passe incorrect";
                }
                else{
                    header('Location:admin.php');
                }
                
            }
        
        ?>
        <a href="index.php"><button style="position:absolute;top:10%;background-color:green;margin-left:5%; width:150px;height:40px;font-size:1.5em;color:white;cursor:pointer">Retour</button></a>
        <div id="secu">

            <h2 style="color:red;position:absolute; top:-100px"><?php if(isset($erreur)){echo $erreur;}?>
            </h2>
            <form method="post" action="#">
                <h2 style="position:absolute;top:-20%;left:0;width:103%;height:17%; background-color:darkblue;color:white;text-align:center;line-height:100%">Veuillez remplir ce formulaire</h2>
                <label id="lab1">Nom de L'utilisateur:</label><input type="text" name="nom" id="utili"><br>
                <label id="lab2">Mot de passe:</label><input type="password" name="pass" id="pass"><br>
                <input type="submit" name="send" id="submit" value="Confirmer">   
            </form>
               
        </div>
    
<?php
include('foot.php');
?>