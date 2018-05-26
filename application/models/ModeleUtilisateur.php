<?php
class ModeleUtilisateur extends CI_Model {

public function __construct()
{
$this->load->database();
} // __construct

public function existe($Utilisateur) // non utilisée retour 1 si connecté, 0 sinon
{
$this->db->where($Utilisateur);
$this->db->from('Client');
return $this->db->count_all_results(); // nombre de ligne retournées par la requête
} // existe

public function retournerUtilisateur($NoProduit)
{

$requete = $this->db->get_where('Client', $NoProduit);
return $requete->row(); // retour d'une seule ligne !
// retour sous forme d'objets
} // retournerUtilisateur

public function insererUnClient($DonneesAInserer)
{
return $this->db->insert('client', $DonneesAInserer);
}

public function retourneUtilisateur($Utilisateur)
    {
        $this->db->select('NOM','PRENOM','ADRESSE', 'VILLE', 'CODEPOSTAL', 'EMAIL', 'MOTDEPASSE');
        $requete = $this->db->get_where('client', $this->session->NOM);
        return $requete->row_array();
    } // fin retourner nom
} // Fin Classe