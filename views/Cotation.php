<?php
# Se connecter à la BD
include '../connexion/connexion.php';
require_once("../models/select/Select-cotation.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotation</title>
    <?php require_once('style.php') ?>
</head>

<body>
    <div id="app">
        <?php
        require_once('Active.php');
        $ActiveCotations = 1;
        require_once('aside1.php');
        ?>
        <div id="main">
            <?php require_once('navbar.php') ?>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center">Enregistrement des cotes</h4>
                    </div>
                    <!-- pour afficher les massage  -->
                    <?php
                    if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
                    ?>
                        <div class="alert-info alert text-center"><?= $_SESSION['msg'] ?></div>
                    <?php }
                    #Cette ligne permet de vider la valeur qui se trouve dans la session message
                    unset($_SESSION['msg']);


                    ?>
                    <?php
                    if(isset($_GET['idEval'])){
                      $n = 0;
                    while ($idEval = $getData->fetch()) {
                        $promotion = $idEval['idProm'];
                    ?>
                        <div class="col-xl-12 col-lg-12 col-md-6 ">
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <h5 class="">Classe:<?= $idEval["nomclasse"] . " " . $idEval["Description"] ?></h5>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <h5 class="">Cours:<?= $idEval["nomcours"] ?></h5>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <h5 class="">Tutilaire du cours:<?= $idEval["nom"] . " " . $idEval["postnom"] ?></h5>
                            </div>
                        </div>
                    <?php
                    }  
                    }
                    
                    ?>
                    <div class="col-xl-12 col-lg-12 col-md-6 ">
                        <h4 class="text-center">AJouter une cote</h4>
                        <form action="../models/add/add-cote-post.php" class="shadow p-3" method="POST">                            
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 p-3">
                                    <label for="">Eleve <span class="text-danger">*</span></label>
                                    <select required name="eleve" id="" class="form-select">
                                        <?php
                                        $EleveInsc = $connexion->prepare("SELECT eleve FROM `inscription` WHERE promotion=?");
                                        $EleveInsc->execute([$promotion]);
                                        while ($Ideleve = $EleveInsc->fetch()) {
                                            $matEleve = $Ideleve['eleve'];
                                            $rep = $connexion->prepare("SELECT * from `eleve` WHERE statut=? and matricule =?");
                                            $rep->execute([0, $matEleve]);
                                            $eleve = "";
                                            while ($Ideleve = $rep->fetch()) {
                                                $eleve = $tab['options'];
                                                if (isset($_GET['idClass'])) {
                                        ?>
                                                    <option <?php if ($Ideleve['matricule'] == $eleve) { ?> Selected <?php } ?> value="<?php echo $Ideleve['id']; ?>">
                                                        <?php echo  $Ideleve['matricule'] . " " . $Ideleve['nom'] . " " . $Ideleve['postnom'] . " " . $Ideleve['prenom'] . " " . $Ideleve['numeroParent']; ?>
                                                    </option>
                                                <?php } else {
                                                ?>
                                                    <option value="<?php echo $Ideleve['matricule']; ?>">
                                                        <?php echo  $Ideleve['matricule'] . " " . $Ideleve['nom'] . " " . $Ideleve['postnom'] . " " . $Ideleve['prenom'] . " " . $Ideleve['numeroParent']; ?>
                                                    </option>
                                        <?php }
                                            }
                                        }


                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                    <label for="">Point <span class="text-danger">*</span></label>
                                    <input required type="text" name="point" class="form-control" placeholder="EX:20" <?php if (isset($_GET['idEnseignant'])) { ?>
                                        value="<?php echo $tab['nom']; ?> <?php } ?>">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3" hidden>
                                    <label for="">evaluation <span class="text-danger">*</span></label>
                                    <input required type="text" name="evaluation" class="form-control" placeholder="Entrez le nom"
                                        value="<?php echo $idEval["id"]; ?> ">
                                </div>
                                <div class="col-12 p-3">
                                    <input type="submit" class="btn btn-success w-100" name="Valider" value="Coter">
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- Le form qui enregistrer les données  -->
                    <div class="col-xl-12 col-lg-12 col-md-6 ">
                        <h4 class="text-center">Fiche de cote</h4>
                        <table class="table table-sm text-center shadow">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Noms</th>
                                    <th>Cote</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>
                                        MUHINDO
                                        KOMBI
                                        Glad
                                    </td>
                                    <td> <span class="text-danger bolder">8</span>/20</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-success">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="#" class="btn btn-danger btn-sm">
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