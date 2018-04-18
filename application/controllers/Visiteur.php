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

  //Public function ListerLesProduits()
  //{
   // $this->load->model('ModeleProduit');
   // $Donnees['LesProduits'] = $this->modeleProduit->getLesProduits();

    //pour afficher les produits il faut creer une view
    //$this->load->view('afficherProduits', $Donnees);
  //}
}
