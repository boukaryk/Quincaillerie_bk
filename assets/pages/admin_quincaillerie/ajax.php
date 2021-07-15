<?php

include('../../../utilities/QueryBuilder.php');
include('../../functions/functions.php');
$obj = new QueryBuilder();
require_once 'bd.php';

// page acheter
 if(isset($_POST['select_categorie'])){
   $categories=$bdd->query('SELECT * FROM materiel m, categorie c where m.ID_CATEGORIE=c.ID_CATEGORIE AND TYPE_CATEGORIE="'.$_POST['nom_materiel'].'"');

   $tring='';
   $tring.='<select name="materiel" id="materiel" class="form-control" >
       <option selected>Select Materiel</option>';
   while($maters=$categories->fetch()){
    $tring.='<option value="'.$maters["ID_MATERIEL"].'">'.$maters["NOM_MATERIEL"].'</option>';
       }
   $tring.='</select>';

echo $tring;

 }

 // Ajouter contact
 if(isset($_POST['submit_contact'])){
     $nom=$_POST['nom'];
     $motif=$_POST['motif'];
     $comment=$_POST['comment'];
     $email=$_POST['email'];
     
     if(empty($nom)){
        echo 1;
     }
     else if(empty($email)){
        echo 2;
     }
     else if(empty($motif)){
        echo 3;
     }
     else if(empty($comment)){
        echo 4;
     }
     else{
         $search=$bdd->prepare("INSERT INTO users SET EMAIL=?, MOTIF=?, MESSAGE=?,NOM=?");
         $search->execute([$email,$motif,$comment,$nom]);
         echo 5;
     }
 }




// contact 2
if (isset($_POST['messageUpd'])) {
    extract($_POST);
    $string = '<div class="row">';
    $selectDept = $obj->Requete("SELECT * FROM users  WHERE ID_USER ='" . $messageId . "'");
    if (is_object($selectDept)) {
        if ($getSelect = $selectDept->fetch()) {
            $string .= '<div class="col-lg-4">
                <input type="text" value="' . $messageId . '" hidden id="idmessage">
                    <label for="up_aut_name">Auteur<span class="text-danger"> * </span></label>
                          <div class="input-group">
                             <input type="text" class="form-control" name="up_aut_name" id="up_aut_name" placeholder="Entre votre nom" value="' . $getSelect['NOM'] . '" oninput="EnableDecimal(this)" required>
                                 <div class="input-group-append">
                                  <span class=" input-group-text fas fa-university"></span>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-4">
                          <label for="up_msg">Nom <span class="text-danger"> * </span></label>
                          <div class="input-group">
                              <input type="text" class="form-control" name="up_email" id="up_email" placeholder="Entrez votre email" value="' . $getSelect['EMAIL'] . '" oninput="EnableDecimal(this)" required>
                                      
                              <div class="input-group-append">
                                  <span class="input-group-text fab fa-envelope"></span>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <label for="up_msg">Nom <span class="text-danger"> * </span></label>
                          <div class="input-group">
                              <input type="text" class="form-control" name="up_msg" id="up_msg" placeholder="Entrez votre motif" value="' . $getSelect['MOTIF'] . '" oninput="EnableDecimal(this)" required>
                                      
                              <div class="input-group-append">
                                  <span class="input-group-text fas fa-user-tie"></span>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-12 mt-5">
                          <label for="up_msgs">Message <span class="text-danger"> * </span></label>
                          <div class="form-group">
                              <textarea name="up_msgs" id="up_msgs" class="form-control" rows="10" style="resize:none" placeholder="Entrez votre message" value="" oninput="EnableDecimal(this)">' . $getSelect['MESSAGE'] . '</textarea>
                          </div>
                      </div>';

        }
    }
    $string .= '<div class="col-lg-12 text-center my-5">
                    <button class="btn btn-danger w-25 my-3" data-dismiss="modal" aria-label="Close">Reset</button>
                        <input class="btn btn-success w-25 my-3" name="update_department" type="button" id="Up_message" value="Update" onclick="msg_Update()">
                            </div></div>';
    echo $string;


}
//fin recuperation

//debut modification de la classe 
if (isset($_POST['Up_message'])) {
    extract($_POST);

    // on verifie si l'utilisateur a renseigne tous les champs
    if ($up_msg == "" || $up_msgs == "" || $up_aut_name == ""|| $up_email == "") {
        echo "empty";
    } else {
        // on verifie si la classe n'est pas deja enregistrer
        $checkDepart = $obj->Select('contact', [], array('NOM_complet' => $up_aut_name), $orderBy = '', $order = 1);
        if (is_object($checkDepart) == true) {
            if ($checkDepart->rowCount() == 1) {
                $getDepart = $checkDepart->fetch();
                $getIdDepart = $getDepart['ID_CONTACT'];
                if ($getIdDepart != $idmessage) {
                    echo "exit";
                } else {
                    $updateDeparte = $obj->Update('CONTACT', ['NOM_COMPLET', 'EMAIL','MOTIF', 'MESSAGE'], [$up_aut_name,$up_email, $up_msg, $up_msgs], array('ID_USER' => $idmessage));
                    if ($updateDeparte == 1) {
                        echo "okk";
                    }
                }
            }
        } else {
            $updateDeparte2 = $obj->Update('contact', ['NOM_COMPLET', 'EMAIL','MOTIF', 'MESSAGE'], [$up_aut_name,$up_email, $up_msg, $up_msgs], array('ID_CONTACT' => $idmessage));
            if ($updateDeparte2 == 1) {
                echo "ok";
            }
        }
    }
}

if (isset($_POST['submit_message'])) {
    extract($_POST);
    //appel de la fonction insert de queryBuilder
    // on verifie si le departement n'est pas deja enregistrer
    $check_messages = $obj->Select('contact', [], array('NOM' => $auteur_name), $orderBy = '', $order = 1);
    if (is_object($check_messages) == false) {
        $insert_message = $obj->Insert('contact', ['NOM_COMPLET','EMAIL', 'MOTIF', 'MESSAGE'], [$auteur_name, $email,$motif, $message]);

        if ($insert_message == 1) {
            echo 1;
        }
    } else {
        echo 2;
    }

}





// if (isset($_POST['submit_mess'])) {
//     extract($_POST);
//     //appel de la fonction insert de queryBuilder
//     // on verifie si le departement n'est pas deja enregistrer
//     $check_mess = $obj->Select('users', [], array('NOM' => $nom), $orderBy = '', $order = 1);
//     if (is_object($check_mess) == false) {
//         $insert_mess = $obj->Insert('users', ['NOM', 'MOTIF', 'MESSAGE'], [$nom, $motifs, $messages]);

//         if ($insert_mess == 1) {
//             echo 1;
//         }
//     } else {
//         echo 2;
//     }

// }

if (isset($_POST['submit_mess'])) {
    extract($_POST);
    //appel de la fonction insert de queryBuilder
    // on verifie si le departement n'est pas deja enregistrer
    $checkClass = $obj->Select('contact', [], array('NOM_COMPLET' => $nom), $orderBy = '', $order = 1);
    if (is_object($checkClass) == false) {
        $insertClass = $obj->Insert('contact', ['NOM_COMPLET', 'EMAIL','MOTIF', 'MESSAGE'], [$nom,$add_email, $motifs, $messages]);

        if ($insertClass == 1) {
            echo 1;
        }
    } else {
        echo 2;
    }

}




if (isset($_POST['submit_quincaillerie'])) {
    $nom_quincaillerie=$_POST['nom_quincaillerie'];
    $ville_quincaillerie=$_POST['ville_quincaillerie'];
    $secteur_quincaillerie=$_POST['secteur_quincaillerie'];
    $domain_quincaillerie=$_POST['domain_quincaillerie'];
    $status_quincaillerie=$_POST['status_quincaillerie'];
    $code_quincaillerie=$_POST['code_quincaillerie'];

    
    // selction de la table quincaillerie
    $select_quinc=$bdd->prepare('SELECT * FROM WHERE ID_QUINCAILLERIE=?,ID_QUINCAILLERIER=?,NOM_QUINCAILLERIE=?,VILLE_QUINCAILLERIE=?,SECTEUR_QUINCAILLERIE=?,NOM_DOMAIN=?,STATUS_QUINC=?');

    $select_quinc->execute([$code_quincaillerie,$code_quincaillerie,$nom_quincaillerie,$ville_quincaillerie,$secteur_quincaillerie,$domain_quincaillerie,$status_quincaillerie]);
        if(is_object($select_quinc)){

        $insert_quinc = $bdd->prepare("INSERT INTO quincaillerie set ID_QUINCAILLERIE=?,ID_QUINCAILLERIER=?,NOM_QUINCAILLERIE=?,VILLE_QUINCAILLERIE=?,SECTEUR_QUINCAILLERIE=?,NOM_DOMAIN=?,STATUS_QUINC=?");
        $insert_quinc->execute([$code_quincaillerie,$code_quincaillerie,$nom_quincaillerie,$ville_quincaillerie,$secteur_quincaillerie,$domain_quincaillerie,$status_quincaillerie]);
        if ($insert_quinc == 1 AND $insert_quinc !=0) {
            echo 1;
        }
    } else {
        echo 2;
    }

}

 ?>