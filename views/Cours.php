<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options</title>
    <?php require_once('style.php') ?>
</head>

<body>
    <div id="app">
        <?php
        require_once('Active.php');
        $ActiveCours = 1;
        require_once('aside1.php');
        ?>
        <div id="main">
            <?php require_once('navbar.php') ?>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h4>Cours</h4>
                    </div>
                    <!-- pour afficher les massage  -->
                    <div class="alert-info alert text-center">Message</div>
                    <!-- Le form qui enregistrer les données  -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <form action="" class="shadow p-3">
                            <h5 class="text-center">Ajouter un cours</h5>
                            <div class="row">
                                <div class="col-12 p-3">
                                    <label for="">Description <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" placeholder="Entrez la description">
                                </div>
                                <div class="col-12 p-3">
                                    <label for="">Maxima <span class="text-danger">*</span></label>
                                    <input required type="number" class="form-control" placeholder="Entrez la description">
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
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Description</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Description</td>
                                    <td>Description</td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="#" class="btn btn-danger btn-sm mt-1">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Sainte_Croix</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="wa.me:0997019883">Glad</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php require_once('script.php') ?>
</body>

</html>