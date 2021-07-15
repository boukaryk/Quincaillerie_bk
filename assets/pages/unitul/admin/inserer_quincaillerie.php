<?php 
    include('header.php');
    include'../../functions//function.php';
    include('bd.php');
    $title ='Compte Quincaillerie';

    // Add hardware store responsable

if(isset($_POST['submit_quincaillerie']) AND $_POST['submit_quincaillerie']!=empty($_POST['submit_quincaillerie'])){
$code_quincaillerie=trim(htmlspecialchars($_POST['code_quincaillerie']));
$nom_quincaillerie=trim(htmlspecialchars($_POST['nom_quincaillerie']));
$ville_quincaillerie=trim(htmlspecialchars($_POST['ville_quincaillerie']));
$secteur_quincaillerie=trim(htmlspecialchars($_POST['secteur_quincaillerie']));

$image_quincaillerie=$_FILES['image_quincaillerie']['name'];
$filename=$_FILES['image_quincaillerie']['tmp_name'];
    move_uploaded_file($filename,"./images/$image_quincaillerie");

if(empty($code_quincaillerie)||empty($nom_quincaillerie)||empty($ville_quincaillerie)||empty($secteur_quincaillerie)||empty($image_quincaillerie)){
alert('info',' Fill all input');
}
else{
    $insert_quinc = $bdd->prepare("INSERT INTO quincaillerie SET ID_QUINCAILLERIE=?, ID_QUINCAILLERIER='".$code_quincaillerie."',NOM_QUINCAILLERIE=?,VILLE_QUINCAILLERIE=?,SECTEUR_QUINCAILLERIE=?, IMAGE_QUINC=?, STATUS_QUINC='Enable'");
    $insert_quinc->execute([$code_quincaillerie,$nom_quincaillerie,$ville_quincaillerie,$secteur_quincaillerie,$image_quincaillerie]);
    alert('info', ' Hardware store '.$nom_quincaillerie.' Has been add');
    // header('location:comptes_quincaillerie.php');
    echo "<script>window.location='compte_quincailleries.php?msg_quincaillerie'</script>";

}

}
include('foot.php');
?>
