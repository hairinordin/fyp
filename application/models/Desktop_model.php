<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class desktop_model extends CI_Model {

	public function get_emt_answers($negeri=""){

		//$this->db->where()
		//$query = $this->db->get('emt_1');
		$this->db->select('*');
		$this->db->from('emt_1');
		$this->db->join('premislogin', 'emt_1.premis_id = premislogin.idpremis');
		$query = $this->db->count_all_results();

		return $query->result();


	}
	
}

?>