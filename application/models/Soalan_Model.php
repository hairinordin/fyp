<?php

class Soalan_Model extends CI_Model {

    public $id;
    public $id_modul;
    public $jenis_jawapan;
    public $soalan;
    public $ada_catatan = 'T'; // tiada

    public function soalan_baru($soalan) {

        $this->db->insert('soalan', $soalan);

        return $this->db->insert_id();
    }

    public function pilihan_soalan_baru($soalan) {

        $this->db->insert('soalan_pilihan', $soalan);

        return true;
    }

    public function set_soalan($kat) {
        $sql = "SELECT *, soalan.id AS soalan_id FROM soalan_set 
                LEFT JOIN soalan_modul ON soalan_set.id_modul = soalan_modul.id
                LEFT JOIN soalan ON soalan.id_modul = soalan_modul.id
                WHERE soalan_set.kat_premis = ?      
                ORDER BY soalan.id_modul";
        $query = $this->db->query($sql, array($kat));

        return $query->result();
    }
 
    public function get_modul($kat){
        $sql = "SELECT 	*
	FROM 
	soalan_set 
	LEFT JOIN soalan_modul ON soalan_modul.id = soalan_set.id_modul
        where soalan_set.kat_premis = ?
        ";
        
        $query = $this->db->query($sql, array($kat));
        
        return $query->result();
    }

}
