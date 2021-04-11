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
        $lesVisiteurs = $pdo->getLesVisiteursVA();
        $lesMois = $pdo->getLesMoisVA();
        $moisASelectionner = $lesClesM[0];
        include 'vues/v_etatFrais.php';
        break;
   
}