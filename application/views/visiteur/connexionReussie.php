<h2>Connexion réussie !</h2>
<?php echo '<p>Bienvenue '.$this->session->Nom.' '.$this->session->Prenom.' !</p>';?>
<?php
echo anchor('visiteur/listerLesProduits','Retour à la liste des produits');
?>