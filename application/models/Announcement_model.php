<?php
class Announcement_model extends CI_Model {
    public function getActive() {
        $status = 'Y';
        $this->db->where('announcement', 'status');
        $rs = $this->db->get($status);
        $row = $rs->row();
        
        if (! $row) {
            // tiada rekod ditemui
            return false;
        }
        
        
    }
}