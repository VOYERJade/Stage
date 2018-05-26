<div class="col-sm-12 text-left">

    <div align = "center">
        <?php
            echo '<h2>'.($unProduit['LIBELLE']).'</h2>';
        ?>
    </div>

    <div class="col-sm-4 text-left">
        <?php
            echo '<p>'.img($unProduit['NOMIMAGE']).'<p>'; // Affiche directement l'image
            // Nota Bene : img_url($unProduit['cNomFichierImage']) aurait retourne l'url de l'image (cf. assets)
        ?>
    </div>
</div>

<div class="row content">
    <div class="col-sm-4 text-center">
        <?php
            echo '<h2> Résumé </h2>';
            echo $unProduit['DETAIL'].'</br>';
            echo '<h4>Prix HT : '.$unProduit['PRIXHT'].' €</h4></br>';
            echo '<h4> Quantité : '.$unProduit['QUANTITEENSTOCK'].'</h4>';
            echo '<p><h3>'.anchor('visiteur/listerLesProduits','Retour à la liste des articles').'</h3></p>';
            //anchor permet une redirection vers une page plus rapidement 

        ?>
    </div>
</div>