<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
<!--    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-login.css" />-->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="loginbox">
    <?php
$attributes = array('id'=> 'login_form', 'class'=> 'form_horizontal');
echo form_open('users/login', $attributes);
?>
        <?php if($this->session->flashdata('errors')): ?>
        <?php echo $this->session->flashdata('errors'); ?>
        <?php endif; ?>


        
<div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <?php
	
	//echo form_label('Username');
	$data = array(
			'class' => 'form-control',
			'name' => 'username',
			'placeholder' => 'Username'
		);
	echo form_input($data);
	?>
                    </div>
                </div>
            </div>
    
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <?php
	
	//echo form_label('Password');
	$data = array(
			'class' => 'form-control',
			'name' => 'password',
			'placeholder' => 'Password'
		);
	echo form_password($data);
	?>

                    </div>
                </div>
            </div>
            <div class="form-actions">
                 <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                
                <span class="pull-right">
                <?php
	
                $data = array(
                        'class' => 'btn btn-primary',
                        'name' => 'submit',
                        'value' => 'Login'
                    );
                echo form_submit($data);
                ?>
            </span>
            </div>
            <?php echo form_close(); ?>

            <br>
                <span class=""><a href="<?php echo base_url().'users/find'?>" class="flip-link btn btn-success" id="to-recover">Register</a></span>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                    </div>
                </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Recover</a></span>
                </div>
            </form>
        </div>

        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/matrix.login.js"></script>
</body>

</html>