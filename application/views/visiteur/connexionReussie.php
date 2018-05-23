<h2>Connexion réussie !</h2>
<?php echo '<p>Bienvenue '.$this->session->Nom.' '.$this->session->Prenom.' !</p>';?>

<p><a href="<?php echo site_url('visiteur/listerLesArticles') ?>">Retour à la liste des articles</a><p>
<!-- ou echo anchor('visiteur/listerTousLesArticles','Retour à la liste des articles'); -->
