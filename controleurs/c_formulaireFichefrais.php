<?php

$lesFraisHorsForfait = $pdo->getAfficheFrais($idvisiteur);
require 'vues/v_formulaireFicheFrais.php';

switch ($action) {
    case 'valider':
        include 'vues/v_notedefrais.php';
         break;
}
