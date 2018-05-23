<?php
foreach ($lesProduits as $unProduit):{
echo '<h2>'.($unProduit['LIBELLE']).'</h2>';
echo $unProduit['DETAIL'];
echo '<p>'.img($unProduit['NOMIMAGE']).'<p>'; // Affiche directement l'image
// Nota Bene : img_url($unProduit['cNomFichierImage']) aurait retourne l'url de l'image (cf. assets)
echo '<p>'.anchor('visiteur/listerLesProduits','Retour à la liste des articles').'</p>';
//anchor permet une redirection vers une page plus rapidement 
}endforeach
?>
