<?php

echo '<h2>'.$unProduit['libelle'].'</h2>';
echo $unProduit['detail'];
echo '<p>'.img($unProduit['NomImage']).'<p>'; // Affiche directement l'image
// Nota Bene : img_url($unProduit['cNomFichierImage']) aurait retourne l'url de l'image (cf. assets)
echo '<p>'.anchor('visiteur/listerLesProduits','Retour à la liste des articles').'</p>';
