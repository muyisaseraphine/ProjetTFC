<?php
include '../connexion/connexion.php';
if (isset($_GET["idcoo"])) {
    $id=$_GET["idcoo"];
    $req = $connexion->prepare("SELECT * FROM `coorporation` WHERE id=?");
    $req->execute(array($id));
    $select=$req->fetch();
    $action="../models/update/up-coorporation.php?idcoo=$id";
    $titre= "Modification de la coorporation";
    $bouton="Modifier";
}
else{
    $action="../models/add/add-coorporation.php";
    $titre= "Ajout de la coorporation";
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
            <form action="<?= $action ?>" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap mg-t-30">
                            <div class="cmp-tb-hd cmp-int-hd">
                                <h4><?= $titre ?></h4>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Designation</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm"
                                                    placeholder="Enter la designation de la coorporation"
                                                    name="desingation"<?php if(isset($_GET["idcoo"])) {?>value="<?=$select["desingation"];?>"<?php }?>>
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
                                            name="valider"><?= $bouton?></button>
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
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 0;
                                    $req = $connexion->prepare("SELECT * FROM `coorporation` where supprimer=0");
                                    $req->execute();
                                    while ($coorpo = $req->fetch()) {
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n; ?></td>
                                            <td><?= $coorpo["desingation"] ?></td>
                                            <td>
                                            <a href='coorporation.php?idcoo=<?= $coorpo['id'] ?>'
                                                    class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
                                                    <i class="notika-icon notika-next"></i>
                                                </a>
                                                <a class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg">
                                                    <i class="notika-icon notika-close"></i>
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