<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
-->

<div class="container-fluid text-center"> 
<div class="row content">
<div class="col-sm-2 sidenav">
<h4><p><a href="<?php echo site_url('visiteur/listerLesProduits') ?>">Lister tous les produits</a></p></h4>
<h4><p><a href="#">Livres</a></p></h4>
<h4><p><a href="#">Figurines</a></p></h4>
<h4><p><a href="#">Posters</a></p></h4>
</div>

<div align = "center" class="col-sm-8 sidenav">
<?php foreach ($lesProduits As $unProduit):
echo '<h3>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h3>';
endforeach ?>
<p>Pour avoir afficher le détail d'un article, cliquer sur son titre</p>