<?php
include_once ("../../connexion/connexion.php");
if (isset($_POST["valider"])) {
    $desingation = htmlspecialchars($_POST["desingation"]);
    $req = $connexion->prepare("INSERT INTO `coorporation`(`desingation`) VALUES (?)");
    $req->execute(array($desingation));
    if ($req) {
        $_SESSION["smg"] = "Enregistrement reussi";
        header("location:../../views/coorporation.php");
    } else {
        $_SESSION["smg"] = "Echec d'enregistrement";
        header("location:../../views/coorporation.php");
    }
}
?>