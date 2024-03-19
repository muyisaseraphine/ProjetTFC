<?php
include("../../connexion/connexion.php");
if(isset($_POST['enregistrer']))
{
    $desingation=htmlspecialchars($_POST['desingation']);
    //Verification de l'existance des données inserer
    $getecatben=$connexion->prepare("SELECT * FROM categoriebenef WHERE desingation=? AND supprimer=?");
    $getecatben->execute([$desingation,0]);
    $donne=$getecatben->fetch();
    if($donne>0)
    {
       $_SESSION['sms']="Cette Catégorie de  Beneficaire fugure dans la base de données";
       header("location:../../views/catmembre.php");
    }
    else
    {
        //Insertion de données
        $insert=$connexion->prepare("INSERT INTO categoriebenef (`desingation`) VALUES (?)");
        $resultat=$insert->execute([$desingation]);
        if($resultat==true)
        {
            $_SESSION['sms']="Enregistrement réussi";
            header("location:../../views/catmembre.php");
        }
        else
        {
            $_SESSION['sms']="Echec d'enregistrement";
            header("location:../../views/catmembre.php");
        }
    } 
}
else
{
    header("location:../../views/catmembre.php");
}

?>