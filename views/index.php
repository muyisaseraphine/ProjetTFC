<?php
include '../connexion/connexion.php';
if (isset($_GET["idperio"])) {
    $id=$_GET["idperio"];
    $req = $connexion->prepare("SELECT * FROM `anneeprestation` WHERE id=?");
    $req->execute(array($id));
    $select=$req->fetch();
    $action="../models/update/up-prestation.php?idperio=$id";
    $titre= "Modification de la période de prestation";
    $bouton="Modifier";
}
else{
    $action="../models/add/add-prestation.php";
    $titre= "Ajout de la période de prestation";
    $bouton="Enregistrer"; 
}
?>

<!doctype html>
<html class="no-js" lang="">

<?php require_once ('style.php') ?>

<body>
    <?php require_once ('aside.php') ?>

    <div class="breadcomb-area">
        <div class="container">
            <?php
            if (isset($_SESSION["smg"])) { ?>
                <div class="alert-success alert text-center text-light">
                    <?= $_SESSION["smg"] ?>
                </div>
                <?php unset($_SESSION["smg"]);
            }
            ?>
            <form action="<?=$action?>" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap mg-t-30">
                            <div class="cmp-tb-hd cmp-int-hd">
                                <h4><?=$titre?></h4>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Paquet</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm"
                                                    placeholder="Entrer le montant à payer" name="paquet"
                                                     <?php if(isset($_GET["idperio"])) {?>value="<?=$select["paquet"];?>"<?php }?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Part Musosa</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm"
                                                    placeholder="Pourcentage Musosa" name="pourcentage" 
                                                    <?php if(isset($_GET["idperio"])) {?>value="<?=$select["pourcentage"];?>"<?php }?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int mg-t-15">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <button class="btn btn-success notika-btn-success"
                                            name="valider"><?=$bouton?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Affichage de données</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th>Periode</th>
                                        <th>Paquet</th>
                                        <th>Part Musosa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 0;
                                    $req = $connexion->prepare("SELECT * FROM `anneeprestation`");
                                    $req->execute();
                                    while ($periode = $req->fetch()) {
                                        $n++;
                                        ?>
                                        <tr>
                                            <td> <?= $n; ?></td>
                                            <td><?= $periode["annee"] ?></td>
                                            <td><?= $periode["paquet"] ?></td>
                                            <td><?= $periode["pourcentage"] ?></td>
                                            <td>
                                                <a href='index.php?idperio=<?= $periode['id'] ?>'
                                                    class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
                                                    <i class="notika-icon notika-next"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php require_once ('script.php') ?>
</body>

</html>