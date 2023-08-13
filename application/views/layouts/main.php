<?php
$emt="";
$user_profile="";
$register="";
$desktop="";
$home="";

if($this->uri->segment(1) == 'emt'){
  $emt = 'active';
} else if ($this->uri->segment(2) == 'find'){
  $register = 'active';
} else if ($this->uri->segment(1) == 'desktop'){
  $desktop = 'active';
} else if ($this->uri->segment(2) == 'user_info'){
  $user_profile = 'active';
} else {
  $home = 'active';
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Online KPI GSR </title>
        

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dropzone.css">
        <!--<script src="<?php //echo base_url();?>assets/js/jquery.js"></script> -->
        <link href="<?php echo base_url();?>assets/fine-uploader/fine-uploader-new.css" rel="stylesheet">
         <script src="<?php echo base_url();?>assets/fine-uploader/fine-uploader.js"></script>
        <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js-webshim/minified/polyfiller.js"></script>
        <script src="<?php echo base_url();?>assets/js/dropzone.js"></script>
        

       </head>
    
    <body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url().'home'; ?>">Laman Utama</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $home;?>"><a href="<?php echo base_url().'home'; ?>">Home <span class="sr-only">(current)</span></a></li>

        <?php if(!($this->session->userdata('logged_in'))): ?>
        <li  class="<?php echo $register;?>"><a href="<?php echo base_url().'users/find'; ?>">Register <span class="sr-only">(current)</span></a></li>
        <?php endif; ?>

        <?php if($this->session->userdata('logged_in')): ?>
        <li class="<?php echo $emt;?>"><a href="<?php echo base_url().'emt'; ?>">EMT <span class="sr-only">(current)</span></a></li>
          <li class="<?php echo $user_profile;?>"><a href="<?php echo base_url().'users/user_info'; ?>">User Profile <span class="sr-only">(current)</span></a></li>
        <!-- <li  class="<?php echo $desktop;?>"><a href="<?php echo base_url().'desktop/index'; ?>">Desktop <span class="sr-only">(current)</span></a></li> 
        <li class=""><a href="<?php echo base_url().'emt'; ?>">Reporting<span class="sr-only">(current)</span></a></li> -->
        <?php endif; ?>
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
      <?php if($this->session->userdata('logged_in')): ?>
        <li><a href="<?php echo base_url();?>users/logout">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



        <div class="container">
            
            <div class="col-xs-3">
                
                <?php //$this->load->view('users/login_view'); ?>
                <?php $this->load->view($sidebar_view); ?>
                
            </div>
            
            <div class="col-xs-9">
                
                <?php $this->load->view($main_view); ?>
                
            </div>
            
            
        </div>

      
        
    </body>
</html>
