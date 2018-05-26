<!DOCTYPE html>
<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>

<?php foreach ($lesProduits As $unProduit) : ?>
<?php
echo '<p>'.img($unProduit['NOMIMAGE']).'<p>';
?>
<?php endforeach ?>