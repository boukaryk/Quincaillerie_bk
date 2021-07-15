<?php
session_start();
include_once("fonctions_panier.php");

 $erreur=false;
                 $action=(isset($_POST['action'])?$_POST['action']:
                 (isset($_GET['action'])?$_GET['action']:null));
                 if($action!==null)
                 {
                    if(!in_array($action,array('ajout','suppression','refresh')))
                        $erreur=true;
                    // Recuperation des variable en POST ou GET
                    $d=(isset($_POST['d'])?$_POST['d']:
                        (isset($_GET['d'])?$_GET['d']:null));

                    $p=(isset($_POST['p'])?$_POST['p']:
                        (isset($_GET['p'])?$_GET['p']:null));

                    $q=(isset($_POST['q'])?$_POST['q']:
                        (isset($_GET['q'])?$_GET['q']:null));

                    // Suppression des espaces verticaux
                    $d=preg_replace('#\v#','',$d);

                    // On verifie que $p soit un float
                    $p=floatval($p);
                    // On traite $q qui peut etre un entier simple ou un tableau d'entier
                    if(is_array($q))
                    {
                        $qte_produit=array();
                        $i=0;
                        foreach($q as $contenu)
                        {
                            $qte_produit[$i++]=intval($contenu);
                        }
                    }
                    else
                    {
                        $q=intval($q);
                    }
                 }

                 if(!$erreur)
                 {
                    switch($action)
                    {
                          Case "ajout": ajouter_produit($d,$q,$p);
                               break;
                          Case "suppression": supprimer_produit($d); 
                               break;
                          Case "refresh": 
                               for($i=0;$i<count(qte_produit);$i++)
                               {
                                editer_produit($_SESSION['panier']['designation'][$i],round($qte_produit[$i]));
                               }  
                               break;
                          Default:
                               break;  
                    }
                 }

?>
<!DOCTYPE html>
<head>
    <title>Panier</title>
    <link rel="icon" href="../../images/boutique.jpg"> -->
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>
</head>
<body>
      <form method="post" action="panier.php">
           <table style="width: 400px">
                 <tr>
                     <td colspan="4">
                         Votre panier
                     </td>
                 </tr>
                 <tr>
                     <td> Designation</td>
                     <td> Quantité</td>
                     <td> prix unitaire</td>
                     <td> Action</td>
                 </tr>
        <?php 
                 if(creer_panier())
                 {
                    $nbr_produit=count($_SESSION['panier']['designation']);
                    if ($nbr_produit<=0)
                    {
                       echo "<tr><td>Votre panier est vide</td></tr>";
                    }
                    else
                    {
                        for($i=0;$i<$nbr_produit;$i++)
                        {
                            echo "<tr>";
                            echo "<td>".htmlentities($_SESSION['panier']['designation'][$i])."</td>";
                            echo "<td> <input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantite'][$i])."\"/></td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['prix'][$i])."</td>";
                            echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppresion&l=".rawurlencode($_SESSION['panier']['designation'][$i]))."\">XX</a></td";
                            echo "</tr";
                        }
                        echo "<tr> <td> colspan=\"2\"></td>";
                        echo "<td> colspan=\"2\">";
                        echo "Total :".valeur_panier();
                        echo "</td></tr>";
                        echo "<tr><td colspan=\"4\"> ";
                        echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                        echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
                        echo"</td></tr>";

                    }
                 }
                
                 ?>
               
           </table>
      </form>
</body>

<html>