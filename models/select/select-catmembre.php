<?php
if(isset($_GET['idcatben']))
{
    $id=$_GET['idcatben'];
    $getecatbenmod=$connexion->prepare("SELECT * FROM `categoriebenef` WHERE id=?");
    $getecatbentmod->execute([$id]);
    $donne=$getecatbenmod->fetch();
    
    $url="../models/update/up-catcompte.php?idcatben=$id";
    $btn="Modifier";
    $titre="Modifier la catégorie de Beneficaire";
}
else
{
    $url="../models/add/add-catcompte.php";
    $btn="Ajouter";
    $titre="Ajouter la catégorie de Beneficaire";
}
if(isset($_GET['search']) && !empty($_GET['search']))
{
    $search=$_GET['search'];
    $getecat=$connexion->prepare("SELECT * FROM `categoriebenef` WHERE supprimer=? and desingation LIKE?");
    $getecat->execute([0,"%".$search."%"]);
}
else
{
    $getecat=$connexion->prepare("SELECT * FROM `categoriebenef` WHERE supprimer=?");
    $getecat->execute([0]);
}
?>