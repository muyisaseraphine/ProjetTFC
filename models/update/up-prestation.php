<?php
include("../../connexion/connexion.php");
if(isset($_POST['enregistrer']) && !empty($_GET['idpres']))
{
    $id=$_GET['idpres'];
    $periode=htmlspecialchars($_POST['periode']);
    $montantpayer=htmlspecialchars($_POST['montantpayer']);
    if(is_numeric($montantpayer)){
    $insert=$connexion->prepare("UPDATE `periodeprestation` SET periode=?, montantpayer=? WHERE id='$id' ");
    $resultat=$insert->execute([$periode,$montantpayer]);
    if($resultat==true){
        $_SESSION['sms']= "La modification réussie";//Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
        header("location:../../views/prestation.php");
      }
    }else{
      $_SESSION['sms']="Le montant à payer ne doit pas être une chaîne de caractère";
      header("location:../../views/prestation.php");
    }
    }else{
      //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à modifier
      header("location:../../views/prestation.php");
    }
?>
