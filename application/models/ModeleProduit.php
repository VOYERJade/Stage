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
} //Class