<!DOCTYPE html>

<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>

<div align = "center">
<?php echo validation_errors();

echo form_open('visiteur/insertionClient');//appeler la fonction associée dans le contrôleur

echo form_label("Nom :", 'lblNom');
echo form_input('txtNom','',array('pattern'=>'[a-zA-Z0-9 ]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Prénom :", 'lblPrenom');
echo form_input('txtPrenom','',array('pattern'=>'[a-zA-Z0-9 ]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Adresse :", 'lblAdresse');
echo form_input('txtAdresse','',array('pattern'=>'[a-zA-Z0-9 ]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Ville :", 'lblVille');
echo form_input('txtVille','',array('pattern'=>'[a-zA-Z0-9 ]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Code Postal :", 'lblCodePostal');
echo form_input('txtCodePostal','',array('pattern'=>'[0-9,.]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Email :", 'lblEmail');
echo form_input('txtEmail','',array('pattern'=>'[a-zA-Z0-9,.@]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_label("Mot de Passe :", 'lblMDP');
echo form_password('txtMDP','',array('pattern'=>'[a-zA-Z0-9/-]*', 'title'=>'Un nom de fichier doit commencer par une lettre', 'required'=>'required')).'<BR>';

echo form_submit('boutonAjouter', 'Inscription').'<BR>';
echo form_close();

?>
</div>