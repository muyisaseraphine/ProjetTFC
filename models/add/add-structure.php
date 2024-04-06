<?php
include("../../connexion/connexion.php");
if(isset($_POST['enregistrer']))
{
    $description=htmlspecialchars($_POST['description']);
    //Verification de l'existance des données inserer
    $getestru=$connexion->prepare("SELECT * FROM `structure` WHERE description=? AND supprimer=?");
    $getestru->execute([$description,0]);
    $donne=$getestru->fetch();
    if($donne>0)
    {
       $_SESSION['sms']="Cette Structure fugure dans la base de données";
       header("location:../../views/structure.php");
    }
    else
    {
        //Insertion de données
        $insert=$connexion->prepare("INSERT INTO `structure`(`description`) VALUES (?)");
        $resultat=$insert->execute([$description]);
        if($resultat==true)
        {
            $_SESSION['sms']="Enregistrement réussi";
            header("location:../../views/structure.php");
        }
        else
        {
            $_SESSION['sms']="Echec d'enregistrement";
            header("location:../../views/structure.php");
        }
    } 
}
else
{
    header("location:../../views/structure.php");
}

?>