<?php
    if (isset($_GET['idEvaluation'])){
        $id=$_GET['idEvaluation'];
        $getDataMod=$connexion->prepare("SELECT * FROM `evaluation` WHERE id=?");
        $getDataMod->execute([$id]);
        $tab=$getDataMod->fetch();
        
        $url="../models/updat/up-evaluation-post.php?idEvaluation=".$id;
        $btn="Modifier";
        $title="Modifier Evaluaition";
    }
    else{
        $url="../models/add/add-evaluation-post.php";
        $btn="Enregistrer";
        $title="Enregistrer une nouvelle evaluation ";
    }
    /**
     * Le code qui permet d'afficher les client, lors de l'affichage simple, et lors de la recherche
     */
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        $getData=$connexion->prepare("SELECT * from client WHERE supprimer=0 AND client.nom LIKE ? OR client.postnom LIKE ? OR 
        client.prenom LIKE ? OR client.genre LIKE ? OR client.adresse LIKE ? OR client.telephone LIKE ?");
        $getData->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%","%".$search."%"]);
    }
    else{
        $statut=0;
        $getData=$connexion->prepare("SELECT evaluation.*,enseignants.nom,enseignants.postnom,enseignants.tel,cours.nomcours, classe.nomclasse,`option`.Description, anneescolaire.libelle,anneescolaire.libelle2 FROM evaluation,`affectation`,enseignants,cours,`promotion`,classe,`option`,anneescolaire WHERE affectation.enseignant=enseignants.id AND affectation.cours=cours.id and promotion.classe=classe.id AND classe.options=`option`.`id`AND promotion.anneeSco=anneescolaire.id AND evaluation.affectation=affectation.id AND evaluation.promotion=promotion.id and evaluation.statut=?;");
        $getData->execute([$statut]);
    }