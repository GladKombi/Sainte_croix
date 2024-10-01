<?php
# Se connecter à la BD
if(isset($_GET['idEval'])){
    $idEval=$_GET['idEval'];
    # Selection evaluation
    $statut=0;
        $getData=$connexion->prepare("SELECT evaluation.*,enseignants.nom,enseignants.postnom,enseignants.tel,cours.nomcours, classe.nomclasse,`option`.Description, anneescolaire.libelle,anneescolaire.libelle2, promotion.id as idProm FROM evaluation,`affectation`,enseignants,cours,`promotion`,classe,`option`,anneescolaire WHERE affectation.enseignant=enseignants.id AND affectation.cours=cours.id and promotion.classe=classe.id AND classe.options=`option`.`id`AND promotion.anneeSco=anneescolaire.id AND evaluation.affectation=affectation.id AND evaluation.promotion=promotion.id and evaluation.statut=? and evaluation.id=?;");
        $getData->execute([$statut,$idEval]);
}