<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>
<div align="center">

<?php 

echo validation_errors();
echo form_open('Client/ModifierEmail');
echo form_label('Adresse Email Actuelle','txtEmail');
echo '<br>';
if (isset($Verif) && $Verif==false)
{
    echo "Adresse Email incorrect.";
    echo '<br>';
}
echo form_input('txtEmail', set_value('txtEmail'));
echo '<br>';
echo form_label('Nouvelle Adresse Email','txtNouvEmail');
echo '<br>';
if (isset($Egal) && $Egal==true)
{
    echo "Le nouveau Email ne peut pas être le même que l'actuel.";
    echo '<br>';
}
echo form_input('txtNouvEmail', set_value('txtNouvEmail'));
echo '<br>';
echo '<br>';
echo form_submit('submit', 'Modifier');
echo form_close();
echo '<p><h4>'.anchor('client/Compte','Retourner au compte').'</h4></p>';
?>
</div>