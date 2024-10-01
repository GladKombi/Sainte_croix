<?php
include('../../connexion/connexion.php');
if (isset($_POST['Valider'])) {
    $eleve = htmlspecialchars($_POST['eleve']);
    $point = htmlspecialchars($_POST['point']);
    $evaluation = htmlspecialchars($_POST['evaluation']);
    $statut=0;
    if (is_numeric($point)) {
        #Insertion data from database
        $req = $connexion->prepare("INSERT INTO `cote`(`eleve`, `cote`, `evaluation`, `statut`) VALUES (?,?,?,?)");
        $resultat = $req->execute([ $eleve, $point, $evaluation, $statut]);
        if ($resultat == true) {
            $_SESSION['msg'] = "Un Enregistrement viens d'etre effectué !";
            header("location:../../views/Cotation.php");
        } else {
            $_SESSION['msg'] = "Echec d'enregistrement !";
            header("location:../../views/Cotation.php");
        }
    } else {
        $_SESSION['msg'] = "Les points doivent etre un nombre!";
        header("location:../../views/Cotation.php");
    }
} else {
    header('location:../../views/Cotation.php');
}
