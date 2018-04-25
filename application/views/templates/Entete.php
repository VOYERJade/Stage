<html>

    <head>
       <title>Blog simple</title>
    </head>

    <body>

    <?php if (!is_null($this->session->identifiant)) : ?>
       <?php echo 'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?>
        <a href="<?php echo site_url('visiteur/PageAccueil') ?>">Accueil</a>&nbsp;&nbsp;
        <a href="<?php echo site_url('visiteur/ListerLesProduits') ?>">Catalogue</a>&nbsp;&nbsp;
        <a href="<?php echo site_url('visiteur/Panier') ?>">Panier</a>&nbsp;&nbsp;
        <a href="<?php echo site_url('visiteur/Compte') ?>">Compte</a>&nbsp;&nbsp;
        <a href="<?php echo site_url('visiteur/seDeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;
        <?php if ($this->session->statut==1) : ?>
          <a href="<?php echo site_url('administrateur/ajouterUnProduit') ?>">Ajouter un Produit</a>&nbsp;&nbsp;
       <?php endif; ?>
    <?php else : ?>
    <a href="<?php echo site_url('visiteur/PageAccueil') ?>">Accueil</a>&nbsp;&nbsp;
    <?php endif; ?>
      <a href="<?php echo site_url('visiteur/listerLesArticles') ?>">Catalogue</a>&nbsp;&nbsp;
      <a href="<?php echo site_url('visiteur/Panier') ?>">Panier</a>&nbsp;&nbsp;
      <a href="<?php echo site_url('visiteur/listerLesArticlesAvecPagination') ?>">Lister les Articles (par 3)</a>&nbsp;&nbsp;
      <a href="<?php echo site_url('visiteur/inscription') ?>">S'inscire</a>&nbsp;&nbsp;
      <a href="<?php echo site_url('visiteur/seConnecter') ?>">Se Connecter</a>&nbsp;&nbsp;
  </body>
</html>
