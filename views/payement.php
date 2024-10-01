<?php
# Se connecter à la BD
include '../connexion/connexion.php';
require_once("../models/select/Select-paiement.php"); //Appel du script de selection
if (isset($_GET['idcla'])) {
    $idclasse = $_GET['idcla'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement</title>
    <?php require_once('style.php') ?>
</head>

<body>
    <div id="app">
        <?php
        require_once('Active.php');
        $ActivePayement = 1;
        require_once('aside1.php');
        ?>
        <div id="main">
            <?php require_once('navbar.php') ?>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h4>Organistation des paiement</h4>
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
                                                        <label for="">Description <span class="text-danger">*</span></label>
                                                        <input required type="text" name="description" class="form-control" placeholder="Entrez le nom" <?php if (isset($_GET['idEnseignant'])) { ?>
                                                            value="<?php echo $tab['nom']; ?> <?php } ?>">
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                                        <label for="">Eleves <span class="text-danger">*</span></label>
                                                        <select required name="eleve" id="" class="form-select">
                                                            <?php
                                                            $rep = $connexion->prepare("SELECT * from `eleve` WHERE statut=?");
                                                            $rep->execute([0]);
                                                            $eleve = "";
                                                            while ($Ideleve = $rep->fetch()) {
                                                                $eleve = $tab['options'];
                                                                if (isset($_GET['idClass'])) {
                                                            ?>
                                                                    <option <?php if ($Ideleve['matricule'] == $eleve) { ?> Selected <?php } ?> value="<?php echo $Ideleve['id']; ?>">
                                                                        <?php echo  $Ideleve['nom']; ?>
                                                                    </option>
                                                                <?php } else {
                                                                ?>
                                                                    <option value="<?php echo $Ideleve['matricule']; ?>">
                                                                        <?php echo  $Ideleve['matricule'] . " " . $Ideleve['nom'] . " " . $Ideleve['postnom'] . " " . $Ideleve['prenom'] . " " . $Ideleve['numeroParent']; ?>
                                                                    </option>
                                                            <?php }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                                        <label for="">Frais <span class="text-danger">*</span></label>
                                                        <select required name="frais" id="" class="form-select">
                                                            <?php
                                                            $rep = $connexion->prepare("SELECT frais.*,catfrais.description as Catdescription FROM `frais`,catfrais WHERE frais.categorie=catfrais.id and frais.statut=?");
                                                            $rep->execute([0]);
                                                            $frais = "";
                                                            while ($idFrais = $rep->fetch()) {
                                                                $jour = $tab['id'];
                                                                if (isset($_GET['idPayement'])) {
                                                            ?>
                                                                    <option <?php if ($idFrais['id'] == $jour) { ?> Selected <?php } ?> value="<?php echo $idFrais['id']; ?>">
                                                                        <?php echo  $idFrais['description'] . " " . $idFrais['Catdescription'] . " " . $idFrais['Montant']; ?>
                                                                    </option>
                                                                <?php } else {
                                                                ?>
                                                                    <option value="<?php echo $idFrais['id']; ?>">
                                                                        <?php echo  $idFrais['description'] . " " . $idFrais['Catdescription'] . " " . $idFrais['Montant']; ?>
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
                                            <a href="payement.php?AjoutPaiement" class="btn btn-success w-100">Nouveau paiement</a>
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
                                Liste des paiement en genral
                            </h4>
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Frai</th>
                                        <th>Montant</th>                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $n = 0;
                                while ($idAffectation = $getData->fetch()) {
                                    $n++;
                                ?>
                                    <tr>
                                        <th scope="row"><?= $n; ?></th>
                                        <td> <?= $idAffectation["date"] ?></td>
                                        <td> <?= $idAffectation["description"] ?></td>
                                        <td> <?= $idAffectation["frais"] ?></td>
                                        <td> <?= $idAffectation["montant"] ?></td>
                                        <td>
                                            <a href='Affectation.php?idAffectation=<?= $idAffectation['id'] ?>' class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="../models/delete/del-boutique-post.php?idSupcat=<?= $idAffectation['id'] ?>" class="btn btn-danger btn-sm mt-1">
                                                <i class="bi bi-trash"></i>
                                            </a>
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