<?php
include_once ("../../connexion/connexion.php");
if (isset($_POST["valider"])) {
    $id = $_GET["idperio"];
    $paquet = htmlspecialchars($_POST["paquet"]);
    $pourcentage = htmlspecialchars($_POST["pourcentage"]);
    if (is_numeric($paquet) && is_numeric($pourcentage)) {
        $req = $connexion->prepare("UPDATE `anneeprestation` SET `paquet`=?,`pourcentage`=? WHERE id=?");
        $req->execute(array($paquet, $pourcentage, $id));
        if ($req) {
            $_SESSION["smg"] = "Enregistrement reussi";
            header("location:../../views/index.php");
        } else {
            $_SESSION["smg"] = "Echec d'enregistrement";
            header("location:../../views/index.php");
        }   
    }
}
?>