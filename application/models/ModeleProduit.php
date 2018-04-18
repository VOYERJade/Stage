<?php

class ModeleProduit extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        /*chargement database.php (dans config), obligatoirement dans le constructeur*/
    }

    public function retournerProduits($pNoProduit = FALSE)
    {
        if ($pNoProduit === FALSE)
        {
            $requête = $this->db->get('ecommerce');
            return $requête->result_array(); //retour d'un tableau associatif
        }
        //on va chercher l'article dont l'id est $pNoProduit
        $requête = $this->db->get_where('ecommerce', array('noproduit' => $pNoArticle));
        return $requête->row_array();
    }

    Public Function insererUnArticle($DonneesAInserer)
    {
        return $this->db->insert('produit', $DonneesAInserer);
    } // insererUnArticle
    
} //Class