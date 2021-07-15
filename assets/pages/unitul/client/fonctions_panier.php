<?php 
// Function de creation de panier
function creer_panier()
{
    // on verifie si le panier existe sinon on l'etablit
if(!isset($_SESSION['panier'])){
    $_SESSION['panier']=array();
    $_SESSION['panier']['designation']=array();
    $_SESSION['panier']['quantite']=array();
    $_SESSION['panier']['prix']=array();
    $_SESSION['panier']['fermer']=false;
}
return true;
}


// Function d'ajout de produit
function ajouter_produit($designation,$quantite,$prix)
{
 // si le panier existe
    if(creer_panier() && ! verrouiller())
    {
        // Si le produit existe deja on ajoute seulement la quantite
        $disponibilite_produit=array_search($designation,$_SESSION['panier']['designation']);
        if($disponibilite_produit !==false)
        {
            $_SESSION['panier']['quantite'][$disponibilite_produi] +=$quantite;
        }
    else{
          // Sinon on ajoute le produit
        array_push($_SESSION['panier']['designation'],$designation);
        array_push($_SESSION['panier']['quantite'],$quantite);
        array_push($_SESSION['panier']['prix'],$prix);

        }
    }
    else{
          echo "Un probleme est survenue veillez contacter l'administrateur";
        }

}


// Function de suppression de produit
function supprimer_produit($designation)
{
    // Si le produit existe
    if(creer_panier() && ! verrouiller())
    {
        // Nous allons passer par panier temporaire
        $tmp=array();
        $tmp['prix']=array();
        $tmp['quantite']=array();
        $tmp['fermer']=$_SESSION['panier']['fermer'];

        for($i=0;$i<count($_SESSION['panier']['designation']);$i++)
        {
            if($_SESSION['panier']['designation'][$i]!==$designation)
            {
                array_push($tmp['designation'],$_SESSION['panier']['designation'][$i]);
                array_push($tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
                array_push($tmp['prix'],$_SESSION['panier']['prix'][$i]);
            }
        }

        // On remplace le panier en session par notre panier temporaire a jour
        $_SESSION['panier']=$tmp;
        // On efface notre panier temporaire
        unset($tmp);
    }
    else{
         echo "Un probleme est survenu Veillez contacter l'administrateur";
        }

}


function editer_produit($designation,$quantite)
{
    // Si le panier existe;
    if(creer_panier() && ! verrouiller())
    {
        // Si la quantite est positive on modifie sinon on supprime le produit
        if($quantite>0)
        {
            // Recherche du produit dans le panier
            $disponibilite_produit=array_search($designation,$_SESSION['panier']['designation']);
            if($disponibilite_produit !==false)
            {
                $_SESSION['panier']['quantite'][$disponibilite_produit]=$quantite;
            }
        }
        else{
             supprimer_produit($designation);
            }
    }
    else{
         echo "Un probleme est survenu veillez contacter l'administrateur";
        }
}

// Function de calcul(donne la valeur du panier ou de l'achat)
function valeur_panier()
{
    $total=0;
    for($i=0;$i<count($_SESSION['panier']['designation']);$i++)
    {
        $total +=$_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix'][$i];
    }
    return $total;
}

// Function de verouillage du panier
function verrouiller()
{
    if(isset($_SESSION['panier']) && $_SESSION['panier']['fermer'])
    {
        return true;
    }
    else{
         return false;
        }
}

// Function pour compter les produits
function compteur_produit()
{
    if(iseet($_SESSION['panier']))
    {
        return count($_SESSION['panier']['designation']);
    }
    else
    {
        return 0;
    }
}

//function de suppression de panier
function supprimer_panier()
{
    unset($_SESSION['panier']);
} 
?>