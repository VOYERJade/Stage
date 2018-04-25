<?php

class Administrateur extends CI_Controller {

  public function __construct()
  {
     parent::__construct();
     $this->load->model('ModeleProduit');

     /* les méthodes du contrôleur Administrateur doivent n'être
     accessibles qu'à l'administrateur (Nota Bene : a chaque appel
     d'une méthode d'Administrateur on a appel d'abord du constructeur */

     $this->load->library('session');
     if ($this->session->statut==0) // 0 : statut visiteur
     {
        $this->load->helper('url'); // pour utiliser redirect
        //redirect('/visiteur/seConnecter'); // pas les droits : redirection vers connexion
     }
  } // __construct



  public function ajouterUnProduit()
  {
      $this->load->helper('form');
     
      $DonneesInjectees['TitreDeLaPage'] = 'Ajouter un produit';

      // l'image n'est pas obligatoire : pas required

      if ($this->input->post('boutonAjouter')) //on test si le formulaire a été posté
      {
        $DonneesAInserer = array(
          'Libelle' =>$this->input->post('txtTitre'),
          'NoMarque' =>$this->input->post('txtMarque'),
          'NoCategorie' =>$this->input->post('txtCategorie'),
          'PrixHT' =>$this->input->post('txtprixHT'),
          'TauxTVA' =>$this->input->post('txtTauxTVA'),
          'QuantiteEnStock' =>$this->input->post('txtQuantiteStock'),
          'DateAjout' =>$this->input->post('txtDateAjout'),
          'Detail' =>$this->input->post('txtTexte'),
          'Nomimage' => $this->input->post('txtNomFichierImage')
        );
        //var_dump($DonneesAInserer);
        $this->ModeleProduit->insererUnArticle($DonneesAInserer); //appel du modele
        $this->load->helper('url'); // helper chargé pour l'utilisation de site_url (dans la vue)
        $this->load->view('Administrateur/insertionReussie');
      }
      else
      {
        // Si le formulaire non posté = bouton 'submit' à NULL : on est jamais passé dans le formulaire 
        // -> on envoie le formulaire !!!
        $this->load->view('templates/Entete');
        $this->load->view('administrateur/ajouterUnProduit', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
      }
  } // ajouterUnArticle

  
} //Class
