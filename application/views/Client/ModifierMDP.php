<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>
<div align="center">

<?php 

echo validation_errors();
echo form_open('Client/ModifierMDP');
echo form_label('Ancien mot de passe ','txtMotDePasse');
echo '<br>';
if (isset($Verif) && $Verif==false)
{
    echo "Mot de passe incorrect.";
    echo '<br>';
}
echo form_password('txtMotDePasse', set_value('txtMotDePasse'));
echo '<br>';
echo form_label('Nouveau mot de passe','txtNouvMotDePasse');
echo '<br>';
if (isset($Egal) && $Egal==true)
{
    echo "Le nouveau mot de passe ne peut pas être le même que l'ancien.";
    echo '<br>';
}
echo form_password('txtNouvMotDePasse', set_value('txtNouvMotDePasse'));
echo '<br>';
echo '<br>';
echo form_submit('submit', 'Modifier');
echo form_close();
echo '<p><h4>'.anchor('client/Compte','Retourner au compte').'</h4></p>';
?>
</div>