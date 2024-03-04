<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Services</title>
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
                <h4>services</h4>
            </div>
            <!-- pour afficher les massage  -->
            <div class="alert-info alert text-center">Message</div>
            <!-- Le form qui enregistrer les données  -->
            <div class="col-xl-12 ">
                <form action="" class="shadow p-3">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Description <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" placeholder="Entrez la description">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Plafond<span class="text-danger">*</span></label>
                            <select required name="" id="" class="form-select">
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                        <label for="">Part de la Musosa <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" placeholder="Entrez la description">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 mt-4 col-sm-6 p-3 ">
                            <input type="submit" class="btn btn-dark w-100" value="Enregistrer">
                        </div>
                    </div>
                </form>
            </div>
            <!-- La table qui affiche les données  -->
            <div class="col-xl-12 table-responsive px-3 mt-3">
                <table class="table table-sm text-center shadow">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Service</th>
                            <th>Plafond</th>
                            <th>PartMusosa</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <th>1</th>
                        <td>Donnee</td>
                        <td>Donnee</td>
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
    </main><!-- End #main -->
    <?php require_once('script.php') ?>

</body>

</html>