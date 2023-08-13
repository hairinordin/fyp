<?php

class Rules extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('answers_model');
    }

    public function submit($idpremise) {
        $post_data = $this->input->post();

        if (isset($post_data)) {

            if (isset($post_data['EFF_compliance'])) {
                $eff = $this->input->post('EFF_compliance');
            } else {
                $eff = '';
            }

            if (isset($post_data['SEWAGE_compliance'])) {
                $sewage = $this->input->post('SEWAGE_compliance');
            } else {
                $sewage = '';
            }

            if (isset($post_data['POM_compliance'])) {
                $pom = $this->input->post('POM_compliance');
            } else {
                $pom = '';
            }

            if (isset($post_data['SW_compliance'])) {
                $sw = $this->input->post('SW_compliance');
            } else {
                $sw = '';
            }

            if (isset($post_data['CAR_compliance'])) {
                $car = $this->input->post('CAR_compliance');
            } else {
                $car = '';
            }

            $data = array(
                'idpremise' => $idpremise,
                'eff_compliance' => $eff,
                'sewage_compliance' => $sewage,
                'pom_compliance' => $pom,
                'sw_compliance' => $sw,
                'car_compliance' => $car,
            );

            $this->db->trans_begin();
            $query = $this->db->get_where('kpigsr_rules_compliance', array('idpremise' => $idpremise));
            if ($query->num_rows() > 0) {
                echo 'records already exist';
            } else {
                $this->db->insert('kpigsr_rules_compliance', $data);

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    echo 'roollback db';
                } else {
                    $this->db->trans_commit();
                    echo 'update db';
                }
            }
        } else {
            echo 'Empty submission, try again';
        }
    }

}
