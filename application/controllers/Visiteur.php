<?php
class Visiteur extends CI_Controller

{
  public function __construct()
  {
     parent::__construct();
     $this->load->helper('url');
     $this->load->helper('assets'); // helper 'assets' ajouté a Application
     $this->load->library("pagination");
     $this->load->model('ModeleProduit'); // chargement modèle, obligatoire
     $this->load->model('ModeleUtilisateur');
  } // __construct

  Public function listerLesProduits()
  {
    $DonneesInjectees['lesProduits'] = $this->ModeleProduit->retournerProduits();
    $DonneesInjectees['TitreDeLaPage'] = 'Tous les produits';

    $this->load->view('templates/Entete');
    $this->load->view('visiteur/listerLesProduits', $DonneesInjectees);
    $this->load->view('templates/PiedDePage');
  }//listerLesProduits

  Public function voirUnProduit($pNoProduit = NULL)
  {
    $DonneesInjectees['UnProduit'] = $this->ModeleProduit->retournerProduits($pNoProduit);
    
    if (empty($DonneesInjectees['UnProduit']))
    {
      show_404();
    }
    $DonnesInjectees['TitreDeLaPage'] = $DonneesInjectees['unProduit']['cTitre'];

    $this->load->view('templates/Entete');
    $this->load->view('visiteur/listerLesProduits', $DonneesInjectees);
    $this->load->view('templates/PiedDePage');

  }//Voir un produit

}
