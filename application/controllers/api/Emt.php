<?php

require APPPATH . 'libraries/REST_Controller.php';

class Emt extends REST_Controller {

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_get($id = 0) { //id = idpremis
        $this->db->select('*');

        if (!empty($id)) {
            $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');
            $this->db->where('kpigsr_answers.tool1_implementation', 'true');
            $this->db->where('kpigsr_answers.tool2_implementation', 'true');
            $this->db->where('kpigsr_answers.tool3_implementation', 'true');
            $this->db->where('kpigsr_answers.tool4_implementation', 'true');
            $this->db->where('kpigsr_answers.tool5_implementation', 'true');
            $this->db->where('kpigsr_answers.tool6_implementation', 'true');
            $this->db->where('kpigsr_answers.tool7_implementation', 'true');
            $this->db->where('kpigsr_answers.completed', '1');
            $this->db->order_by('kpigsr_answers.completed_date', 'DESC');

            if ($id == 'all') {
                $result = $this->db->get("kpigsr_answers");
            } else {

                $this->db->limit(1);
                $result = $this->db->get_where("kpigsr_answers", ['idpremise' => $id]);
            }

            if ($result->num_rows() > 1) {
                $data = array();
                foreach($result->result() as $k){
                    array_push($data,array ('namapremis' => $k->namapremis, 'idpremise' => $k->idpremise, 'rating' => 1)); //1 = 7/7
                }
                
            } elseif ($result->num_rows() == 1) {
            $data = array('namapremis' => $result->row()->namapremis, 'idpremise' => $result->row()->idpremise, 'rating' => 1); //1 = 7/7
            }else {

                $result = $this->db->get_where('premis_login', ['idpremis' => $id])->row_array();
                $data = array('namapremis' => $result['namapremis'], 'idpremise' => $result['idpremis'], 'rating' => 0); //0 = < 7/7
            }

            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response('Invalid request', REST_Controller::HTTP_OK);
        }
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
//    public function index_post()
//    {
//        $input = $this->input->post();
//        $this->db->insert('items',$input);
//     
//        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
//    } 

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
//    public function index_put($id)
//    {
//        $input = $this->put();
//        $this->db->update('items', $input, array('id'=>$id));
//     
//        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
//    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
//    public function index_delete($id)
//    {
//        $this->db->delete('items', array('id'=>$id));
//       
//        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
//    }
}
