<html>

<h2><?php echo $TitreDeLaPage ?></h2>

<?php echo validation_errors();

echo form_open('administrateur/ajouterUnProduit');

echo form_label("Titre de l'article :", 'lblTitre');
echo form_input('txtTitre','',array('pattern'=>'[a-zA-Z0-9 ]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Marque du produit :", 'lblMarque');
echo form_input('txtMarque','',array('pattern'=>'[a-zA-Z0-9 ]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Catégorie du produit :", 'lblMarque');
echo form_input('txtCategorie','',array('pattern'=>'[a-zA-Z0-9 ]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Prix HT du produit :", 'lblPrixHT');
echo form_input('txtprixHT','',array('pattern'=>'[0-9,.]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Taux TVA du produit :", 'lblTauxTVA');
echo form_input('txtTauxTVA','',array('pattern'=>'[0-9,.]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Quantité en Stock du produit :", 'lblQuantiteStock');
echo form_input('txtQuantiteStock','',array('pattern'=>'[0-9,.]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Date d'ajout du produit :", 'lblDateAjout');
echo form_input('txtDateAjout','',array('pattern'=>'[0-9/]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

//LA COLONNE NE PEUT ETRE NULL !!!!!
echo form_label("Texte de l'article :", 'lblTexte');
echo form_textarea('txtText', '', array('required'=>'required')).'<BR>';

echo form_label("Nom du fichier Image :", 'lblNomFichierImage');
echo form_input('txtNomFichierImage', '', array('pattern'=>'^[a-zA-Z][a-zA-Z0-9]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_submit('boutonAjouter', 'Ajouter un article').'<BR>';
echo form_close();

?>

</html>