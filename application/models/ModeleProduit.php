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

    function ModifierProduit()
    {

        $unProduit = $this->input->post('rowid');
        $qty = $this->input->post('qty');
     
        for($i=0;$i < $total;$i++)
        {
            $data = array(
               'rowid' => $unProduit[$i],
               'qty'   => $qty[$i]
            );
             
            $this->cart->update($data);
        }
     
    }

} //Class