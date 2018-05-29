<?php

class ModeleProduit extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        /*chargement database.php (dans config), obligatoirement dans le constructeur*/
    }

    public function retournerProduits($NoProduit = FALSE)
    {
        if ($NoProduit === FALSE)
        {
            $requête = $this->db->get('produit');
            return $requête->result_array(); //retour d'un tableau associatif
        }
        //on va chercher l'article dont l'id est $pNoProduit
        $requête = $this->db->get_where('produit', array('NOPRODUIT' => $NoProduit));
        return $requête->row_array();

    }// RetournerProduits

    Public Function insererUnArticle($DonneesAInserer)
    {
        return $this->db->insert('produit', $DonneesAInserer);
    } // insererUnArticle

    public function retournerNom($NoProduit)
    {
        $this->db->select('LIBELLE');
        $requete = $this->db->get_where('produit', array('NOPRODUIT'=>$NoProduit));
        return $requete->row_array();
    } // fin retourner nom

    public function retournerNumero($NoProduit)
    {
        $this->db->select('NOPRODUIT');
        $requete = $this->db->get_where('produit', array('NOPRODUIT'=>$NoProduit));
        return $requete->row_array();
    }

    Public function nombreProduit($nomProduit = FALSE)
    {
        if($nomProduit===false)
        {
            return $this->db->count_all('produit');
        }
        $this->db->from('produit');
        $this->db->like('LIBELLE', $nomProduit);
        $requete = $this->db->count_all_results();
        return $requete;
    }

    public function ProduitRecherche($nomProduit, $nbLignesRetournees, $PremiereLigneRetournee)
    {
        $this->db->limit($nbLignesRetournees, $PremiereLigneRetournee);
        $this->db->select('*');
        $this->db->from('produit');
        $this->db->like('LIBELLE', $nomProduit);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            foreach ($query->result_array() as $ligne) {
                $jeuEnr[] = $ligne;
            }
            return $jeuEnr;
        }
        return FALSE;
    }

    public function retournerProduitsLimite($nombreDeLigneARetourner, $noPremiereLigneARetourner)
    {
        $this->db->limit($nombreDeLigneARetourner, $noPremiereLigneARetourner);
        $requete = $this->db->get("produit");

        if ($requete->num_rows() > 0)
        {
            foreach ($requete->result() as $ligne)
            {
               $jeuEnr[] = $ligne;
            }
            return $jeuEnr;
        }
        return FALSE;
    }

    Public function nombreDeProduits()
    {
        return $this->db->count_all('produit');
    }

} //Class