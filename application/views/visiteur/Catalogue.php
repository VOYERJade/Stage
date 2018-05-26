<!DOCTYPE html>

<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>
<meta charset="utf-8">
<!--<link rel="stylesheet" href="Style.css"/>-->
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

<div class ="row" >
    <table>
        <tr>
        
            <?php 
            //if ($this->session->disponible<'0'):
                foreach ($lesProduits As $unProduit):
                    echo '<div class="col-sm-4 " align ="center">';
                    echo anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],img($unProduit['NOMIMAGE']));
                    echo '<h5>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h5>';
                    echo $unProduit['PRIXHT'].' €';
                    echo '<p><h4>'.anchor('visiteur/ajouterUnProduit/'.$unProduit['NOPRODUIT'].'/'.$unProduit['LIBELLE'].'/'.$unProduit['PRIXHT'],'Ajouter au Panier').'</h4></p>';
                    echo '</div>';
                endforeach 
            ?>
        </tr>
    </table>
</div>