<?php
include("../../connexion/connexion.php");
if(isset($_POST['enregistrer']))
{
    $periode=htmlspecialchars($_POST['periode']);
    $montantpayer=htmlspecialchars($_POST['montantpayer']);
    //Verification de l'existance des données inserer
    $getepres=$connexion->prepare("SELECT * FROM `periodeprestation` WHERE periode=? AND supprimer=?");
    $getepres->execute([$periode, 0]);
    $donne=$getepres->fetch();
    if($donne>0)
    {
       $_SESSION['sms']="Cette Période de prestation fugure dans la base de données";
       header("location:../../views/prestation.php");
    }
    else
    {
        if(is_numeric($montantpayer)){
            //Insertion de données
            $insert=$connexion->prepare("INSERT INTO `periodeprestation`( `periode`, `montantpayer`) VALUES (?,?)");
            $resultat=$insert->execute([$periode,$montantpayer]);
            if($resultat==true)
            {
                $_SESSION['sms']="Enregistrement réussi";
                header("location:../../views/prestation.php");
            }
            else
            {
                $_SESSION['sms']="Echec d'enregistrement";
                header("location:../../views/prestation.php");
            }
       }
       else{
        $_SESSION['sms']="Le montant à payer ne doit pas être une chaîne de caractère";
        header("location:../../views/prestation.php");
       }
    } 
}
else
{
    header("location:../../views/prestation.php");
}

?>