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

    Public function Catalogue($pNoProduit = NULL)
    {
        $DonneesInjectees['TitreDeLaPage']  = 'Catalogue';

        $this->load->view('templates/Entete');
        $DonneesInjectees['lesProduits'] = $this->ModeleProduit->retournerProduits();
        $this->load->view('visiteur/Catalogue', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    }

    Public function PageAccueil()
    {
        $DonneesInjectees['TitreDeLaPage'] = 'Bienvenue sur Neko !';

        $this->load->view('templates/Entete');
        $this->load->view('visiteur/PageAccueil', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    }

    Public function Panier()
    {
        $DonneesInjectees['TitreDeLaPage'] = 'Panier';

        $this->load->view('templates/Entete');
        $this->load->view('visiteur/Panier', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    }

    Public function voirUnProduit($pNoProduit = NULL)
    {
        $DonneesInjectees['unProduit'] = $this->ModeleProduit->retournerProduits($pNoProduit);

        if (empty($DonneesInjectees['unProduit']))
        {
            show_404();
        }
    $DonneesInjectees['TitreDeLaPage'] = $DonneesInjectees['unProduit']['LIBELLE'];
    $this->load->view('templates/Entete');
    $this->load->view('visiteur/voirUnProduit', $DonneesInjectees);
    $this->load->view('templates/PiedDePage');

    }//Voir un produit

    Public function insertionClient()
    {
        $this->load->helper('form');
        $DonneesInjectees['TitreDeLaPage'] = 'Inscription';
        if ($this->input->post('boutonAjouter')) //on test si le formulaire a été posté
    {
    $DonneesAInserer = array(
    'Nom' =>$this->input->post('txtNom'),
    'Prenom' =>$this->input->post('txtPrenom'),
    'Adresse' =>$this->input->post('txtAdresse'),
    'Ville' =>$this->input->post('txtVille'),
    'CodePostal' =>$this->input->post('txtCodePostal'),
    'Identifiant' =>$this->input->post('txtIdentifiant'),
    'MotDePasse' =>$this->input->post('txtMDP')
    );
    $this->ModeleUtilisateur->insererUnClient($DonneesAInserer); //appel du modele
    $this->load->helper('url'); // helper chargé pour l'utilisation de site_url (dans la vue)
    $this->load->view('Administrateur/insertionReussie');
    }
    else 
    {
// Si le formulaire non posté = bouton 'submit' à NULL : on est jamais passé dans le formulaire 
// -> on envoie le formulaire !!!
    $this->load->view('templates/Entete');
    $this->load->view('visiteur/Frm_Inscription', $DonneesInjectees);
    $this->load->view('templates/PiedDePage');
    }

}

    Public function seConnecter()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $DonneesInjectees['TitreDeLaPage'] = 'Se Connecter';

        $this->form_validation->set_rules('txtEmail', 'Email', 'required');
        $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/Entete');
            $this->load->view('visiteur/seConnecter', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
        else 
        {
            $Utilisateur = array(
            'Email' => $this->input->post('txtEmail'),
            'MotDePasse' => $this->input->post('txtMotDePasse'),
            );

            $UtilisateurRetourne = $this->ModeleUtilisateur->retournerUtilisateur($Utilisateur);
            if (!($UtilisateurRetourne == null))
        {
            $this->load->library('session');
            $this->session->identifiant = $UtilisateurRetourne->EMAIL;
            $this->session->Profil = $UtilisateurRetourne->PROFIL;

            $this->session->Nom = $UtilisateurRetourne->NOM;
            $this->session->Prenom = $UtilisateurRetourne->PRENOM;
            $this->load->view('templates/Entete');
            $this->load->view('visiteur/connexionReussie', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
        else 
        {
            $this->load->view('templates/Entete');
            $this->load->view('visiteur/seConnecter', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
        }
    } // fin seConnecter

    Public function seDeConnecter()
    {
        
        $DonneesInjectees['TitreDeLaPage'] = 'Bienvenue sur Neko !';
        
        $this->session->sess_destroy();
        $this->load->view('templates/Entete');
        $this->load->view('visiteur/PageAccueil', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');

    } // fin seDeConnecter
}