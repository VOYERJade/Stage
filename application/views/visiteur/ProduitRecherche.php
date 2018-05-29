<!DOCTYPE html>

<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>
    <div align = "center" class="col-sm-8 sidenav">
        <table cellpadding="6" cellspacing="1" style="width:70%" border="1">
        
            <tr>
                <th>Produit</th>
                <th>Libelle</td>
                <th>Prix</th>
                <th>Quantité en Stock</th>
            </tr>
            
            <body>
            <?php foreach ($lesProduits As $unProduit):
                 echo '<tr>';
                    echo '<td><img width = "75%" src="'.img_url($unProduit['NOMIMAGE']).'"></td></br>';
                    echo '<td><h3>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h3></td>';
                    echo '<td><h4>Prix HT : '.$unProduit['PRIXHT'].' €</h4></td></br>';
                    echo '<td><h4> Quantité : '.$unProduit['QUANTITEENSTOCK'].'</h4></td>';
                '</tr>';
            endforeach ?>
            
            </body>
        </table>
    </div>