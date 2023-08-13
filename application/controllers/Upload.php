<?php

class Upload extends MY_Controller {

    public function __construct() {
    
        parent::__construct();
        // Load the helpers
        $this->load->helper(array('form', 'url'));
        $this->load->model('questions_model');
    }

    public function index($idpremis='') {
        
        if($this->role == 'premis'){
           $data['answered']= $this->questions_model->get_attachments($this->idpremis);
           $this->viewit_iframe('upload/upload_form',$data, array('error' => ' ' ));
        } else {
           $data['answered']= $this->questions_model->get_attachments($idpremis);
           $this->viewit_iframe('upload/view_upload_files',$data, array('error' => ' ' ));
        }         
    }
    
    public function view($idpremis='') {
        
        if($this->role == 'premis'){
           $data['answered']= $this->questions_model->get_attachments($this->idpremis);
           $this->viewit_iframe('upload/view_upload_files',$data, array('error' => ' ' ));
        }   
  
        //$this->output->enable_profiler(TRUE);
        
    }
    
    /**
     * Multiple upload functionality will fallback to CodeIgniters default do_upload() 
     * method so configuration is backwards compatible between do_upload() and the new do_multi_upload() 
     * method provided by Multi File Upload extension.
     *
     */
    public function do_upload(){
        // Detect form submission.
        if($this->input->post('submit')){
            
            $success = '';
            $idpremise = $this->input->post('idpremise');
            
            for($i=1; $i<8;$i++){
               if (!is_dir('./uploads/' . $idpremise . '/'.$i. '/')) {

                mkdir('./uploads/' . $idpremise . '/'.$i. '/', 0777, true);
            } 
            
            
            $path = './uploads/'.$idpremise.'/'.$i;
            $this->load->library('upload');
             
            // Define file rules
            $this->upload->initialize(array(
                "upload_path"       =>  $path,
                "allowed_types"     =>  "pdf|jpg|png",
                "max_size"          =>  '10000',
//                "max_width"         =>  '1024',
//                "max_height"        =>  '768'
            ));
            
            
            if($this->upload->do_multi_upload("uploadfile_tool".$i)){
                
                $data['upload_data'] = $this->upload->get_multi_upload_data();
                
                //echo '<p class = "bg-success"> ' . count($data['upload_data']) . ' File(s) successfully uploaded.</p>';
                echo '<p> ' . count($data['upload_data']) . ' File(s) successfully uploaded.</p>';
                
                //$files = $this->input->post("uploadfile_tool".$i);
                $no_of_file = count($data['upload_data']);
                if( $no_of_file > 1){
                    
                    $j = 0;
                    foreach($data['upload_data'] as $file){
                        $files[] = array(
                            'idpremise' => $idpremise,
                            'id_tool' => $i,
                            'file_name' => $data['upload_data'][$j]['file_name'],
                            'path' => $path . '/' . $data['upload_data'][$j]['file_name']
                          );
                        $j++;
                    }
                    
                } else {
                    $files[] = array(
                    'idpremise' => $idpremise,
                    'id_tool' => $i,
                    'file_name' => $data['upload_data'][0]['file_name'],
                    'path' => $path . '/' . $data['upload_data'][0]['file_name']
                  );
                }
                  
                
                $success = TRUE;
    
            } else {    
                // Output the errors
               // $errors = array('error' => $this->upload->display_errors('<p class = "bg-danger">', '</p>')); 
                $errors = array('error' => $this->upload->display_errors('<p>', '</p>'));
            
                foreach($errors as $k => $error){
                    echo $error;
                }
                
            }
            }
           
            if($success){
                foreach ($files as $value) {
                 $this->db->insert('kpigsr_attachment', $value);
               } 
            }
            
            
            
        }  else {
            echo '<p class = "bg-danger">An error occured, please try again later.</p>';
            
        }
        
        //$data['answered']= $this->questions_model->get_attachments($this->idpremis);
        //$this->viewit_iframe('upload/upload_form',$data, array('error' => $error ));
        // Exit to avoid further execution
        //exit();
    }
}