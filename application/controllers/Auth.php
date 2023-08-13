<?php

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->theme = 'theme1';
        $this->load->model('user_model');
    }

    public function index() {
        $data = [
            'view' => 'home/home',
            'var' => [1, 2, 3]
        ];

        //dapatkan pengumumnan
        $query = $this->db->get('announcement');

        //get active announcement
        $this->db->select('*');
        $this->db->from('announcement');
        $this->db->where('status', 'Y');
        $getText = $this->db->get();
        //$getText = $this->db->query("SELECT * FROM announcement WHERE status='Y';");

        $data['query'] = $query->result_object();
        $data['getText'] = $getText->result_object();

        //papar
        $this->load->view('login/welcome_message', $data);
    }

//    public function index_maint() {
//        $data = [
//            'view' => 'home/home',
//            'var' => [1, 2, 3]
//        ];
//
//        //dapatkan pengumumnan
//        $query = $this->db->get('announcement');
//
//        //get active announcement
//        $this->db->select('*');
//        $this->db->from('announcement');
//        $this->db->where('status', 'Y');
//        $getText = $this->db->get();
//        //$getText = $this->db->query("SELECT * FROM announcement WHERE status='Y';");
//
//        $data['query'] = $query->result_object();
//        $data['getText'] = $getText->result_object();
//
//        //papar
//        $this->load->view('login/welcome_message', $data);
//    }

    public function logout() {
        $this->rat_logout();
        $this->session->sess_destroy();
        redirect(base_url() . 'auth');
        
    }

    public function login() {

        $id = $this->input->post('username');
        $pwd = $this->input->post('pwd');
        $isDOE = $this->input->post('doe_chkbox');

        if ($isDOE) {
            $this->load->model('admin_model', 'admin');
            $row = $this->admin->login_user($id, $pwd);

            if ($row) {
                $role = $row->role;
                $name = $row->name;
                $this->session->set_userdata('state', $row->state);
                $this->session->set_userdata('name', $row->name);
                $this->session->set_userdata('role', $role);
                $this->session->set_userdata('user_id', $id);
                $this->session->set_userdata('name', $name);
                $this->rat_login();
                redirect(base_url() . 'dashboard/#cTotalRegistered');

            }
        } else {
            // check user wujud dlm premislogin;
            $idpremis = $this->user_model->login_user($id, $pwd);
            if ($idpremis) {
                $row = $this->user_model->get_premise_info($idpremis);
                $this->session->set_userdata('role', 'premis');
                $this->session->set_userdata('user_id', $idpremis);
                $this->session->set_userdata('state', $row->negeri);
                $this->session->set_userdata('name', $row->namapremis);
                $this->rat_login();
                redirect(base_url() . 'dashboard/company');                
            }
        }
        
        $this->session->set_flashdata('err', 'Sign In : Wrong username or password');
        redirect(base_url() . 'auth');
    }

    public function hash() {
        echo password_hash('1234', PASSWORD_BCRYPT);
    }

    public function forgotPassword() {

        $email = $this->input->post('email');
        $findemail = $this->user_model->ForgotPassword($email);
        if ($findemail) {
            $this->user_model->sendpassword($findemail);
            $this->session->set_flashdata('success', 'Password has been sent to email!');

            redirect(base_url() . 'auth');
        } else {
            $this->session->set_flashdata('err', 'Forgot Password : Email not found!');

            redirect(base_url() . 'auth');
        }
    }

    public function ajax_find() {
        $nofaildoe = $this->input->post('no_fail_jas');
        $namapremis = $this->input->post('nama_premis');

        if ($this->user_model->find_user($namapremis, $nofaildoe)) { //ada dalam EKAS ?
            if ($this->user_model->find_user_KPIGSR($namapremis, $nofaildoe)) { // dah pernah register dalam sistem ?
                $premiseExists = $this->user_model->find_user_KPIGSR($namapremis, $nofaildoe);
                if (isset($premiseExists->username)) {
                    echo 'registered';
                } else {
                    $data = $this->user_model->find_user($namapremis, $nofaildoe);

                    echo json_encode($data);
                }
            } else {

                $data = $this->user_model->find_user($namapremis, $nofaildoe);

                echo json_encode($data);
            }
        } else {
            echo 'undefined';
        }
    }

    public function find() {


        $this->form_validation->set_rules('no_fail_jas', 'DOE File No', 'required|min_length[3]');
        $this->form_validation->set_rules('nama_premis', 'Premise Name', 'required|min_length[3]');



        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'errors' => validation_errors()
            );

            $this->session->set_flashdata($data);

            $this->load->view('login/welcome_message');
        } else {
            $nofailjas = $this->input->post('no_fail_jas');
            $namapremis = $this->input->post('nama_premis');

            if ($this->user_model->find_user($namapremis, $nofailjas)) {



                //$this->session->set_flashdata('user_registered', 'Premise found' );


                $data['premise_info'] = $this->user_model->find_user($namapremis, $nofailjas);
                $data['maklumat_wujud'] = 'wujud';

                //var_dump($data['maklumat_wujud']);
                $this->load->view('login/welcome_message', $data);
            } else {

                //$this->session->set_flashdata('user_registered', 'user has been registered');
                echo "error";
                $this->load->view('theme2', ['view' => 'users/find_view']);
            }
        }
    }

    public function ajax_signup($nofailjas='LAMA') {
        //print_r(); 
        //$data = $this->user_model->get_premise_infoEKAS($nofailjas);
        
        //echo json_encode($nofail);
        $data = $this->user_model->find_user('NULL', $this->input->post('nofail'));
        echo json_encode($data);
    }

//    public function email_exist(){
//       
//        
//       if($this->user_model->email_dont_exists('hairi.nord2in@gmail.com')){
//           echo 'true';
//       }else{
//           echo 'false';
//       }
//    }

    public function ajax_register() {
        $nofaildoe = $this->input->post('nofail');
        $namapremis = $this->input->post('namapremis');
        $email = $this->input->post('email');

        if ($this->user_model->email_dont_exists($email)) {
            if (!$this->user_model->find_user_KPIGSR($namapremis, $nofaildoe)) { //User belum pernah register
                $fromEKAS = $this->user_model->find_user($namapremis, $nofaildoe);

                
                //print_r($fromEKAS);
                $option = ['cost' => 12];
                $encrypted_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $option);

                $this->load->model('state_model');

                if(isset($fromEKAS[0]->BANDAR_PREMIS_DESC)){
                    $city = $fromEKAS[0]->BANDAR_PREMIS_DESC;
                } else {
                    $city = 'NULL';
                }
                
            
                
                $state = $this->state_model->get_state_by_code($fromEKAS[0]->NEGERI_PREMIS_KOD);

                //$parliament = $this->state_model->get_parliament_by_code($fromEKAS->PARLIMEN);
                $parliament = $fromEKAS[0]->PARLIMEN_PREMIS_DESC;
                $this->load->library('mylib');
               //EKAS4 
                $kod_kategori = $this->mylib->kategoriPremis($fromEKAS[0]->MSIC_SEKSYEN, $fromEKAS[0]->MSIC_PERKARA, NULL, $fromEKAS[0]->KATEGORI_KOD);
                
                //EKAS4 - PEMATUHAN
                $landfill = 'N';
                $efluen = 'N';
                $tertakluk_eff = 'NULL';
                $kumbahan = 'N';
                $tertakluk_kumbahan = 'NULL';
                $pub = 'N';
                $tertakluk_pub = 'NULL';
                $kg = 'N';
                $kks = 'N';
                $bt = 'N';
                $pydt_bt = 'N';
                $tidak_kaitan = 'N';
                if(isset($fromEKAS[0]->KATEGORI_PEMATUHAN_DESC->PEMATUHAN)){
                    foreach($fromEKAS[0]->KATEGORI_PEMATUHAN_DESC->PEMATUHAN as $patuh){
                    
                        if(isset($patuh->landfill) && $patuh->landfill == 1){
                            $landfill = 'Y';
                        }
    
                        if(isset($patuh->efluen) && $patuh->efluen == 1){
                            $efluen = 'Y';
    
                            if(isset($patuh->Tertakluk) && $patuh->Tertakluk == 1){
                                $tertakluk_eff = 'T';
                            }
                        }
    
                        if(isset($patuh->kumbahan) && $patuh->kumbahan == 1){
                            $kumbahan = 'Y';
    
                            if(isset($patuh->Tertakluk) && $patuh->Tertakluk == 1){
                                $tertakluk_kumbahan = 'T';
                            }
                        }
                        
                        if(isset($patuh->bt) && $patuh->bt == 1){
                            $bt = 'Y';
                        }
    
                        if(isset($patuh->pub) && $patuh->pub == 1){
                            $pub = 'Y';
    
                            if(isset($patuh->Tertakluk) && $patuh->Tertakluk == 1){
                                $tertakluk_pub = 'T';
                            }
                        }
    
                        if(isset($patuh->kg) && $patuh->kg == 1){
                            $kg = 'Y';
                        }
    
                        if(isset($patuh->kks) && $patuh->kks == 1){
                            $kks = 'Y';
                        }
    
                        if(isset($patuh->pydt_bt) && $patuh->pydt_bt == 1){
                            $pydt_bt = 'Y';
                        }
    
                        if(isset($patuh->tidak_kaitan) && $patuh->tidak_kaitan == 1){
                            $tidak_kaitan = 'Y';
                        }
                    }
                }

                $data = array(
                    'idpremis' => $fromEKAS[0]->ID_PREMIS,
                    'nofaildoe' => $fromEKAS[0]->NO_FAIL_JAS,
                    'namapremis' => $fromEKAS[0]->PREMIS,
                    'alamat' => $fromEKAS[0]->ALAMAT_PREMIS_1,
                    'sic' => isset($fromEKAS[0]->SIC)? $fromEKAS[0]->SIC : 'NULL',
                    'subsic' => isset($fromEKAS[0]->SUB_SIC)? $fromEKAS[0]->SUB_SIC : 'NULL',
                    'msicseksyen' => $fromEKAS[0]->MSIC_SEKSYEN,
                    'msicbahagian' => $fromEKAS[0]->MSIC_BAHAGIAN ,
                    'msickumpulan' => $fromEKAS[0]->MSIC_KUMPULAN ,
                    'msickelas' =>  $fromEKAS[0]->MSIC_KELAS,
                    'msicperkara' =>  $fromEKAS[0]->MSIC_PERKARA,
                    'poskod' => $fromEKAS[0]->POSKOD_PREMIS,
                    'bandar' => $city,
                    'negeri' => $state,
                    'parlimen' => $parliament,
                    'name' => $this->input->post('name'),
                    'ic_no' => $this->input->post('icno'),
                    'position' => $this->input->post('position'),
                    'username' => $this->input->post('username'),
                    'password' => $encrypted_password,
                    'email' => $email,
                    'kod_kategori' => $kod_kategori,
                    'kategori_premis' => $fromEKAS[0]->KATEGORI_PREMIS,
                    'sisa_pepejal' => $landfill,
                    'effluent' => $efluen,
                    'tertakluk_eff' => $tertakluk_eff,
                    'sewage' => $kumbahan,
                    'tertakluk_kum' => $tertakluk_kumbahan,
                    'pub' => $pub,
                    'tertakluk_pub' => $tertakluk_pub,
                    'bt' => $bt,
                    'kg' => $kg,
                    'kks' => $kks,
                    'pydt_bt' => $pydt_bt,
                    'landfill' => $landfill,
                    'tidak_kaitan' => $tidak_kaitan,
                    'cawangan_jas' => isset($fromEKAS[0]->cawangan_jas_id)? $this->user_model->find_cawangan($fromEKAS[0]->cawangan_jas_id)->NAMA_CAWANGAN : 'NULL',
                    'submission_type' => 'Voluntarily',
                    'submission_due_date' => date("Y-m-d", strtotime("+6 months")),
                    'register_date' => date("Y-m-d")
                );

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // $response_array['ajax_status'] = 'test: rekod';
                if ($this->user_model->add_premise($data)) {

                    $this->load->library('mylib');
                    $this->mylib->send_email_notification('Account Registration', 'Your account has been created, please log in to proceed with the EMT submission.', $email);
                    $response_array['ajax_status'] = 'success';
                } else {
                    $response_array['ajax_status'] = 'error in database';
                }
            } else { //User dah register @ ada dalam rekod list premis yang compulsary
                $fromEKAS = $this->user_model->find_user($namapremis, $nofaildoe);

                $option = ['cost' => 12];
                $encrypted_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $option);

                $data = array(
                    'name' => $this->input->post('name'),
                    'ic_no' => $this->input->post('icno'),
                    'position' => $this->input->post('position'),
                    'username' => $this->input->post('username'),
                    'password' => $encrypted_password,
                    'email' => $email,
                    'submission_type' => 'Compulsory',
                    'submission_due_date' => date("Y-m-d", strtotime("+1 months")),
                    'register_date' => date("Y-m-d")
                );

                if ($this->user_model->update_premise($data, $fromEKAS->IDPREMIS)) {

                    $this->load->library('mylib');
                    $this->mylib->send_email_notification('Account Registration', 'Your account has been created, please log in to proceed with the EMT submission.', $email);
                    $response_array['ajax_status'] = 'success';
                } else {
                    $response_array['ajax_status'] = 'error in database';
                }
            }
        } else { //email has been registered
            $response_array['ajax_status'] = 'email exists';
        }

        header('Content-type: application/json');
        echo json_encode($response_array);
    }
    
    function test_cawangan($id){
        
        $data = $this->user_model->find_cawangan($id)->NAMA_CAWANGAN;
        
        print_r($data);
    }

    function rules($namapremis, $nofaildoe) {
        $nofaildoe = 'ASSH/SPT(B)33/111/200/052';
        $namapremis = 'TONG';

        $fromEKAS = $this->user_model->find_user($namapremis, $nofaildoe);
        echo 'SISA_PEPEJAL - ' . $fromEKAS->SISA_PEPEJAL;
        echo '<br>';
        echo 'EFFLUENT - ' . $fromEKAS->EFFLUENT;
        echo '<br>';
        echo 'TERTAKLUK_EFF - ' . $fromEKAS->TERTAKLUK_EFF;
        echo '<br>';
        echo 'SEWAGE - ' . $fromEKAS->SEWAGE;
        echo '<br>';
        echo 'TERTAKLUK_KUM - ' . $fromEKAS->TERTAKLUK_KUM;
        echo '<br>';
        echo 'PUB - ' . $fromEKAS->PUB;
        echo '<br>';
        echo 'TERTAKLUK_PUB - ' . $fromEKAS->TERTAKLUK_PUB;
        echo '<br>';
        echo 'BT - ' . $fromEKAS->BT;
        echo '<br>';
        echo 'KG - ' . $fromEKAS->KG;
        echo '<br>';
        echo 'KKS - ' . $fromEKAS->KKS;
        echo '<br>';
        echo 'PYDT_BT - ' . $fromEKAS->PYDT_BT;
        echo '<br>';
        echo 'TIDAK_KAITAN - ' . $fromEKAS->TIDAK_KAITAN;
    }
    
    public function rat_login(){
        //Activity log

        /*
        log($message, $code = 0, $user_id = 0)
        The log() method allows you to write the log. You must pass it the $message you want to write. If you didn't set the $config['session_user_id'], you can also pass it a user ID. For your convenience, you also can pass a code of the message; who knows, maybe you want to have different colors on the messages when you output the logs. You can do that by passing a code to the message you write.

        get_log($user_id = NULL, $code = NULL, $date = NULL, $order_by = NULL, $limit = NULL)
        The get_log() method allows you to retrieve the logs of a/many user/s...

        delete_log($user_id = NULL, $date = NULL)
        The delete_log() method allows you do delete the (user) logs regarding of a date in time...
         */

        $this->rat->log("Login", 0, 0);
    }
    
    public function rat_logout(){
        //Activity log

        /*
        log($message, $code = 0, $user_id = 0)
        The log() method allows you to write the log. You must pass it the $message you want to write. If you didn't set the $config['session_user_id'], you can also pass it a user ID. For your convenience, you also can pass a code of the message; who knows, maybe you want to have different colors on the messages when you output the logs. You can do that by passing a code to the message you write.

        get_log($user_id = NULL, $code = NULL, $date = NULL, $order_by = NULL, $limit = NULL)
        The get_log() method allows you to retrieve the logs of a/many user/s...

        delete_log($user_id = NULL, $date = NULL)
        The delete_log() method allows you do delete the (user) logs regarding of a date in time...
         */

        $this->rat->log("Logout", 0, 0);
    }
    
    /////////////TEST EMAIL SENDING
    public function forgot(){
          $this->load->library('email');
        
            $passwordplain = "";
            $passwordplain = rand(999999999, 9999999999);
            
            $option = ['cost' => 12];
            $encrypted_password = password_hash($passwordplain, PASSWORD_BCRYPT, $option);
            
            $newpass['password'] = $encrypted_password;
            //$this->db->where('email', $email);
            //$this->db->update('premis_login', $newpass);
            $mail_message = 'Dear Tester,' . "\r\n";
            $mail_message .= 'You have requested to reset password,<br> Your <b>Temporary Password</b> is <b>' . $passwordplain . '</b>' . "\r\n";
            $mail_message .= '<br>Please update your password after this.';
            $mail_message .= '<br>Regards';
            $mail_message .= '<br>EMAINS System';
            
            $subject = 'EMAINS - You have requested password reset';
            //date_default_timezone_set('Etc/UTC');
            //require FCPATH . 'assets/PHPMailer/PHPMailerAutoload.php';
//            $mail = new PHPMailer;
//            $mail->isSMTP();
//            $mail->SMTPSecure = "tls";
//            $mail->Debugoutput = 'html';
//            $mail->Host = "yooursmtp";
//            $mail->Port = 587;
//            $mail->SMTPAuth = true;
//            $mail->Username = "your@email.com";
//            $mail->Password = "password";
//            $mail->setFrom('admin@site', 'admin');
//            $mail->IsHTML(true);
//            $mail->addAddress($email);
            
             $result = $this->email
                ->from('emains-noreply@doe.gov.my', 'EMAINS Support')
                //->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
                ->to('test-l0dlg@mail-tester.com')
                ->subject($subject)
                ->message($mail_message)
                ->send();

            var_dump($result);
            echo '<br />';
            echo $this->email->print_debugger();
    }

//    function test_tp()
//    {
//         $ekas = $this->user_model->find_user('tuatau', 'AS(B)J92/000/100/042');
//         echo '<pre>';
//         print_r($ekas);
//         echo '</pre>';
//         
//    }

//    public function test_ekas4()
//    {
//        $curl = curl_init();
//        
//        curl_setopt_array($curl, array(
//        CURLOPT_URL => 'https://api.doe.gov.my/ekas/premis?no_fail=JAS.BHQ.600-3/3/13',
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => '',
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 0,
//        CURLOPT_FOLLOWLOCATION => true,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => 'GET',
//        CURLOPT_HTTPHEADER => array(
//            'x-api-key: s8KZCv6MhT92JczB4CZkEiksLtEw6mF3pAAqmw5b',
//            'Authorization: Bearer 5|ekbdZxSwi2zNxcZI1m9u6gBBznTrLLMneuXFh6Tl'
//        ),
//        ));
//
//        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//
//        //print_r($curl);
//        $response = curl_exec($curl);
//        //echo $response;
//        
//
//        if ($response === false)
//        {  
//            print_r('Curl error: ' . curl_error($curl));
//            die;
//        }
//
//        //print_r($response);
//
//        $obj = json_decode($response);
//
//        foreach($obj as $k){
//            print_r($k->ID_PREMIS);
//        }
//        die;
//        
//        curl_close($curl);
//    }

    
}
