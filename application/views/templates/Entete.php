<html>

    <head>
       <title>Neko</title>

       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    </head>

    <body>

      <?php if (!is_null($this->session->identifiant)) : ?>
      <?php echo 'Utilisateur connecté : <B>'.$this->session->$identifiant.'</B>&nbsp;&nbsp;';?>

    <nav class="navbar navbar-inverse">
      
      <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Logo</a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?php echo site_url('visiteur/PageAccueil') ?>">Home</a></li>
          <li><a href="<?php echo site_url('visiteur/listerLesProduits') ?>">Catalogue</a></li>
          <li><a href="<?php echo site_url('visiteur/Panier') ?>">Panier</a></li>
          <li><a href="<?php echo site_url('visiteur/Compte') ?>">Compte</a></li>
          <li><a href="<?php echo site_url('visiteur/seDeConnecter') ?>">Se déconnecter</a></li>

          <?php if ($this->session->statut==1) : ?>
            <a href="<?php echo site_url('administrateur/ajouterUnProduit') ?>">Ajouter un Produit</a>&nbsp;&nbsp;
          <?php endif; ?>

        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>

      </div>
      </div>
    </nav>

    <?php endif; ?>

    <?php if (is_null($this->session->identifiant)) : ?>
    

    <nav class="navbar navbar-inverse">

      <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>

        <!-- VOIR POUR FAIRE L'AFFICHAGE DE LA PHOTO DU LOGO DANS LA BARRE DE NAVIGATION !!!! -->

        <img('images/Logo_Neko.jpg')/>;
        
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          
          <li class="active"><a href="<?php echo site_url('visiteur/PageAccueil') ?>">Home</a></li>
          <li><a href="<?php echo site_url('visiteur/catalogue') ?>">Catalogue</a></li>
          <li><a href="<?php echo site_url('visiteur/Panier') ?>">Panier</a></li>
          <li><a href="<?php echo site_url('visiteur/insertionClient') ?>">S'inscire</a></li>
          <li><a href="<?php echo site_url('visiteur/seConnecter') ?>">Se Connecter</a></li>

          <?php if ($this->session->statut==1) : ?>
            <a href="<?php echo site_url('administrateur/ajouterUnProduit') ?>">Ajouter un Produit</a>&nbsp;&nbsp;
          <?php endif; ?>

        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>

      </div>
      </div>
    </nav>

    <?php endif; ?>
