<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Data_model extends CI_Model {
 
function __construct()
{
// Call the Model constructor
parent::__construct();
}
 
function get_data()
{
$this->db->select('month, wordpress, codeigniter, highcharts');
$this->db->from('project_requests');
$query = $this->db->get();
return $query->result();
}

function premise_registered($state_code){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $this->db->where('username is NOT NULL', NULL, FALSE);    
    $this->db->where('negeri', $state_descr);
    $this->db->select('*');
    $query = $this->db->get('premis_login');
    
    return $query->num_rows();
}

function premise_submitted($state_code){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $this->db->where('negeri', $state_descr);
    $this->db->select('DISTINCT(premis_login.idpremis)');
    $this->db->from('kpigsr_answers');
    $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');    
    $query = $this->db->get();
    
    return $query->num_rows();
}

function premise_submitted_by_cat($state_code, $cat){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $this->db->where('premis_login.kod_kategori', $cat);
    $this->db->where('negeri', $state_descr);
    $this->db->select('DISTINCT(premis_login.idpremis)');
    $this->db->from('kpigsr_answers');
    $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');    
    $query = $this->db->get();
    
    return $query->num_rows();
}

function get_premise_state($state_code){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    return $state_descr;
}

function get_desktop_by_cat($state_code,$cat){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $this->db->where('kpigsr_answers.verification_type', 'Desktop');
    $this->db->where('premis_login.negeri', $state_descr);
    $this->db->where('premis_login.kod_kategori', $cat);
    $this->db->select('MAX(kpigsr_answers.completed_date)');
    $this->db->from('premis_login');
     $this->db->group_by('premis_login.kod_kategori');
    $this->db->join('kpigsr_answers', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');
    $query = $this->db->get();
    
    return $query->num_rows();
}

function get_fi_by_cat($state_code,$cat){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $this->db->where('kpigsr_answers.verification_type', 'FI');
    $this->db->where('premis_login.negeri', $state_descr);
    $this->db->where('premis_login.kod_kategori', $cat);
    $this->db->select('MAX(kpigsr_answers.completed_date)');
    $this->db->from('premis_login');
     $this->db->group_by('premis_login.kod_kategori');
    $this->db->join('kpigsr_answers', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');
    $query = $this->db->get();
    
    return $query->num_rows();
}

function get_inventory_by_state($state_code){
      $ekasdb = $this->load->database('ekas', TRUE);
      //SLOW QUERY
//    $ekasdb->where('PKODNEGERI', $state_code);
//    $ekasdb->where('STATUSPREMIS', 'operasi');
//
//    $query = $ekasdb->get('premis');
//
//    return $query->num_rows();
    
    return $ekasdb
        ->where('PKODNEGERI', $state_code)
        ->where('STATUSPREMIS', 'operasi')
        ->count_all_results('premis');
}

function get_compulsory_by_cat($state_code,$cat){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $this->db->where('submission_type', 'compulsory');
    $this->db->where('negeri', $state_descr);
    $this->db->where('kod_kategori', $cat);
    $this->db->select('*');
    $this->db->from('premis_login');   
    $query = $this->db->get();
    
    return $query->num_rows();
}

function get_compulsory($state_code){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $this->db->where('submission_type', 'compulsory');
    $this->db->where('negeri', $state_descr);
    $this->db->select('*');
    $this->db->from('premis_login');   
    $query = $this->db->get();
    
    return $query->num_rows();
}

function get_voluntarily($state_code){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $this->db->where('submission_type', 'Voluntarily');
    $this->db->where('negeri', $state_descr);
    $this->db->select('*');
    $this->db->from('premis_login');   
    $query = $this->db->get();
    
    return $query->num_rows();
}

function get_7per7($state_code, $cat){
        $this->load->model('ref_model');
        $state_descr = $this->ref_model->return_state($state_code);
        $this->db->join('premis_login', 'premis_login.idpremis = kpigsr_answers.idpremise', 'left');
        $this->db->where('kpigsr_answers.tool1_implementation', 'true');
        $this->db->where('kpigsr_answers.tool2_implementation', 'true');
        $this->db->where('kpigsr_answers.tool3_implementation', 'true');
        $this->db->where('kpigsr_answers.tool4_implementation', 'true');
        $this->db->where('kpigsr_answers.tool5_implementation', 'true');
        $this->db->where('kpigsr_answers.tool6_implementation', 'true');
        $this->db->where('kpigsr_answers.tool7_implementation', 'true');
        $this->db->where('kpigsr_answers.completed', '1');

        $this->db->where('premis_login.kod_kategori', $cat);
        
        
        $this->db->where('premis_login.negeri', $state_descr);
        $query = $this->db->get('kpigsr_answers');
         
        return $query->num_rows();
}

function get_emtFeedback($state_code, $month){
    
    $year = date('Y');
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $where_emt_status = "(emt_status != 1 OR emt_status IS NOT NULL)";
    $this->db->where($where_emt_status);
    $this->db->where($month, 'MONTH(submission_date)' , FALSE);
    $this->db->where($year, 'YEAR(submission_date)' , FALSE);
    $this->db->where('negeri', $state_descr);
    $this->db->select('*');
    $this->db->from('premises_submitted');   
    $query = $this->db->get();
    
    return $query->num_rows();
}

function get_rating_by_score(){
//     $this->load->model('ref_model');
//    $state_descr = $this->ref_model->return_state($state_code);
//    
//    $this->db->where('username is NOT NULL', NULL, FALSE);    
//    $this->db->where('negeri', $state_descr);
//    $this->db->select('*');
//    $query = $this->db->get('premis_login');
    
    $this->load->model('score_model');
    $scoreDOETool1 = ($this->score_model->get_score_by_tool($emt->id, '1') * $tool_weightage[0]->tool_full_score) / 100;
    $scoreDOETool2 = ($this->score_model->get_score_by_tool($emt->id, '2') * $tool_weightage[1]->tool_full_score) / 100;
    $scoreDOETool3 = ($this->score_model->get_score_by_tool($emt->id, '3') * $tool_weightage[2]->tool_full_score) / 100;
    $scoreDOETool4 = ($this->score_model->get_score_by_tool($emt->id, '4') * $tool_weightage[3]->tool_full_score) / 100;
    $scoreDOETool5 = ($this->score_model->get_score_by_tool($emt->id, '5') * $tool_weightage[4]->tool_full_score) / 100;
    $scoreDOETool6 = ($this->score_model->get_score_by_tool($emt->id, '6') * $tool_weightage[5]->tool_full_score) / 100;
    $scoreDOETool7 = ($this->score_model->get_score_by_tool($emt->id, '7') * $tool_weightage[6]->tool_full_score) / 100;  

    $doetotalscore = $scoreDOETool1 + $scoreDOETool2 + $scoreDOETool3 + $scoreDOETool4 + $scoreDOETool5 + $scoreDOETool6 + $scoreDOETool7;
    //$emt->scoreDOE = $this->mylib->get_assessment_level($doetotalscore);
    $emt->scoreDOE = $this->mylib->get_assessment_level(round($doetotalscore));
    
    return $query->num_rows();
}

function get_emtid_by_state($state_code, $rating){
    $this->load->model('ref_model');
    $state_descr = $this->ref_model->return_state($state_code);
    
    $where_emt_status = "(completed = 1)";
    $this->db->where($where_emt_status);
    //$this->db->where($month, 'MONTH(submission_date)' , FALSE);
    $this->db->where('rating_by_doe', $rating);
    $this->db->where('negeri', $state_descr);
    $this->db->select('*');
    $this->db->from('premises_submitted');   
    $query = $this->db->get();
    
    return $query->num_rows();
}

}