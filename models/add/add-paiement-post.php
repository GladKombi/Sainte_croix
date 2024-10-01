<?php
include('../../connexion/connexion.php');
if (isset($_POST['Valider'])) {
    $date = date("Y-m-d");
    $description = htmlspecialchars($_POST['description']);
    $eleve = htmlspecialchars($_POST['eleve']);
    $frais = htmlspecialchars($_POST['frais']);
    $montant = htmlspecialchars($_POST['montant']);
    if (is_numeric($montant)) {
        #verifier si le client existe ou pas dans la bd
        $statut = 0;
        $getMontant = $connexion->prepare("SELECT * FROM `frais` WHERE id=? AND statut=?");
        $getMontant->execute([$frais, $statut]);
        ($FraiMontantant = $getMontant->fetch());
        $FraiMont = $FraiMontantant['Montant'];
        if ($montant > $FraiMont) {
            $msg = 'Le montant que vou avez saisi est superieur !';
            $_SESSION['msg'] = $msg;
            header("location:../../views/payement.php");
        } else {
            //Insertion data from database
            $req = $connexion->prepare("INSERT INTO `paiement`(`date`, `description`, `frais`, `montant`, `statut`) VALUES (?,?,?,?,?)");
            $resultat = $req->execute([$date, $description, $frais, $montant, $statut]);
            if ($resultat == true) {
                $_SESSION['msg'] = "Un Enregistrement viens d'etre effectué !";
                header("location:../../views/payement.php");
            } else {
                $_SESSION['msg'] = "Echec d'enregistrement !";
                header("location:../../views/payement.php");
            }
        }
    } else {
        $_SESSION['msg'] = "Veillez saisir un montant valide !";
        header("location:../../views/payement.php");
    }
} else {
    header('location:../../views/payement.php');
}
