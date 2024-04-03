<?php
include('../../connexion/connexion.php');
#modification
if (isset($_POST['Valider']) && !empty($_GET['idCours'])) {
    $id = $_GET['idCours'];
    $description = htmlspecialchars($_POST['description']);
    $maxima = htmlspecialchars($_POST['maxima']);
    if (!empty($description)) {
        #verifier si le client existe ou pas dans la bd
        $statut = 0;
        $getCours = $connexion->prepare("SELECT * FROM `cours` WHERE `intituler`=? AND statut=?");
        $getCours->execute([$description, $statut]);
        ($Cours = $getCours->fetch());
        if ($Cours > 0) {
            $msg = 'Cette Cours de frais existe déjà dans la base de données !';
            $_SESSION['msg'] = $msg;
            header("location:../../views/Cours.php");
        } else {
            $req = $connexion->prepare("UPDATE `cours` SET `intituler`=?, `maxima`=?   WHERE id=?");
            $resultat = $req->execute([$description, $maxima, $id]);
            if ($resultat == true) {
                $_SESSION['msg'] = "La modification réussi";
                header("location:../../views/Cours.php");
            } else {
                $_SESSION['msg'] = "Echec de la modification";
                header("location:../../views/Cours.php");
            }
        }
    }
} else {
    header("location:../../views/Cours.php");
}
