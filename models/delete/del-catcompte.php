<?php
include("../../connexion/connexion.php");
if(isset($_GET['idsup']) && !empty($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $supprimer=1;
    $insert=$connexion->prepare("UPDATE `categoriecompte` SET supprimer=? WHERE id=? ");
    $resultat=$insert->execute([$supprimer,$id]);

    if($resultat==true)
    {
        $_SESSION['sms']="Suppression avec succes";
        header("../../views/catcompte.php");
    }
    else
    {
        $_SESSION['sms']="Echec de suppression ";
        header("../../views/catcompte.php");  
    }
}
else
{
    header("../../views/catcompte.php");   
}
?>