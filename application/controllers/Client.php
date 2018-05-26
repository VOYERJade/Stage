<?php
    class Client extends CI_Controller

    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('assets'); // helper 'assets' ajouté a Application
            $this->load->model('ModeleProduit'); // chargement modèle, obligatoire
            $this->load->model('ModeleUtilisateur');
            $this->load->library('cart');
        } // __construct

        Public function Compte($Utilisateur = NULL)
        {
            $DonneesInjectees['TitreDeLaPage']  = 'Compte';
            $this->load->library('session');
            $this->load->view('templates/Entete');
            $this->ModeleUtilisateur->retourneUtilisateur($Utilisateur);
            $this->load->view('Client/Compte', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        } // Compte
}