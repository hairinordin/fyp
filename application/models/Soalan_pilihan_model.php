<?php
class Soalan_pilihan_model extends MY_Model {
    public function jawapan($id_soalan) {
        return $this->db->where('id_soalan', $id_soalan)->get('soalan_pilihan')->result();
    }
}