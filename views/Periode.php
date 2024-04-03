<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Periode</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require_once('style.php') ?>
</head>

<body>

    <!-- Appel de menues  -->
    <?php
    require_once('Active.php');
    $ActivePeriode = 1;
    require_once('aside1.php');
    ?>
    <main id="main" class="main">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">Periodes</h4>
            </div>
            <!-- pour afficher les massage  -->
            <div class="alert-info alert text-center">Message</div>
            <!-- Le form qui enregistrer les données  -->
            <div class="col-xl-4 col-lg-4 col-md-6">
                <form action="" class="shadow p-3">
                    <h5 class="text-center">Ajouter une periode</h5>
                    <div class="row">
                        <div class="col-12 p-3">
                            <label for="">Description <span class="text-danger">*</span></label>
                            <input required type="textarea" class="form-control" placeholder="Entrez la description">
                        </div>
                        <div class="col-12 p-3">
                            <input type="submit" class="btn btn-success w-100" value="Enregistrer">
                        </div>
                    </div>
                </form>
            </div>
            <!-- La table qui affiche les données  -->
            <div class="col-xl-8 col-lg-8 col-md-6 table-responsive px-3 pt-3">
                <table class="table table-sm text-center shadow">
                    <h4 class="text-center">Liste des periodes</h4>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>date</td>
                            <td>Description</td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="#" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main><!-- End #main -->

    <?php require_once('script.php') ?>

</body>

</html>