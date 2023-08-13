<?php

class Test extends MY_Controller {
    public function user() {
        $this->load->model('admin_model', 'admin');
        $data['users'] = $this->admin->all();
        $this->viewit('test/user', $data);
    }
    
    public function profile() {
        $id = $this->input->get('id');
        $this->load->model('admin_model', 'admin');
        $user = $this->admin->find_one($id);
        //echo $id;
        echo json_encode($user);
    }
    
    public function time() {
        echo date('d/m/Y H:i:s');
    }
    
    public function ui() {
        $this->viewit('test/ui');
    }
    
    public function select() {
        $this->load->helper('form');
        $this->load->model('Ref_model', 'ref');
        echo form_dropdown('name', $this->ref->data('jantina'), 'P');
    }

    public function ref() {
        $this->load->model('Ref_model', 'ref');
        $rows = $this->ref->all();
        $row = $this->ref->find_one(1);
        var_dump($row);
    }

    public function show_soalan() {
        $this->load->model('Soalan_Model', 'soalan');
        $this->load->model('Soalan_pilihan_model', 'pilihan');
        $rows = $this->soalan->set_soalan('pydtkks');
        //var_dump($row);
        $this->viewit('test/soalan', ['rows' => $rows]);
    }

    public function save() {
        //var_dump($this->input->post());
        $arr = [1, 3, 9];
        foreach ($arr as $id) {
            $id_soalan = $id;
            $jwp = $this->input->post('jawapan_' . $id);
            echo "soalan = $id, jawapan = ";
            print_r($jwp);
        }
    }

}
