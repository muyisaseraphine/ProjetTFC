<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Fosa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require_once('style.php'); ?>

</head>

<body>

    <!-- Appel de menues  -->
    <?php require_once ('aside.php') ?>

<div id="colorlib-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Fosa</h4>
            </div>
            <!-- pour afficher les massage  -->
           
            <div class="col-xl-12 col-lg-12 col-md-6">
                <p class="  alert-info alert text-center ">
                    Message
                </p>

            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <form action="" class="shadow p-3">
                    <div class="row">
                        <div class="col-12 p-3">
                            <label for="">Designation <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" placeholder="Entrez la description">
                        </div>
                        <div class="col-12 p-3 ">
                            <input type="submit" class="btn btn-dark w-100" value="Enregistrer">
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
                            <th>Designation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <th>1</th>
                        <td>Donnee</td>
                        <td>Donnee</td>
                        <td>
                            <a href="" class="btn btn-dark btn-sm "><i class="bi bi-pencil-square"></i></a>
                            <a href="" class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
</div>
    <?php require_once('script.php') ?>

</body>

</html>