<!DOCTYPE html>

<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>

<div class="container-fluid text-center"> 
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="<?php echo site_url('visiteur/listerLesProduits') ?>">Lister tous les produits</a></p>
            <p><a href="#">Livres</a></p>
            <p><a href="#">Figurines</a></p>
            <p><a href="#">Posters</a></p>
        </div>
    </div>
</div>

<div class ="row">
<?php 
foreach ($lesProduits As $unProduit):
    echo '<div class="col-sm-4 ">';
    echo '<p>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],img($unProduit['NOMIMAGE'])).'</p>';
    echo '<h5>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h5>';
endforeach 
?>
</div>
