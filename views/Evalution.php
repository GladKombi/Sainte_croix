<?php
# Se connecter à la BD
include '../connexion/connexion.php';
require_once("../models/select/Select-Evaluation.php"); //Appel du script de selection

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation</title>
    <?php require_once('style.php') ?>
</head>

<body>
    <div id="app">
        <?php
        require_once('Active.php');
        $$ActiveEvaluation = 1;
        require_once('aside1.php');
        ?>
        <div id="main">
            <?php require_once('navbar.php') ?>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h4>Les évaluations</h4>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- pour afficher les massage  -->
                                    <?php
                                    if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
                                    ?>
                                        <div class="alert-info alert text-center"><?= $_SESSION['msg'] ?></div>
                                    <?php }
                                    #Cette ligne permet de vider la valeur qui se trouve dans la session message
                                    unset($_SESSION['msg']);

                                    if (isset($_GET['AjoutPaiement']) || isset($_GET['idPaiement'])) {
                                    ?>
                                        <div class="col-xl-12 ">
                                            <form action="<?= $url ?>" class="shadow p-3" method="POST" enctype="multipart/form-data">
                                                <h5 class="text-center"><?= $title ?></h5>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                                        <label for="">affectation <span class="text-danger">*</span></label>
                                                        <select required name="affectation" id="" class="form-select">
                                                            <?php
                                                            $rep = $connexion->prepare("SELECT affectation.*,enseignants.nom,enseignants.postnom,enseignants.tel,cours.nomcours FROM `affectation`,enseignants,cours WHERE affectation.enseignant=enseignants.id AND affectation.cours=cours.id AND affectation.supprimer=?;");
                                                            $rep->execute([0]);
                                                            $Affectation = "";
                                                            while ($idAffect = $rep->fetch()) {
                                                                $eleve = $tab['options'];
                                                                if (isset($_GET['idEval'])) {
                                                            ?>
                                                                    <option <?php if ($idAffect['id'] == $eleve) { ?> Selected <?php } ?> value="<?php echo $idAffect['id']; ?>">
                                                                        <?php echo  $idAffect['nom'] . " " . $idAffect["postnom"] . " " . $idAffect["tel"] . " " . $idAffect["nomcours"]; ?>
                                                                    </option>
                                                                <?php } else {
                                                                ?>
                                                                    <option value="<?php echo $idAffect['id']; ?>">
                                                                        <?php echo $idAffect['id'] . " " . $idAffect['nom'] . " " . $idAffect["postnom"] . " " . $idAffect["tel"] . " " . $idAffect["nomcours"]; ?>
                                                                    </option>
                                                            <?php }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 p-3">
                                                        <label for="">Promotion <span class="text-danger">*</span></label>
                                                        <select required name="promotion" id="" class="form-select">
                                                            <?php
                                                            $rep = $connexion->prepare("SELECT `promotion`.*, classe.nomclasse,`option`.Description, anneescolaire.libelle,anneescolaire.libelle2 FROM `promotion`,classe,`option`,anneescolaire WHERE promotion.classe=classe.id AND classe.options=`option`.`id`AND promotion.anneeSco=anneescolaire.id;");
                                                            $rep->execute();
                                                            $Orientation = "";
                                                            while ($Option = $rep->fetch()) {
                                                                $Orientation = $tab['id'];
                                                                if (isset($_GET['idPromotion'])) {
                                                            ?>
                                                                    <option <?php if ($Option['id'] == $Orientation) { ?> Selected <?php } ?> value="<?php echo $Option['id']; ?>">
                                                                        <?php echo  $Option['nomclasse'] . " " . $Option['Description'] . " " . $Option['libelle'] . "-" . $Option['libelle2']; ?>
                                                                    </option>
                                                                <?php } else {
                                                                ?>
                                                                    <option value="<?php echo $Option['id']; ?>">
                                                                        <?php echo  $Option['nomclasse'] . " " . $Option['Description'] . " " . $Option['libelle'] . "-" . $Option['libelle2']; ?>
                                                                    </option>
                                                            <?php }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                                        <label for="">Montant <span class="text-danger">*</span></label>
                                                        <input required type="text" name="montant" class="form-control" placeholder="Entrez le nom" <?php if (isset($_GET['idEnseignant'])) { ?>
                                                            value="<?php echo $tab['nom']; ?> <?php } ?>">
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                                                        <input type="submit" class="btn btn-success w-100" name="Valider" value="<?= $btn ?>">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-xl-12 mb-3 ">
                                            <a href="Evalution.php?AjoutPaiement" class="btn btn-success w-100">Nouvelle Evaluation</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="table-responsive">
                            <h4 class="text-center">
                                Liste des evaluations
                            </h4>
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Promotion</th>
                                        <th>Cours</th>
                                        <th>Maxima</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 0;
                                    while ($idEval = $getData->fetch()) {
                                        $n++;
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $n; ?></th>
                                            <td> <?= $idEval["nomclasse"] . " " . $idEval["Description"] ?></td>
                                            <td> <?= $idEval["nomcours"] ?></td>
                                            <td> <?= $idEval["montant"] ?></td>
                                            <td>
                                                <a href='Cotation.php?idEval=<?= $idEval['id'] ?>' class="btn btn-sm btn-success">
                                                    Evaluer
                                                </a>
                                                <!-- <a href='classe.php?idEval=<?= $idEval['id'] ?>' class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="../models/delete/del-boutique-post.php?idSupcat=<?= $idEval['id'] ?>" class="btn btn-danger btn-sm mt-1">
                                                <i class="bi bi-trash"></i>
                                            </a> -->
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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