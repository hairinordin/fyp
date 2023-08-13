<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Score_model extends MY_Model { 
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_premise_score_by_tool($idpremis, $emt_id, $tool_no){
                        
        $sql = "SELECT SUM(kpigsr_questions.score) as score FROM kpigsr_questions"
                . " LEFT JOIN kpigsr_tool_answers ON kpigsr_questions.id = kpigsr_tool_answers.id_question"
                . " WHERE (kpigsr_tool_answers.status = 'Yes' OR kpigsr_tool_answers.status = 'Not applicable')"
                . " AND kpigsr_tool_answers.tool_id = ? AND kpigsr_tool_answers.emt_id = ? AND kpigsr_tool_answers.idpremise = ?"
                ;
        //$this->db->query($sql, array($tool_no, $emt_id));
        
        $query = $this->db->query($sql, array($tool_no, $emt_id,$idpremis));
        if ( !$query )
        {
                $error = $this->db->error(); // Has keys 'code' and 'message'
        } else {
            return $query->row();
        }

    }
    public function get_score_by_tool($emt_id, $tool_no){
        $this->db->select_sum('doe_score');
        $this->db->where('emt_id', $emt_id);
        $this->db->where('tool_id', $tool_no);
        $query = $this->db->get('kpigsr_review_answers');
        
        if ($query->num_rows() < 1) {

            return false;
        }

        return $query->row()->doe_score;    
    }
}
