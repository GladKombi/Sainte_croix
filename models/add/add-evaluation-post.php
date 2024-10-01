<?php
include('../../connexion/connexion.php');
if (isset($_POST['Valider'])) {
    $affectation = htmlspecialchars($_POST['affectation']);
    $promotion = htmlspecialchars($_POST['promotion']);
    $montant = htmlspecialchars($_POST['montant']);
    $statut=0;
    if (is_numeric($montant)) {
        #Insertion data from database
        $req = $connexion->prepare("INSERT INTO `evaluation`(`affectation`, `promotion`, `montant`, `statut`) VALUES (?,?,?,?)");
        $resultat = $req->execute([ $affectation, $promotion, $montant, $statut]);
        if ($resultat == true) {
            $_SESSION['msg'] = "Un Enregistrement viens d'etre effectué !";
            header("location:../../views/Evalution.php");
        } else {
            $_SESSION['msg'] = "Echec d'enregistrement !";
            header("location:../../views/Evalution.php");
        }
    } else {
        $_SESSION['msg'] = "Veillez saisir un montant valide !";
        header("location:../../views/Evalution.php");
    }
} else {
    header('location:../../views/Evalution.php');
}
