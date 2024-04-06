<?php
include("../connexion/connexion.php");
require_once("../models/select/select-prestation.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Comptes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require_once('style.php'); ?>

</head>

<body>
 
    <!-- Appel de menues  -->
    <?php require_once('aside.php') ?>

<main id="main" class="main">
    <div class="row">
    <div class="col-12">
            <h4><?=$titre?></h4>
        </div>
        <!-- pour afficher les massage  -->
        <?php
            if(isset($_SESSION['sms']) && !empty($_SESSION['sms']))
            {
            ?>
                <div class="alert-info alert text-center"><?=$_SESSION['sms']?></div>
            <?php  
            }
            unset($_SESSION['sms']);
        ?>
        <!-- Le form qui enregistrer les données  -->
        <div class="col-xl-4 col-lg-4 col-md-6">
            <form action="<?=$url?>" class="shadow p-3" method="POST">
                    <div class="row">
                        <div class="col-12 p-3">
                            <label for="">Periode <span class="text-danger">*</span></label>
                            <input autocomplete="off" required type="text" class="form-control"
                                placeholder="Ex: ANNUELLE" name="periode"
                                <?php if (isset($_GET['idpres'])) { ?>
                                value="<?php echo $donne['periode']; ?> <?php }?>">
                        </div>
                        
                        <div class="col-12 p-3">
                        <label for="">Montant à Payer<span class="text-danger">*</span></label>
                        <input autocomplete="off" required type="text" class="form-control"
                                placeholder="Ex: 20$" name="montantpayer"
                                <?php if (isset($_GET['idpres'])) { ?>
                                value="<?php echo $donne['montantpayer']; ?> <?php }?>">
                        </div>
                        <div class="col-12 p-3 ">
                        <input type="submit" class="btn btn-dark w-100" name="enregistrer" value="<?=$btn?>">
                        </div>
                    </div>
                </form>
            </div>
            <!-- La table qui affiche les données  -->
            <div class="col-xl-8 col-lg-8 col-md-6 table-responsive px-3">
                <table class="table table-sm text-center shadow">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Periode</th>
                            <th>Montant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $n=0;
                            while($tab=$getepres->fetch()){
                                $n++;
                            
                            ?> <tr>
                            <th><?=$n;?></th>
                            <td><?=$tab['periode']?></td>
                            <td><?=$tab['montantpayer']?></td>
                            <td>
                                <a href="prestation.php?idpres=<?=$tab['id']?>" class="btn btn-dark btn-sm ">
                                <i class="bi bi-pencil-square"></i>
                                <a onclick= "return confirm('Voulez-vous vraiment supprimer ces données?')">
                                <a href="../models/delete/del-prestation.php?idsup=<?=$tab['id']?>" class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                                <a href="" class="btn btn-dark btn-sm"><i class="bi bi-bag-check-fill"></i></a>
                            </td>
                            </tr>
                            <?php
                                }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main><!-- End #main -->
    <?php require_once('script.php') ?>

</body>

</html>