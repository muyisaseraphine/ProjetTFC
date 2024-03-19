<?php
if(isset($_GET['idcatcmpt']))
{
    $id=$_GET['idcatcmpt'];
    $getecatcmptmod=$connexion->prepare("SELECT * FROM `categoriecompte` WHERE id=?");
    $getecatcmptmod->execute([$id]);
    $donne=$getecatcmptmod->fetch();
    
    $url="../models/update/up-catcompte.php?idcatcmpt=$id";
    $btn="Modifier";
    $titre="Modifier la catégorie de Compte";
}
else
{
    $url="../models/add/add-catcompte.php";
    $btn="Ajouter";
    $titre="Ajouter la catégorie de Compte";
}
if(isset($_GET['search']) && !empty($_GET['search']))
{
    $search=$_GET['search'];
    $getecat=$connexion->prepare("SELECT * FROM `categoriecompte` WHERE supprimer=? and desingation LIKE?");
    $getecat->execute([0,"%".$search."%"]);
}
else
{
    $getecat=$connexion->prepare("SELECT * FROM `categoriecompte` WHERE supprimer=?");
    $getecat->execute([0]);
}
?>