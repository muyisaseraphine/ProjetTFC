<?php
if(isset($_GET['idstru']))
{
    $id=$_GET['idstru'];
    $getestru=$connexion->prepare("SELECT * FROM `structure` WHERE id=?");
    $getestru->execute([$id]);
    $donne=$getestru->fetch();
    
    $url="../models/update/up-structure.php?idstru=$id";
    $btn="Modifier";
    $titre="Modifier la structure";
}
else
{
    $url="../models/add/add-structure.php";
    $btn="Ajouter";
    $titre="Ajouter la structure";
}
if(isset($_GET['search']) && !empty($_GET['search']))
{
    $search=$_GET['search'];
    $getecat=$connexion->prepare("SELECT * FROM `structure` WHERE supprimer=? and description LIKE?");
    $getecat->execute([0,"%".$search."%"]);
}
else
{
    $getecat=$connexion->prepare("SELECT * FROM `structure` WHERE supprimer=?");
    $getecat->execute([0]);
}
?>