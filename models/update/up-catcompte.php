<?php
include("../../connexion/connexion.php");
if(isset($_POST['enregistrer']) && !empty($_GET['idcatcmpt']))
{
    $id=$_GET['idcatcmpt'];
    $insert=$connexion->prepare("UPDATE `categoriecompte` SET `desingation`=? WHERE id=$id ");
    $resultat=$insert->execute([$desingation]);

    if($resultat==true)
    {
        $_SESSION['sms']=" Modification réussie";
        header("location:../../views/catcompte.php");
    }
    else
    {
        $_SESSION['sms']=" Echec de modification ";
        header("location:../../views/catcompte.php");
    }
}
else
{
    header("location:../../views/catcompte.php"); 
}
?>