<?php
if(isset($_GET['idpres']))
{
    $id=$_GET['idpres'];
    $getepresmod=$connexion->prepare("SELECT * FROM `periodeprestation` WHERE id=?");
    $getepresmod->execute([$id]);
    $donne=$getepresmod->fetch();
    
    $url="../models/update/up-prestation.php?idpres=$id";
    $btn="Modifier";
    $titre="Modifier la periode de prestation";
}
else
{
    $url="../models/add/add-prestation.php";
    $btn="Ajouter";
    $titre="Ajouter la periode de prestation";
}
if(isset($_GET['search']) && !empty($_GET['search']))
{
    $search=$_GET['search'];
    $getepres=$connexion->prepare("SELECT * FROM `periodeprestation` WHERE supprimer=? and periode LIKE?");
    $getepres->execute([0,"%".$search."%"]);
}
else
{
    $getepres=$connexion->prepare("SELECT * FROM `periodeprestation` WHERE supprimer=?");
    $getepres->execute([0]);
}
?>