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
            $this->load->library('session');
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

        Public Function ModifierMDP()
        {
            $this->load->library('form_validation');
            $DonneesInjectees['TitreDeLaPage'] = 'Modifier Votre Mot De Passe';
            $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');
            $this->form_validation->set_rules('txtNouvMotDePasse', 'Nouveau mot de passe', 'required');
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/Entete');
                $this->load->view('Client/ModifierMDP', $DonneesInjectees);
                $this->load->view('templates/PiedDePage');
            }
            else
            {
                if ($this->input->post('txtMotDePasse')!=$this->input->post('txtNouvMotDePasse'))
                {
                    $DonneesInjectees["Egal"]=false;
                    $Utilisateur=array
                    (
                        "NOCLIENT"=>$this->session->noClient,
                        "MOTDEPASSE"=> $this->input->post('txtMotDePasse'),
                    );
                    $Verif=$this->ModeleUtilisateur->existe($Utilisateur);
                    if($Verif==1)
                    {
                        $DonneesInjectees["Verif"]=true;
                        $DonneesInjectees=array
                        (
                            "NOCLIENT"=>$this->session->noClient,
                            'MOTDEPASSE'=> $this->input->post('txtNouvMotDePasse'),
                        );
                        $update=$this->ModeleUtilisateur->ModifierClient($DonneesInjectees);
                        if($update)
                        {
                            $this->load->view('templates/Entete');
                            $this->load->view('Client/ModifMDPReussie');
                            $this->load->view('templates/PiedDePage');
                        }
                    }
                    else
                    {
                        $DonneesInjectees["Verif"]=false;
                        $this->load->view('templates/Entete');
                        $this->load->view('Client/ModifierMDP', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }
                }
                else
                {
                    $DonneesInjectees["Egal"]=true;
                    $this->load->view('templates/Entete');
                    $this->load->view('Client/ModifierMDP', $DonneesInjectees);
                    $this->load->view('templates/PiedDePage');
                }
            }
        }

        Public Function ModifierEmail()
        {
            $this->load->library('form_validation');
            $DonneesInjectees['TitreDeLaPage'] = 'Modifier Votre Adresse Email';
            $this->form_validation->set_rules('txtEmail', 'Email', 'required');
            $this->form_validation->set_rules('txtNouvEmail', 'Nouvelle Adresse Email', 'required');
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/Entete');
                $this->load->view('Client/ModifierEmail', $DonneesInjectees);
                $this->load->view('templates/PiedDePage');
            }
            else
            {
                if ($this->input->post('txtEmail')!=$this->input->post('txtNouvEmail'))
                {
                    $DonneesInjectees["Egal"]=false;
                    $Utilisateur=array
                    (
                        "NOCLIENT"=>$this->session->noClient,
                        "EMAIL"=> $this->input->post('txtEmail'),
                    );
                    $Verif=$this->ModeleUtilisateur->existe($Utilisateur);
                    if($Verif==1)
                    {
                        $DonneesInjectees["Verif"]=true;
                        $DonneesInjectees=array
                        (
                            "NOCLIENT"=>$this->session->noClient,
                            'EMAIL'=> $this->input->post('txtNouvEmail'),
                        );
                        $update=$this->ModeleUtilisateur->ModifierEmail($DonneesInjectees);
                        if($update)
                        {
                            $this->load->view('templates/Entete');
                            $this->load->view('Client/ModifierEmailReussie');
                            $this->load->view('templates/PiedDePage');
                        }
                    }
                    else
                    {
                        $DonneesInjectees["Verif"]=false;
                        $this->load->view('templates/Entete');
                        $this->load->view('Client/ModifierEmail', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }
                }
                else
                {
                    $DonneesInjectees["Egal"]=true;
                    $this->load->view('templates/Entete');
                    $this->load->view('Client/ModifierEmail', $DonneesInjectees);
                    $this->load->view('templates/PiedDePage');
                }
            }
        }
}