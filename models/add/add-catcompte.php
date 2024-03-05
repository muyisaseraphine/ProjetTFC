<?php
include("../../connexion/connexion.php");
if(isset($_POST['enregistrer']))
{
    $desingation=htmlspecialchars($_POST['desingation']);
    //Verification de l'existance des données inserer
    $getecatcompte=$connexion->prepare("SELECT * FROM `categoriecompte` WHERE desingation=? AND supprimer=?");
    $getecatcompte->execute([$desingation,0]);
    $donne=$getecatcompte->fetch();
    if($donne>0)
    {
       $_SESSION['sms']="Cette Catégorie de Compte fugure dans la base de données";
       header("location:../../views/catcompte.php");
    }
    else
    {
        //Insertion de données
        $insert=$connexion->prepare("INSERT INTO `categoriecompte`(`desingation`) VALUES (?)");
        $resultat=$insert->execute([$desingation]);
        if($resultat==true)
        {
            $_SESSION['sms']="Enregistrement réussi";
            header("location:../../views/catcompte.php");
        }
        else
        {
            $_SESSION['sms']="Echec d'enregistrement";
            header("location:../../views/catcompte.php");
        }
    } 
}
else
{
    header("location:../../views/catcompte.php");
}

?>