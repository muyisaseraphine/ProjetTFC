<?php
include("../../connexion/connexion.php");
if(isset($_GET['idsup']) && !empty($_GET['idsup']))
{
    $id=$_GET['idsup'];
    $supprimer=1;
    $insert=$connexion->prepare("UPDATE `structure` SET supprimer=? WHERE id=? ");
    $resultat=$insert->execute([$supprimer,$id]);

    if($resultat==true)
    {
        $_SESSION['sms']="Suppression avec succes";
        header("../../views/structure.php");
    }
    else
    {
        $_SESSION['sms']="Echec de suppression ";
        header("../../views/structure.php");  
    }
}
else
{
    header("../../views/structure.php");   
}
?>