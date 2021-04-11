


 <form method="post" 
              action="index.php?uc=suiviPaiement&action=paiement" 
              role="form">
     <input name='lstVisiteurs' type='hidden' value='<?php echo $visiteurASelectionner?>'>
     <input name='lstMois' type='hidden' value='<?php echo $moisASelectionner?>'>
        <button class="btn btn-success" type="submit">Mise en paiement</button>
 </form>