<?php
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'choixVM':

        $lesVisiteurs = $pdo->getLesVisiteursVA();
        $lesMois = $pdo->getLesMoisVA();
        $lesClesM = array_keys($lesMois);
        $moisASelectionner = $lesClesM[0];
        $lesClesV = array_keys($lesVisiteurs);
        $visiteurASelectionner = $lesClesV[0];
        include 'vues/v_suiviPaiement.php';
        break;
    case 'afficherFrais':
        $idVisiteur = filter_input(INPUT_POST,'lstVisiteurs',FILTER_SANITIZE_STRING);
        $leMois = filter_input(INPUT_POST,'lstMois',FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getLesVisiteursVA();
        $lesMois = $pdo->getLesMoisVA();
        $visiteurASelectionner = $idVisiteur;
        $moisASelectionner = $leMois;
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $lesFraisForfait= $pdo-> getLesFraisForfait($idVisiteur, $leMois);
        $lesFraisHorsForfait= $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
        include 'vues/v_etatFrais.php';
        include 'vues/v_miseEnPaiement.php';
        break;
    case 'paiement':
        $idVisiteur = filter_input(INPUT_POST,'lstVisiteurs',FILTER_SANITIZE_STRING);
        $leMois = filter_input(INPUT_POST,'lstMois',FILTER_SANITIZE_STRING);
        $etat= 'RB';
        $pdo->majEtatFicheFrais($idVisiteur, $leMois, $etat);
        echo 'La fiche a bien été rembourssée';
        break;
   
}