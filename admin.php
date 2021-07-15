<?php
 include'head.php';
require_once'bd.php';
$req=$bdd->query('SELECT * FROM contact ORDER BY id DESC');
    

?>

<style>
    #commentaire{
        
        position: relative;
        width: 100%;
        height: 600px;
        
    }
    #aside1{
        position: absolute;
        width: 50%;
        padding-top: 50px;
        height: 100%;
        left: 0;
        text-align: center;
         border-right: 3px solid black;
        background-color: #d6ddf4;
        
      
    }
    #aside-left{
        background-color: #d6ddf4;
        overflow: auto;
        margin-top: -10px;
        width:100%;
        height: 80%;
        border-top: 1px solid black;
         
    }
    #aside-right{
         padding-top: 50px;
        position: absolute;
        right: 0;
         width: 50%;
        height: 100%;
        background-color: #ffe8ff;
      
    }
    hr{
        width: 50%;
    }
    form{
        position: absolute;
        margin-left: 30%;
        top: 30%;
    }
    #file,#text,#cate{
        width: 80%;
        height: 30px;
    }
    #file{
        color: orangered;
    }
    #ajout{
        width: 35%;
        height: 40px;
        color: white;
        background-color: limegreen;
        border-radius: 20px;
        font-size: 1.3em;
    }
</style>
<div id="commentaire">
    <div id="aside1">
    <h1 style="margin-bottom:70px;">Commentaire posté</h1>
    <aside id="aside-left">
        
        <?php while($an=$req->fetch()){?>
    <h4 style="position:relative;margin-left:60px;margin-bottom:20px;color:blue;"><?php echo $an['name'].' '.$an['prenom'];?></h4>
        <h5>Motif: <i><?php echo $an['motif'];?></i></h5>
    <p><b>Commentaire:</b> <?php echo $an['commentaire'];?></p><br><hr><br>
<?php    
}
     //$req->closeCursor();
        
?>
    </aside>
</div>
    <?php 
if(isset($_POST['ajout'])){
    $name=$_POST['nom'];
    $cate=$_POST['cate'];
    $price=$_POST['price'];
    $new_price=$_POST['new_price'];
    $image=$_FILES['file']['name'];
    $filename=$_FILES['file']['tmp_name'];
    move_uploaded_file($filename,"./images/$image");
    
    $envoi=$bdd->prepare("INSERT INTO acheter set link=?,price=?,Normal_price=?, name=?,categorie=?");
    $envoi->execute([$image,$price,$new_price,$name,$cate]);
    $erreu="Produit ajouter avec succès";
     
}

?>
    <div id="aside2">
    <aside id="aside-right">
        <h1>Inserer un nouveau produit</h1>
        <h2 style="color:green; text-align:center; margin-top:30px;"><?php if(isset($erreu)){echo $erreu;}?></h2>
        <form method="post" action="#" enctype="multipart/form-data">
            <input type="text" id="text" name="nom" placeholder="Nom du produit" required><br><br>
            <input type="number" id="text" name="price" placeholder="Pix du produit" required><br><br>
            <input type="number" id="text" name="new_price" placeholder="Pix normal du produit" required><br><br>
            <input type="text" id="cate" name="cate" placeholder="La categorie" required><br><br>
            <input type="file" name="file" id="file"><br><br>
        <input type="submit" name="ajout" value="Ajouter" id="ajout">
        </form>
    </aside>
    </div>
</div>

</body>
</footer>