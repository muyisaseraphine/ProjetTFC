<?php
include("../../connexion/connexion.php");
if(isset($_POST['enregistrer']) && !empty($_GET['idstru']))
{
    $id=$_GET['idstru'];
    $description=htmlspecialchars($_POST['description']);
    $insert=$connexion->prepare("UPDATE `structure` SET description=? WHERE id='$id' ");
    $resultat=$insert->execute([$description]);

    if($resultat==true)
    {
        $_SESSION['sms']=" Modification réussie";
        header("location:../../views/structure.php");
    }
    else
    {
        $_SESSION['sms']=" Echec de modification ";
        header("location:../../views/structure.php");
    }
}
else
{
    header("location:../../views/structure.php"); 
}
?>
