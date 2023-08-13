<?php

class Sasaran_Model extends MY_Model {

    public $id;
    public $jum_sasar_premis;
    public $jum_sasar_desktop;
    public $jum_sasar_lawatan;
    public $jum_desktop;
    public $jum_lawatan;
    public $month;
    public $year;

    public function sasaran_already_exist($month, $year, $state) {
        $this->db->where('month', $month);
        $this->db->where('year', $year);
        $this->db->where('id_negeri', $state);

        $query = $this->db->get('sasaran');

        if ($query->row() < 1) {
            return true;
        }

        return false;
    }

}
