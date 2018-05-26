<!DOCTYPE html>

<div align = "center"><h2><?php echo $TitreDeLaPage ?></h2></div>

<div class ="row">
<div class="col-sm-8 text-left">
<table>
        <tr>
            <?php 

                echo '<div class="col-sm-4 " align ="center">';
                echo $this->session->Utilisateur['NOM'];
                echo $this->session->Utilisateur['PRENOM'];
                echo $this->session->Utilisateur['ADRESSE'];
                echo $this->session->Utilisateur['VILLE'];
                echo $this->session->Utilisateur['CODEPOSTAL'];
                echo $this->session->Utilisateur['EMAIL'];
                echo $this->session->Utilisateur['MOTDEPASSE'];
                echo '</div>';

            ?>
        </tr>
    </table>
</div>
</div>