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
        $this->load->library('cart');
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
    } // catalogue

    Public function PageAccueil($pNoProduit = NULL)
    {
        $DonneesInjectees['TitreDeLaPage'] = 'Bienvenue sur Neko !';
        $this->load->view('templates/Entete');
        $this->load->view('visiteur/PageAccueil', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    }

    Public function ajouterUnProduit($NoProduit = NULL, $libelle = NULL, $Prix = NULL)
    {
        $DonneesInjectees['TitreDeLaPage'] = 'Panier';
        $this->load->helper('form');

        $nom = $this->ModeleProduit->retournerNom($NoProduit);

        $data = array(
            'id'      => $NoProduit,
            'qty'     => 1,
            'name'    => implode($nom),
            'price'   => $Prix,
            
        );
        $this->cart->insert($data);

        $this->load->view('templates/Entete');
        $this->load->view('visiteur/Panier', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    } //ajouter un produit dans le panier

    public function modifierUnProduit($NoProduit = NULL)
    {
        $DonneesInjectees['TitreDeLaPage'] = 'Panier';
        if($this->input->post('btnModifier'))
        {
            $total=$this->cart->total_items();

            for($i=0;$i < $total;$i++)
            {
                //valeur null a voir 
                $Data=array(
                    'rowid' => $this->input->post($i.'[rowid]'),
                    'qty'   => $this->input->post($i.'[qty]'),
                );
                //var_dump($Data);
                $this->cart->update($Data);
            }
            $this->load->view('templates/Entete');
            $this->load->view('visiteur/Panier', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
    }

    Public function SupprimerProduit($rowid)
    {
        $DonneesInjectees['TitreDeLaPage'] = 'Panier';
        $this->load->helper('form');

        $this->cart->remove($rowid);

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
            $DonneesAInserer = array
                (
                'Nom' =>$this->input->post('txtNom'),
                'Prenom' =>$this->input->post('txtPrenom'),
                'Adresse' =>$this->input->post('txtAdresse'),
                'Ville' =>$this->input->post('txtVille'),
                'CodePostal' =>$this->input->post('txtCodePostal'),
                'Email' =>$this->input->post('txtEmail'),
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
                $this->session->noClient = $UtilisateurRetourne->NOCLIENT;
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
        session_destroy();
        $DonneesInjectees['TitreDeLaPage'] = 'Bienvenue sur Neko !';
        redirect('Visiteur/PageAccueil');
        $this->load->view('templates/Entete');
        $this->load->view('visiteur/PageAccueil', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');

    } // fin seDeConnecter

    public function Recherche()
    {
        if($this->input->post('btnRecherche'))
        {
            $recherche =$this->input->post('txtlibelle');

            redirect('visiteur/RechercheProduit/'.$recherche);
        }
    } // fin Recherche

    public function RechercheProduit($Recherche=NULL)
    {
        if(!($Recherche==NULL)&& !($Recherche==""))
        {
            $config = array();
            $config["Base_url"] = site_url('visiteur/RechercheProduit/'.$Recherche);
            $config["total_rows"] = $this->ModeleProduit->nombreProduit($Recherche);
            $config["per_page"] = 5;
            $config["uri_segment"] = 4;

            $config['fist_link'] = 'Premier';
            $config['last_link'] = 'Dernier';
            $config['next_link'] = 'Suivant';
            $config['prev_link'] = 'Précédent';

            $this->pagination->initialize($config);
            $noPage = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $DonneesInjectees['lesProduits'] = $this->ModeleProduit->ProduitRecherche($Recherche,$config['per_page'], $noPage);

            $DonneesInjectees['TitreDeLaPage'] = 'Résultat de la Recherche';
            $DonneesInjectees['lienPagination'] = $this->pagination->create_links();

            $this->load->view('templates/Entete');
            $this->load->view('visiteur/ProduitRecherche', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
    } // fin Recherche Produit

    public function listerLesProduitsAvecPagination()
    {
        $config = array();
        $config["base_url"] = site_url('visiteur/listerLesProduitsAvecPagination');
        $config["total_rows"] = $this->ModeleProduit->nombreDeProduits();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        $config['first_link'] = 'Premier';
        $config['last_link'] = 'Dernier';
        $config['next_link'] = 'Suivant';
        $config['prev_link'] = 'Précédent';

        $this->pagination->initialize($config);

        $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $DonneesInjectees['TitreDeLaPage'] = 'Tous les produits';
        $DonneesInjectees['lesProduits'] = $this->ModeleProduit->retournerProduitsLimite($config["per_page"], $noPage);
        $DonneesInjectees["liensPagination"] = $this->pagination->create_links();

        $this->load->view('templates/Entete');
        $this->load->view('visiteur/listerLesProduitsAvecPagination', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    }

    public function CatalogueAvecPagination()
    {
        $config = array();
        $config["base_url"] = site_url('visiteur/CatalogueAvecPagination');
        $config["total_rows"] = $this->ModeleProduit->nombreDeProduits();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        $config['first_link'] = 'Premier';
        $config['last_link'] = 'Dernier';
        $config['next_link'] = 'Suivant';
        $config['prev_link'] = 'Précédent';

        $this->pagination->initialize($config);

        $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $DonneesInjectees['TitreDeLaPage'] = 'Tous les produits';
        $DonneesInjectees['lesProduits'] = $this->ModeleProduit->retournerProduitsLimite($config["per_page"], $noPage);
        $DonneesInjectees["liensPagination"] = $this->pagination->create_links();

        $this->load->view('templates/Entete');
        $this->load->view('visiteur/CatalogueAvecPagination', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    }
    
}