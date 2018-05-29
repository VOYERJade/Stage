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
    <div align ="center">
        <div class="container-fluid text-center"> 
            <div class="row content">
              <div class="col-sm-2 sidenav">
              <p><a href="<?php echo site_url('Client/ModifierMDP') ?>">Modifier Mot De Passe</a></p>
              <p><a href="<?php echo site_url('Client/ModifierEmail') ?>">Modifier Adresse Email</a></p>
              <p><a href="<?php echo site_url('Client/ModifierMDP') ?>">Modifier Adresse de Livraison</a></p>
            </div>
        </div>
    </div>
</div>