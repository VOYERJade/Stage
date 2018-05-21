
<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>

<div align = "center">
<?php
echo validation_errors(); // mise en place de la validation
/* set_value : en cas de non validation les données déjà
saisies sont réinjectées dans le formulaire */
echo form_open('visiteur/seConnecter');

echo form_label('Identifiant','txtEmail'); // creation d'un label devant la zone de saisie
echo form_input('txtEmail', set_value('txtEmail'));

echo form_label('Mot de passe','txtMotDePasse');
echo form_password('txtMotDePasse', set_value('txtMotDePasse'));

echo form_submit('submit', 'Se connecter');

echo form_close();
?>
</div>