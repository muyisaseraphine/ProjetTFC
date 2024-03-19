<?php
include("../../connexion/connexion.php");
if(isset($_POST['enregistrer']) && !empty($_GET['idcatben']))
{
    $id=$_GET['idcatben'];
    $desingation=htmlspecialchars($_POST['desingation']);
    $insert=$connexion->prepare("UPDATE `categoriebenef` SET desingation=? WHERE id='$id' ");
    $resultat=$insert->execute([$desingation]);

    if($resultat==true)
    {
        $_SESSION['sms']=" Modification réussie";
        header("location:../../views/catmebre.php");
    }
    else
    {
        $_SESSION['sms']=" Echec de modification ";
        header("location:../../views/catmembre.php");
    }
}
else
{
    header("location:../../views/catmembre.php"); 
}
?>
